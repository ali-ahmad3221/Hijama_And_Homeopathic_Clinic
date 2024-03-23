<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name') }}- @yield('title')</title>

    <!-- Fonts -->
    {{-- <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
    <link href="{{asset('myassets/css/font-bunny-net.css')}}" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
    <link href="{{asset('myassets/css/font-googleapis-css.css')}}" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="{{ asset('myassets/css/dist-bootstraps-min.css') }}">
    <link rel="stylesheet" href="{{ asset('styling/css/style.css') }}" />
    {{-- <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('myassets/css/jquery-script-top.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.0.45/css/materialdesignicons.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('myassets/css/material-design-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('styling/css/material-charts.css') }}">
    {{-- //toastr cdn below --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">

    <style>
        /* Custom CSS styles */
        html,
        body {
            overflow-x: hidden;
        }

        .form-label {
            font-weight: bold;
            font-size: 15px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif
        }
    </style>
    @stack('banner-style')
</head>

<body>
    <div class="wrapper">
        @include('admin.layout/header')
        @include('admin.layout/sidebar')

        @yield('content')

        @include('admin.layout.footer')
    </div>
    @stack('yajra-script')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> --}}
    <script src="{{ asset('myassets/js/dist-bootstraps-min.js') }}"></script>
</body>
<script>
    function preview_image_file(file, img_tag_id, key) {
        const myfile = file.files[0];
        const fileType = myfile.type;
        const fileSize = myfile.size;
        if (fileType.startsWith('image/') && fileSize <= 300 * 1024) {
            const reader = new FileReader();
            document.getElementById(img_tag_id).src = URL.createObjectURL(file.files[0]);
            var imagesRecord = $('#imagesRecord').val();
            if (imagesRecord) {
                dataArray = JSON.parse(imagesRecord);
            }
            dataArray[key] = key;
            $('#imagesRecord').val(JSON.stringify(dataArray));
        } else {
            alert('Only images are allowed, must have less than 300kb size!');
        }
    }
</script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script> --}}
<script src="{{ asset('myassets/js/js-tree.js') }}"></script>
<script src="{{ asset('styling/js/material-charts.js') }}"></script>

</html>

</html>
