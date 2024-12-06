<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/animate.css">

<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div id="global-loader">
    <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

    <div class="header">

    <div class="header-left active">
    <a href="index.html" class="logo">
    <img src="assets/img/logo.png" alt="">
    </a>
    <a href="index.html" class="logo-small">
    <img src="assets/img/logo-small.png" alt="">
    </a>
    <a id="toggle_btn" href="javascript:void(0);">
    </a>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
    <span class="bar-icon">
    <span></span>
    <span></span>
    <span></span>
    </span>
    </a>

    <ul class="nav user-menu">

    <li class="nav-item">
    <div class="top-nav-search">
    <a href="javascript:void(0);" class="responsive-search">
    <i class="fa fa-search"></i>
    </a>
    <form action="#">
    <div class="searchinputs">
    <input type="text" placeholder="Search Here ...">
    <div class="search-addon">
    <span><img src="assets/img/icons/closes.svg" alt="img"></span>
    </div>
    </div>
    <a class="btn" id="searchdiv"><img src="assets/img/icons/search.svg" alt="img"></a>
    </form>
    </div>
    </li>


    <li class="nav-item dropdown has-arrow flag-nav">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
    <img src="assets/img/flags/us1.png" alt="" height="20">
    </a>
    <div class="dropdown-menu dropdown-menu-right">
    <a href="javascript:void(0);" class="dropdown-item">
    <img src="assets/img/flags/us.png" alt="" height="16"> English
    </a>
    <a href="javascript:void(0);" class="dropdown-item">
    <img src="assets/img/flags/fr.png" alt="" height="16"> French
    </a>
    <a href="javascript:void(0);" class="dropdown-item">
    <img src="assets/img/flags/es.png" alt="" height="16"> Spanish
    </a>
    <a href="javascript:void(0);" class="dropdown-item">
    <img src="assets/img/flags/de.png" alt="" height="16"> German
    </a>
    </div>
    </li>


    <li class="nav-item dropdown">
    <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
    <img src="assets/img/icons/notification-bing.svg" alt="img"> <span class="badge rounded-pill">4</span>
    </a>
    <div class="dropdown-menu notifications">
    <div class="topnav-dropdown-header">
    <span class="notification-title">Notifications</span>
    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
    </div>
    <div class="noti-content">
    <ul class="notification-list">
    <li class="notification-message">
    <a href="activities.html">
    <div class="media d-flex">
    <span class="avatar flex-shrink-0">
    <img alt="" src="assets/img/profiles/avatar-02.jpg">
    </span>
    <div class="media-body flex-grow-1">
    <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
    </div>
    </div>
    </a>
    </li>
    <li class="notification-message">
    <a href="activities.html">
    <div class="media d-flex">
    <span class="avatar flex-shrink-0">
    <img alt="" src="assets/img/profiles/avatar-03.jpg">
    </span>
    <div class="media-body flex-grow-1">
    <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
    <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
    </div>
    </div>
    </a>
    </li>
    <li class="notification-message">
    <a href="activities.html">
    <div class="media d-flex">
    <span class="avatar flex-shrink-0">
    <img alt="" src="assets/img/profiles/avatar-06.jpg">
    </span>
    <div class="media-body flex-grow-1">
    <p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
    <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
    </div>
    </div>
    </a>
    </li>
    <li class="notification-message">
    <a href="activities.html">
    <div class="media d-flex">
    <span class="avatar flex-shrink-0">
    <img alt="" src="assets/img/profiles/avatar-17.jpg">
    </span>
    <div class="media-body flex-grow-1">
    <p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
    <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
    </div>
    </div>
    </a>
    </li>
    <li class="notification-message">
    <a href="activities.html">
    <div class="media d-flex">
    <span class="avatar flex-shrink-0">
    <img alt="" src="assets/img/profiles/avatar-13.jpg">
    </span>
    <div class="media-body flex-grow-1">
    <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
    <p class="noti-time"><span class="notification-time">2 days ago</span></p>
    </div>
    </div>
    </a>
    </li>
    </ul>
    </div>
    <div class="topnav-dropdown-footer">
    <a href="activities.html">View all Notifications</a>
    </div>
    </div>
    </li>

    <li class="nav-item dropdown has-arrow main-drop">
    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
    <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="">
    <span class="status online"></span></span>
    </a>
    <div class="dropdown-menu menu-drop-user">
    <div class="profilename">
    <div class="profileset">
    <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="">
    <span class="status online"></span></span>
    <div class="profilesets">
    <h6>John Doe</h6>
    <h5>Admin</h5>
    </div>
    </div>
    <hr class="m-0">
    <a class="dropdown-item" href="profile.html"> <i class="me-2" data-feather="user"></i> My Profile</a>
    <a class="dropdown-item" href="generalsettings.html"><i class="me-2" data-feather="settings"></i>Settings</a>
    <hr class="m-0">
    <a class="dropdown-item logout pb-0" href="/logout"><img src="assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
    </div>
    </div>
    </li>
    </ul>


    <div class="dropdown mobile-user-menu">
    <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
    <div class="dropdown-menu dropdown-menu-right">
    <a class="dropdown-item" href="profile.html">My Profile</a>
    <a class="dropdown-item" href="generalsettings.html">Settings</a>
    <a class="dropdown-item" href="/logout">Logout</a>
    </div>
    </div>

    </div>


    <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
    <ul>
    <li>
    <a href="index.html"><img src="assets/img/icons/dashboard.svg" alt="img"><span> Dashboard</span> </a>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span> Admin</span> <span class="menu-arrow"></span></a>
    <ul>
        <li><a href="/manage">Manajement Pengguna</a></li>



    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="assets/img/icons/sales1.svg" alt="img"><span> Jurusan</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="jurusan.index">Manajement Jurusan</a></li>

    </ul>
    </li>



    <li class="submenu">
    <a href="javascript:void(0);"><img src="assets/img/icons/users1.svg" alt="img"><span> Manajement Elemen Kompetensi</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="/manajement.standar">Manajement Standar Kompetensi</a></li>
    <li><a href="/manajement.element">Manajement Elemen Kompetensi</a></li>
    <li><a href="/examinations.index">Penilaian Ujian</a></li>
    <li><a href="/examinations.result">Hasil Ujian</a></li>

    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="assets/img/icons/settings.svg" alt="img"><span> Penilaian Ujian</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a href="generalsettings.html">Hasil Ujian</a></li>
    <li><a href="emailsettings.html">Email Settings</a></li>
    <li><a href="paymentsettings.html">Payment Settings</a></li>
    <li><a href="currencysettings.html">Currency Settings</a></li>
    <li><a href="grouppermissions.html">Group Permissions</a></li>
    <li><a href="taxrates.html">Tax Rates</a></li>
    </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);"><img src="assets/img/icons/settings.svg" alt="img"><span> Logout</span> <span class="menu-arrow"></span></a>
        <ul>
    </ul>
    </div>
    </div>
    </div>
    <div class="page-wrapper">
        <div class="content">
        <div class="page-header">
    {{-- @extends('layouts.app') --}}

    @section('content')
    <div class="container">
        <h1>Manajemen Jurusan</h1>
        <a href="jurusan.create" class="btn btn-primary">Tambah Jurusan</a>

        @if(session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jurusan</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jurusans as $key => $jurusan)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $jurusan->nama_jurusan }}</td>
                        <td>{{ $jurusan->desc}}</td>
                        <td>
                            <a href="/jurusan.edit/{{ $jurusan->id}}"><button class="btn btn-primary">Edit</button></a>
                            <a href="/jurusan.index/delete/{{ $jurusan->id}}"><button class="btn btn-danger">Hapus</button></a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> </div> </div>
    {{-- @endsection --}}
    <script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>

</body>
</html>
