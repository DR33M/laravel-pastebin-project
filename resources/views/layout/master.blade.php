<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name') }}</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset("/css/select2.min.css") }}">
    <link rel="stylesheet" href="{{ asset("/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("/css/main.css") }}">

    @stack('stylesheets')

</head>
<body>


<div class="app">
    @include('layout.header')

    <main class="main">
        <div class="container">

            <div class="main__content">
                @include('layout.flash_message')
                @yield('content')
            </div>

            @auth
                @include('layout.sidebar', [
                            'publicNotes' => \App\Models\Note::public()->latest('created_at')->limit(config('max_notes_sidebar'))->get(),
                            'userNotes' => \Illuminate\Support\Facades\Auth::user()->notes()->latest('created_at')->limit(config('max_notes_sidebar'))->get()
                        ])
            @endauth
        </div>
    </main>
</div>


<script src="{{ asset("/js/jquery-3.5.1.min.js") }}"></script>
<script src="{{ asset("/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("/js/select2.min.js") }}"></script>
<script src="{{ asset("/js/autosize.js") }}"></script>
<script src="{{ asset("/js/ace/ace.js") }}"></script>
<script src="{{ asset("/js/main.js") }}"></script>
@stack('scripts')

</body>
</html>
