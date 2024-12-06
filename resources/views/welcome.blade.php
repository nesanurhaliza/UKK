<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
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

    <body style="background-color: white">
        <div class="container" style="margin-top: 100px">
            <div class="row">
                <div class="col-md-5 offset-md-3">
                    <div class="card shadow-sm my-5">
                        <div class="card-body">
                            @if(session('pesanlogin'))
                            <div class="alert alert-danger">
                                {{ session('pesanlogin') }}
                            </div>
                        @endif

                        <!-- Form login -->
                        <form action="{{ '/auth' }}" method="POST">

            @csrf
            <div class="container">
                <div class="logo">
                    <img src="" alt="">
                </div>
                <div class="login" style="margin-left: 40%;">
                    <p style="font-size: 30px">Login</p>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="from-control" id="exampleInputEmail" aria-describedby="Email" placeholder="Enter Email" style="width: 100%">
                </div>
                <br>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="from-control" id="exampleInputPassword" aria-describedby="password" placeholder="password" style="width: 100%">
                </div>
                <br>



                </div>
                <div class="form-grup">
                    <button type="submit" class="login-btn btn btn-primary">Login</button>
                </div>
                <hr>

            </div>
            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
