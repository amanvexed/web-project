<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name', 'Notes APP')}}</title>


        <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">


    </head>
    <body>
        {{--@include('includes.navabar')--}}
        @yield('content')
    </body>
</html>
