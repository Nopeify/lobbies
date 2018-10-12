@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">

      <div class="card">
        <div class="card-header">
          <i class="material-icons">verified_user</i> Join the Discord
        </div>
        <div class="card-body">
          <iframe src="https://discordapp.com/widget?id=498219798648455188&theme=dark" width="100%" height="500" allowtransparency="true" frameborder="0"></iframe>
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

      <div class="card" style="margin-top: 20px;">
        <div class="card-header">
          <i class="material-icons">verified_user</i> Premium
        </div>
        <div class="card-body">
          Want premium status?<br>
          <a style="color: #3490dc;" href="{{route('premium')}}">Click me</a>
        </div>
      </div>


    </div>
  </div>
</div>
@endsection
