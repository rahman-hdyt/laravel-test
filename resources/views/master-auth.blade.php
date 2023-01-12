
<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from jobie.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 May 2022 06:29:47 GMT -->
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Jobie : jobie Job Portal Admin  Bootstrap 5 Template" />
	<meta property="og:title" content="Jobie : jobie Job Portal Admin  Bootstrap 5 Template" />
	<meta property="og:description" content="Jobie : Job Portal  Admin  Bootstrap 5 Template" />
	<meta property="og:image" content="social-image.png" />
	<meta name="format-detection" content="telephone=no">
    <title>Appschool - Academic Portal Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('jobie') }}/images/favicon.png">
    <link href="{{ asset('jobie') }}/css/style.css" rel="stylesheet">

    <link href="{{ asset('jobie') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">

					<div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">

                                @yield('auth')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('jobie') }}/vendor/global/global.min.js"></script>
<script src="{{ asset('jobie') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="{{ asset('jobie') }}/js/custom.min.js"></script>
<script src="{{ asset('jobie') }}/js/deznav-init.js"></script>

</body>

<!-- Mirrored from jobie.dexignzone.com/xhtml/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 May 2022 06:30:21 GMT -->
</html>
