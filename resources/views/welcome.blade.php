@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <ul>
        <button type="button" class="btn btn-primary btn-lg">Large button</button><br><br>
        <button type="button" class="btn btn-primary">Default button</button><br><br>
        <button type="button" class="btn btn-primary btn-sm">Small button</button><br><br>
    </ul> -->

       @foreach ( $data['content'] as $content)
         <a href="/serviceId?name={{ $content['identifier'] }}" class="href">
            <button type="button" class="btn btn-primary btn-lg">{{ $content['name'] }}</button><br><br>
        </a>
        @endforeach

</div>
@endsection

