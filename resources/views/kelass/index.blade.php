@extends('templates.default')

@section('head')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> --}}
<!-- Datatable -->
<link href="{{asset('jobie')}}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@php
$title = 'Data Kelas';
@endphp

@section('content')

<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Kelas</a></li>
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
                        <table id="kelass" class="display table-responsive-md">
                            <thead>
                                <tr>
                                    <th width="10%"><strong>NO.</strong></th>
                                    <th width="75%"><strong>NAMA KELAS</strong></th>
                                    <th width="15%"><strong>ACTION</strong></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection

@section('script')
<script data-cfasync="false" src="{{asset('jobie')}}/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset('jobie')}}/vendor/global/global.min.js"></script>
<script src="{{asset('jobie')}}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<!-- Datatable -->
<script src="{{asset('jobie')}}/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{asset('jobie')}}/js/plugins-init/datatables.init.js"></script>

<script src="{{asset('jobie')}}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="{{asset('jobie')}}/js/plugins-init/sweetalert.init.js"></script>

<!-- Toastr -->
<script src="{{asset('jobie')}}/vendor/toastr/js/toastr.min.js"></script>

<!-- All init script -->
<script src="{{asset('jobie')}}/js/plugins-init/toastr-init.js"></script>


{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> --}}

<script>
    // $(function() {
    //     $('.kelass-table').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         ajax: '{{ route("kelass.index") }}',
    //         columns: [
    //             { data: 'id', name: 'id' },
    //             { data: 'nama_kelas', name: 'nama_kelas' },
    //         ]
    //     });
    // });

    var table = $('#kelass').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("kelass.index") }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nama_kelas', name: 'nama_kelas' },
            {
                data: null,
                render: function(data, type, row, meta) {
                    return '<a href="#" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal"><i class="fas fa-pencil-alt"></i></a>' +
                            '<button type="submit" class="btn btn-danger shadow btn-xs sharp btn sweet-confirm"><i class="fa fa-trash"></i></button>';
                }
            }
        ]
    });
</script>
@endsection
