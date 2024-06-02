<?php

namespace App\Http\Controllers;

// use ___PHPSTORM_HELPERS\object;
use App\Models\Alternatif;
use App\Models\Penentuan;
use App\Models\SubCriteria;
use Illuminate\Http\Request;


class PenentuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Penentuan::get();
        return view('pages.admin.penentuan', [
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
        $ages = SubCriteria::where('criteria_id', '1')->get();
        $weights = SubCriteria::where('criteria_id', '2')->where('umur', '1 Tahun')->get();
        $highs = SubCriteria::where('criteria_id', '3')->where('umur', '1 Tahun')->get();
        $allergy = SubCriteria::where('criteria_id', '4')->get();
        return view('pages.admin.formData', [
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
        // Penentuan::create($data);

        $Penentuan = new Penentuan;
        $Penentuan->nama = $request->nama;

        $p1 = $request->bobot_umur_penentuan;
        $arp1 = explode(" - ", $p1);
        $Penentuan->penentuan_umur = $arp1[0];
        $Penentuan->umur = $arp1[1];

        $p2 = $request->bobot_beratBadan_penentuan;
        $arp2 = explode(" - ", $p2);
        $Penentuan->penentuan_beratBadan = $arp2[0];
        $Penentuan->beratBadan = $arp2[1];

        $p3 = $request->bobot_tinggiBadan_penentuan;
        $arp3 = explode(" - ", $p3);
        $Penentuan->penentuan_tinggiBadan = $arp3[0];
        $Penentuan->tinggiBadan = $arp3[1];

        $p4 = $request->bobot_alergi_penentuan;
        $arp4 = explode(" - ", $p4);
        $Penentuan->penentuan_alergi = $arp4[0];
        $Penentuan->alergi = $arp4[1];
        // dd($Penentuan);
        $Penentuan->save();
        return redirect()->route('penentuan')->with('success', 'Data Berhasil Ditambahkan');
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
        $a = Penentuan::findOrFail($id);

        $items = SubCriteria::get();

        return view('pages.admin.editFormData', [
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
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $id = $request->id;
        $Penentuan = Penentuan::where('id', $id)->first();
        $Penentuan->nama = $request->nama;

        $p1 = $request->bobot_umur_penentuan;
        $arp1 = explode(" - ", $p1);
        $Penentuan->penentuan_umur = $arp1[0];
        $Penentuan->umur = $arp1[1];

        $p2 = $request->bobot_beratBadan_penentuan;
        $arp2 = explode(" - ", $p2);
        $Penentuan->penentuan_beratBadan = $arp2[0];
        $Penentuan->beratBadan = $arp2[1];

        $p3 = $request->bobot_tinggiBadan_penentuan;
        $arp3 = explode(" - ", $p3);
        $Penentuan->penentuan_tinggiBadan = $arp3[0];
        $Penentuan->tinggiBadan = $arp3[1];

        $p4 = $request->bobot_alergi_penentuan;
        $arp4 = explode(" - ", $p4);
        $Penentuan->penentuan_alergi = $arp4[0];
        $Penentuan->alergi = $arp4[1];
        $Penentuan->save();

        return redirect()->route('penentuan')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Penentuan::findOrFail($id);
        $item->delete();

        return redirect()->route('penentuan')->with('success', 'Data Berhasil Dihapus');
    }

    public function metode()
    {
        $karyawan = [
            ['nama' => 'A', 'C1' => 90, 'C2' => 80, 'C3' => 85, 'C4' => 95, 'C5' => 88],
            ['nama' => 'B', 'C1' => 85, 'C2' => 88, 'C3' => 90, 'C4' => 85, 'C5' => 90],
            ['nama' => 'C', 'C1' => 88, 'C2' => 85, 'C3' => 80, 'C4' => 90, 'C5' => 85],
            ['nama' => 'D', 'C1' => 80, 'C2' => 90, 'C3' => 85, 'C4' => 88, 'C5' => 92],
        ];

        $bobot = [
            'C1' => 80,
            'C2' => 90,
            'C3' => 80,
            'C4' => 90,
            'C5' => 85,
        ];

        $preferensi = [];
        foreach ($karyawan as $k) {
            $nilai = 0;
            foreach ($bobot as $kriteria => $b) {
                $nilai += $kriteria['C1'] * $b;
            }
            $preferensi[$k['nama']] = $nilai;
        }

        // Pilih karyawan dengan nilai preferensi tertinggi sebagai kepala unit
        arsort($preferensi);
        $kepala_unit = key($preferensi);

        return view('pages.admin.metode', [
            'karyawan' => $karyawan,
            'bobot' => $bobot,
            'preferensi' => $preferensi,
            'kepala_unit' => $kepala_unit
        ]);
    }

}
