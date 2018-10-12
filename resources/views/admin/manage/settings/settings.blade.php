@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-12">
      <h2>Site Settings</h2>
      <div class="card lobby">
        <div class="input-group">
          @guest
          <input onclick="location.href='{{ route('login') }}'" onkeyup="myFunction()" type="text" class="form-control lobby-form" placeholder="Search Variables..">
          @else
          <input type="text" class="form-control lobby-form" onkeyup="myFunction()" name="query" id="query" placeholder="Search Variables.." required>
          @endguest
        </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px; padding-bottom: 15px;">
      <div class="card">
        <div class="card-header">
          <i class="material-icons">view_list</i>
          <div style="float: right;">
            <a class="btn btn-primary btn-animated" href="{{ route('settings.create') }}"><i class="material-icons">edit</i> Make New Variable</a>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped-odd " id="myTable">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">For</th>
                <th scope="col">content</th>
                <th scope="col">date</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($list as $index=>$value)
              <tr>
                <th scope="row">{{ $value->id }}</th>
                <td>{{ $value->for }}</td>
                <td>{{ $value->content }}</td>
                <td>{{ $value->created_at->diffForHumans() }}</td>
                <td><a class="btn btn-primary btn-animated" href="{{ route('settings.edit', ['id' => $value->id]) }}"><i class="material-icons">edit</i> Edit</a></td>
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
      td = tr[i].getElementsByTagName("td")[0];
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
