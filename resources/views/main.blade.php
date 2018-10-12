@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row justify-content-center">
    <div class="col-md-10">

      <form method="POST" action="{{ route('lobby.make') }}" aria-label="{{ route('lobby.make') }}">
        {{ csrf_field() }}
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
          <i class="material-icons">error</i> {{ session('error') }}
        </div>
        @endif
        <div class="card lobby">
          <div class="input-group">
            @guest
            <input onclick="location.href='{{ route('login') }}'" type="text" class="form-control lobby-form" placeholder="Paste your lobby link here..">
            @else
            <input type="text" class="form-control lobby-form" name="lobby_link" id="lobby_link" placeholder="Paste your lobby link here.." required>
            @endguest
            <div class="input-group-append">

              <button class="btn btn-outline-secondary lobby-button" type="button" data-toggle="modal" data-target="#exampleModal"><i class="material-icons">videogame_asset</i> Submit</button>

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><i class="material-icons">loyalty</i>  Before you post</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Set the rank</label>
                        <select class="form-control" name="rank" id="rank">
                          <option>Any Rank</option>
                          <option>Gold Nova 3+</option>
                          <option>Master Guardian+</option>
                          <option>Master Guardian Elite+</option>
                          <option>DMG+</option>
                          <option>Legendary Eagle</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Set the region</label>
                        <select class="form-control" name="region" id="region">
                          <option>Any Region</option>
                          <option>North America</option>
                          <option>Europe</option>
                          <option>Australia</option>
                          <option>Asia</option>
                          <option>South America</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Set the type</label>
                        <select class="form-control" name="type" id="type">
                          <option>Legit/Cheat/Rage</option>
                          <option>No Cheaters</option>
                          <option>Allow Cheating</option>
                          <option>Cheating but no rage</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Set the prime type</label>
                        <select class="form-control" name="prime" id="prime">
                          <option>Prime/Non-Prime</option>
                          <option>Prime</option>
                          <option>Non-Prime</option>

                        </select>
                      </div>
                      <b>Note:</b> by submitting to our site, you agree to our <a style="color: #1D384A;" href="#">ToS</a>.
                    </div>
                    <div class="modal-footer" >
                      <button type="submit" onclick="success()" class="btn btn-primary btn-animated" ><i class="material-icons">videogame_asset</i> Submit</button>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </form>

      @foreach($list as $index=>$value)

      @if($value->lobby_type == 2)
      <div class="card lobby"  style=" border-top: 3px solid #2fa360;">
      @else
      <div class="card lobby">
      @endif
        <div class="card-header">
          @if($value->region == "Any Region")
          @elseif($value->region == "North America")
          <span class="flag-icon flag-icon-ca"></span>
          @elseif($value->region == "Europe")
          <span class="flag-icon flag-icon-eu"></span>
          @elseif($value->region == "Australia")
          <span class="flag-icon flag-icon-au"></span>
          @elseif($value->region == "Asia")
          <span class="flag-icon flag-icon-cn"></span>
          @elseif($value->region == "South America")
          <span class="flag-icon flag-icon-br"></span>
          @endif
          CS:GO Match #{{$value->id}}
          <div style="float: right;">

            <div class="dropdown" style="display: initial;">

              <a id="{{$index}}" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="material-icons">more_vert</i></a>
              <div class="dropdown-menu" aria-labelledby="{{$index}}">
                <button class="dropdown-item" style="cursor: pointer;"  type="button" data-toggle="modal" data-target="#tutorial"><i class="material-icons">help</i> Tutorial</button>
                @if($value->lobby_type == 2)
                <a class="dropdown-item" href="{{route('premium')}}"><i class="material-icons">favorite</i> Get Premium</a>
                @endif
              </div>

            </div>


          </div>
        </div>
        <div class="card-body">
          <a style="vertical-align: middle;margin-top: 0.75%;vertical-align: -webkit-baseline-middle;">
            <i class="material-icons" style="color: #2f2f29">info</i>
            {{$value->rank}},
            {{$value->region}},
            {{$value->type}},
            {{$value->Prime}}
          </a>
          <div style="float: right;">
            <a href="{{ route('lobby.join', ['id' => $value->id])}}" ><button data-toggle="tooltip" rel="tooltip" data-placement="top" title="Join CS:GO lobby" class="btn btn-success btn-animated"><i class="material-icons">videogame_asset</i> Join</button></a>
          </div>
        </div>
        <div class="card-footer">
          @if($value->lobby_type == 2)
          <i class="material-icons" data-toggle="tooltip" rel="tooltip" data-placement="top" title="This user has premium">verified_user</i>
          @endif
          <i class="material-icons">timer</i> {{ $value->updated_at->diffForHumans() }} by <a href="{{ $value->owner_url}}" style="color: #1D384A;">
            <b>{{$value->owner_name}}</b>
          </a>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>

<div class="modal fade" id="tutorial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 40%;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="material-icons">help</i>  Tutorial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a>
          <b>Step 1</b> - Retrieve your lobby link from your profile<br>
          <img src="https://i.imgur.com/JJbKfZA.png" style="border-radius: .3rem;width: 100%;margin-top: 2%;margin-bottom: 2%;"/>
          <b>Step 2</b> - Paste the link into the site<br>
          <img src="https://i.imgur.com/QfwS94q.png" style="border-radius: .3rem;width: 100%;margin-top: 2%;margin-bottom: 2%;"/>
          <b>Step 3</b> - Profit<br>
        </a>
      </div>
    </div>
  </div>
</div>

<div id="snackbar"><i class="material-icons">sentiment_satisfied_alt</i> Lobby Posted!</div>
@endsection
