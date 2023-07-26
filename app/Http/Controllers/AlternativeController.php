<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:alternative');
    }

    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $tb_alternative = new Alternative();
        $pageTitle = "VIKOR | Alternative";
        $breadcrumb = 'Alternative'; // breadcrumb

        // get data alternative
        $alternatives = Alternative::latest()->paginate(10);
        $alternative_ = $tb_alternative->detailAlternative();

        $countAlternatives = Alternative::all();

        //render view with posts
        return view('alternative.alternative', compact('alternatives', 'alternative_', 'pageTitle', 'breadcrumb', 'countAlternatives'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_alternative' => 'required|min:1|max:255',
            'kode_alternative'     => 'required|min:1|max:4',
        ]);

        //create post
        Alternative::create([
            'nama_alternative' => $request->nama_alternative,
            'kode_alternative'     => $request->kode_alternative,
        ]);

        //redirect to index
        return redirect()->route('alternative.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * destroy
     *
     * @param  mixed $alternative
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get alternative by ID
        $alternative = Alternative::findOrFail($id);

        //delete alternative
        $alternative->delete();

        //redirect to index
        return redirect()->route('alternative.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function show($id)
    {
        $alternatives = Alternative::find($id);

        return view('alternative.show', compact('alternatives'));
    }

    public function edit($id)
    {
        $alternative = Alternative::find($id);
        return response()->json([
            'status' => 200,
            'alternative' => $alternative,
        ]);
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
        //validate form
        $this->validate($request, [
            'nama_alternative' => 'required|min:1|max:255',
            'kode_alternative'     => 'required|min:1|max:4',
        ]);

        //get criteria by ID
        $alternatives = Alternative::find($id);

        //update criterias
        $alternatives->update([
            'nama_alternative' => $request->nama_alternative,
            'kode_alternative'     => $request->kode_alternative,
        ]);

        //redirect to index
        return redirect()->route('alternative.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function view($id)
    {
        $alternative = Alternative::find($id);
        return response()->json([
            'status' => 200,
            'alternative' => $alternative,
        ]);
    }
}
