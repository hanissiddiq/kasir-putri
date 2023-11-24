<?php 
session_start();
if(!empty($_SESSION['admin'])){
	require '../../config.php';
	if(!empty($_GET['kategori'])){
		$nama= $_POST['kategori'];
		$tgl= date("j F Y, G:i");
		$data[] = $nama;
		$data[] = $tgl;
		$sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
	}
	if(!empty($_GET['barang'])){
		$id = $_POST['id'];
		$kategori = $_POST['kategori'];
		$nama = $_POST['nama'];
		$merk = $_POST['merk'];
		$beli = $_POST['beli'];
		$jual = $_POST['jual'];
		$satuan = $_POST['satuan'];
		$stok = $_POST['stok'];
		$tgl = $_POST['tgl'];
		
		$data[] = $id;
		$data[] = $kategori;
		$data[] = $nama;
		$data[] = $merk;
		$data[] = $beli;
		$data[] = $jual;
		$data[] = $satuan;
		$data[] = $stok;
		$data[] = $tgl;
		$sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,merk,harga_beli,harga_jual,satuan_barang,stok,tgl_input) 
			    VALUES (?,?,?,?,?,?,?,?,?) ';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
	}
	if(!empty($_GET['jual'])){
		$id = $_GET['id'];
		
		// get tabel barang id_barang 
		$sql = 'SELECT * FROM barang WHERE id_barang = ?';
		$row = $config->prepare($sql);
		$row->execute(array($id));
		$hsl = $row->fetch();

		if($hsl['stok'] > 0)
		{
			$kasir =  $_GET['id_kasir'];
			$jumlah = 1;
			$total = $hsl['harga_jual'];
			$tgl = date("j F Y, G:i");
			
			$data1[] = $id;
			$data1[] = $kasir;
			$data1[] = $jumlah;
			$data1[] = $total;
			$data1[] = $tgl;
			
			$sql1 = 'INSERT INTO penjualan (id_barang,id_member,jumlah,total,tanggal_input) VALUES (?,?,?,?,?)';
			$row1 = $config -> prepare($sql1);
			$row1 -> execute($data1);

			echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';

		}else{
			echo '<script>alert("Stok Barang Anda Telah Habis !");
					window.location="../../index.php?page=jual#keranjang"</script>';
		}
	}

	// start code by Hanis
	if(!empty($_GET['user'])){
		$id = $_POST['id'];
		// $user = $_POST['user'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telepon = $_POST['telepon'];
		$email = $_POST['email'];
		//$gambar = $_POST['gambar'];
		$nik = $_POST['nik'];
		// $role_level = $_POST['level'];
	
		
		$data[] = $id;
		// $data[] = $user;
		$data[] = $nama;
		$data[] = $alamat;
		$data[] = $telepon;
		$data[] = $email;
		//$data[] = $gambar;
		$data[] = $nik;
		// $data[] = $role_level;
		
		// $sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,merk,harga_beli,harga_jual,satuan_barang,stok,tgl_input) 
		// 			VALUES (?,?,?,?,?,?,?,?,?) ';
		// $sql = 'INSERT INTO login ("","",$user,$pass,1,$role_level) VALUES (?,?,?,?,?,?)';
		$sql =  'INSERT INTO member (id_member,id_login,nm_member,alamat_member,telepon,email,gambar,NIK) 
					VALUES (?,?,?,?,?,?,?,?) ';
			$row = $config -> prepare($sql);
			$row -> execute($data);

			// print_r($data);
			// print_r($_FILES);
			// print_r($data);
			// die;

			echo '<script>window.location="../../index.php?page=user&success=tambah-data"</script>';
	}
	// end code by Hanis


	// start code by Hanis
	if(!empty($_GET['gambar'])){
		// $id = htmlentities($_POST['id']);
		set_time_limit(0);
		$allowedImageType = array("image/gif",   "image/JPG",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png"  );
		
		if ($_FILES['foto']["error"] > 0) {
			$output['error']= "Error in File";
		} elseif (!in_array($_FILES['foto']["type"], $allowedImageType)) {
			// echo "You can only upload JPG, PNG and GIF file";
			// echo "<font face='Verdana' size='2' ><BR><BR><BR>
			// 		<a href='../../index.php?page=user'>Back to upform</a><BR>";
			echo '<script>alert("Kamu hanya bisa upload gambar dengan format JPG, PNG dan GIF");window.location="../../index.php?page=user"</script>';
		}elseif (round($_FILES['foto']["size"] / 1024) > 4096) {
			// echo "WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB";
			// echo "<font face='Verdana' size='2' ><BR><BR><BR>
			// 		<a href='../../index.php?page=user'>Back to upform</a><BR>";
			echo '<script>alert("WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB");window.location="../../index.php?page=user"</script>';
		}else{
			$dir = '../../assets/img/user/';
			$tmp_name = $_FILES['foto']['tmp_name'];
			$name = time().basename($_FILES['foto']['name']);
            if(move_uploaded_file($tmp_name, $dir.$name)){
					//post foto lama
				$foto2 = $_POST['foto2'];
				//remove foto di direktori
				unlink('../../assets/img/user/'.$foto2.'');
				//input foto
				//$id = $_POST['id'];
				$data[] = $name;
				//$data[] = $id;
				// $sql = 'UPDATE member SET gambar=?  WHERE member.id_member=?';
				$sql = 'insert into member SET gambar=?';
				$row = $config -> prepare($sql);
				$row -> execute($data);
				echo '<script>window.location="../../index.php?page=user&success=tambah-data"</script>';
			}else{
				echo '<script>alert("Masukan Gambar !");window.location="../../index.php?page=user"</script>';
			}
		}
	}
	// end code by Hanis
}


// untuk session kasir
elseif(!empty($_SESSION['kasir'])){
	require '../../config.php';
	if(!empty($_GET['kategori'])){
		$nama= $_POST['kategori'];
		$tgl= date("j F Y, G:i");
		$data[] = $nama;
		$data[] = $tgl;
		$sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
	}
	if(!empty($_GET['barang'])){
		$id = $_POST['id'];
		$kategori = $_POST['kategori'];
		$nama = $_POST['nama'];
		$merk = $_POST['merk'];
		$beli = $_POST['beli'];
		$jual = $_POST['jual'];
		$satuan = $_POST['satuan'];
		$stok = $_POST['stok'];
		$tgl = $_POST['tgl'];
		
		$data[] = $id;
		$data[] = $kategori;
		$data[] = $nama;
		$data[] = $merk;
		$data[] = $beli;
		$data[] = $jual;
		$data[] = $satuan;
		$data[] = $stok;
		$data[] = $tgl;
		$sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,merk,harga_beli,harga_jual,satuan_barang,stok,tgl_input) 
			    VALUES (?,?,?,?,?,?,?,?,?) ';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
	}
	if(!empty($_GET['jual'])){
		$id = $_GET['id'];
		
		// get tabel barang id_barang 
		$sql = 'SELECT * FROM barang WHERE id_barang = ?';
		$row = $config->prepare($sql);
		$row->execute(array($id));
		$hsl = $row->fetch();

		if($hsl['stok'] > 0)
		{
			$kasir =  $_GET['id_kasir'];
			$jumlah = 1;
			$total = $hsl['harga_jual'];
			$tgl = date("j F Y, G:i");
			
			$data1[] = $id;
			$data1[] = $kasir;
			$data1[] = $jumlah;
			$data1[] = $total;
			$data1[] = $tgl;
			
			$sql1 = 'INSERT INTO penjualan (id_barang,id_member,jumlah,total,tanggal_input) VALUES (?,?,?,?,?)';
			$row1 = $config -> prepare($sql1);
			$row1 -> execute($data1);

			echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';

		}else{
			echo '<script>alert("Stok Barang Anda Telah Habis !");
					window.location="../../index.php?page=jual#keranjang"</script>';
		}
	}

	// start code by Hanis
	if(!empty($_GET['user'])){
		$id = $_POST['id'];
		// $user = $_POST['user'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$telepon = $_POST['telepon'];
		$email = $_POST['email'];
		//$gambar = $_POST['gambar'];
		$nik = $_POST['nik'];
		// $role_level = $_POST['level'];
	
		
		$data[] = $id;
		// $data[] = $user;
		$data[] = $nama;
		$data[] = $alamat;
		$data[] = $telepon;
		$data[] = $email;
		//$data[] = $gambar;
		$data[] = $nik;
		// $data[] = $role_level;
		
		// $sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,merk,harga_beli,harga_jual,satuan_barang,stok,tgl_input) 
		// 			VALUES (?,?,?,?,?,?,?,?,?) ';
		// $sql = 'INSERT INTO login ("","",$user,$pass,1,$role_level) VALUES (?,?,?,?,?,?)';
		$sql =  'INSERT INTO member (id_member,id_login,nm_member,alamat_member,telepon,email,gambar,NIK) 
					VALUES (?,?,?,?,?,?,?,?) ';
			$row = $config -> prepare($sql);
			$row -> execute($data);

			// print_r($data);
			// print_r($_FILES);
			// print_r($data);
			// die;

			echo '<script>window.location="../../index.php?page=user&success=tambah-data"</script>';
	}
	// end code by Hanis


	// start code by Hanis
	if(!empty($_GET['gambar'])){
		// $id = htmlentities($_POST['id']);
		set_time_limit(0);
		$allowedImageType = array("image/gif",   "image/JPG",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png"  );
		
		if ($_FILES['foto']["error"] > 0) {
			$output['error']= "Error in File";
		} elseif (!in_array($_FILES['foto']["type"], $allowedImageType)) {
			// echo "You can only upload JPG, PNG and GIF file";
			// echo "<font face='Verdana' size='2' ><BR><BR><BR>
			// 		<a href='../../index.php?page=user'>Back to upform</a><BR>";
			echo '<script>alert("Kamu hanya bisa upload gambar dengan format JPG, PNG dan GIF");window.location="../../index.php?page=user"</script>';
		}elseif (round($_FILES['foto']["size"] / 1024) > 4096) {
			// echo "WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB";
			// echo "<font face='Verdana' size='2' ><BR><BR><BR>
			// 		<a href='../../index.php?page=user'>Back to upform</a><BR>";
			echo '<script>alert("WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB");window.location="../../index.php?page=user"</script>';
		}else{
			$dir = '../../assets/img/user/';
			$tmp_name = $_FILES['foto']['tmp_name'];
			$name = time().basename($_FILES['foto']['name']);
            if(move_uploaded_file($tmp_name, $dir.$name)){
					//post foto lama
				$foto2 = $_POST['foto2'];
				//remove foto di direktori
				unlink('../../assets/img/user/'.$foto2.'');
				//input foto
				//$id = $_POST['id'];
				$data[] = $name;
				//$data[] = $id;
				// $sql = 'UPDATE member SET gambar=?  WHERE member.id_member=?';
				$sql = 'insert into member SET gambar=?';
				$row = $config -> prepare($sql);
				$row -> execute($data);
				echo '<script>window.location="../../index.php?page=user&success=tambah-data"</script>';
			}else{
				echo '<script>alert("Masukan Gambar !");window.location="../../index.php?page=user"</script>';
			}
		}
	}
	// end code by Hanis
}