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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

</head>
<body>
    {{-- @extends('layouts.app') --}}

    @section('content')
    <div class="container">
        <h1>Edit Jurusan</h1>
        <form action="/jurusan.edit/{{ $jurusan->id }}" enctype="multipart/form-data" method="post">
            @csrf
            {{-- @method('PUT') --}}
            <div class="form-group">
                <label for="nama_jurusan">Nama Jurusan</label>
                <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" value="{{ $jurusan->nama_jurusan }}" required>
            </div>
            <div class="form-group">
                <label for="nama_jurusan">Deskripsi</label>
                <input type="text" name="desc" id="desc" class="form-control" value="{{ $jurusan->desc }}" required>
            </div>
            <button type="submit" class="btn btn-warning mt-3">Update</button>
        {{-- </form> --}}
    </div>
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
