<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Models\SubCriteria;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Alternatif::get();
        return view('pages.admin.alternatif', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $items = SubCriteria::get();
        $ages = SubCriteria::where('criteria_id', '1')->get();
        $weights = SubCriteria::where('criteria_id', '2')->where('umur', '1 Tahun')->get();
        $highs = SubCriteria::where('criteria_id', '3')->where('umur', '1 Tahun')->get();
        $allergy = SubCriteria::where('criteria_id', '4')->get();
        return view('pages.admin.formAlternatif', [
            'ages' => $ages,
            'weights' => $weights,
            'highs' => $highs,
            'allergy' => $allergy
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        // dd($data);
        // Alternatif::create($data);
        $Alternatif = new Alternatif;
        $Alternatif->alternatif = $request->alternatif;
        $k1 = $request->bobot_umur_alternatif;
        $ark1 = explode(" - ", $k1);
        $Alternatif->bobot_umur = $ark1[0];
        $Alternatif->umur = $ark1[1];

        $k2 = $request->bobot_beratBadan_alternatif;
        $ark2 = explode(" - ", $k2);
        $Alternatif->bobot_beratBadan = $ark2[0];
        $Alternatif->beratBadan = $ark2[1];

        $k3 = $request->bobot_tinggiBadan_alternatif;
        $ark3 = explode(" - ", $k3);
        $Alternatif->bobot_tinggiBadan = $ark3[0];
        $Alternatif->tinggiBadan = $ark3[1];

        $k4 = $request->bobot_alergi_alternatif;
        $ark4 = explode(" - ", $k4);
        $Alternatif->bobot_alergi = $ark4[0];
        $Alternatif->alergi = $ark4[1];
        $Alternatif->save();
        return redirect()->route('alternatif')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {

        $data = $request->all();
        // dd($data);
        // Alternatif::create($data);
        $id = $request->id;
        $Alternatif = Alternatif::where('id', $id)->first();
        $Alternatif->alternatif = $request->alternatif;
        // dd($Alternatif);
        $k1 = $request->bobot_umur_alternatif;
        $ark1 = explode(" - ", $k1);
        $Alternatif->bobot_umur = $ark1[0];
        $Alternatif->umur = $ark1[1];

        $k2 = $request->bobot_beratBadan_alternatif;
        $ark2 = explode(" - ", $k2);
        $Alternatif->bobot_beratBadan = $ark2[0];
        $Alternatif->beratBadan = $ark2[1];

        $k3 = $request->bobot_tinggiBadan_alternatif;
        $ark3 = explode(" - ", $k3);
        $Alternatif->bobot_tinggiBadan = $ark3[0];
        $Alternatif->tinggiBadan = $ark3[1];

        $k4 = $request->bobot_alergi_alternatif;
        $ark4 = explode(" - ", $k4);
        $Alternatif->bobot_alergi = $ark4[0];
        $Alternatif->alergi = $ark4[1];
        $Alternatif->save();
        return redirect()->route('alternatif')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $a = Alternatif::findOrFail($id);

        $items = SubCriteria::get();

        return view('pages.admin.editFormAlternatif', [
            'a' => $a,
            'items' => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $data = $request->all();
    //     $a = Alternatif::findOrFail($id);
    //     $Alternatif->alternatif = $request->alternatif;
    //     $k1 = $request->bobot_umur_alternatif;
    //     $ark1 = explode(" - ", $k1);
    //     $Alternatif->bobot_umur = $ark1[0];
    //     $Alternatif->umur = $ark1[1];

    //     $k2 = $request->bobot_beratBadan_alternatif;
    //     $ark2 = explode(" - ", $k2);
    //     $Alternatif->bobot_beratBadan = $ark2[0];
    //     $Alternatif->beratBadan = $ark2[1];

    //     $k3 = $request->bobot_tinggiBadan_alternatif;
    //     $ark3 = explode(" - ", $k3);
    //     $Alternatif->bobot_tinggiBadan = $ark3[0];
    //     $Alternatif->tinggiBadan = $ark3[1];

    //     $k4 = $request->bobot_alergi_alternatif;
    //     $ark4 = explode(" - ", $k4);
    //     $Alternatif->bobot_alergi = $ark4[0];
    //     $Alternatif->alergi = $ark4[1];
    //     $a->update($data);

    //     return redirect()->route('alternatif');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Alternatif::findOrFail($id);
        $item->delete();

        return redirect()->route('alternatif')->with('success', 'Data Berhasil Dihapus');
    }
}
