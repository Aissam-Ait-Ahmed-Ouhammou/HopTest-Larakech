<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hop | Larakech</title>

    <!-- Laravel Mix or Vite for loading CSS and JavaScript -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <!-- External JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto">
        @yield('content')
        <!-- Include components -->
        @include('components.pagination')
        @include('components.create-modal')
        @include('components.delete-contact-modal')
        @include('components.show-contact')
        @include('components.edit-contact')
        @include('components.exists-contact')
        @include('components.update-exitsts')
    </div>

    <!-- External JavaScript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Custom scripts -->
    @stack('sorting-scripts')
</body>

</html>
