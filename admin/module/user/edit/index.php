 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
<?php 
	$id = $_GET['user'];
	$hasil2 = $lihat ->  userlogin();
	$hasil = $lihat ->  userlogin_edit($id);
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
							<input type="text" name="id" value="<?php echo $hasil['id_login'];?>">
							<tr>
								<td>Role</td>
								<td>
								<select name="role" class="form-control" required>
									<option value="#">Pilih Role</option>
									<option value="1">Admin</option>
									<option value="2">Kasir</option>
									<option value="3">Pengguna</option>
								</select>
								</td>
										<!-- <td><input type="text" placeholder="Role" required class="form-control" name="role"></td> -->
									</tr>
									<tr>
										<td>Username</td>
										<td><input type="text" value="<?php echo $hasil['user'];?>" placeholder="Username" required class="form-control"  name="user"></td>
									</tr>
									<tr>
										<td>Password</td>
										<td><input type="text" value="<?php echo $hasil['pass'];?>" placeholder="******" required class="form-control" name="pass"></td>
									</tr>
									<tr>
										<td>Is Active</td>
										<td>
											<select name="is_active" class="form-control" required>
												<option value="#">Pilih</option>
												<option value="0">Non-Aktif</option>
												<option value="1">Aktif</option>
											</select>
										</td>
										<!-- <td><input type="number" placeholder="08xx xxxx xxxx" required class="form-control"  name="is_active"></td> -->
									</tr>
									<tr>
										<td>Member</td>
										<td>
											<select name="member" class="form-control" required>
												<option value="#">Pilih</option>
												<option value="0">Non-Member</option>
												<option value="1">Member</option>
											</select>
										</td>
										<!-- <td><input type="number" placeholder="Upload" required class="form-control"  name="member"></td> -->
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
