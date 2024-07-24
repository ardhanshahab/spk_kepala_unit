@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Penilaian</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Penilaian</h3>
                                {{-- <div class="card-tools">
                                    <a href="{{ route('penilaian.topsis') }}" class="btn btn-primary">Hasil Topsis</a>
                                    <a href="{{ route('penilaian.create') }}" class="btn btn-success">Tambah Penilaian</a>
                                </div> --}}
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="container">
                                <h1>Hasil Perhitungan TOPSIS</h1>

                                <h2>Hasil Kuadrat</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hasil_kuadrat as $hasil)
                                        <tr>
                                            <td>{{ $hasil['nama'] }}</td>
                                            <td>{{ $hasil['C1'] }}</td>
                                            <td>{{ $hasil['C2'] }}</td>
                                            <td>{{ $hasil['C3'] }}</td>
                                            <td>{{ $hasil['C4'] }}</td>
                                            <td>{{ $hasil['C5'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h2>Normalisasi</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($normalisasi as $norm)
                                        <tr>
                                            <td>{{ $norm['nama'] }}</td>
                                            <td>{{ $norm['C1'] }}</td>
                                            <td>{{ $norm['C2'] }}</td>
                                            <td>{{ $norm['C3'] }}</td>
                                            <td>{{ $norm['C4'] }}</td>
                                            <td>{{ $norm['C5'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h2>Matriks Ternormalisasi</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($matriks as $mat)
                                        <tr>
                                            <td>{{ $mat['nama'] }}</td>
                                            <td>{{ $mat['C1'] }}</td>
                                            <td>{{ $mat['C2'] }}</td>
                                            <td>{{ $mat['C3'] }}</td>
                                            <td>{{ $mat['C4'] }}</td>
                                            <td>{{ $mat['C5'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h2>Ideal Positif</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($idealPositive as $key => $value)
                                        <tr>
                                            <td>{{ $key }}</td>
                                            <td>{{ $value }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h2>Ideal Negatif</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($idealNegative as $key => $value)
                                        <tr>
                                            <td>{{ $key }}</td>
                                            <td>{{ $value }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h2>Jarak Positif</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jarakPositif as $jarak)
                                        <tr>
                                            <td>{{ $jarak['nama'] }}</td>
                                            <td>{{ $jarak['C1'] }}</td>
                                            <td>{{ $jarak['C2'] }}</td>
                                            <td>{{ $jarak['C3'] }}</td>
                                            <td>{{ $jarak['C4'] }}</td>
                                            <td>{{ $jarak['C5'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h2>Hasil Jarak Positif</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Sum</th>
                                            <th>Sqrt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hasilJarakPositif as $hasil)
                                        <tr>
                                            <td>{{ $hasil['nama'] }}</td>
                                            <td>{{ $hasil['sum'] }}</td>
                                            <td>{{ $hasil['sqrt'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h2>Jarak Negatif</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jarakNegatif as $jarak)
                                        <tr>
                                            <td>{{ $jarak['nama'] }}</td>
                                            <td>{{ $jarak['C1'] }}</td>
                                            <td>{{ $jarak['C2'] }}</td>
                                            <td>{{ $jarak['C3'] }}</td>
                                            <td>{{ $jarak['C4'] }}</td>
                                            <td>{{ $jarak['C5'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h2>Hasil Jarak Negatif</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Sum</th>
                                            <th>Sqrt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hasilJarakNegatif as $hasil)
                                        <tr>
                                            <td>{{ $hasil['nama'] }}</td>
                                            <td>{{ $hasil['sum'] }}</td>
                                            <td>{{ $hasil['sqrt'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <h2>Nilai Preferensi</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nilai Preferensi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nilaiPrefensi as $nama => $nilai)
                                        <tr>
                                            <td>{{ $nama }}</td>
                                            <td>{{ $nilai }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
