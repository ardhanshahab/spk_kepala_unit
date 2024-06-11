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
                            <div class="card-tools">
                                <a href="{{ route('penilaian.create') }}" class="btn btn-success">Tambah Penilaian</a>
                            </div>
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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Karyawan</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($penilaians as $penilaian)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $penilaian->karyawan->nama }}</td>
                                            <td>{{ $penilaian->C1 }}</td>
                                            <td>{{ $penilaian->C2 }}</td>
                                            <td>{{ $penilaian->C3 }}</td>
                                            <td>{{ $penilaian->C4 }}</td>
                                            <td>{{ $penilaian->C5 }}</td>
                                            <td>
                                                <a href="{{ route('penilaian.topsis') }}" class="btn btn-primary">Topsis</a>
                                                <a href="{{ route('penilaian.edit', $penilaian->id) }}" class="btn btn-warning">Edit</a>
                                                <form action="{{ route('penilaian.destroy', $penilaian->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">Data Tidak Ada</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
