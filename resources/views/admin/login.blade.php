<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ config('app.name', 'Llaravel') }}</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"  style="background: url(https://i.pinimg.com/564x/14/71/e6/1471e60cca96cc7d8cd65edd4693c358.jpg);"></div>
              <div class="col-lg-6">
                <div class="p-5">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>

                    @endif
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Back End </h1>
                  </div>
                  <form class="user" action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="email" name="email"  class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address or Phone">
                      @error('email')
                      <span class="invalid-feedback" role="alert" style="display: block !important">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                      @error('password')
                      <span class="invalid-feedback" role="alert" style="display: block !important">
                                          <strong>{{ $message }}</strong>
                                      </span>
                     @enderror
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" {{ old('remember') ? 'checked' : '' }} name="remember">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>

                      <button type="submit" style="font-size: 20px;color: #fff;background-color: #4e73df;border-color: #4e73df;"  class="btn btn-primary btn-user btn-block">Login</button>

                    

                  </form>
                  <hr>

                  <div class="text-center">
                    <a class="small" href="{{ route('home')}}">Go to Site</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  {{-- change the input name from email to phone if user enter phone not email --}}


</body>

</html>
