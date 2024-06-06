<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        return view('pages.admin.criteria.index', compact('criterias'));
    }

    public function create()
    {
        return view('pages.admin.criteria.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_kriteria' => 'required|string|max:255',
            'bobot' => 'required|integer',
        ]);

        $id = Criteria::max('id') + 1;
        if($id > 5){
            return redirect()->route('admin.criteria.index')
                ->with('error', 'Tidak boleh melebihi 5 kriteria.');
        }

        $kode = "C" . $id;

        Criteria::create([
            'nama' => $kode,
            'bobot' => $request->bobot,
            'nama_kriteria' => $request->nama_kriteria
        ]);

        return redirect()->route('admin.criteria.index')
                         ->with('success', 'Criteria created successfully.');
    }

    public function edit($id)
    {
        $criteria = Criteria::findOrFail($id);
        return view('pages.admin.criteria.edit', compact('criteria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'bobot' => 'required|integer'
        ]);

        $criteria = Criteria::findOrFail($id);
        $criteria->update($request->only(['nama_kriteria', 'bobot']));

        return redirect()->route('admin.criteria.index')
                         ->with('success', 'Criteria updated successfully.');
    }

    public function destroy($id)
    {
        $criteria = Criteria::findOrFail($id);
        $criteria->delete();

        return redirect()->route('admin.criteria.index')
                         ->with('success', 'Criteria deleted successfully.');
    }
}
