@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Karyawan</h1>
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
                                <h3 class="card-title">Detail Data Karyawan</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama:</label>
                                    <input type="text" class="form-control" value="{{ $karyawan->nama }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <input type="text" class="form-control" value="{{ $karyawan->alamat }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No HP:</label>
                                    <input type="text" class="form-control" value="{{ $karyawan->no_hp }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" value="{{ $karyawan->email }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan:</label>
                                    <input type="text" class="form-control" value="{{ $karyawan->jabatan }}" readonly>
                                </div>
                                <a href="{{ route('karyawan.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
