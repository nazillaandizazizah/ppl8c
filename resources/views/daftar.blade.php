<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="initial-scale=1, minimum-scale=1, maximum-scale=5, width=device-width" />
	<link rel="stylesheet" href="https://www.bareksa.com/themes/bareksa/assets/css/login.css">
	<link rel="stylesheet" href="https://www.bareksa.com/themes/bareksa/assets/css/grid.css">
	<link rel="icon" href="https://funkyimg.com/i/2XPkm.png">
	<title>Register | Tersekuy</title>
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
						<div class="login-form__greeting">Silahkan daftar:)</div>

						<!-- FORM -->
						<form id="login-form">
<!-- 
<input type="hidden" name="id"> -->
							<!-- FOTO PROFIL -->
							<div>
								<img
								src="https://funkyimg.com/i/2YCQ5.png"/>
								<input name="foto" class="login-from__input" aria-label="foto" placeholder="Foto" type=file required style="padding-top: 10px;" />
							</div>

							<!-- NAMA -->
							<div>
								<img
								src="https://funkyimg.com/i/2XPoo.png"/>
								<input name="nama" class="login-from__input" aria-label="nama" placeholder="Nama" type=text required />
							</div>

							<!-- ALAMAT -->
							<div>
								<img
								src="https://funkyimg.com/i/2XPop.png"/>
								<input name="alamat" class="login-from__input" aria-label="alamat" placeholder="Alamat" type=text required />
							</div>

							<!-- NOMOR HP -->
							<div>
								<img
								src="https://funkyimg.com/i/2YDQZ.png"/>
								<input name="nomorhp" class="login-from__input" aria-label="nomorhp" placeholder="Nomor HP" type=text required />
							</div>

							<!-- BANK -->
							<div>
								<img
								src="https://funkyimg.com/i/2YCP3.png"/>
								<input name="bank" class="login-from__input" aria-label="bank" placeholder="Bank" type=text required />
							</div>

							<!-- NOMOR REKENING -->
							<div>
								<img
								src="https://funkyimg.com/i/2YCP2.png"/>
								<input name="nomorrekening" class="login-from__input" aria-label="nomorrekening" placeholder="Nomor Rekening" type=number required />
							</div>

							<!-- EMAIL -->
							<div>
								<img
								src="https://funkyimg.com/i/2XPoq.png"/>
								<input name="email" class="login-from__input" aria-label="email" placeholder="Email" type=email required />
							</div>

							<!-- PASSWORD -->
							<div>
								<img
								src="https://funkyimg.com/i/2XPpB.png"/>
								<input name="password" class="login-from__input" aria-label="Kata Sandi" placeholder="Kata Sandi" type="password" required />
							</div>

							<div class="loader-login" style="display: none"></div>

							<!-- BUTTON DAFTAR -->
							<button id="register-btn" type="submit"> Daftar </button>

							<!-- SUDAH PUNYA AKUN -->
							<p class="login-subfooter">
								Sudah menjadi member Tersekuy? Silahkan
								<a href="http://localhost:8000/login">
									Login
								</a>.
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>