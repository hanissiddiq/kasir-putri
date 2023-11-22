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
						<form method="POST" action="fungsi/edit/edit.php?kategori=edit">
							<table>
								<tr>
									<td style="width:15pc;"><input type="text" class="form-control" value="<?= $edit['nama_kategori'];?>" required name="kategori" placeholder="Masukan Kategori Barang Baru">
										<input type="hidden" name="id" value="<?= $edit['id_kategori'];?>">
									</td>
									<td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah Data</button></td>
								</tr>
							</table>
						</form>
						<?php }else{?>
						<form method="POST" action="fungsi/tambah/tambah.php?kategori=tambah">
							<table>
								<tr>
									<td style="width:15pc;"><input type="text" class="form-control" required name="kategori" placeholder="Masukan Kategori Barang Baru"></td>
									<td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button></td>
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
									<td><?php echo $isi['gambar'];?></td>
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
              </div>
          </section>
      </section>
	
