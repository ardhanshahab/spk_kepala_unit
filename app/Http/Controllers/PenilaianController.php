<?php
namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Karyawan;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penilaians = Penilaian::with(['karyawan', 'kriteria'])->get();
        return view('pages.admin.penilaian.index', compact('penilaians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriteria = Criteria::all();
        $karyawans = Karyawan::all();
        return view('pages.admin.penilaian.create', compact('kriteria', 'karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'kriteria_id' => 'required|exists:criterias,id',
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        Penilaian::create($request->all());

        return redirect()->route('penilaian.index')
            ->with('success', 'Penilaian created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penilaian = Penilaian::with(['karyawan', 'kriteria'])->findOrFail($id);
        return view('pages.admin.penilaian.show', compact('penilaian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penilaian = Penilaian::findOrFail($id);
        $kriteria = Criteria::all();
        $karyawans = Karyawan::all();
        return view('pages.admin.penilaian.edit', compact('penilaian', 'kriteria', 'karyawans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'kriteria_id' => 'required|exists:criterias,id',
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        $penilaian = Penilaian::findOrFail($id);
        $penilaian->update($request->all());

        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penilaian = Penilaian::findOrFail($id);
        $penilaian->delete();
        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil dihapus.');
    }



    /**
     * Hitung preferensi menggunakan metode TOPSIS
     */
    public function hitungPreferensi()
    {
        // $penilaian = Penilaian::with('karyawan')->findOrFail($id);
        // $kriterias = Criteria::all();

        // $nilai = [
        //     'C1' => $penilaian->C1,
        //     'C2' => $penilaian->C2,
        //     'C3' => $penilaian->C3,
        //     'C4' => $penilaian->C4,
        //     'C5' => $penilaian->C5,
        // ];

        // // Normalisasi nilai kriteria
        // $normalizedValues = [];
        // foreach ($kriteria as $k) {
        //     // $sum = Penilaian::sum($k->kode_kriteria); // Mengakses kolom 'kriteria' yang benar
        //     $normalizedValues[$k->kode_kriteria] = $nilai[$k->kode_kriteria] / sqrt($k->bobot);
        // }

        // // return $normalizedValues;
        // // Matriks ternormalisasi dan tertimbang
        // $weightedValues = [];
        // foreach ($kriteria as $k) {
        //     $weightedValues[$k->kode_kriteria] = $normalizedValues[$k->kode_kriteria] * $k->bobot;
        // }
        // return $weightedValues;


        // // Ideal solusi positif dan negatif
        // $idealPositive = [];
        // $idealNegative = [];
        // foreach ($kriteria as $k) {
        //     $idealPositive[$k->kode_kriteria] = Penilaian::max($k->kode_kriteria) / sqrt($sum) * $k->bobot;
        //     $idealNegative[$k->kode_kriteria] = Penilaian::min($k->kode_kriteria) / sqrt($sum) * $k->bobot;
        // }

        // // return $idealPositive;
        // // return $idealNegative;


        // // Menghitung jarak ke solusi ideal
        // $distPositive = 0;
        // $distNegative = 0;
        // foreach ($kriteria as $k) {
        //     $distPositive += pow($idealPositive[$k->kode_kriteria] - $weightedValues[$k->kode_kriteria], 2);
        //     $distNegative += pow($idealNegative[$k->kode_kriteria] - $weightedValues[$k->kode_kriteria], 2);
        // }
        // $distPositive = sqrt($distPositive);
        // $distNegative = sqrt($distNegative);
        // // return $distPositive;
        // // return $distNegative;
        // // Menghitung nilai preferensi
        // $nilaiPreferensi = $distNegative / ($distNegative + $distPositive);

        // $result = [
        //     'nama' => $penilaian->karyawan->nama,
        //     'nilai_preferensi' => $nilaiPreferensi,
        // ];

    //     $normalizedMatrix = [];
    //     foreach ($kriterias as $kriteria) {
    //         $sum = 0;
    //         foreach ($penilaian->where('C'. $kriteria->id, $kriteria->kode_kriteria) as $pen) {
    //             $sum += pow($pen->nilai, 2);
    //         }
    //         $sqrtSum = sqrt($sum);
    //         foreach ($penilaian->where('kriteria_id', $kriteria->id) as $pen) {
    //             $normalizedMatrix[$pen->karyawan_id][$kriteria->id] = ($pen->nilai / $sqrtSum) * $kriteria->bobot;
    //         }
    //     }
    //     return $penilaian;

    // // Ideal solusi positif dan negatif
    // $idealPositive = [];
    // $idealNegative = [];
    // foreach ($kriterias as $kriteria) {
    //     $values = array_column($normalizedMatrix, $kriteria->id);
    //     $idealPositive[$kriteria->id] = max($values);
    //     $idealNegative[$kriteria->id] = min($values);
    // }

    // // Menghitung jarak ke solusi ideal
    // $distances = [];
    // foreach ($penilaian->groupBy('karyawan_id') as $karyawan_id => $penilaianGroup) {
    //     $distPositive = 0;
    //     $distNegative = 0;
    //     foreach ($kriterias as $kriteria) {
    //         if (isset($normalizedMatrix[$karyawan_id][$kriteria->id])) {
    //             $distPositive += pow($idealPositive[$kriteria->id] - $normalizedMatrix[$karyawan_id][$kriteria->id], 2);
    //             $distNegative += pow($idealNegative[$kriteria->id] - $normalizedMatrix[$karyawan_id][$kriteria->id], 2);
    //         }
    //     }
    //     $distances[$karyawan_id]['positive'] = sqrt($distPositive);
    //     $distances[$karyawan_id]['negative'] = sqrt($distNegative);
    // }

    // // Menghitung nilai preferensi
    // $results = [];
    // foreach ($distances as $karyawan_id => $distance) {
    //     $positiveDistance = $distance['positive'];
    //     $negativeDistance = $distance['negative'];
    //     $nilaiPreferensi = $negativeDistance / ($positiveDistance + $negativeDistance);

    //     $karyawan = $penilaian->firstWhere('karyawan_id', $karyawan_id)->karyawan;
    //     $results[] = [
    //         'nama' => $karyawan->nama,
    //         'nilai_preferensi' => $nilaiPreferensi,
    //     ];
    // }

        $kriteria = Criteria::all();
        $calons = Penilaian::with('karyawan')->get();
        // $penilaian = Penilaian::with('karyawan')->findOrFail($id);


        // Matriks keputusan ternormalisasi dan tertimbang
        $normalizedMatrix = [];
        foreach ($kriteria as $k) {
            $sum = 0;
            foreach ($calons as $c) {
                $sum += pow($c[$k->kode_kriteria], 2);
            }
            $sqrtSum = sqrt($sum);
            foreach ($calons as $c) {
                $normalizedMatrix[$c->id][$k->kode_kriteria] = ($c[$k->kode_kriteria] / $sqrtSum) * $k->bobot;
            }
        }
        return $sqrtSum;
        // Ideal solusi positif dan negatif
        $idealPositive = [];
        $idealNegative = [];
        foreach ($kriteria as $k) {
            $idealPositive[$k->kode_kriteria] = max(array_column($normalizedMatrix, $k->kode_kriteria));
            $idealNegative[$k->kode_kriteria] = min(array_column($normalizedMatrix, $k->kode_kriteria));
        }
        return $idealNegative;

        // Menghitung jarak ke solusi ideal
        $distances = [];
        foreach ($calons as $c) {
            $distPositive = 0;
            $distNegative = 0;
            foreach ($kriteria as $k) {
                $distPositive += pow($idealPositive[$k->kode_kriteria] - $normalizedMatrix[$c->id][$k->kode_kriteria], 2);
                $distNegative += pow($idealNegative[$k->kode_kriteria] - $normalizedMatrix[$c->id][$k->kode_kriteria], 2);
            }
            $distances[$c->id]['positive'] = sqrt($distPositive);
            $distances[$c->id]['negative'] = sqrt($distNegative);
        }

        // Menghitung nilai preferensi
        $results = [];
        foreach ($calons as $c) {
            $results[] = [
                'nama' => $c->nama,
                'nilai_preferensi' => $distances[$c->id]['negative'] /
                                    ($distances[$c->id]['negative'] + $distances[$c->id]['positive']),
            ];
        }

        return view('pages.admin.penilaian.topsis', compact('result'));
    }



}
