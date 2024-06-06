@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Penilaian</h1>
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
                            <form action="{{ route('penilaian.update', $penilaian->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="karyawan_id">Karyawan</label>
                                    <select name="karyawan_id" class="form-control">
                                        @foreach($karyawans as $karyawan)
                                            <option value="{{ $karyawan->id }}" {{ $karyawan->id == $penilaian->karyawan_id ? 'selected' : '' }}>{{ $karyawan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kriteria_id">Kriteria</label>
                                    <select name="kriteria_id" class="form-control">
                                        @foreach($kriteria as $krit)
                                            <option value="{{ $krit->id }}" {{ $krit->id == $penilaian->kriteria_id ? 'selected' : '' }}>{{ $krit->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nilai">Nilai</label>
                                    <input type="number" name="nilai" class="form-control" value="{{ old('nilai', $penilaian->nilai) }}" min="0" max="100">
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
