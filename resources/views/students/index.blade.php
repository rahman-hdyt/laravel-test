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
                    <button type="button" class="btn btn-success rounded-pill float-end" data-bs-toggle="modal" data-bs-target="#success">
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
                                        <a href="{{ route('students.edit', $student->id) }}" type="button" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>

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

        <!--store Modal -->
        <div class="modal fade text-left" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title white" id="myModalLabel110">Tambah Siswa</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
                    </div>
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="basicInput">Nama</label>
                                        <input type="text" class="form-control" name="name" placeholder="Masukkan Nama">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="basicInput">Umur</label>
                                        <input type="number" class="form-control" name="age" placeholder="15 Tahun">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">No. HP</label>
                                        <input type="text" class="form-control" name="phone_number" placeholder="08XXXXXXXXXX">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Alamat</label>
                                        <textarea type="number" class="form-control" name="address"></textarea>
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
        </div>

        <!--edit Modal -->
        <div class="modal fade text-left" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
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
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('mazer')}}/assets/js/app.js"></script>
    <script src="{{asset('mazer')}}/assets/js/pages/dashboard.js"></script>
    <script src="{{asset('mazer')}}/assets/js/extensions/datatables.js"></script>

    <script>
        getData()

        var saveResponse = [];
        var savedID = '';
        $(document).ready(function() {
            // getData()

            $('#tambahData').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: '/master/dokumen-kepemilikan/add',
                    data: $(this).serialize(),
                    success: function(response) {
                        toastr.success("Data berhasil ditambahkan");
                        $('#modalAdd').modal('hide');
                        getData();
                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        toastr.error(err.msg);
                    }
                });
            });

            $('#editData').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: '/master/dokumen-kepemilikan/edit',
                    data: $(this).serialize(),
                    success: function(response) {
                        toastr.success("Data berhasil diubah");
                        $('#modalEdit').modal('hide');
                        getData();
                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        toastr.error(err.msg);
                    }
                });
            });

            $('#deleteData').on('submit', function(e) {
                e.preventDefault();
                console.log($(this));
                $.ajax({
                    type: "DELETE",
                    url: '/master/dokumen-kepemilikan/delete/' + savedID,
                    data: $(this).serialize(),
                    success: function(response) {
                        toastr.success("Data berhasil dihapus");
                        $('#modalDelete').modal('hide');
                        getData();
                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        toastr.error(err.msg);
                    }
                });
            });
        });

        function getData() {
            $.ajax({
                url: '/master/dokumen-kepemilikan/data',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    saveResponse = response;

                    var tbody = $('#tbody');
                    var data = [];
                    for (let i = 0; i < response.length; i++) {
                        var action = '<div class="dropdown">' +
                            '<button class="btn btn-block btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                            'Action <i class="mdi mdi-chevron-down"></i>' +
                            '</button>' +
                            '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">' +
                            '<a type="button" class="dropdown-item" data-toggle="modal" data-target=".edit-bs-example-modal-lg" onClick="openModalEdit(' +
                            i + ')">Edit</a>' +
                            '<a type="button" class="dropdown-item" data-toggle="modal" data-target=".delete-bs-example-modal-lg" onClick="openModalDelete(' +
                            response[i].id + ')">Hapus</a>' +
                            '</div>';

                        var newData = {
                            no: i + 1,
                            id: response[i].id,
                            dok_kepemilikan: response[i].dok_kepemilikan,
                            jenis_dokumen: response[i].jenis_dokumen,
                            action: action,
                        }

                        data.push(newData)
                    }

                    saveResponse = data;

                    destroyTable()

                    $('#datatable').DataTable({
                        columnDefs: [{
                                "width": "5%",
                                targets: 0,
                            },
                            {
                                "width": "20%",
                                targets: 1,
                            },
                            {
                                "width": "65%",
                                targets: 2,
                            },
                            {
                                "width": "10%",
                                "className": 'text-center',
                                targets: 3,
                            },
                        ],
                        "data": data,
                        columns: [{
                                "title": "No",
                                "data": "no"
                            },
                            {
                                "title": "Dokumen Kepemilikan",
                                "data": "dok_kepemilikan"
                            },
                            {
                                "title": "Jenis Dokumen",
                                "data": "jenis_dokumen"
                            },
                            {
                                "title": "Action",
                                "data": "action"
                            },
                        ],
                    });
                }
            });
        }

        function destroyTable() {
            var datatable = $("#datatable").DataTable();
            datatable.destroy()
        }

        function openModalEdit(idx) {
            var data = saveResponse[idx];
            $("#id").val(data.id);
            $("#dok_kepemilikan_edit").val(data.dok_kepemilikan);
            $("#jenis_dokumen_edit").val(data.jenis_dokumen);
        }

        function openModalDelete(id) {
            $("#id_delete").val(id);
            savedID = id
        }
    </script>
@endsection

