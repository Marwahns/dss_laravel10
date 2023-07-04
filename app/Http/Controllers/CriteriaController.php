<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\TypeCriteria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $tb_criteria = new Criteria();
        $title = "VIKOR | Criteria";

        // get data criteria
        $criterias = Criteria::latest()->paginate(10);
        $type_criteria = $tb_criteria->detailCriteria();

        //render view with posts
        return view('criteria.index', compact('criterias', 'type_criteria'))->with('title', $title);
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

    // /**
    //  * create
    //  *
    //  * @return View
    //  */
    // public function create(): View
    // {
    //     $title = "Workshop ABC | Supplier";
    //     return view('supplier.form')->with('title', $title);
    // }

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

    public function show($id)
    {
        $criterias = Criteria::find($id);

        return view('criteria.show', compact('criterias'));
    }

    // public function show($id)
    // {
    //     // Retrieve the supplier from the database based on the ID
    //     $suppliers = Supplier::findOrFail($id);

    //     // Check if the supplier exists
    //     if ($suppliers) {
    //         // Return the view to display the supplier details
    //         return view('supplier.index', compact('suppliers'));
    //     } else {
    //         // Return a response indicating that the supplier was not found
    //         return response()->json(['message' => 'Supplier not found'], 404);
    //     }
    // }

    public function edit($id)
    {
        $criteria = Criteria::find($id);
        return response()->json([
            'status' => 200,
            'criteria' => $criteria,
        ]);
    }

    // public function update(Request $request): RedirectResponse
    // {
    //     //validate form
    //     $this->validate($request, [
    //         'criteria' => 'required|min:1|max:255',
    //         'type'     => 'required',
    //         'weight'   => 'required|min:1|max:5'
    //     ]);

    //     $id = $request->input('id');
    //     $criterias = Criteria::find($id);
    //     $criterias->criteria = $request->criteria;
    //     $criterias->type = $request->type;
    //     $criterias->weight = $request->weight;
    //     $criterias->update();

    //     //redirect to index
    //     return redirect()->back()->with('status', 'Criteria Updated Successfully!');
    // }

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

    public function view($id)
    {
        $criteria = Criteria::find($id);
        return response()->json([
            'status' => 200,
            'criteria' => $criteria,
        ]);
    }
}
