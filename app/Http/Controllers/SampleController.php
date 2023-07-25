<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Sample;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SampleController extends Controller
{

    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $pageTitle = 'VIKOR | Sample';
        $breadcrumb = 'Sample'; // breadcrumb

        $tb_sample = new Sample();
        $al = Alternative::all();
        $cr = Criteria::all();
        // $samples = Sample::with('alternative', 'criteria')->latest()->paginate(10);
        $dataSamples = Sample::latest()->paginate(20);;
        $samples = $tb_sample->detailSample();
        $countAlternatives = Alternative::all();

        // render view with posts
        return view('sample.index', compact('al', 'cr', 'samples', 'pageTitle', 'breadcrumb', 'countAlternatives', 'dataSamples'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        print_r($request->all());

        //validate form
        $this->validate($request, [
            'nilai'         => 'required|min:1|max:255',
            'alternatif_id' => 'required|min:1|max:8|exists:alternatives,id',
            'criteria_id'   => 'required|min:1|max:8|exists:criterias,id'
        ]);

        //create post
        Sample::create([
            'nilai'         => $request->nilai,
            'alternatif_id' => $request->alternatif_id,
            'criteria_id'   => $request->criteria_id,

        ]);


        //redirect to index
        return redirect()->route('sample.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // print_r($request->alternatif_id);
        // die();

        $al = Alternative::all();
        $cr = Criteria::all();

        //validate form
        $this->validate($request, [
            'nilai'         => 'required|min:1|max:255',
            'alternatif_id' => 'required|min:1|max:8|exists:alternatives,id',
            'criteria_id'   => 'required|min:1|max:8|exists:criterias,id'
        ]);

        $samples = Sample::find($id);

        //update criterias
        $samples->update([
            'nilai'         => $request->nilai,
            'alternatif_id' => $request->alternatif_id,
            'criteria_id'   => $request->criteria_id,
        ]);

        //redirect to index
        return redirect()->route('sample.index', compact('al', 'cr'))->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * destroy
     *
     * @param  mixed $sample
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get sample by ID
        $sample = Sample::findOrFail($id);

        //delete sample
        $sample->delete();

        //redirect to index
        return redirect()->route('sample.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
