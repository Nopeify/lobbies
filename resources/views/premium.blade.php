@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">

      @if(session('success'))
      <div class="alert alert-success" role="alert">
        <i class="material-icons">done</i> {{ session('success') }}
      </div>
      @endif

      <div class="card">
        <div class="card-header">
          <i class="material-icons">credit_card</i> Step 1 - Buy a code from Shoppy.
        </div>
        <div class="card-body">
          <script src="https://shoppy.gg/api/embed.js"></script>
          <button class="btn btn-primary" style="width: 100%;" data-shoppy-product="l6UpPsB"><i class="material-icons">loyalty</i> Pay</button>
        </div>
      </div>

      <div class="card" style="margin-top: 20px;">
        <div class="card-header">
          <i class="material-icons">redeem</i> Step 2 - Redeem code below.
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('codes.redeem') }}" aria-label="{{ route('codes.redeem') }}">
            {{ csrf_field() }}

            <div class="input-group">
              @guest
              <input onclick="location.href='{{ route('login') }}'" type="text" class="form-control" placeholder="Paste Code Here..">
              @else
              <input type="text" class="form-control" name="code" id="code" placeholder="Paste Code Here.." required>
              @endguest
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" ><i class="material-icons">done</i> Done</button>
              </div>
            </div>
          </form>
          </div>
        </div>

        <div class="card" style="margin-top: 20px;">
          <div class="card-header">
            <i class="material-icons">help</i> Problems?
          </div>
          <div class="card-body">
            Feel free to contact me on steam or on the Discord.<br>
            <a style="color: #3490dc;" href="https://steamcommunity.com/id/r_z/">Steam</a>
          </div>
        </div>

      </div>
    </div>
  </div>
  @endsection
