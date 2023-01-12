@extends('templates.default')

@section('head')

@endsection

@php
    $title = 'Data Siswa';
@endphp

@section('content')
    {{-- <header class="mb-3">
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



        <section class="section">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success rounded-pill float-end" data-bs-toggle="modal" data-bs-target="#addnew">
                        <i class="bi bi-plus"></i> Tambah
                    </button>
                </div>
                <div class="card-body">
                    <table class="table" id="table1">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Phone</th>
                                <th>Adress</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->age }}</td>
                                <td>{{ $student->phone_number }}8</td>
                                <td>{{ $student->address }}</td>
                                <td>
                                    <div class="buttons d-flex">
                                        <a href="#edit{{$student->id}}" class="btn icon btn-primary"  data-bs-toggle="modal"><i class="bi bi-pencil"></i></a>

                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn icon btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>

        <div class="modal fade text-left" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title white" id="myModalLabel110">Tambah Siswa</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['url' => 'store']) !!}
                        @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Nama') !!}
                                        {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Masukkan Nama', 'required']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('age', 'Umur') !!}
                                        {!! Form::number('age', '', ['class' => 'form-control', 'placeholder' => 'Masukkan Umur', 'required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('phone_number', 'No HP') !!}
                                        {!! Form::text('phone_number', '', ['class' => 'form-control', 'placeholder' => 'No. HP', 'required']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('address', 'Alamat') !!}
                                        {!! Form::textarea('address', '', ['class' => 'form-control', 'placeholder' => 'Masukkan Alamat', 'rows' => 2 , 'required']) !!}
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>

        @foreach ($students as $student)
        <div class="modal fade text-left" id="edit{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title white" id="myModalLabel110">Edit Siswa</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
                    </div>
                    <div class="modal-body">
                        {!! Form::model($students, ['method' => 'patch', 'route' => ['student.update', $student->id] ]) !!}

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Nama') !!}
                                        {!! Form::text('name', $student->name, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('age', 'Umur') !!}
                                        {!! Form::text('age', $student->age, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('phone_number', 'No HP') !!}
                                        {!! Form::number('phone_number', $student->phone_number, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('address', 'Alamat') !!}
                                        {!! Form::textarea('address', $student->address, ['class' => 'form-control', 'rows' => 2 ]) !!}
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                        {{ Form::button('<i class="bi bi-sd-card-fill"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div> --}}

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Siswa</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Exam Toppers</h4>
                        <button type="button" class="btn btn-rounded btn-xs btn-success float-end" data-bs-toggle="modal" data-bs-target="#tambah-siswa"><i class="fa fa-plus color-info" style="margin-right: .2rem;"></i> Tambah</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>NO.</strong></th>
                                        <th><strong>NAME</strong></th>
                                        <th><strong>AGE</strong></th>
                                        <th><strong>NO. HP</strong></th>
                                        <th><strong>ADDRESS</strong></th>
                                        <th><strong>ACTION</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="jobie/{{ Session::get('image') }}" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">{{ $student->name }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $student->age }}</td>
                                        <td>{{ $student->phone_number }}</td>
                                        <td>{{ $student->address }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#edit-siswa{{$student->id}}" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal"><i class="fas fa-pencil-alt"></i></a>

                                                <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah -->
        <div class="modal fade" id="tambah-siswa">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="basic-form">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Umur</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="age" class="form-control" placeholder="Umur">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">No. HP</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="phone_number" class="form-control" placeholder="08XXXXXXXXX">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Foto</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" class="form-file-input form-control @error('image') is-invalid @enderror">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" name="address" class="form-control" placeholder=""></textarea>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end -->

        <!-- Modal Edit -->
        @foreach ($students as $student)
        <div class="modal fade" id="edit-siswa{{ $student->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <form action="{{ route('student.update', $student->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="modal-body">
                            <div class="basic-form">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" value="{{ $student->name }}" class="form-control" placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Umur</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="age" value="{{ $student->age }}" class="form-control" placeholder="Umur">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">No. HP</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="phone_number" value="{{ $student->phone_number }}" class="form-control" placeholder="08XXXXXXXXX">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" name="address" value="{{ $student->address }}" class="form-control" placeholder=""></textarea>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <!-- end -->
    </div>
@endsection

@section('script')
    <script data-cfasync="false" src="{{asset('jobie')}}/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('jobie')}}/vendor/global/global.min.js"></script>
	<script src="{{asset('jobie')}}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
@endsection

