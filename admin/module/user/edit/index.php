 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
<?php 
	$id = $_GET['user'];
	$hasil = $lihat -> user_edit($id);
	// $hasil = $lihat -> user();

	
?>
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
					  	<a href="index.php?page=user"><button class="btn btn-primary"><i class="fa fa-angle-left"></i> Balik </button></a>
						<h3>Edit Data User</h3>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Edit Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div>
						<?php }?>
						<table class="table table-striped">
							<form action="fungsi/edit/edit.php?user=edit" method="POST">
								<tr>
									<td>ID User</td>
									<td><input type="text" readonly="readonly" class="form-control" value="<?php echo $hasil['id_member'];?>" name="id"></td>
								</tr>
									<td>Nama</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['nm_member'];?>" name="nama"></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['alamat_member'];?>" name="alamat"></td>
								</tr>
								<tr>
									<td>Telepon</td>
									<td><input type="number" class="form-control" value="<?php echo $hasil['telepon'];?>" name="telepon"></td>
								</tr>
								<tr>
									<td>Gambar</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['gambar'];?>" name="gambar"></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['email'];?>" name="email"></td>
								</tr>
								<tr>
									<td>NIK</td>
									<td><input type="text" class="form-control" value="<?php echo $hasil['NIK'];?>" name="nik"></td>
								</tr>
								
								<tr>
									<td></td>
									<td><button class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
								</tr>
							</form>
						</table>
						<div class="clearfix" style="padding-top:16%;"></div>
				  </div>
              </div>
          </section>
      </section>
