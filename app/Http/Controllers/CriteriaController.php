<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:criteria');
    }

    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $pageTitle = 'VIKOR | Criteria';
        $breadcrumb = 'Criteria'; # breadcrumb

        # get data criteria
        $criterion = Criteria::All();
        $total_Weight = Criteria::sum('weight');

        $countAlternatives = Alternative::all();

        # render view 
        return view('criteria.index', compact('criterion', 'pageTitle', 'breadcrumb', 'total_Weight', 'countAlternatives'));
    }

    public function search(Request $request)
    {

        $pageTitle = 'VIKOR | Criteria';
        $breadcrumb = 'Criteria'; # breadcrumb

        $search = $request->search;

        $criterion = Criteria::where(function ($query) use ($search) {

            $query->where('criteria', 'like', "%$search%")
                ->orWhere('type', 'like', "%$search%")
                ->orWhere('weight', 'like', "%$search%");
        })
            ->get();
        // ->paginate(2)->withQueryString();

        $total_Weight = Criteria::sum('weight');

        $countAlternatives = Alternative::all();

        return view('criteria.index', compact('criterion', 'search', 'pageTitle', 'breadcrumb', 'total_Weight', 'countAlternatives'));
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        # validate form
        $this->validate($request, [
            'criteria' => 'required|min:1|max:255',
            'type'     => 'required',
            'weight'   => 'required|min:1|max:5'
        ]);

        # create criteria
        Criteria::create([
            'criteria' => $request->criteria,
            'type'     => $request->type,
            'weight'   => $request->weight
        ]);

        # redirect to index
        return redirect()->route('criteria.index')->with(['success' => 'Data Saved Successfully!']);
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
        # validate form
        $this->validate($request, [
            'criteria' => 'required|min:1|max:255',
            'type'     => 'required',
            'weight'   => 'required|min:1|max:5'
        ]);

        # get criteria by ID
        $criteria = Criteria::find($id);

        # update criteria
        $criteria->update([
            'criteria' => $request->criteria,
            'type'     => $request->type,
            'weight'   => $request->weight
        ]);

        # redirect to index
        return redirect()->route('criteria.index')->with(['success' => 'Data Updated Successfully!']);
    }

    /**
     * destroy
     *
     * @param  mixed $criteria
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        # get criteria by ID
        $criteria = Criteria::findOrFail($id);

        # delete criteria
        $criteria->delete();

        # redirect to index
        return redirect()->route('criteria.index')->with(['success' => 'Data Deleted Successfully!']);
    }
}
