<?php

	include_once("function/koneksi.php");
	include_once("function/helper.php");
	
	$level = "customer";
	$status = "on";
	$nama_lengkap = $_POST['nama_lengkap'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$alamat = $_POST['alamat'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];
		
	unset($_POST['password']); /* ini berfungsi untuk menghancurkan password dan re_password agar tidak tampil dalam url*/
	unset($_POST['re_password']);	
	$dataForm = http_build_query($_POST);	/*ini berfungsi untuk menampung inputan yg di masukkan pada saat registrasi tidak hilang tapi di jadikan url */
		
		
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email= '$email'"); /*berfungsi melihat inputan email user yang di regitrasi apakah sudah ada dalam database, jika ada maka akan di kembalikan ke register dan akan mendapatkan notifikasi*/	
		
		
	if(empty($nama_lengkap) || empty($email) || empty($phone) ||empty($alamat) ||empty($password)){ /*Berfungsi unutk mengecek apakah pada saat registrasi apakah masih ada kolom yang kosong/belum di isi*/
		header("location: ".BASE_URL."index.php?page=register&notif=require&$dataForm"); 
	}else if($password != $re_password){
		header("location: ".BASE_URL."index.php?page=register&notif=password&$dataForm"); /* berfungsi untuk melihat apakah password dengan re_password tidak sama, jika betul tidak sama maka akan di kembalikan ke register*/
	}else if(mysqli_num_rows($query) == 1){ /*menghitung data email lalu mengecek email apakah bernilai 1 yang artinya email sudah pernah di daftarkan jika sudah maka action di bawah*/
		header("location: ".BASE_URL."index.php?page=register&notif=email&$dataForm");
	}else{
		$password = md5($password);/*enkripsi password dalam database*/
		mysqli_query($koneksi, "INSERT INTO user (level, nama, email, alamat, phone, password, status)
										VALUES ('$level', '$nama_lengkap', '$email', '$alamat', '$phone', '$password', '$status')");												
		header("location: ".BASE_URL."index.php?page=login");
	}