<?php
namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('pages.admin.karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        return view('pages.admin.karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'jabatan' => 'required',
        ]);

        Karyawan::create($request->all());

        return redirect()->route('admin.karyawan.index')
            ->with('success', 'Karyawan created successfully.');
    }

    public function show(Karyawan $karyawan)
    {
        return view('pages.admin.karyawan.show', compact('karyawan'));
    }

    public function edit(Karyawan $karyawan)
    {
        return view('pages.admin.karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'jabatan' => 'required',
        ]);

        $karyawan->update($request->all());

        return redirect()->route('admin.karyawan.index')
            ->with('success', 'Karyawan updated successfully');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('admin.karyawan.index')
            ->with('success', 'Karyawan deleted successfully');
    }
}
