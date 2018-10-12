@extends('layouts.app')

@section('content')

<script type="text/javascript" defer>
  window.onload = function() {
    new Chart(document.getElementById("chartjs-0"), {
      "type": "line",
      "data": {
        "labels": [
        @foreach($users_total as $index=>$value)
        "{{$value->created_at}}",
        @endforeach
      ],
        "datasets": [{
          "label": "User",
          "data": [
            @foreach($users_total as $index=>$value)
            {{$value->id}},
            @endforeach
          ],
          "fill": true,
          "borderColor": "#2753ce",
          "lineTension": 0.3
        }]
      },
      "options": {
        legend: {
          display: false
        },
      }
    });

    new Chart(document.getElementById("chartjs-1"), {
      "type": "line",
      "data": {
        "labels": [
          @foreach($lobbies_total as $index=>$value)
          "{{$value->created_at}}",
          @endforeach
        ],
        "datasets": [{
          "label": "Lobby",
          "data": [
            @foreach($lobbies_total as $index=>$value)
            {{$value->id}},
            @endforeach
          ],
          "fill": true,
          "borderColor": "#2753ce",
          "lineTension": 0.3
        }]
      },
      "options": {
        legend: {
          display: false
        },
      }
    });

    new Chart(document.getElementById("chartjs-2"), {
      "type": "line",
      "data": {
        "labels": [
          @foreach($lobbies_clicked_total as $index=>$value)
          "{{$value->created_at}}",
          @endforeach
        ],
        "datasets": [{
          "label": "Lobby",
          "data": [
            @foreach($lobbies_clicked_total as $index=>$value)
            {{$value->id}},
            @endforeach
          ],
          "fill": true,
          "borderColor": "#2753ce",
          "lineTension": 0.3
        }]
      },
      "options": {
        legend: {
          display: false
        },
      }
    });
  }
</script>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <h3><b><i class="material-icons">equalizer</i> Dashboard</b></h3>
          {{ date('l jS F Y') }}
          <br><br>
        </div>
        <!-- <div class="col-md-2">
        <h1 onclick="window.location.href='http://www.google.co.uk'" style="cursor: pointer;" align="right"><b><i style="font-size: 35px;" class="material-icons btn-animated">apps</i></b></h1>
      </div> -->
    </div>
  </div>

  <div class="col-md-4">
    <div class="card" style=" border-top: 3px solid #2753ce;">
      <div class="card-body" style="display: flex;">
        <i class="material-icons" style="color: #2753ce; font-size: 70px;">face</i>
        <a><span style="font-size: 20px;opacity: 0.7;">Users</span><br>
          <span style="font-size: 25px;font-weight:bold;">{{ $users_total_count }}</span></a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card" style=" border-top: 3px solid #2753ce;">
        <div class="card-body" style="display: flex;">
          <i class="material-icons" style="color: #2753ce; font-size: 70px;">touch_app</i>
          <a><span style="font-size: 20px;opacity: 0.7;">Clicks</span><br>
            <span style="font-size: 25px;font-weight:bold;">{{ $lobbies_clicked_total_count }}</span></a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card" style=" border-top: 3px solid #2753ce;">
          <div class="card-body" style="display: flex;">
            <i class="material-icons" style="color: #2753ce; font-size: 70px;">view_list</i>
            <a><span style="font-size: 20px;opacity: 0.7;">Lobbies</span><br>
              <span style="font-size: 25px;font-weight:bold;">{{ $lobbies_total_count }}</span></a>
            </div>
          </div>
        </div>


        <div class="col-md-12" style="padding-top: 20px; padding-bottom: 15px;">
          <div class="card">
            <div class="card-header"><i class="material-icons">apps</i> Actions</div>
            <div class="card-body">
              <div class="row justify-content-center">

                <div class="col-md-4" style="margin-top: 15px; ">
                  <div class="card" onclick="location.href='{{ route('admin.manage_users') }}'"style="border-top: 3px solid #2753ce;align-content: center;text-align: center;align-items: center;cursor: pointer;">
                    <div class="card-body" style="display: flex;align-items: center; text-align: center; ">
                      <i class="material-icons" style="color: #2753ce; font-size: 70px;">face</i>
                      <a><span style="font-size: 25px;font-weight:bold;">Users</span></a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4" style="margin-top: 15px;">
                  <div class="card" onclick="location.href='{{ route('admin.manage_lobbies') }}'" style="border-top: 3px solid #2753ce;align-content: center;text-align: center;align-items: center;cursor: pointer;">
                    <div class="card-body" style="display: flex;align-items: center; text-align: center; ">
                      <i class="material-icons" style="color: #2753ce; font-size: 70px;">view_list</i>
                      <a><span style="font-size: 25px;font-weight:bold;">Lobbies</span></a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4" style="margin-top: 15px;">
                  <div class="card" onclick="location.href='{{ route('settings.view') }}'" style="border-top: 3px solid #2753ce;align-content: center;text-align: center;align-items: center;cursor: pointer;">
                    <div class="card-body" style="display: flex;align-items: center; text-align: center; ">
                      <i class="material-icons" style="color: #2753ce; font-size: 70px;">settings</i>
                      <a><span style="font-size: 25px;font-weight:bold;">Settings</span></a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4" style="margin-top: 15px;">
                  <div class="card" onclick="location.href='{{ route('codes.view') }}'" style="border-top: 3px solid #2753ce;align-content: center;text-align: center;align-items: center;cursor: pointer;">
                    <div class="card-body" style="display: flex;align-items: center; text-align: center; ">
                      <i class="material-icons" style="color: #2753ce; font-size: 70px;">local_activity</i>
                      <a><span style="font-size: 25px;font-weight:bold;">Codes</span></a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4" style="margin-top: 15px;">
                  <div class="card" onclick="location.href='{{ route('activities.view') }}'" style="border-top: 3px solid #2753ce;align-content: center;text-align: center;align-items: center;cursor: pointer;">
                    <div class="card-body" style="display: flex;align-items: center; text-align: center; ">
                      <i class="material-icons" style="color: #2753ce; font-size: 70px;">layers</i>
                      <a><span style="font-size: 25px;font-weight:bold;">Activities</span></a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4" style="margin-top: 15px;">
                  <div class="card" onclick="location.href='{{ route('admin.server') }}'" style="border-top: 3px solid #2753ce;align-content: center;text-align: center;align-items: center;cursor: pointer;">
                    <div class="card-body" style="display: flex;align-items: center; text-align: center; ">
                      <i class="material-icons" style="color: #2753ce; font-size: 70px;">storage</i>
                      <a><span style="font-size: 25px;font-weight:bold;">Server</span></a>
                    </div>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12" style="padding-top: 15px; padding-bottom: 15px;">
          <div class="card">
            <div class="card-header"><i class="material-icons">view_list</i> User Leaderboard</div>
            <div class="card-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Role #</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Name</th>
                    <th scope="col">SteamID</th>
                    <th scope="col">Lobbies</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users_leaderboard as $index=>$value)
                  <tr>
                    <th scope="row">{{ $value->id }}</th>
                    <td>{{ $value->role_id }}</td>
                    <td><img alt=" " src="{{ $value->avatar}}" style="width:37px;height:37px;border-radius: 50%; padding: 0px;"></td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->steamid}}</td>
                    <td>{{$value->lobbies}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-12" style="padding-top: 15px; padding-bottom: 15px;">
          <div class="card">
            <div class="card-header"><i class="material-icons">timeline</i> Login / Users Graph</div>
            <div class="card-body">

              <canvas id="chartjs-0" width="1000" height="400"></canvas>
              <div class="row justify-content-center">

                <div class="col-md-4" style="margin-top: 15px; ">
                  <div class="card" style="border-top: 3px solid #2753ce;align-content: center;text-align: center;align-items: center;cursor: pointer;">
                    <div class="card-body" style="display: block;align-items: center; text-align: center; ">
                      <a><span style="font-size: 15px;font-weight:bold;">Today<br><a style="font-size: 25px">{{ $users_today }}</a></span></a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4" style="margin-top: 15px; ">
                  <div class="card" style="border-top: 3px solid #2753ce;align-content: center;text-align: center;align-items: center;cursor: pointer;">
                    <div class="card-body" style="display: block;align-items: center; text-align: center; ">
                      <a><span style="font-size: 15px;font-weight:bold;">This Week<br><a style="font-size: 25px">{{ $users_week }}</a></span></a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4" style="margin-top: 15px; ">
                  <div class="card" style="border-top: 3px solid #2753ce;align-content: center;text-align: center;align-items: center;cursor: pointer;">
                    <div class="card-body" style="display: block;align-items: center; text-align: center; ">
                      <a><span style="font-size: 15px;font-weight:bold;">This Month<br><a style="font-size: 25px">{{ $users_month }}</a></span></a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="col-md-12" style="padding-top: 15px; padding-bottom: 15px;">
          <div class="card">
            <div class="card-header"><i class="material-icons">timeline</i> Lobbies Made Graph</div>
            <div class="card-body">

              <canvas id="chartjs-1" width="1000" height="400"></canvas>
              <div class="row justify-content-center">

                <div class="col-md-4" style="margin-top: 15px; ">
                  <div class="card" style="border-top: 3px solid #2753ce;align-content: center;text-align: center;align-items: center;cursor: pointer;">
                    <div class="card-body" style="display: block;align-items: center; text-align: center; ">
                      <a><span style="font-size: 15px;font-weight:bold;">Today<br><a style="font-size: 25px">{{$lobbies_made_today}}</a></span></a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4" style="margin-top: 15px; ">
                  <div class="card" style="border-top: 3px solid #2753ce;align-content: center;text-align: center;align-items: center;cursor: pointer;">
                    <div class="card-body" style="display: block;align-items: center; text-align: center; ">
                      <a><span style="font-size: 15px;font-weight:bold;">This Week<br><a style="font-size: 25px">{{$lobbies_made_week}}</a></span></a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4" style="margin-top: 15px; ">
                  <div class="card" style="border-top: 3px solid #2753ce;align-content: center;text-align: center;align-items: center;cursor: pointer;">
                    <div class="card-body" style="display: block;align-items: center; text-align: center; ">
                      <a><span style="font-size: 15px;font-weight:bold;">This Month<br><a style="font-size: 25px">{{$lobbies_made_month}}</a></span></a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="col-md-12" style="padding-top: 15px; padding-bottom: 15px;">
          <div class="card">
            <div class="card-header"><i class="material-icons">timeline</i> Lobby Clicks Graph</div>
            <div class="card-body">

              <canvas id="chartjs-2" width="1000" height="400"></canvas>
              <div class="row justify-content-center">

                <div class="col-md-4" style="margin-top: 15px; ">
                  <div class="card" style="border-top: 3px solid #2753ce;align-content: center;text-align: center;align-items: center;cursor: pointer;">
                    <div class="card-body" style="display: block;align-items: center; text-align: center; ">
                      <a><span style="font-size: 15px;font-weight:bold;">Today<br><a style="font-size: 25px">{{ $lobbies_clicked_today }}</a></span></a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4" style="margin-top: 15px; ">
                  <div class="card" style="border-top: 3px solid #2753ce;align-content: center;text-align: center;align-items: center;cursor: pointer;">
                    <div class="card-body" style="display: block;align-items: center; text-align: center; ">
                      <a><span style="font-size: 15px;font-weight:bold;">This Week<br><a style="font-size: 25px">{{ $lobbies_clicked_week }}</a></span></a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4" style="margin-top: 15px; ">
                  <div class="card" style="border-top: 3px solid #2753ce;align-content: center;text-align: center;align-items: center;cursor: pointer;">
                    <div class="card-body" style="display: block;align-items: center; text-align: center; ">
                      <a><span style="font-size: 15px;font-weight:bold;">This Month<br><a style="font-size: 25px">{{ $lobbies_clicked_month }}</a></span></a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>



      </div>
    </div>
    @endsection
