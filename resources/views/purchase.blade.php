@extends('layouts.app')

@section('content')

<div class="col-lg-6">
    <div class="bs-component">

<form method="post" action="{{ route('buyproduct.service') }}">
@csrf

<div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
    <div class="card-header">Please Confirm your Transaction Details are as Follows:</div>
    <div class="card-body">
     <!-- <h4 class="card-title">Primary card title</h4> -->
      <p class="card-text"><b>Product</b>: @php
          $pn = explode("#", $data['productname']);
          print($pn[1]);
      @endphp</p>
      <p class="card-text"><b>Phone</b>: {{ $data['productname'] }}</p>
      <p class="card-text"><b>Amount</b>: {{ $data['amount'] }} {{ "+ ₦" }} {{ $data['convinience_fee'] }} (convenience fee)</p>
      <p class="card-text"><b>Total Payable Amount</b>:
        @php
            $total = (int)$data['amount'] + (int)$data['convinience_fee'];
            print($total);
        @endphp
        </p>
      <p class="card-text"><b>Transaction ID</b>: {{ $trnIdVal }}</p>
      <p class="card-text"><b>Status</b>: Initiated</p>
    </div>
  </div>
  <a href="/">
    <button type="submit" class="btn btn-primary">Cancel</button>
  </a>
<button type="submit" class="btn btn-primary">Submit</button>

</form>
    </div>
</div>
@endsection

