@extends('layouts.app')

@section('content')

<div class="col-lg-6">
    <div class="bs-component">

<form method="post" action="{{ route('buyproduct.service') }}">
@csrf

<div class="form-group">
    <label for="selectProduct" class="form-label mt-4">Please select Type</label>
    <select class="form-select" id="productname"  name="productname">
      <option></option>
      @foreach ( $data['content']['varations'] as $variations )
        <option value="{{ $variations['variation_code'] }}#{{ $variations['name'] }}">{{ $variations['name'] }}</option>
      <!--  <input type="hidden" id="variationAmount" name="variationAmount" "> -->

      @endforeach
    </select>

    <input type="hidden" id="serviceID" name="serviceID" value="{{ $data['content']['serviceID'] }}">
    <input type="hidden" id="convinience_fee" name="convinience_fee" value="{{ $data['content']['convinience_fee'] }}">



</div>


<div class="form-group">
    <label class="col-form-label mt-4" for="selectProduct">Full Name</label>
    <input type="text" class="form-control" placeholder="Default input" name="fullname" id="fullname">
</div>


<div class="form-group">
    <label class="col-form-label mt-4" for="selectProduct">Mobile Number</label>
    <input type="tel" class="form-control" placeholder="Default input" id="inputDefault"  name="mobilenumber">
</div>


<div class="form-group">
    <label for="selectProduct" class="form-label mt-4" >Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <fieldset>
  <div class="form-group">
    <label class="col-form-label mt-4" for="selectProduct" >Amount</label>
    <input type="tel" class="form-control" placeholder="Enter Amount" name="amount" id="inputAmount">
</div>
  </fieldset>

<button type="submit" class="btn btn-primary">Submit</button>

<input type="hidden" name="TransactionId" value="{{$data['TransactionId']}}">

</form>
    </div>
</div>
@endsection

