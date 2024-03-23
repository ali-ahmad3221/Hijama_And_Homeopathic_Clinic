<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
         .field-icon {
         float: right;
         margin-right:5px;
         margin-top: -25px;
         position: relative;
         z-index: 2;
         }
      </style>


<style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .video-background {
      position: fixed;
      right: 0;
      bottom: 0;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      z-index: -100;
      overflow: hidden;
    }

    .video-background video {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
    }

    .content {
      position: relative;
      text-align: center;
      width: 100%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #ffffff;
    }

    .content h1 {
      font-size: 50px;
    }

    .content p {
      font-size: 20px;
    }
  </style>

</head>

<body>
    <div class="video-background">
        <video autoplay muted loop id="myVideo">
          <source src="{{asset('video/hijama_video.mp4')}}" type="video/mp4">
        </video>
    </div>

    <div class="col-sm-4" style="margin-top:3%; margin-left:35%;">
        <div class="card">
            <div class="card-header m-auto bg-white text-center">
               <img src="{{asset('/images/hijama.JPG')}}" class="" alt="Girl in a jacket" width="220">
               {{-- <h2>Admin Login</h2> --}}
            </div>

            <div class="card-body">
                <div class="wrapper">
                    <form action="{{route('login.submit')}}" Method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" id="email" value="{{ old('email') }}">
                            @error('email') <div class="text-red">{{ $message }}</div>  @enderror
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd" value="{{ old('password') }}" data-toggle="password">
                            <span  toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password-icon"></span>
                            @error('password') <div class="text-red font-bold">{{ $message }}</div>  @enderror
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" value="1"> Remember me
                            </label>
                            <!-- <a href="signup" class="ml-5">Register here</a> -->
                        </div>
                        <div class="form-group text-center">
                        <button type="submit" class="btn text-white" style="background-color:#F58220;">Login</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
   $(".toggle-password-icon").click(function() {
        var x = document.getElementById("pwd");
        if(x.type == "password"){
            x.type = "text";
        }
        else {
            x.type = "password";
        }
         $(this).toggleClass("fa-eye fa-eye-slash");
      });
</script>
</body>
</html>
