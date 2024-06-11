@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Penilaian</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('penilaian.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="karyawan_id">Karyawan</label>
                                    <select name="karyawan_id" class="form-control">
                                        @foreach($karyawans as $karyawan)
                                            <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="C1">Kualitas Kerja</label>
                                    <input type="number" name="C1" class="form-control" value="{{ old('C1') }}" min="0" max="100">
                                </div>
                                <div class="form-group">
                                    <label for="C2">Kuantitas Kerja</label>
                                    <input type="number" name="C2" class="form-control" value="{{ old('C2') }}" min="0" max="100">
                                </div>
                                <div class="form-group">
                                    <label for="C3">Kecepatan dan Efisiensi</label>
                                    <input type="number" name="C3" class="form-control" value="{{ old('C3') }}" min="0" max="100">
                                </div>
                                <div class="form-group">
                                    <label for="C4">Kepatuhan Terhadap Kebijakan</label>
                                    <input type="number" name="C4" class="form-control" value="{{ old('C4') }}" min="0" max="100">
                                </div>
                                <div class="form-group">
                                    <label for="C5">Integritas dan Keterampilan Teknis</label>
                                    <input type="number" name="C5" class="form-control" value="{{ old('C5') }}" min="0" max="100">
                                </div>

                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{ route('penilaian.index') }}" class="btn btn-default">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
