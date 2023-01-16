<script>

    $(document).ready(function() {
        toastr.options.timeOut = 3000;
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

    $(".sweet-confirm").on("click", function (e) {
    e.preventDefault();
    var form = $(this).closest("form");
    Swal.fire({
        title: "Yakin Hapus Data Siswa ?",
        text: "Data akan terhapus permanen",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Tidak",
        confirmButtonText: "Hapus",
        closeOnConfirm: !1

    }).then((result) => {
        if (result.value) {
            form.submit();
            result.value
        }
    });
});


</script>
