<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css') }}/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css') }}/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css') }}/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css') }}/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css') }}/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css') }}/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css') }}/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css') }}/style.css" type="text/css">
    @livewireStyles
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @vite(['resources/js/main.js', 'resources/css/style.css'])

</head>