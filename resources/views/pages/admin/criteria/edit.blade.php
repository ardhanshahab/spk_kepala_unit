@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Kriteria</h1>
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
                                <form action="{{ route('admin.criteria.update', $criteria->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="kriteria">Kriteria</label>
                                        <input type="text" name="kriteria" class="form-control" id="kriteria" value="{{ $criteria->kriteria }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bobot">Bobot</label>
                                        <input type="number" name="bobot" class="form-control" id="bobot" value="{{ $criteria->bobot }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
