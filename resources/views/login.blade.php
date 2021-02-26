<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
        .login,
        .image {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url('https://res.cloudinary.com/mhmd/image/upload/v1555917661/art-colorful-contemporary-2047905_dxtao7.jpg');
            background-size: cover;
            background-position: center center;
        }


    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 d-none d-md-flex bg-image"></div>


        <!-- The content half -->
        <div class="col-md-6 bg-light">
            <div class="login d-flex align-items-center py-5">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <div class="text-center">
                                <img src="{{asset('images/Image3.png')}}" class="img-fluid" style="height: 80px">
                            </div>
                            <h4 class="text-center">AlFajr Foundation <span style="color: #7740DA">AK</span></h4>
                            <p class="text-muted mb-4 text-center">Welcome Back! Please login to your account</p>
                            <form action="{{route('login')}}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input id="inputEmail" type="email" name="email" placeholder="Email address" required autofocus="" class="form-control @error('email') is-invalid @enderror rounded-pill border-0 shadow-sm px-4">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input id="inputPassword" type="password" name="password" placeholder="Password" required class="form-control @error('password') is-invalid @enderror rounded-pill border-0 shadow-sm px-4 text-primary">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input id="customCheck1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input">
                                    <label for="customCheck1" class="custom-control-label">Remember password</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm" style="background: rgb(144,18,184);background: linear-gradient(90deg, rgba(144,18,184,1) 0%, rgba(131,41,201,1) 45%, rgba(118,65,219,1) 100%);border:rgb(144,18,184); ">Sign in</button>

                            </form>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>