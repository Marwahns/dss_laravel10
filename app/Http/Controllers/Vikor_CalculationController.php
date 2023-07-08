<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Sample;
use Illuminate\Http\Request;
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

        $pageTitle = 'VIKOR | Calculation';
        $breadcrumb = 'Calculation'; // breadcrumb

        // get data samples untuk pagination
        $samples = Sample::latest()->paginate(10);

        // get data samples
        $getSamples = $tb_sample->detailSample();
        $getAlternative = $tb_alternative->detailAlternative();

        // $i=0;
        foreach ($getAlternative as $key => $value) {
            $detailSampleByAlternativeId = $tb_sample->detailSample($value['id']);
            // print_r($detailSampleByAlternativeId); die;
            foreach ($detailSampleByAlternativeId as $key2 => $value2) {
                $getAlternative[$key]['nilai_c' . $value2['criteria_id']] = $value2['nilai'];
            }
        }
        // echo '<pre>'; print_r($getAlternative); die;

        //render view with posts
        return view('calculation.index', compact('getAlternative', 'samples', 'pageTitle', 'breadcrumb'));
    }
}
