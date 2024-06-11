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
        $penilaians = Penilaian::with(['karyawan'])->get();
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
        $kriteria = Criteria::all();
        $calons = Penilaian::with('karyawan')->get();
        $nilai = [];
        foreach ($calons as $c) {
            $nilai[] = [
                'nama' => $c->karyawan->nama,
                'C1' => $c->C1,
                'C2' => $c->C2,
                'C3' => $c->C3,
                'C4' => $c->C4,
                'C5' => $c->C5
            ];
        }
        $kriteriaData = [];
    foreach ($kriteria as $k) {
        $kriteriaData[$k->nama] = $k->bobot; // Menyimpan bobot dengan nama kriteria sebagai key
    }

    // Lakukan perhitungan nilai berdasarkan bobot kriteria
    $hasil = [];
    foreach ($nilai as $n) {
        $C1 = $kriteriaData['C1'] * $n['C1'];
        $C2 = $kriteriaData['C2'] * $n['C2'];
        $C3 = $kriteriaData['C3'] * $n['C3'];
        $C4 = $kriteriaData['C4'] * $n['C4'];
        $C5 = $kriteriaData['C5'] * $n['C5'];

        $hasil[] = [
            'nama' => $n['nama'],
            'C1' => $C1,
            'C2' => $C2,
            'C3' => $C3,
            'C4' => $C4,
            'C5' => $C5,
        ];
    }
    $totalC1 = 0;
    $totalC2 = 0;
    $totalC3 = 0;
    $totalC4 = 0;
    $totalC5 = 0;
    foreach ($hasil as $data) {
        $totalC1 += $data['C1'];
        $totalC2 += $data['C2'];
        $totalC3 += $data['C3'];
        $totalC4 += $data['C4'];
        $totalC5 += $data['C5'];
    }

    // Akar kuadratkan totalC1Kuadrat
    $totalC1Akar = sqrt($totalC1);
    $totalC2Akar = sqrt($totalC2);
    $totalC3Akar = sqrt($totalC3);
    $totalC4Akar = sqrt($totalC4);
    $totalC5Akar = sqrt($totalC5);

    $normalisasi = [];
    foreach ($nilai as $n) {
    $normalisasiC1 = $n['C1'] / $totalC1Akar;
    $normalisasiC2 = $n['C2'] / $totalC2Akar;
    $normalisasiC3 = $n['C3'] / $totalC3Akar;
    $normalisasiC4 = $n['C4'] / $totalC4Akar;
    $normalisasiC5 = $n['C5'] / $totalC5Akar;
    $normalisasi[] = [
        'nama' => $n['nama'],
        'C1' => $normalisasiC1,
        'C2' => $normalisasiC2,
        'C3' => $normalisasiC3,
        'C4' => $normalisasiC4,
        'C5' => $normalisasiC5,
    ];
    }

    $matriks = [];
    foreach ($normalisasi as $normal) {
        $matriksC1 = $normal['C1'] * $kriteriaData['C1'];
        $matriksC2 = $normal['C2'] * $kriteriaData['C2'];
        $matriksC3 = $normal['C3'] * $kriteriaData['C3'];
        $matriksC4 = $normal['C4'] * $kriteriaData['C4'];
        $matriksC5 = $normal['C5'] * $kriteriaData['C5'];

        $matriks[] = [
            'nama' => $normal['nama'],
            'C1' => round($matriksC1, 2), // Membulatkan ke 2 desimal
            'C2' => round($matriksC2, 2), // Membulatkan ke 2 desimal
            'C3' => round($matriksC3, 2), // Membulatkan ke 2 desimal
            'C4' => round($matriksC4, 2), // Membulatkan ke 2 desimal
            'C5' => round($matriksC5, 2), // Membulatkan ke 2 desimal
        ];
    }

    $c1Values = [];
    $c2Values = [];
    $c3Values = [];
    $c4Values = [];
    $c5Values = [];

    foreach ($matriks as $m) {
        $c1Values[] = $m['C1'];
        $c2Values[] = $m['C2'];
        $c3Values[] = $m['C3'];
        $c4Values[] = $m['C4'];
        $c5Values[] = $m['C5'];
    }

    $idealPositive = [
        'C1' => round(max($c1Values), 2), // Membulatkan hasil ke 2 desimal
        'C2' => round(max($c2Values), 2), // Membulatkan hasil ke 2 desimal
        'C3' => round(max($c3Values), 2), // Membulatkan hasil ke 2 desimal
        'C4' => round(max($c4Values), 2), // Membulatkan hasil ke 2 desimal
        'C5' => round(max($c5Values), 2)  // Membulatkan hasil ke 2 desimal
    ];

    $idealNegative = [
        'C1' => round(min($c1Values), 2), // Membulatkan hasil ke 2 desimal
        'C2' => round(min($c2Values), 2), // Membulatkan hasil ke 2 desimal
        'C3' => round(min($c3Values), 2), // Membulatkan hasil ke 2 desimal
        'C4' => round(min($c4Values), 2), // Membulatkan hasil ke 2 desimal
        'C5' => round(min($c5Values), 2)  // Membulatkan hasil ke 2 desimal
    ];

    $jarakPositif = [];
    foreach ($matriks as $m) {
        $jarakC1 = $m['C1'] - $idealPositive['C1'];
        $jarakC2 = $m['C2'] - $idealPositive['C2'];
        $jarakC3 = $m['C3'] - $idealPositive['C3'];
        $jarakC4 = $m['C4'] - $idealPositive['C4'];
        $jarakC5 = $m['C5'] - $idealPositive['C5'];

        $jarakPositif[] = [
            'nama' => $m['nama'],
            'C1' => $jarakC1,
            'C2' => $jarakC2,
            'C3' => $jarakC3,
            'C4' => $jarakC4,
            'C5' => $jarakC5,
        ];
    }
    $perhitunganJarakPositif = [];
    foreach ($jarakPositif as $j) {
        $perhitunganJarakPositif[] = [
            'nama' => $j['nama'],
            'C1' => pow($j['C1'], 2),
            'C2' => pow($j['C2'], 2),
            'C3' => pow($j['C3'], 2),
            'C4' => pow($j['C4'], 2),
            'C5' => pow($j['C5'], 2),
        ];
    }
    $hasilJarakPositif = [];
    foreach ($perhitunganJarakPositif as $j) {
        // Menghitung jumlah C1 hingga C5 untuk setiap elemen
        $sum = $j['C1'] + $j['C2'] + $j['C3'] + $j['C4'] + $j['C5'];
        $sqrt = sqrt($sum);
        $hasilJarakPositif[] = [
            'nama' => $j['nama'],
            'sum' => $sum,
            'sqrt' => $sqrt,
        ];
    }



    $jarakNegatif = [];
    foreach ($matriks as $m) {
        $jarakC1 = $idealNegative['C1'] - $m['C1'];
        $jarakC2 = $idealNegative['C2'] - $m['C2'];
        $jarakC3 = $idealNegative['C3'] - $m['C3'];
        $jarakC4 = $idealNegative['C4'] - $m['C4'];
        $jarakC5 = $idealNegative['C5'] - $m['C5'];

        $jarakNegatif[] = [
            'nama' => $m['nama'],
            'C1' => $jarakC1,
            'C2' => $jarakC2,
            'C3' => $jarakC3,
            'C4' => $jarakC4,
            'C5' => $jarakC5,
        ];
    }
    $perhitunganJarakNegatif = [];
    foreach ($jarakNegatif as $j) {
        $perhitunganJarakNegatif[] = [
            'nama' => $j['nama'],
            'C1' => pow($j['C1'], 2),
            'C2' => pow($j['C2'], 2),
            'C3' => pow($j['C3'], 2),
            'C4' => pow($j['C4'], 2),
            'C5' => pow($j['C5'], 2),
        ];
    }

    $hasilJarakNegatif = [];
    foreach ($perhitunganJarakNegatif as $j) {
        // Menghitung jumlah C1 hingga C5 untuk setiap elemen
        $sum = $j['C1'] + $j['C2'] + $j['C3'] + $j['C4'] + $j['C5'];
        $sqrt = sqrt($sum);
        $hasilJarakNegatif[] = [
            'nama' => $j['nama'],
            'sum' => $sum,
            'sqrt' => $sqrt,
        ];
    }

    $nilaiPrefensi = [];
    foreach ($hasilJarakNegatif as $index => $j) {
        // dd($j);
        $nama = $j['nama'];
        $negatif = $j['sqrt'];
        $positif = $hasilJarakPositif[$index]['sqrt'];

        $nilaiPrefensi[$nama] = $negatif / ($negatif + $positif);
    }

    return [
        'hasil_kuadrat' => $hasil,
        'normalisasi' => $normalisasi,
        'matriks' => $matriks,
        'idealPositive' => $idealPositive,
        'idealNegative' => $idealNegative,
        'jarakPositif' => $jarakPositif,
        'perhitunganJarakPositif' => $perhitunganJarakPositif,
        'hasilJarakPositif' => $hasilJarakPositif,
        'jarakNegatif' => $jarakNegatif,
        'perhitunganJarakNegatif' => $perhitunganJarakNegatif,
        'hasilJarakNegatif' => $hasilJarakNegatif,
        'nilaiPrefensi' => $nilaiPrefensi,
    ];

            // return view('pages.admin.penilaian.topsis', compact('result'));

    }

    // Di dalam controller
    public function tampilkanHasilTopsis()
    {
        $result = $this->hitungPreferensi();

        return view('pages.admin.penilaian.topsis', $result);
    }




}
