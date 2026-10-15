@yield('css')
<!-- Sweet Alert-->
<link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
 <!-- DataTables -->
 <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
 type="text/css" />
<link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
 type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
 rel="stylesheet" type="text/css" />

<!-- Bootstrap Css -->
<link href="{{ \URL::to('build/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ \URL::to('build/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ \URL::to('build/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />


<!-- App js -->
<script src="{{ \URL::to('build/js/plugin.js') }}"></script>