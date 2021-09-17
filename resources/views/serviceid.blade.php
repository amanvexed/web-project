@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <ul>
        <button type="button" class="btn btn-primary btn-lg">Large button</button><br><br>
        <button type="button" class="btn btn-primary">Default button</button><br><br>
        <button type="button" class="btn btn-primary btn-sm">Small button</button><br><br>
    </ul> -->

    @php
       // var_dump($data);
    @endphp

    @foreach ($data['content'] as $content)
    {{ $content['serviceID']}}

    {{   $content['minimium_amount']}}
    {{    $content['maximum_amount']}}
    {{   $content['convinience_fee']}}
    {{    $content['product_type']}}



    <a href="{{ route('serviceId.serviceVariation', ['serviceId'=>$content['serviceID']]) }}">
        <img src="{{ $content['image'] }} " alt="{{ $content['name'] }}" >
      </a>
    @endforeach



</div>
@endsection

