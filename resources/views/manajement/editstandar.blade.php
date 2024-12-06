<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Standar Element</title>

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
<!-- resources/views/manajement/editstandar.blade.php -->

{{-- <!-- Pastikan menyesuaikan dengan layout yang Anda gunakan --> --}}


<div class="container">

    <h1>Edit Standar Kompetensi</h1>
    <!-- Form untuk mengedit standar -->
    <form action="/manajement.editstandar/{{ $standar->id}}" enctype="multipart/form-data" method="POST">
        @csrf
        {{-- @method('PUT') <!-- Menandakan ini adalah request PUT untuk update data --> --}}

        <div class="form-group">
            <label for="unit_code">Unit Code</label>
            <input type="text" name="unit_code" id="unit_code" class="form-control" value="{{ $standar->unit_code }}" required>
        </div>

        <div class="form-group">
            <label for="unit_title">Unit Title</label>
            <input type="text" name="unit_title" id="unit_title" class="form-control" value="{{ $standar->unit_title }}" required>
        </div>

        <div class="form-group">
            <label for="unit_deskripsi">Deskripsi</label>
            <textarea name="unit_deskripsi" id="unit_deskripsi" class="form-control" required>{{ $standar->unit_deskripsi }}</textarea>
        </div>

        <div class="form-group">
            <label for="jurusan_id">Jurusan</label>
            <select name="jurusan_id" id="id" class="form-control" required>
                <option value="" disabled selected>Pilih Jurusan</option>
                @foreach ($jurusans as $jurusan)
                <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="assessor_id">Assessor</label>
            <select name="assessor_id" id="assessor_id" class="form-control" required>
                <option value="" disabled selected>Pilih Assessor</option>
                @foreach ($assessors as $assessor)
                <option value="{{ $assessor->id }}">{{ $assessor->user->fullname }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-warning mt-3">Update Standar</button>
    </form>

</div>

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
