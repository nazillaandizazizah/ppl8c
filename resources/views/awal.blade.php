<!DOCTYPE html>
<html>
<title>Tersekuy</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="icon" href="https://funkyimg.com/i/2XPkm.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://sipos.miqdad.codes/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
  body, html {
    height: 100%;
    color: #777;
    line-height: 1.8;
  }
  /*HOME*/
  
  
  .cont {
    border: 1px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
  }
  .cont::after {
    content: "";
    clear: both;
    display: table;
  }
  
  .cont img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
  }
  
  .cont img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
  }
  
  .time-right {
    float: right;
    color: #aaa;
  }
  
  .time-left {
    float: left;
    color: #999;
  }
  .tile-stats:hover{
    box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)}
    
    
    /* Create a Parallax Effect */
    .bgimg-1, .bgimg-2, .bgimg-3 {
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
    
    /* First image (Logo. Full height) */
    .bgimg-1 {
      background-image: url(https://funkyimg.com/i/2YFrx.jpg);
      min-height: 100%;
    }
    
    
    /* Third image (Contact) */
    .bgimg-3 {
      background-image: url("/w3images/parallax3.jpg");
      min-height: 400px;
    }
    
    .w3-wide {letter-spacing: 10px;}
    .w3-hover-opacity {cursor: pointer;}
    
    /* Turn off parallax scrolling for tablets and phones */
    @media only screen and (max-device-width: 1600px) {
      .bgimg-1, .bgimg-2, .bgimg-3 {
        background-attachment: scroll;
        min-height: 400px;
      }
    }
  </style>
  <body>
    
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
      <div class="w3-bar" id="myNavbar" >
        <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
          <i class="fa fa-bars"></i>
        </a>
        <a href="#home" class="w3-bar-item w3-button w3-hide-small" style="color: black"><i class=" fa fa-home"></i><b>  HOME</b></a>
        <a href="#about" class="w3-bar-item w3-button w3-hide-small" style="color: black"><i class=" fa fa-stethoscope"></i><b>  DOKTER</b></a>
        <a href="#portfolio" class="w3-bar-item w3-button w3-hide-small" style="color: black"><i class="fa fa-newspaper-o"></i><b>  ARTIKEL</b></a>
        <a href="#contact" class="w3-bar-item w3-button w3-hide-small" style="color: black"><i class="fa fa-envelope"></i><b>  PAKET</b></a>
        
        @guest
        
        <a href="{{route('login')}}" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red" style="color: black">
          <i class="fa fa-sign-in"></i>
        </a>
        
        @else 
        
        <a class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        
        <i class="fa fa-sign-out"></i>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </a>
      <a href="{{url('/home')}}" class="w3-bar-item w3-button w3-hide-small" style="color: black">
        DAHSBOARD
      </a>
      
    </a>
    
    
    @endguest
  </div>
  
  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="#about" class="w3-bar-item w3-button" onclick="toggleFunction()">DOKTER</a>
    <a href="#portfolio" class="w3-bar-item w3-button" onclick="toggleFunction()">ARTIKEL</a>
    <a href="#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">PAKET</a>
    <a href="{{route('login')}}" class="w3-bar-item w3-box">LOGIN</a>
  </div>
</div>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
</div>


<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="about">
  <h3 class="w3-center">DOKTER HEWAN</h3><hr style="border : 0; box-shadow: 0 10px 10px -10px #8c8c8c inset; height: 10px;"><br> <br>  
  <div class="row">
    <div class="col-md-12">
      <div class="row top_tiles">
        
        @php
        $role = \DB::table('role_user')->where('role_id', 2)->get()->all();
        // dd($role);
        @endphp
        @foreach ($role as $item)
        {{-- @dd($item) --}}
        @php
        $users = \DB::table('users')->where('id', $item->user_id)->get()->all();
        @endphp
        @foreach ($users as $dokter)

        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats" align="center">
            <img src="{{asset('storage/'. $dokter->avatar)}}" style="width: 170px; padding: 10px; border-radius: 50%;">
            <h3>{{$dokter->name}}</h3>
            <p>{{$dokter->lulusan}}, {{date('Y', strtotime($dokter->tahunLulus))}}</p>
            <h5>{{\DB::table('cities')->where('city_id', $dokter->city)->value('title')}}, {{\DB::table('provinces')->where('province_id', $dokter->province)->value('title')}}</h5>
          </div>
        </div>
        
        @endforeach
        @endforeach
      </div>
    </div>
  </div>
  
  
  
  @php
  $data = \DB::table('artikels')->get()->all();
  // dd($data);
  @endphp
  <!-- Container (Portfolio Section) -->
  <div class="w3-content w3-container w3-padding-64" id="portfolio">
    <h3 class="w3-center">ARTIKEL</h3><hr style="border : 0; box-shadow: 0 10px 10px -10px #8c8c8c inset; height: 10px;"><br>  <br>  
    @foreach ($data as $item)
    
    <div class="cont">
      <img src="{{asset('storage/'. \DB::table('users')->where('id', $item->dokter_id)->value('avatar'))}}" alt="Avatar" style="width:100%;"><br>
      <h3>{{\DB::table('users')->where('id', $item->dokter_id)->value('name')}}</h3>
      <br><h3><b>{{$item->judul_artikel}}</b></h3>
      <p>{{$item->isi_artikel}}</p>
      <span class="time-right">{{$item->created_at}}</span>
    </div>
    @endforeach
  </div>
  
  
  @php
  $paket = \DB::table('pakets')->get()->all();
  @endphp
  <!-- Container (Contact Section) -->
  <div class="w3-content w3-container w3-padding-64" id="contact">
    <h3 class="w3-center">PAKET</h3><hr style="border : 0; box-shadow: 0 10px 10px -10px #8c8c8c inset; height: 10px;"><br>  <br>  
    
    @foreach ($paket as $item)
    
    
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="tile-stats" align="center">
        <img src="{{asset('storage/'. $item->icon_paket)}}" style="width: 170px; padding: 10px; border-radius: 50%;">
        <h2>{{$item->nama_paket}}</h2>
        <h5>{{$item->lama_paket}} Bulan</h5>
        <h5>Rp {{number_format($item->harga_paket)}}</h5><br>
      </div>
    </div>
    
    
    @endforeach
  </div>
  <footer>
    <div class="pull-right">
      Tersekuy Team :)
    </div>
    <div class="clearfix"></div>
  </footer>
  
  
  <script>
    // Modal Image Gallery
    function onClick(element) {
      document.getElementById("img01").src = element.src;
      document.getElementById("modal01").style.display = "block";
      var captionText = document.getElementById("caption");
      captionText.innerHTML = element.alt;
    }
    
    // Change style of navbar on scroll
    window.onscroll = function() {myFunction()};
    function myFunction() {
      var navbar = document.getElementById("myNavbar");
      if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
      } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
      }
    }
    
    // Used to toggle the menu on small screens when clicking on the menu button
    function toggleFunction() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else {
        x.className = x.className.replace(" w3-show", "");
      }
    }
  </script>
  
</body>
</html>
