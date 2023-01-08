@extends('templates.default')

@php
    $title = 'Data Siswa';
@endphp

@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $title ?? 'Data Siswa' }}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Siswa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>



        <!-- Basic Tables start -->
        <section class="section">
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="basicInput">Nama</label>
                                <input type="text" class="form-control" name="name" placeholder="Masukkan Nama" value="{{ $student->name }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Umur</label>
                                <input type="number" class="form-control" name="age" placeholder="15 Tahun" value="{{ $student->age }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">No. HP</label>
                                <input type="text" class="form-control" name="phone_number" placeholder="08XXXXXXXXXX" value="{{ $student->phone_number }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Alamat</label>
                                <textarea type="number" class="form-control" name="address" value="{{ $student->address }}"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Simpan" class="btn btn-success ml-1">
                </div>
            </form>
        </section>
        <!-- Basic Tables end -->
    </div>
@endsection

@section('script')
    <script src="{{asset('mazer')}}/assets/js/app.js"></script>
    <script src="{{asset('mazer')}}/assets/js/pages/dashboard.js"></script>
    <script src="{{asset('mazer')}}/assets/js/extensions/datatables.js"></script>
@endsection

