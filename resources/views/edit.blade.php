<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Data</title>
    <link href="assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit User</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>$item</li>
                @endforeach
            </ul>
        </div>
    @endif
        <!-- Form -->
        <div class="card">
            <div class="card-body">
                <form action="/edit/{{ $user->id }}" enctype="multipart/form-data" method="post">
                    @csrf <!-- Token keamanan Laravel -->
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" name="fullname" class="form-control" id="fullname" value="{{ $user->fullname}}" placeholder="Masukkan nama" required>
                    </div>
                    <!-- Input Nama -->
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name}}" placeholder="Nama" required>
                    </div>

                    <!-- Input Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}" placeholder="Masukkan email" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Phone Number</label>
                        <input type="phonenumber" name="phonenumber" class="form-control" id="phonenumber" value="{{ $user->phonenumber}}" placeholder="Masukkan email" required>
                    </div>
                    <!-- Select Role -->
                    <div class="form-group">
                        <label for="as">As</label>
                        <select name="as" class="form-control" id="as" required>
                            <option value="" selected disabled>Pilih Role</option>
                            <option value="assessor">Assessor</option>
                            <option value="admin">Admin</option>
                            <option value="student">Student</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="active">Status</label>
                        <input type="active" name="active" class="form-control" id="active" value="{{ $user->active}}" placeholder="Masukkan Status" required>
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" name="password" class="form-control" id="password" value="{{ $user->password}}" placeholder="Masukkan Password" required>
                    </div>



                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary">Update</button>
                </fo>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional, for interactivity) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
