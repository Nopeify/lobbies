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
          <form method="POST" action="{{ route('codes.new') }}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleFormControlSelect1">For (leave default for premium)</label>
              <input type="text" class="form-control" name="for" id="for" value="1" placeholder="For" >
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Code (e.g. 4brqpFRm5iSJXeyKVrEJ)</label>
              <input type="text" class="form-control" name="code" id="code" placeholder="Code">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Or use multiple lines</label>
              <textarea class="form-control" name="multiple_lines" id="multiple_lines" rows="3"></textarea>
            </div>
            <button class="btn btn-primary btn-animated"><i class="material-icons">edit</i> Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
