 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data User</h3>
						<br/>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Tambah Data User Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['success-edit'])){?>
						<div class="alert alert-success">
							<p>Update Data User Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data User Berhasil !</p>
						</div>
						<?php }?>
						<?php 
							if(!empty($_GET['user'])){
							$sql = "SELECT * FROM login , member WHERE login.id_member = ?";
							$row = $config->prepare($sql);
							$row->execute(array($_GET['user']));
							$edit = $row->fetch();
						?>
						<form method="POST" action="fungsi/edit/edit.php?user=edit">
							<table>
								<tr>
									<td style="width:15pc;"><input type="text" class="form-control" value="<?= $edit['nama_kategori'];?>" required name="kategori" placeholder="Masukan Kategori Barang Baru">
										<input type="hidden" name="id" value="<?= $edit['id_login'];?>">
									</td>
									<td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah Data</button></td>
								</tr>
							</table>
						</form>
						<?php }else{?>
						<form method="POST" action="fungsi/tambah/tambah.php?user=tambah">
							<table>
								<tr>
									<!-- <td style="width:15pc;"><input type="text" class="form-control" required name="kategori" placeholder="Masukan Kategori Barang Baru"></td>
									<td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button></td> -->
									<td>
										<button type="button" class="btn btn-primary btn-md pull-left" data-toggle="modal" data-target="#myModal">
										<i class="fa fa-plus"></i> Insert Data User</button>
									</td>
								</tr>
							</table>
							
						</form>
						<?php }?>
						<br/>
						<table class="table table-bordered" id="example1">
							<thead>
								<tr style="background:#DFF0D8;color:#333;">
									<th>No.</th>
									<th>Nama</th>
									<th>Username</th>
									<th>Alamat</th>
									<th>Telepon</th>
									<th>Email</th>
									<th>Gambar</th>
									<th>NIK</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$hasil = $lihat -> member();
								
								$no=1;
								foreach($hasil as $isi){
							?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $isi['nm_member'];?></td>
									<td><?php echo $isi['user'];?></td>
									<td><?php echo $isi['alamat_member'];?></td>
									<td><?php echo $isi['telepon'];?></td>
									<td><?php echo $isi['email'];?></td>
									<td> <img src="assets/img/user/<?php echo $isi['gambar'];?>" width="65" height="65"/></td>
									<td><?php echo $isi['NIK'];?></td>
									<td>
										<a href="index.php?page=user&uid=<?php echo $isi['id_login'];?>"><button class="btn btn-warning">Edit</button></a>
										<a href="fungsi/hapus/hapus.php?user=hapus&id=<?php echo $isi['id_login'];?>" onclick="javascript:return confirm('Hapus Data Kategori ?');"><button class="btn btn-danger">Hapus</button></a>
									</td>
								</tr>
							<?php $no++; }?>
							</tbody>
						</table>
						<div class="clearfix" style="padding-top:16%;"></div>
				  </div>


				  <!-- start code by hani -->
				  <!-- tambah barang MODALS-->
						<!-- Modal -->
					
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content" style=" border-radius:0px;">
								<div class="modal-header" style="background:#285c64;color:#fff;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah User</h4>
								</div>										
								<form action="fungsi/tambah/tambah.php?user=tambah" method="POST" enctype="multipart/form-data">
									<div class="modal-body">
								
										<table class="table table-striped bordered">
											
											<?php
												// $format = $lihat -> barang_id();
											?>
											
											
											<tr>
												<td>Nama</td>
												<td><input type="text" placeholder="Nama Lengkap" required class="form-control" name="nama"></td>
											</tr>
											<tr>
												<td>Username</td>
												<td><input type="text" placeholder="Username" required class="form-control"  name="user"></td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td><input type="textarea" placeholder="Jln. Merdeka Lhoksumawe" required class="form-control" name="alamat"></td>
											</tr>
											<tr>
												<td>Telepon</td>
												<td><input type="number" placeholder="08xx xxxx xxxx" required class="form-control"  name="telepon"></td>
											</tr>
											<tr>
												<td>Gambar</td>
												<td><input type="file" placeholder="Upload" required class="form-control"  name="gambar"></td>
											</tr>
											<tr>
												<td>Email</td>
												<td><input type="email" placeholder="example@gmail.com" required class="form-control"  name="email"></td>
											</tr>
											<tr>
												<td>NIK</td>
												<td><input type="number" placeholder="1111 15xx 03xx 00xx" required class="form-control"  name="nik"></td>
											</tr>
											<tr>
												<td>Level</td>
												<td>
													<select name="level" class="form-control" required>
														<option value="#">Pilih Level</option>
														<option value="1">Admin</option>
														<option value="2">Kasir</option>
														<option value="3">Pengguna</option>
													</select>
												</td>
											</tr>											
										</table>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
				  <!-- end code by hani -->



              </div>
          </section>
      </section>
	
