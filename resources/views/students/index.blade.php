@extends('templates.default')

@section('head')
<!-- Toastr -->
    {{-- <link rel="stylesheet" href="{{ asset('jobie') }}/vendor/toastr/css/toastr.min.css"> --}}
@endsection

@php
    $title = 'Data Siswa';
@endphp

@section('content')

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
                        <h4 class="card-title"></h4>
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
                                                <img src="{{ asset($student->image) }}" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">{{ $student->name }}</span>
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
                                                    <button type="submit" class="btn btn-danger shadow btn-xs sharp btn sweet-confirm"><i class="fa fa-trash"></i></button>
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
                                            <input type="file" name="image" id="image" class="form-file-input form-control @error('image') is-invalid @enderror">
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

    <script src="{{asset('jobie')}}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{asset('jobie')}}/js/plugins-init/sweetalert.init.js"></script>

    <!-- Toastr -->
    <script src="{{asset('jobie')}}/vendor/toastr/js/toastr.min.js"></script>

    <!-- All init script -->
    <script src="{{asset('jobie')}}/js/plugins-init/toastr-init.js"></script>

    <script>

    $(document).ready(function() {
            toastr.options.timeOut = 500000000;
            toastr.options.closeButton= !0;
            toastr.options.debug= !1;
            toastr.options.newestOnTop= !0;
            toastr.options.progressBar= !0;
            toastr.options.positionClass= "toast-top-right";
            toastr.options.preventDuplicates= !0;
            toastr.options.onclick= null;
            toastr.options.showDuration= "300";
            toastr.options.hideDuration= "1000";
            toastr.options.extendedTimeOut= "1000";
            toastr.options.showEasing= "swing";
            toastr.options.hideEasing= "linear";
            toastr.options.showMethod= "fadeIn";
            toastr.options.hideMethod= "fadeOut";
            toastr.options.tapToDismiss= !1;

            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });

        document.querySelector(".sweet-confirm").onclick = function () {

        swal({
            title: "Hapus Data Siswa",
            text: "Data akan terhapus permanen !!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Hapus",
            closeOnConfirm: !1
        }, function () {
            swal("Deleted !!", "Hey, your imaginary file has been deleted !!", "success")
        })
        }

    </script>
@endsection

