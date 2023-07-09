<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Sample;
use Illuminate\View\View;

class Vikor_CalculationController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $tb_sample = new Sample();
        $tb_alternative = new Alternative();
        $tb_criteria = new Criteria();

        $pageTitle = 'VIKOR | Calculation';
        $breadcrumb = 'Calculation'; // breadcrumb

        // get data samples untuk pagination
        $samples = Sample::latest()->paginate(10);

        // get data samples
        $getSamples = $tb_sample->detailSample();
        $getAlternative = $tb_alternative->detailAlternative();
        $criterias =  $tb_criteria->detailCriteria();
        $alternatives = Alternative::all();

        // $i=0;
        foreach ($getAlternative as $key => $value) {
            $detailSampleByAlternativeId = $tb_sample->detailSample($value['id']);
            // print_r($detailSampleByAlternativeId); die;
            foreach ($detailSampleByAlternativeId as $key2 => $value2) {
                $getAlternative[$key]['nilai_c' . $value2['criteria_id']] = $value2['nilai'];
            }
        }
        // echo '<pre>'; print_r($getAlternative); die;

        // Panggil fungsi calculateMinMaxValues
        [$maxValues, $minValues] = $this->calculateMinMaxValues($getAlternative, $criterias);

        // Panggil fungsi calculateMinMaxValues
        [$matrixNormalized] = $this->calculateNormalizedValues($getAlternative, $criterias, $maxValues, $minValues);

        // Panggil fungsi calculateMinMaxValues
        [$weightedNormalizedValues] = $this->calculateWeightedNormalizedValues($matrixNormalized, $criterias);

        // Panggil fungsi calculateUtilityMeasures
        [$utilityMeasuresS, $utilityMeasuresR] = $this->calculateUtilityMeasures($criterias, $matrixNormalized);

        // Panggil fungsi calculateQValues
        [$Qs] = $this->calculateQValues($utilityMeasuresS, $utilityMeasuresR, $getAlternative);

        // Panggil fungsi calculateRankings
        $rankings = $this->calculateRankings($getAlternative, $Qs);

        //render view with posts
        return view('calculation.index', compact('getAlternative', 'samples', 'pageTitle', 'breadcrumb', 'criterias', 'alternatives', 'maxValues', 'minValues', 'matrixNormalized', 'weightedNormalizedValues', 'utilityMeasuresS', 'utilityMeasuresR', 'Qs', 'rankings'));
    }

    public function calculateMinMaxValues($getAlternative, $criterias)
    {
        $maxValues = [];
        $minValues = [];

        // Initialize the maxValues and minValues arrays with all criteria IDs
        foreach ($criterias as $criteria) {
            $maxValues[$criteria->id] = null;
            $minValues[$criteria->id] = null;
        }

        // Calculate the maximum and minimum values per column
        foreach ($getAlternative as $alternative) {
            foreach ($criterias as $criteria) {
                $criteriaValue = $alternative['nilai_c' . $criteria->id];
                $maxValue = is_array($criteriaValue) ? max($criteriaValue) : $criteriaValue;
                $minValue = is_array($criteriaValue) ? min($criteriaValue) : $criteriaValue;

                // Update the maximum value per column if necessary
                if ($maxValue !== null && ($maxValues[$criteria->id] === null || $maxValue > $maxValues[$criteria->id])) {
                    $maxValues[$criteria->id] = $maxValue;
                }

                // Update the minimum value per column if necessary
                if ($minValue !== null && ($minValues[$criteria->id] === null || $minValue < $minValues[$criteria->id])) {
                    $minValues[$criteria->id] = $minValue;
                }
            }
        }

        return [$maxValues, $minValues];
    }

    public function calculateNormalizedValues($getAlternative, $criterias, $maxValues, $minValues)
    {
        $matrixNormalized = [];

        // Calculate the normalized values
        foreach ($getAlternative as $alternative) {
            $normalizedRow = [];

            foreach ($criterias as $criteria) {
                $criteriaValue = $alternative['nilai_c' . $criteria->id];
                $maxValue = $maxValues[$criteria->id];
                $minValue = $minValues[$criteria->id];

                // Calculate the normalized value using the formula
                $normalizedValue = ($maxValue - $criteriaValue) / ($maxValue - $minValue);
                $normalizedRow[] = $normalizedValue;
            }

            $matrixNormalized[] = $normalizedRow;
        }

        return [$matrixNormalized];
    }

    public function calculateWeightedNormalizedValues($matrixNormalized, $criterias)
    {
        $weightedNormalizedValues = [];

        // Iterate over each alternative
        foreach ($matrixNormalized as $index => $row) {
            $weightedRow = [];

            // Iterate over each criterion
            foreach ($criterias as $criteria) {
                $criteriaId = $criteria->id;
                $normalizedValue = $row[$criteriaId - 1];
                $weight = $criteria->weight;

                // Multiply the normalized value by the criterion weight
                $weightedValue = $normalizedValue * $weight;

                $weightedRow[] = $weightedValue;
            }

            $weightedNormalizedValues[$index] = $weightedRow;
        }

        return [$weightedNormalizedValues];
    }

    public function calculateUtilityMeasures($criterias, $matrixNormalized)
    {
        $weights = [];

        // Retrieve the weights from the criteria table
        foreach ($criterias as $criteria) {
            $weights[] = $criteria->weight;
        }

        $utilityMeasuresS = [];
        $utilityMeasuresR = [];

        // Iterate over each row of the matrix
        foreach ($matrixNormalized as $row) {
            $S = 0;

            // Sum the values multiplied by the weight in the row
            foreach ($row as $index => $value) {
                $S += $value * $weights[$index];
            }

            $utilityMeasuresS[] = $S;

            $maxValue = max($row); // Get the maximum value in the row

            // Find the index of the maximum value in the row
            $index = array_search($maxValue, $row);

            // Retrieve the weight for the corresponding criterion
            $weight = $weights[$index];

            // Calculate the utility measure (R) by multiplying the maximum value with the weight
            $R = $maxValue * $weight;

            $utilityMeasuresR[] = $R;
        }

        return [$utilityMeasuresS, $utilityMeasuresR];
    }

    public function calculateQValues($utilityMeasuresS, $utilityMeasuresR, $getAlternative)
    {
        $a = 0.5; // Nilai bobot relatif, bisa disesuaikan
        $Qs = []; // Array untuk menyimpan nilai indeks VIKOR dari setiap alternatif

        $maxS = max($utilityMeasuresS);
        $minS = min($utilityMeasuresS);
        $maxR = max($utilityMeasuresR);
        $minR = min($utilityMeasuresR);

        foreach ($getAlternative as $index => $alternative) {
            $R = $utilityMeasuresR[$index];
            $S = $utilityMeasuresS[$index];

            $Q = ($a * ($R - min($utilityMeasuresR))) / ($maxS - min($utilityMeasuresS)) + ((1 - $a) * ($S - min($utilityMeasuresS))) / ($maxS - min($utilityMeasuresS));

            $Q = $a * (($S - $minS) / ($maxS - $minS)) + (1 - $a) * (($R - $minR) / ($maxR - $minR));

            $Qs[] = $Q;
        }

        return [$Qs];
    }

    public function calculateRankings($getAlternative, $Qs)
    {
        $rankings = array_map(null, $getAlternative, $Qs); // Combine $getAlternative and $Qs arrays

        // Sort the rankings based on the Qs values in ascending order
        array_multisort(array_column($rankings, 1), SORT_ASC, $rankings);

        return $rankings;
    }
}
