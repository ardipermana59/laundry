<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }} | @yield('title','Dashboard')</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- Livewire style -->
  @livewireStyles
  <style type="text/css">
    .account {
      width: 35px;
      position: relative;
      bottom: 6px;
    }
    .logout {
      padding: 0;
    }
    .main-sidebar {
      background-color: #fff;
    }
    .main-sidebar .info .info-name {
      color: #212529;
    }
    .main-sidebar .info .info-name:hover {
      color: #212529;
    }
    .main-sidebar .form-inline input, .main-sidebar .form-inline button {
      color: #212529;
      background-color: #fff;
    }
    .main-sidebar .nav-item i, .main-sidebar .nav-item p{
      color: #212529;
    }

    .navbar{
      background-color: #007bff;
    }
    .navbar .nav-item .nav-link{
      color: #fff;
    }
    .main-footer {
      color: #212529;
    }
    .sidebar-search-results a {
      background-color: #d9d9d9 !important;
      color: #212529 !important;
    }
  </style>
  @yield('header-script')
</head>
