@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <h2>Server info</h2>
      <div class="card">
        <div class="card-header">
          <i class="material-icons">verified_user</i> Software
        </div>
        <div class="card-body">
          <table class="table table-striped-odd " id="myTable">
            <thead class="thead-light">
              <tr>
                <th scope="col">Type</th>
                <th scope="col">Content</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>os</th>
                <td>{{$info['software']['os']}}</td>
              </tr>
              <tr>
                <th>distro</th>
                <td>{{$info['software']['distro']}}</td>
              </tr>
              <tr>
                <th>kernel</th>
                <td>{{$info['software']['kernel']}}</td>
              </tr>
              <tr>
                <th>arc</th>
                <td>{{$info['software']['arc']}}</td>
              </tr>
              <tr>
                <th>webserver</th>
                <td>{{$info['software']['webserver']}}</td>
              </tr>
              <tr>
                <th>php</th>
                <td>{{$info['software']['php']}}</td>
              </tr>
              <tr>
                <th>os</th>
                <td>{{$info['software']['os']}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="card" style="margin-top: 20px;">
        <div class="card-header">
          <i class="material-icons">verified_user</i> Hardware
        </div>
        <div class="card-body">
          <table class="table table-striped-odd " id="myTable">
            <thead class="thead-light">
              <tr>
                <th scope="col">Type</th>
                <th scope="col">Content</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>cpu</th>
                <td>{{$info['hardware']['cpu']}}</td>
              </tr>
              <tr>
                <th>cpu_count</th>
                <td>{{$info['hardware']['cpu_count']}}</td>
              </tr>
              <tr>
                <th>model</th>
                <td>{{$info['hardware']['model']}}</td>
              </tr>
              <tr>
                <th>virtualization</th>
                <td>{{$info['hardware']['virtualization']}}</td>
              </tr>
              <tr>
                <th>ram</th>
                <td>{{$info['hardware']['ram']['free']}} / {{$info['hardware']['ram']['total']}}</td>
              </tr>
              <tr>
                <th>swap</th>
                <td>{{$info['hardware']['swap']['free']}} / {{$info['hardware']['swap']['total']}}</td>
              </tr>
              <tr>
                <th>disk</th>
                <td>{{$info['hardware']['disk']['free']}} / {{$info['hardware']['disk']['total']}}</td>
              </tr>
              <tr>
                <th>uptime</th>
                <td>{{$info['uptime']['uptime']}} | {{$info['uptime']['booted_at']}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>


    </div>
  </div>
</div>
@endsection
