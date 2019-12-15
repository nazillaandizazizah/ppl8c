<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="initial-scale=1, minimum-scale=1, maximum-scale=5, width=device-width" />
	<link rel="stylesheet" href="https://www.bareksa.com/themes/bareksa/assets/css/login.css">
	<link rel="stylesheet" href="https://www.bareksa.com/themes/bareksa/assets/css/grid.css">
	<link rel="icon" href="https://funkyimg.com/i/2XPkm.png">
	<title>Login | Tersekuy</title>
</head>

<body>
		<div class="bg-login">
			<div class="login-box">

<!-- JUDUL -->
				<div class="login-header">
					<p style="font-size: 27px; color: #333333;"><b>Tersekuy (Ternak Sehat Kuy)</b></p>
				</div>
				<div class="b-r">
					<div class="row">

<!-- GAMBAR SAMPING -->						
						<div class="col span-1-of-2">
							<div class="login-illustration">
								<img
								src="https://images.bareksa.com/bareksa/img/illustrations/bareksa-login-anim.svg"
								alt="Login Illustration"/>
							</div>
						</div>

<!-- UCAPAN PEMBUKA -->						
						<div class="col span-1-of-2 login-form">
							<div class="login-form__greeting">Selamat Datang, <br/> Silakan Masuk :)</div>

<!-- FORM -->
							<form id="login-form">

<!-- EMAIL -->
							<div>
								<img
								src="https://funkyimg.com/i/2XPoq.png"/>
								<input name="email" class="login-from__input" aria-label="email" placeholder="Email" type=email required />
							</div>

<!-- PASSWORD -->
								<div>
									<img
									src="https://funkyimg.com/i/2XPpB.png"
									alt="Icon Password"/>
									<input name="password" class="login-from__input" aria-label="Kata Sandi" placeholder="Kata Sandi" type="password" id="myInput"required />
								</div>
								<div class="loader-login" style="display: none"></div>
								<p><input type="checkbox" onclick="myFunction()">Show Password</p>

<!-- BUTTON MASUK -->
								<a href="http://localhost:8000/admin/verifikasi"><button id="login-btn" type="submit"> Masuk </button></a>


<!-- LUPA PASSWORD -->
				<p class="login-footer" style="text-align: right; padding-right: 7%;">
					Tidak dapat masuk?
					<a href="http://localhost:8000/admin/lupapassword">
					Lupa kata sandi?
				</a>
			</p>
		</div>
		<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>