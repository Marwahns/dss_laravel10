<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class Vikor_CalculationController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(Request $request)
    {
        $pageTitle = 'VIKOR | Calculation';
        $breadcrumb = 'Calculation'; # breadcrumb

        $tb_sample = new Sample();
        $tb_alternative = new Alternative();
        $tb_criteria = new Criteria();
        $countDataAlternative = $tb_alternative->count();
        $countDataCriteria = $tb_criteria->count();

        # get data samples for pagination
        $samples = Sample::latest()->paginate(10);

        # get data samples
        $getSamples = $tb_sample->detailSample();
        $getAlternative = $tb_alternative->detailAlternative();
        $criterion =  $tb_criteria->detailCriteria();
        $alternatives = Alternative::all();
        $totalWeight = Criteria::sum('weight');

        foreach ($getAlternative as $key => $value) {
            $detailSampleByAlternativeId = $tb_sample->detailSample($value['id']);
            # print_r($detailSampleByAlternativeId); die;
            foreach ($detailSampleByAlternativeId as $key2 => $value2) {
                $getAlternative[$key]['nilai_c' . $value2['criteria_id']] = $value2['nilai'];
            }
        }
        # echo '<pre>'; print_r($getAlternative); die;

        try {
            # Call function calculateMinMaxValues
            $dataCalculateMinMaxValues = $this->calculateMinMaxValues($getAlternative, $criterion);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return Redirect::route('home')->with('error', $errorMessage);
        }

        [$dataCalculateMinMaxValues] = $this->calculateMinMaxValues($getAlternative, $criterion);
        # Call function calculateMinMaxValues
        [$matrixNormalized] = $this->calculateNormalizedValues($getAlternative, $criterion, $dataCalculateMinMaxValues['maxValues'], $dataCalculateMinMaxValues['minValues']);

        # Call function calculateMinMaxValues
        [$weightedNormalizedValues] = $this->calculateWeightedNormalizedValues($matrixNormalized, $criterion);

        # Call function calculateUtilityMeasures
        [$dataCalculateUtilityMeasures] = $this->calculateUtilityMeasures($criterion, $matrixNormalized);

        # Call function calculateQValues
        [$dataCalculateQValues] = $this->calculateQValues($dataCalculateUtilityMeasures['utilityMeasuresS'], $dataCalculateUtilityMeasures['utilityMeasuresR'], $getAlternative);

        # Call function calculateRankings
        [$dataCalculateRankings] = $this->calculateRankings($getAlternative, $dataCalculateQValues['Qs'], $dataCalculateQValues['Qb'], $dataCalculateQValues['Qc']);

        # Call function checkAcceptableAdvantage
        [$dataCheckAcceptableAdvantage] = $this->checkAcceptableAdvantage($getSamples, $dataCalculateRankings['alternativeQ'], $dataCalculateRankings['qValueBestAlternative']);

        # Call function checkAcceptableStability
        [$dataCheckAcceptableStability] = $this->checkAcceptableStability($dataCalculateRankings['rankingsB'], $dataCalculateRankings['rankingsC'], $dataCalculateRankings['qValueBestAlternative'], $dataCalculateRankings['alternativeWithMinQs'], $dataCalculateRankings['alternativeWithMinQsB'], $dataCalculateRankings['alternativeWithMinQsC']);

        # Render view
        return view('calculation.index', compact('getAlternative', 'samples', 'countDataAlternative', 'countDataCriteria', 'pageTitle', 'breadcrumb', 'criterion', 'alternatives', 'totalWeight', 'dataCalculateMinMaxValues', 'matrixNormalized', 'weightedNormalizedValues', 'dataCalculateUtilityMeasures', 'dataCalculateQValues', 'dataCalculateRankings', 'dataCheckAcceptableAdvantage', 'dataCheckAcceptableStability'));
    }

    public function debugging($getAlternative, $criterion)
    {

        foreach ($getAlternative as $alternative) {
            foreach ($criterion as $criteria) {
                $key = 'nilai_c' . $criteria->id;
    
                if (!isset($alternative[$key])) {
                    $errorMessage = "The key '{$key}' does not exist in the \$alternative array.";
                    $error = "Semua alternatif harus memiliki nilai weight dari masing-masing kriteria";
                    // dd($alternative); # Dump the contents of $alternative array for debugging purposes
                    // die(); # Terminate the script execution
                    throw new \Exception($error);
                }
    
                $criteriaValue = $alternative[$key];
            }
        }

    }

    public function calculateMinMaxValues($getAlternative, $criterion)
    {
        $maxValues = [];
        $minValues = [];

        # Initialize the maxValues and minValues arrays with all criteria IDs
        foreach ($criterion as $criteria) {
            $maxValues[$criteria->id] = null;
            $minValues[$criteria->id] = null;
        }

        foreach ($getAlternative as $alternative) {
            foreach ($criterion as $criteria) {

                $this->debugging($getAlternative, $criterion);

                $criteriaValue = $alternative['nilai_c' . $criteria->id];

                // Memeriksa jika nilai adalah null sebelum memprosesnya
                if ($criteriaValue !== null) {
                    $maxValue = is_array($criteriaValue) ? max($criteriaValue) : $criteriaValue;
                    $minValue = is_array($criteriaValue) ? min($criteriaValue) : $criteriaValue;

                    # Update the maximum value per column if necessary
                    if ($maxValue !== null && ($maxValues[$criteria->id] === null || $maxValue > $maxValues[$criteria->id])) {
                        $maxValues[$criteria->id] = $maxValue;
                    }

                    # Update the minimum value per column if necessary
                    if ($minValue !== null && ($minValues[$criteria->id] === null || $minValue < $minValues[$criteria->id])) {
                        $minValues[$criteria->id] = $minValue;
                    }
                }
            }
        }


        # Prepare data to be sent to the view
        $dataCalculateMinMaxValues = [
            'maxValues' => $maxValues,
            'minValues' => $minValues,
        ];

        return [$dataCalculateMinMaxValues];
    }

    public function calculateNormalizedValues($getAlternative, $criterion, $maxValues, $minValues)
    {
        $matrixNormalized = [];

        # Calculate the normalized values
        foreach ($getAlternative as $alternative) {
            $normalizedRow = [];

            foreach ($criterion as $criteria) {
                $criteriaValue = $alternative['nilai_c' . $criteria->id];
                $maxValue = $maxValues[$criteria->id];
                $minValue = $minValues[$criteria->id];

                # Calculate the normalized value using the formula
                $normalizedValue = ($maxValue - $criteriaValue) / ($maxValue - $minValue);
                $normalizedRow[] = $normalizedValue;
            }

            $matrixNormalized[] = $normalizedRow;
        }

        return [$matrixNormalized];
    }

    public function calculateWeightedNormalizedValues($matrixNormalized, $criterion)
    {
        $weightedNormalizedValues = [];

        # Iterate over each alternative
        foreach ($matrixNormalized as $index => $row) {
            $weightedRow = [];

            # Iterate over each criterion
            foreach ($criterion as $criteria) {
                $criteriaId = $criteria->id;
                $normalizedValue = $row[$criteriaId - 1];
                $weight = $criteria->weight;

                # Multiply the normalized value by the criterion weight
                $weightedValue = $normalizedValue * $weight;

                $weightedRow[] = $weightedValue;
            }

            $weightedNormalizedValues[$index] = $weightedRow;
        }

        return [$weightedNormalizedValues];
    }

    public function calculateUtilityMeasures($criterion, $matrixNormalized)
    {
        $weights = [];

        # Retrieve the weights from the criteria table
        foreach ($criterion as $criteria) {
            $weights[] = $criteria->weight;
        }

        $utilityMeasuresS = [];
        $utilityMeasuresR = [];

        # Iterate over each row of the matrix
        foreach ($matrixNormalized as $row) {
            $S = 0;

            # Sum the values multiplied by the weight in the row
            foreach ($row as $index => $value) {
                $S += $value * $weights[$index];
            }

            $utilityMeasuresS[] = $S;

            $maxValue = max($row); # Get the maximum value in the row

            # Find the index of the maximum value in the row
            $index = array_search($maxValue, $row);

            # Retrieve the weight for the corresponding criterion
            $weight = $weights[$index];

            # Calculate the utility measure (R) by multiplying the maximum value with the weight
            $R = $maxValue * $weight;

            $utilityMeasuresR[] = $R;
        }

        # Prepare data to be sent to the view
        $dataCalculateUtilityMeasures = [
            'utilityMeasuresS' => $utilityMeasuresS,
            'utilityMeasuresR' => $utilityMeasuresR,
        ];

        return [$dataCalculateUtilityMeasures];
    }

    public function calculateQValues($utilityMeasuresS, $utilityMeasuresR, $getAlternative)
    {
        $a = 0.5;   # by concensus
        $b = 0.44;  # with veto
        $c = 0.55;  # voting by majority rule

        # Array to store the VIKOR index value of each alternative
        $Qs = [];
        $Qb = [];
        $Qc = [];

        $maxS = max($utilityMeasuresS);
        $minS = min($utilityMeasuresS);
        $maxR = max($utilityMeasuresR);
        $minR = min($utilityMeasuresR);

        foreach ($getAlternative as $index => $alternative) {
            $R = $utilityMeasuresR[$index];
            $S = $utilityMeasuresS[$index];

            $Q = ($a * ($R - min($utilityMeasuresR))) / ($maxS - min($utilityMeasuresS)) + ((1 - $a) * ($S - min($utilityMeasuresS))) / ($maxS - min($utilityMeasuresS));
            $Q = $a * (($S - $minS) / ($maxS - $minS)) + (1 - $a) * (($R - $minR) / ($maxR - $minR));

            $QbValue = ($b * ($R - min($utilityMeasuresR))) / ($maxS - min($utilityMeasuresS)) + ((1 - $b) * ($S - min($utilityMeasuresS))) / ($maxS - min($utilityMeasuresS));
            $QbValue = $b * (($S - $minS) / ($maxS - $minS)) + (1 - $b) * (($R - $minR) / ($maxR - $minR));

            $QcValue = ($c * ($R - min($utilityMeasuresR))) / ($maxS - min($utilityMeasuresS)) + ((1 - $c) * ($S - min($utilityMeasuresS))) / ($maxS - min($utilityMeasuresS));
            $QcValue = $c * (($S - $minS) / ($maxS - $minS)) + (1 - $c) * (($R - $minR) / ($maxR - $minR));

            $Qs[] = $Q;
            $Qb[] = $QbValue;
            $Qc[] = $QcValue;
        }

        # Prepare data to be sent to the view
        $dataCalculateQValues = [
            'Qs' => $Qs,
            'Qb' => $Qb,
            'Qc' => $Qc,
        ];

        return [$dataCalculateQValues];
    }

    public function calculateRankings($getAlternative, $Qs, $Qb, $Qc)
    {
        $rankings = array_map(null, $getAlternative, $Qs); # Combine $getAlternative and $Qs arrays
        $rankingsB = array_map(null, $getAlternative, $Qb);
        $rankingsC = array_map(null, $getAlternative, $Qc);

        # Sort the rankings based on the Qs values in ascending order
        array_multisort(array_column($rankings, 1), SORT_ASC, $rankings);
        array_multisort(array_column($rankingsB, 1), SORT_ASC, $rankingsB);
        array_multisort(array_column($rankingsC, 1), SORT_ASC, $rankingsC);

        $qValueBestAlternative  = min($Qs);
        $minQsIndex = array_search(min(array_column($rankings, 1)), array_column($rankings, 1));
        $alternativeWithMinQs = $rankings[$minQsIndex][0]['nama_alternative'];

        $minQsIndexB = array_search(min(array_column($rankingsB, 1)), array_column($rankingsB, 1));
        $alternativeWithMinQsB = $rankingsB[$minQsIndexB][0]['nama_alternative'];

        $minQsIndexC = array_search(min(array_column($rankingsC, 1)), array_column($rankingsC, 1));
        $alternativeWithMinQsC = $rankingsC[$minQsIndexC][0]['nama_alternative'];

        $alternativeIndex = 1; # Second alternative index
        $alternativeQ = $Qs[$alternativeIndex]; # Get the Q value of the second alternative

        # Prepare data to be sent to the view
        $dataCalculateRankings = [
            'rankings' => $rankings,
            'rankingsB' => $rankingsB,
            'rankingsC' => $rankingsC,
            'alternativeQ' => $alternativeQ,
            'qValueBestAlternative' => $qValueBestAlternative,
            'alternativeWithMinQs' => $alternativeWithMinQs,
            'alternativeWithMinQsB' => $alternativeWithMinQsB,
            'alternativeWithMinQsC' => $alternativeWithMinQsC,
        ];

        return [$dataCalculateRankings];
    }

    public function checkAcceptableAdvantage($sample, $alternativeQ, $qValueBestAlternative)
    {
        $acceptableAdvantage = true; # Variable to store the Acceptable Advantage status

        # 'm' is the number of alternatives
        $m = count($sample);

        # calculate the DQ value
        $DQ = 1 / ($m - 1);

        $difference = $alternativeQ - $qValueBestAlternative;

        if ($difference < $DQ) {
            $acceptableAdvantage = false;
        }

        # Prepare data to be sent to the view
        $dataCheckAcceptableAdvantage = [
            'acceptableAdvantage' => $acceptableAdvantage,
            'difference' => $difference,
        ];

        return [$dataCheckAcceptableAdvantage];
    }

    public function checkAcceptableStability($rankingsB, $rankingsC, $qValueBestAlternative, $alternativeWithMinQs, $alternativeWithMinQsB, $alternativeWithMinQsC)
    {
        $differenceQiB = [];
        $differenceQiC = [];
        $acceptableStability = true;

        foreach ($rankingsB as $ranking) {
            $Qi = $ranking[1]; # Get value Qi form array $rankings
            $differenceQiB[] = $Qi - $qValueBestAlternative;
        }

        foreach ($rankingsC as $ranking) {
            $Qi = $ranking[1]; # Get value Qi form array $rankings
            $differenceQiC[] = $Qi - $qValueBestAlternative;
        }

        if ($alternativeWithMinQs != $alternativeWithMinQsB && $alternativeWithMinQs != $alternativeWithMinQsC) {
            $acceptableStability = false;
        }

        # # Tampilkan hasil
        # foreach ($differenceQiB as $index => $differenceQiB) {
        #     $alternativeName = $rankingsB[$index][0]['nama_alternative'];
        #     echo "Nilai Qi - QBest untuk alternatif $alternativeName: $differenceQiB<br>";
        # }

        # Prepare data to be sent to the view
        $dataCheckAcceptableStability = [
            'rankings' => $rankingsB,
            'qValueBestAlternative' => $qValueBestAlternative,
            'differenceQiB' => $differenceQiB,
            'differenceQiC' => $differenceQiC,
            'acceptableStability' => $acceptableStability
        ];

        return [$dataCheckAcceptableStability];
    }
}
