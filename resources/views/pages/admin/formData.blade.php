@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
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
                            <div class="card-header">
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-grow-1 bd-highlight">
                                        <h3 class="card-title">Masukkan Data Balita</h3>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="{{ route('tambah-data') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama">Masukkan Nama Balita</label>
                                                <input type="name" class="form-control" name="nama"
                                                    placeholder="Masukkan nama balita">
                                            </div>
                                            <div class="form-group">
                                                <label for="bobot_umur_penentuan">Umur</label>
                                                <select class="form-control select2" style="width: 100%;"
                                                    name="bobot_umur_penentuan">
                                                    <option selected="selected">Pilih</option>
                                                    @foreach ($ages as $item)
                                                        @if ($item->criteria_id == 1)
                                                            <option
                                                                value="{{ $item->bobot . ' - ' . $item->sub_criteria }}">
                                                                {{ $item->sub_criteria }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="bobot_beratBadan_penentuan">Berat Badan</label>
                                                <select class="form-control select2" style="width: 100%;"
                                                    name="bobot_beratBadan_penentuan">
                                                    <option selected="selected">Pilih</option>
                                                    @foreach ($weights as $item)
                                                        @if ($item->criteria_id == 2)
                                                            <option
                                                                value="{{ $item->bobot . ' - ' . $item->sub_criteria }}">
                                                                {{ $item->sub_criteria }}
                                                                {{-- ({{ $item->range }}) --}}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="bobot_tinggiBadan_penentuan">Tinggi Badan</label>
                                                <select class="form-control select2" style="width: 100%;"
                                                    name="bobot_tinggiBadan_penentuan">
                                                    <option selected="selected">Pilih</option>
                                                    @foreach ($highs as $item)
                                                        @if ($item->criteria_id == 3)
                                                            <option
                                                                value="{{ $item->bobot . ' - ' . $item->sub_criteria }}">
                                                                {{ $item->sub_criteria }}
                                                                {{-- ({{ $item->range }}) --}}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="bobot_alergi_penentuan">Alergi</label>
                                                <select class="form-control select2" style="width: 100%;"
                                                    name="bobot_alergi_penentuan">
                                                    <option selected="selected">Pilih</option>
                                                    @foreach ($allergy as $item)
                                                        @if ($item->criteria_id == 4)
                                                            <option
                                                                value="{{ $item->bobot . ' - ' . $item->sub_criteria }}">
                                                                {{ $item->sub_criteria }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.row -->
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
