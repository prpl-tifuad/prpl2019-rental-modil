<?php
	
	define("BASE_URL", "http://localhost/rentalmobil/");
	
	
	$arrayStatusPesanan[0] = "Menunggu Pembayaran";
	$arrayStatusPesanan[1] = "Pembayaran sedang di Validasi";
	$arrayStatusPesanan[2] = "Lunas";
	$arrayStatusPesanan[3] = "Pembayaran di Tolak	";
	
	
	function rupiah($nilai = 0){
		$string = "Rp,". number_format($nilai);  //ini adalah fungsi rupiah untuk menampikan Rp.//
		return $string;
	}
	
	
	function kategori($kategori_id = false){
		global $koneksi;
		$string = "<div id='menu-kategori'>";
	
			$string .="<ul>";
			
					$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
					
					while($row=mysqli_fetch_assoc($query)){
						if($kategori_id == $row['kategori_id']){
					
							$string .="<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
						}else{
							$string .="<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a></li>";
						}
					
					}
		
		$string .= "</ul>";
		$string .= "</div>";
		
		
		return $string;
	}