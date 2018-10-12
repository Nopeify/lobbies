@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-12">
      <h2>Manage Lobbies</h2>
      <div class="card lobby">
        <div class="input-group">
          @guest
          <input onclick="location.href='{{ route('login') }}'" onkeyup="myFunction()" type="text" class="form-control lobby-form" placeholder="Search Lobbies..">
          @else
          <input type="text" class="form-control lobby-form" onkeyup="myFunction()" name="query" id="query" placeholder="Search Lobbies.." required>
          @endguest
        </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px; padding-bottom: 15px;">
      <div class="card">
        <div class="card-header">
          <i class="material-icons">view_list</i>
          <div style="float: right;">
            <div class="dropdown" style="display: initial;">
              <a id="1" style="cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_vert</i></a>
              <div class="dropdown-menu" aria-labelledby="1">
                <form method="POST" action="{{ route('admin.remove_all_lobbies') }}" aria-label="{{ route('admin.remove_all_lobbies') }}">
                  {{ csrf_field() }}
                  <button class="dropdown-item" style="cursor: pointer"  type="submit" ><i class="material-icons">remove_circle_outline</i> Clear All Lobbies</button>
                </form>
              </div>
            </div>

          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped-odd " id="myTable">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Lobby Type</th>
                <th scope="col">Lobby Link</th>
                <th scope="col">Owner</th>
                <th scope="col">Rank</th>
                <th scope="col">Region</th>
                <th scope="col">Type</th>
                <th scope="col">Prime</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($lobbies as $index=>$value)
              <tr>
                <th scope="row">{{ $value->id }}</th>
                <td>{{ $value->type }}</td>
                <td><a style="color: black;" href="{{ $value->lobby_link }}">[ View ]</a></td>
                <td><a style="color: black;" href="{{ route('admin.manage_user', ['id' => $value->owner_id]) }}">[ View ]</a></td>
                <td>{{ $value->rank }}</td>
                <td>{{ $value->region }}</td>
                <td>{{ $value->type }}</td>
                <td>{{ $value->Prime }}</td>
                <td>{{ $value->created_at->diffForHumans() }}</td>
                <td>
                  <form method="POST" action="{{ route('admin.manage_lobbies_delete_lobby', ['id' => $value->id]) }}" aria-label="{{ route('admin.manage_lobbies_delete_lobby', ['id' => $value->id]) }}">
                    {{ csrf_field() }}
                    <button class="btn btn-danger btn-animated" type="submit" ><i class="material-icons">remove</i> Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script defer>
  function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("query");
    filter = input.value.toUpperCase();;
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("th")[0];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>

@endsection
