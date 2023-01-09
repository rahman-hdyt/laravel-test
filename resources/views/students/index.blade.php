@extends('templates.default')

@section('head')
    <link rel="stylesheet" href="{{asset('mazer')}}/assets/css/shared/iconly.css">
    <link rel="stylesheet" href="{{asset('mazer')}}/assets/css/pages/fontawesome.css">
    <link rel="stylesheet" href="{{asset('mazer')}}/assets/css/pages/datatables.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection

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
                                        {{-- <button type="button" value="{{ $s->id }}" class="btn icon btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#edit"><i class="bi bi-pencil"></i></button> --}}
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
        <!-- Basic Tables end -->

        <!-- modal Add -->
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
                        {{-- <input type="submit" value="Simpan" class="btn btn-success ml-1"> --}}
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal Add -->

        <!-- modal Edit -->
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
                        {{ Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- end modal Add -->

        <!--edit Modal -->
        {{-- <div class="modal fade text-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title white" id="myModalLabel110">Edit Siswa</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
                    </div>
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
                </div>
            </div>
        </div> --}}
    </div>
@endsection

@section('script')
    <script src="{{asset('mazer')}}/assets/js/app.js"></script>
    <script src="{{asset('mazer')}}/assets/js/pages/dashboard.js"></script>
    <script src="{{asset('mazer')}}/assets/js/extensions/datatables.js"></script>
@endsection

