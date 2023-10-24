<!doctype html>
<html lang="en">
@php
$authUser= Auth::user();
@endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@isset($pageTitle)
        {{$pageTitle}} | 
    @endisset {{env("APP_NAME")}}</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/pe7-icons.css') }}" rel="stylesheet">
   
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

        @include('includes.header')

        @include('includes.theme-options')

        <div class="app-main">
            @include('includes.sidebar')


            <div class="app-main__outer">

                <div class="mt-4 px-md-4 px-1">
                    {{-- MAIN CONTENT HERE --}}
                    @yield('content')
                </div>

                @include('includes.footer')
            </div>
