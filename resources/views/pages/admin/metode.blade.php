@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Proses Perhitungan Metode</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-grow-1 bd-highlight">
                                        <h3 class="card-title">Data Bayi</h3>
                                    </div>
                                </div>
                                <table id="example1" class="table table-bordered table-striped fixed">
                                    <thead>
                                        <tr>
                                            {{-- <th>No</th> --}}
                                            <th>Nama Balita</th>
                                            <th>Umur</th>
                                            <th>Berat Badan</th>
                                            <th>Tinggi Badan</th>
                                            <th>Alergi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @forelse ($Penentuan as $a) --}}
                                        <tr>
                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                            <td>{{ $MPenentuan->nama }}</td>
                                            <td>{{ $MPenentuan->penentuan_umur }}</td>
                                            <td>{{ $MPenentuan->penentuan_beratBadan }}</td>
                                            <td>{{ $MPenentuan->penentuan_tinggiBadan }}</td>
                                            <td>{{ $MPenentuan->penentuan_alergi }}</td>
                                        </tr>
                                        {{-- @endforelse --}}
                                    </tbody>
                                </table>
                                <br>
                                <hr>
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-grow-1 bd-highlight">
                                        <h3 class="card-title">Data Alternatif</h3>
                                    </div>
                                </div>
                                <table id="example1" class="table table-bordered table-striped fixed">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Alternatif</th>
                                            <th>Umur</th>
                                            <th>Tinggi Badan</th>
                                            <th>Berat Badan</th>
                                            <th>Alergi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($Alternatif as $b)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $b->alternatif }}</td>
                                                <td>{{ $b->bobot_umur }}</td>
                                                <td>{{ $b->bobot_beratBadan }}</td>
                                                <td>{{ $b->bobot_tinggiBadan }}</td>
                                                <td>{{ $b->bobot_alergi }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak Ada Data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <br>
                                <hr>
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-grow-1 bd-highlight">
                                        <h3 class="card-title">Data Pembagi</h3>
                                    </div>
                                </div>
                                <table id="example1" class="table table-bordered table-striped fixed">
                                    <thead>
                                        <tr>
                                            {{-- <th>no</th> --}}
                                            <th rowspan="2" class="text-align-center">Pembagi </th>
                                            <th>Umur</th>
                                            <th>Tinggi Badan</th>
                                            <th>Berat Badan</th>
                                            <th>Alergi</th>
                                        </tr>
                                        <tr>
                                            {{-- <td></td> --}}
                                            {{-- <td>Pembagi</td> --}}
                                            @foreach ($pembagi as $a)
                                                <td>{{ $a }}</td>
                                            @endforeach
                                        </tr>
                                    </thead>
                                </table>
                                <br>
                                <hr>
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-grow-1 bd-highlight">
                                        <h3 class="card-title">Data Normalisasi</h3>
                                    </div>
                                </div>
                                <table id="example1" class="table table-bordered table-striped fixed">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Alternatif</th>
                                            <th>Umur</th>
                                            <th>Tinggi Badan</th>
                                            <th>Berat Badan</th>
                                            <th>Alergi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($normalisasi as $n)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                @foreach ($n as $item)
                                                    <td>
                                                        {{ $item }}
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <hr>
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-grow-1 bd-highlight">
                                        <h3 class="card-title">Data Normalisasi dan Terbobot</h3>
                                    </div>
                                </div>
                                <table id="example1" class="table table-bordered table-striped fixed">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Alternatif</th>
                                            <th>Umur</th>
                                            <th>Tinggi Badan</th>
                                            <th>Berat Badan</th>
                                            <th>Alergi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($terbobot as $n)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                @foreach ($n as $item)
                                                    <td>
                                                        {{ $item }}
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <hr>
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-grow-1 bd-highlight">
                                        <h3 class="card-title">Nilai Solusi Ideal Positif (Maks) dan Solusi Ideal
                                            Negatif (Min)</h3>
                                    </div>
                                </div>
                                <table id="example1" class="table table-bordered table-striped fixed">
                                    <tr>
                                        <th></th>
                                        <td>Umur</td>
                                        <td>Berat Badan</td>
                                        <td>Tinggi Badan</td>
                                        <td>Alergi</td>
                                    </tr>
                                    <tr>
                                        <th>Positif (Maks)</th>
                                        @foreach ($max as $aa)
                                            <td>{{ $aa }}</td>
                                        @endforeach
                                    </tr>
                                    <tbody>
                                        <tr>
                                            <th>Negatif (Min)</th>
                                            @foreach ($min as $a)
                                                <td>{{ $a }}</td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <hr>
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-grow-1 bd-highlight">
                                        <h3 class="card-title">Nilai D+ dan D- untuk setiap Alternatif</h3>
                                    </div>
                                </div>
                                <table id="example1" class="table table-bordered table-striped fixed">
                                    <thead>
                                        <tr>
                                            <th>D+</th>
                                            <th>Alternatif</th>
                                            <th>D-</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($tabeld as $item)
                                            <tr>
                                                <td>{{ $item['1'] }}</td>
                                                <td>{{ $item['0'] }}</td>
                                                <td>{{ $item['2'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <hr>
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-grow-1 bd-highlight">
                                        <h3 class="card-title">Hasil Preverensi</h3>
                                    </div>
                                </div>
                                <table id="example1" class="table table-bordered table-striped fixed">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Alternatif</th>
                                            <th>Preverensi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tabeld as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item['0'] }}</td>
                                                <td>{{ $item['3'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <hr>
                                <h3 class="card-title">Makanan yang direkomendasikan adalah :
                                    <b>{{ $hasil[0] }}</b>
                                </h3>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
