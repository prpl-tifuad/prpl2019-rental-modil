<?php
	if($user_id){
		header("location:".BASE_URL);
	}


?>


<div id="container-user-akses">

	<form action="<?php echo BASE_URL."proses_register.php"; ?>" method="POST">
		<?php
			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
			$nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false; /* berfungsi untuk menampilkan data yang di url kan ke dalam form registrasi dengan memberikan value pada form */
			$email = isset($_GET['email']) ? $_GET['email'] : false;	/* berfungsi untuk menampilkan data yang di url kan ke dalam form registrasi dengan memberikan value pada form */
			$phone = isset($_GET['phone']) ? $_GET['phone'] : false;	/* berfungsi untuk menampilkan data yang di url kan ke dalam form registrasi dengan memberikan value pada form */
			$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;	/* berfungsi untuk menampilkan data yang di url kan ke dalam form registrasi dengan memberikan value pada form */
		
			if($notif == "require"){
				echo "<div class='notif'>Maaf, Kamu harus melengkapi form di bawah ini </div>";
			}else if($notif == "password"){
				echo "<div class='notif'>Maaf, Password yang anda masukkan tidak sama</div>";
			}else if($notif == "email"){
				echo "<div class='notif'>Maaf, Email yang anda masukkan sudah terdaftar</div>";
			}
		
		?>
		
		<div class="element-form">
			<label>Nama Lengkap</label>
			<span><input type="text" name="nama_lengkap"  value="<?php echo $nama_lengkap; ?>" /></span>
		</div>
		
		<div class="element-form">
			<label>Email</label>
			<span><input type="text" name="email" value="<?php echo $email; ?>" /></span>
		</div>
		<div class="element-form">
			<label>Nomor Telepon/Handphone</label>
			<span><input type="text" name="phone" value="<?php echo $phone; ?>" /></span>
		</div>
		<div class="element-form">
			<label>Alamat</label>
			<span><textarea name="alamat"><?php echo $alamat; ?></textarea></span>
		</div>
		<div class="element-form">
			<label>Password</label>
			<span><input type="password" name="password" /></span>
		</div>
		<div class="element-form">
			<label>Re-type Password</label>
			<span><input type="password" name="re_password" /></span>
		</div>
		<div class="element-form">
			<span><input type="submit" value="register" /></span>
		</div>		
		
	</form>

</div>