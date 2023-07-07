<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CriteriaController extends Controller
{

    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $pageTitle = 'VIKOR | Criteria'; 
        $breadcrumb = 'Criteria'; // breadcrumb

        // get data criteria
        $criterias = Criteria::latest()->paginate(10);

        //render view with posts
        return view('criteria.index', compact('criterias', 'pageTitle', 'breadcrumb'));
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
            'criteria' => 'required|min:1|max:255',
            'type'     => 'required',
            'weight'   => 'required|min:1|max:5'
        ]);

        //create post
        Criteria::create([
            'criteria' => $request->criteria,
            'type'     => $request->type,
            'weight'   => $request->weight
        ]);

        //redirect to index
        return redirect()->route('criteria.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
            'criteria' => 'required|min:1|max:255',
            'type'     => 'required',
            'weight'   => 'required|min:1|max:5'
        ]);

        //get criteria by ID
        $criterias = Criteria::find($id);

        //update criterias
        $criterias->update([
            'criteria' => $request->criteria,
            'type'     => $request->type,
            'weight'   => $request->weight
        ]);

        //redirect to index
        return redirect()->route('criteria.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    /**
     * destroy
     *
     * @param  mixed $supplier
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get supplier by ID
        $criteria = Criteria::findOrFail($id);

        //delete supplier
        $criteria->delete();

        //redirect to index
        return redirect()->route('criteria.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
