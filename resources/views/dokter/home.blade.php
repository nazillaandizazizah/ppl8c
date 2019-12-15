@extends('dokter/dashboard')

@section('content')
<br><br><br>
<h1 style="text-align: left; margin: 10px;">Pertanyaan</h1><br>

<button class="tablink" onclick="openPage('Home', this, '#e0cece')">Saya</button>
<button class="tablink" onclick="openPage('News', this, '#cfe3d9')" id="defaultOpen">Umum</button>

<div id="Home" class="tabcontent">
	<div class="cont">
	<img align="center" src="https://funkyimg.com/i/2XSiX.png" style="display: block; margin-right: auto;margin-left: auto; padding-right: 5px;">
	<h1 style="font-size: 20px; color: #73879c">Revio Ariarta</h1>
	<h5 style=" color: #73879c">Berbagi ke : Drh. Ilma Soraya</h5>
	<h5 style=" color: #73879c">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5>
	<span class="time-right">17/10/2019 20.03 PM</span><br>
	<div class="cont" onclick="document.getElementById('id01').style.display='block'">
		<h2 style=" color: #73879c">Tambah Jawaban</h2>
	</div>
</div>

<div class="cont">
	<img align="center" src="https://funkyimg.com/i/2YCR1.png" style="display: block; margin-right: auto;margin-left: auto; padding-right: 5px;">
	<h1 style="font-size: 20px; color: #73879c">Nazilla Andiz Azizah</h1>
	<h5 style=" color: #73879c">Berbagi ke : Drh. Ilma Soraya</h5>
	<h5 style=" color: #73879c">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5>
	<span class="time-right">17/10/2019 20.03 PM</span><br>
	<div class="cont" onclick="document.getElementById('id01').style.display='block'">
		<h2 style=" color: #73879c">Tambah Jawaban</h2>
	</div>
</div>

</div>

<div id="News" class="tabcontent">
	<div class="cont">
	<img align="center" src="https://funkyimg.com/i/2XSiX.png" style="display: block; margin-right: auto;margin-left: auto; padding-right: 5px;">
	<h1 style="font-size: 20px;color: #73879c">Revio Ariarta</h1>
	<h5 style=" color: #73879c">Berbagi ke : Semua</h5>
	<h5 style=" color: #73879c">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5>
	<span class="time-right">17/10/2019 20.03 PM</span><br>
	<div class="cont" onclick="document.getElementById('id01').style.display='block'">
		<h2 style=" color: #73879c">Tambah Jawaban</h2>
	</div>
</div>

<div class="cont">
	<img align="center" src="https://funkyimg.com/i/2YCR1.png" style="display: block; margin-right: auto;margin-left: auto; padding-right: 5px;">
	<h1 style="font-size: 20px;color: #73879c">Nazilla Andiz Azizah</h1>
	<h5 style=" color: #73879c">Berbagi ke : Semua</h5>
	<h5 style=" color: #73879c">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5>
	<span class="time-right">17/10/2019 20.03 PM</span><br>
	<div class="cont" onclick="document.getElementById('id01').style.display='block'">
		<h2 style=" color: #73879c">Tambah Jawaban</h2>
	</div>
</div>
</div>


<div id="id01" class="modal">
	<form class="modal-content animate">
		<div class="konten">
			<label for="pertanyaan"><b>Masukkan Jawaban</b></label>
			<input type="text" placeholder="Jawaban" name="pertanyaan" required><br><br>

			<center>
				<button class="button">Iya</button>
				<button onclick="document.getElementById('id01').style.display='none'" class="button">Batal</button>
			</center>
		</div>
	</form>
</div>

<script>
			function openPage(pageName,elmnt,color) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablink");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].style.backgroundColor = "";
				}
				document.getElementById(pageName).style.display = "block";
				elmnt.style.backgroundColor = color;
			}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

@endsection