@extends('layouts.app')

@section('content')

<div class="col-lg-6">
    <div class="bs-component">

<form method="post" action="action="{{url('buyproduct')}}">

<div class="form-group">
    <label for="variationSelect" class="form-label mt-4">Please select Type</label>
    <select class="form-select" id="variationSelect">
      <option></option>
      @foreach ( $data['content']['varations'] as $variations )
        <option value="{{ $variations['variation_code'] }} privatevalue="{{ $variations['variation_amount'] }}">{{ $variations['name'] }}</option>
      <!--  <input type="hidden" id="variationAmount" name="variationAmount" "> -->
      @endforeach
    </select>

    <input type="hidden" id="serviceID" name="serviceID" value="{{ $data['content']['serviceID'] }}">
    <input type="hidden" id="convinience_fee" name="convinience_fee" value="{{ $data['content']['convinience_fee'] }}">
</div>


<div class="form-group">
    <label class="col-form-label mt-4" for="inputDefault">Full Name</label>
    <input type="text" class="form-control" placeholder="Default input" id="inputDefault">
</div>


<div class="form-group">
    <label class="col-form-label mt-4" for="inputDefault">Mobile Number</label>
    <input type="text" class="form-control" placeholder="Default input" id="inputDefault">
</div>


<div class="form-group">
    <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <fieldset>
  <div class="form-group">
    <label class="col-form-label mt-4" for="inputAmount">Amount</label>
    <input type="text" class="form-control" placeholder="Enter Amount" id="inputAmount">
</div>
  </fieldset>

<button type="submit" class="btn btn-primary">Submit</button>

</form>
    </div>
</div>
@endsection

