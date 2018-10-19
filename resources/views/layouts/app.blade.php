<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script type="text/javascript">$(window).load(function() {$(".loader").fadeOut("slow"); });</script>
  <script type="text/javascript">$(function () {$("[rel='tooltip']").tooltip();});</script>
  <script>function success() {var x = document.getElementById("snackbar"); x.className = "show"; setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);}</script>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6759404615414239",
    enable_page_level_ads: true
  });
</script>

<!-- Cookies Stuff -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
  window.cookieconsent.initialise({
    "palette": {
      "popup": {
        "background": "#000"
      },
      "button": {
        "background": "#f1d600"
      }
    },
    "content": {
      "href": "www.lobbies.us/policy"
    }
  })});
</script>

<!-- Meta Stuff -->
<meta name="description" content="Find & post lobbies for CS:GO quickly and efficiently. HVH, Legit & More!">
<meta name="keywords" content="lobbies.us, lobbiesus, lobbies, cs:go, csgo, csgo lobbies, cheating, prime, non-prime, csgo match, matches">
<meta name="google-site-verification" content="MqhNxCvPISzs5PFWoXrihZd-ndnUg7H2UHIy1TPQnnM" />

<!-- Fonts -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.css" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
  .lobbies-blue{background-color: #303952;}
  .btn-primary{background-color: #30336b; border-color: #30336b;}
  .btn-danger{background-color: #6b3030; border-color: #6b3030;}
  .btn-success{background-color: #2fa360; border-color: #2fa360;}
  .form-control:focus{box-shadow: 0 0 0 0.2rem #30336b38;}
  .table-striped-odd>tbody>tr:nth-child(even)>td,
  .table-striped-odd>tbody>tr:nth-child(even)>th {background-color: rgba(0,0,0,.05);}
  .table .thead-light th {background-color: #f2f2f2;border-color: #f2f2f2;}
  a{color: #ffff;}
  a:hover{color: #e3e3e3}
  .navbar-toggler-icon{color: #ffff;}
  .material-icons{display: inline-flex;vertical-align: bottom;}
  .card{box-shadow: 0 2px 6px 0 hsla(0, 0%, 0%, 0.2); border: none;}
  .card-header{border-bottom: none; background-color: rgba(242, 243, 244, 0.75);}
  .card-footer{border-top: none; background-color: rgba(242, 243, 244, 0.75);}
  .lobby{margin-top: 15px;}
  .lobby-button{border-color: white;}
  .lobby-form{border: 0px solid #ced4da;}
  .modal-header{border-bottom: 0px;}
  .modal-footer{border-top: 0px;}
  .login-btn{background-color: #414c6b;border-radius: .25rem;transition: all .15s ease-in-out;}
  .login-btn:hover{background-color: #2b3348; transition: all .15s ease-in-out;}
  .dropdown-menu{box-shadow: 0 2px 6px 0 hsla(0, 0%, 0%, 0.2); border: none;}
  .alert-danger{box-shadow: 0 2px 6px 0 rgba(247, 198, 197, 0.2); border-color: none;}
  .list-group-item{box-shadow: 0 2px 6px 0.000001rem hsla(0, 0%, 0%, 0.2); border: 0px;}

  #snackbar {visibility: hidden;min-width: 250px;margin-left: -125px;background-color: #333;color: #fff;text-align: center;border-radius: 2px;padding: 16px;position: fixed;z-index: 1051;left: 50%; bottom: 30px;}
  #snackbar.show {visibility: visible;-webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;animation: fadein 0.5s, fadeout 0.5s 2.5s;}
  @-webkit-keyframes fadein {from {bottom: 0; opacity: 0;}to {bottom: 30px; opacity: 1;}}
  @keyframes fadein {from {bottom: 0; opacity: 0;}to {bottom: 30px; opacity: 1;}}
  @-webkit-keyframes fadeout {from {bottom: 30px; opacity: 1;}to {bottom: 0; opacity: 0;}}
  @keyframes fadeout {from {bottom: 30px; opacity: 1;}to {bottom: 0; opacity: 0;}}

  .loader {position: fixed;left: 0px;top: 0px;width: 100%;height: 73%;z-index: 9999;background: url("") 50% 50% no-repeat white; opacity: 0.3;}

  .btn-animated:hover{box-shadow: 0 8px 11px 0 rgba(0, 0, 0, .15); -webkit-transform: translate(0px, -3px); -ms-transform: translate(0px, -3px); transform: translate(0px, -3px);}
  .btn-animated{transition: all 200ms ease;}
  .table td, .table th {border-top: 0px;}
  .table thead th{border-bottom: 0px;}

</style>


</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand navbar-laravel lobbies-blue ">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          <i class="material-icons">videogame_asset</i> <b>{{ config('app.name', 'Laravel') }} <span class="badge badge-secondary">BETA</span></b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
              <a class="nav-link login-btn" href="{{ route('login') }}"><i class="material-icons">person_add</i> {{ __('Login') }}</a>
            </li>
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <img alt=" " src="{{ Auth::user()->avatar }}" style="width:37px;height:37px;border-radius: 50%; padding: 0px;"> <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                @if(Auth::User()->role_id == 3)
                <a class="dropdown-item" href="{{ route('admin') }}">
                  <i class="material-icons">vertical_split</i> {{ __('Admin') }}
                </a>
                @endif

                <a class="dropdown-item" href="{{ route('more') }}">
                  <i class="material-icons">subject</i> {{ __('More Info') }}
                </a>

                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="material-icons">person_outline</i> {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  <div class="loader"></div>
  <main class="py-4">
    @yield('content')
  </main>
</div>
</body>
</html>
