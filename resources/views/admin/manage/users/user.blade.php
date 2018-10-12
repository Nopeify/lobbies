@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-3" style="padding-top: 15px; padding-bottom: 15px;">
      <div class="card">
        <div class="card-body" align="center">
          <img alt=" " src="{{ $user->avatar }}" style="width: 200px; height: 200px; border-radius: 50%; padding: 0px;">
          <h3 style="margin-top: 10px;">{{ $user->name }}</h3>
        </div>
      </div>
    </div>

    <div class="col-md-9" style="padding-top: 15px; padding-bottom: 15px;">
      <div class="card">
        <div class="card-header"><i class="material-icons">person</i> Manage User</div>
        <div class="card-body">
          <form  method="POST" action="{{ route('admin.manage_user.submit', ['id' => $user->id]) }}" aria-label="{{ route('admin.manage_user.submit', ['id' => $user->id]) }}" style="display: contents;">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleFormControlSelect1">Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Role ID</label>
              <input type="text" name="role_id" id="role_id" class="form-control" placeholder="Role ID" value="{{$user->role_id}}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Lobbies</label>
              <input type="text" name="lobbies" id="lobbies" class="form-control" placeholder="Lobbies" value="{{$user->lobbies}}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Account URL</label>
              <input type="text" class="form-control" name="acc_url" id="acc_url" placeholder="Account URL" value="{{$user->acc_url}}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Avatar</label>
              <input type="text" class="form-control" name="avatar" id="avatar" placeholder="Avatar" value="{{$user->avatar}}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Steam ID</label>
              <input type="text" class="form-control" name="steamid" id="steamid" placeholder="steamid" value="{{$user->steamid}}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Primary Clan</label>
              <input type="text" class="form-control" name="primaryclan" id="primaryclan" placeholder="primaryclan" value="{{$user->primaryclan}}">
            </div>
            <button type="submit" class="btn btn-primary btn-animated" ><i class="material-icons">done</i> Submit</button>
          </form>
          <form method="POST" action="{{ route('admin.manage_user.removelobbies', ['id' => $user->id]) }}" aria-label="{{ route('admin.manage_user.removelobbies', ['id' => $user->id]) }}" style="display: contents;">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary btn-animated" ><i class="material-icons">cached</i> Remove User's Lobbies</button>
          </form>
          <form method="POST" action="{{ route('admin.manage_user.ban', ['id' => $user->id]) }}" aria-label="{{ route('admin.manage_user.ban', ['id' => $user->id]) }}" style="display: contents;">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-animated" ><i class="material-icons">gavel</i> Ban User</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
