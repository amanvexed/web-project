<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name', 'Notes APP')}}</title>


        <link href="https://bootswatch.com/5/minty/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://js.paystack.co/v1/inline.js"></script>

        <script>
            $('#variationSelect').on('change',function(){
            var price = $(this).children('option:selected').data('price');
            $('#inputAmount').val(price);
            });

        </script>

    </head>
    <body>
        {{--@include('includes.navabar')--}}
        @yield('content')
    </body>
</html>
