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
        $alternatives = Alternative::all();
        $getAlternative = $tb_alternative->detailAlternative();
        
		// $i=0;
        echo '<pre>';
		foreach($getAlternative as $key => $value){
            // $getAlternative[$key]['criteria_1'] = $tb_alternative->detailAlternative($value['id']);
            print_r($tb_alternative->detailAlternative($value['id']));
            
		}

        // echo '<pre>';
        // print_r($getAlternative);
        die;

        //render view with posts
        return view('calculation.index', compact('getSamples', 'samples', 'pageTitle', 'breadcrumb'));
    }
}
