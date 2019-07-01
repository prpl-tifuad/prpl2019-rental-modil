<?php

	include_once("../../function/koneksi.php");
	include_once("../../function/helper.php");
 
	$nama_barang = $_POST['nama_barang'];
	$kategori_id = $_POST['kategori_id'];
	$spesifikasi = $_POST['$spesifikasi'];
	$status = $_POST['status'];
	$button = $_POST['button'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$update_gambar ="";
	
	if(!empty($_FILES["file"] ["name"])){ //fungsi ini melihat apakah varible $file itu tidak kosong, jika tidak kosong maka lagsung di upload//
		$nama_file = $_FILES["file"]["name"];
		move_uploaded_file($_FILES["file"]["tmp_name"],"../../images/barang/".$nama_file); //adalah script dasar untuk mengupload sebuah file ke dalam seerver//
		
		$update_gambar = ", gambar='$nama_file'"; //ini hanya di pakai pada saat proses update//
		
	}
	
	
	
	
	
	if($button == "Add"){
		mysqli_query($koneksi, "INSERT INTO barang (nama_barang, spesifikasi,kategori_id, gambar, harga, stok, status) 
											VALUES ('$nama_barang','$spesifikasi','$kategori_id','$nama_file','$harga','$stok','$status')"); //gambar harus menggunakan $nama_file//
	}else if($button == "Update"){
		$barang_id = $_GET['barang_id']; 
		mysqli_query($koneksi, "UPDATE barang SET kategori_id ='$kategori_id',
								nama_barang ='$nama_barang',
								spesifikasi ='$spesifikasi',
								harga ='$harga',
								stok ='$stok',
								status='$status' 
								$update_gambar WHERE barang_id='$barang_id'");
	
	}
  
	
 
	header("location:".BASE_URL."index.php?page=my_profile&module=barang&action=list");
?>