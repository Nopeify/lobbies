@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-12" style="padding-top: 15px; padding-bottom: 15px;">
      <div class="card">
        <div class="card-header">
          <i class="material-icons">view_list</i> Create new variable
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('settings.new') }}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleFormControlSelect1">For (e.g. site_maintanace)</label>
              <input type="text" class="form-control" name="for" id="for" placeholder="For" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Content (e.g. true)</label>
              <input type="text" class="form-control" name="content" id="content" placeholder="content" required>
            </div>
            <button class="btn btn-primary btn-animated"><i class="material-icons">edit</i> Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
