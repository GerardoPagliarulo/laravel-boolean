<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>laravel-boolean</title>
</head>
<body>
    <header class="main-header">
        <div class="navbar">
            <a href="{{ route('static-page.home') }}" class="navbar-brand">
                <img src="https://www.boolean.careers/images/common/logo.png" alt="Boolean Careers">
            </a>
            <ul>
                <li><a @if (Request::route()->getName() == 'static-page.home') class="active" @endif 
                    href="{{ route('static-page.home') }}">Home</a></li>
                <li><a href="#">Corso</a></li>
                <li><a @if (Request::route()->getName() == 'students.index') class="active" @endif 
                    href="{{ route('students.index') }}">Dopo corso</a></li>
                <li><a href="#">Lezione gratuita</a></li>
                <li><a href="#">Assumi i nostri studenti</a></li>
            </ul>
        </div>
    </header>