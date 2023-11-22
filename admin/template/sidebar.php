   
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
<?php 
//   $id = $_SESSION['admin']['id_member'];
//   $hasil_profil = $lihat -> member_edit($id);

//   start code by hanis
if($_SESSION['admin']['id_member'] == 1){
    $id = $_SESSION['admin']['id_member'];
    $hasil_profil = $lihat -> member_edit($id);
}elseif($_SESSION['kasir']['id_member'] == 2){
    $id = $_SESSION['kasir']['id_member'];
    $hasil_profil = $lihat -> member_edit($id);
}
else{echo "<h2>Data User tidak ada</h2>";}
// print_r($_SESSION);
// print_r("<br><br><br><br><br><br><br><h4>".$hasil['user']."</h4>");
// die;
// $id = $hasil['id_member'];

// var_dump("<br><br><br><h4>".$id."</h4>");
// die;
$hasil_profil = $lihat -> member_edit($id);
//   end code by hanis
?>

      <aside>
          <div id="sidebar"  class="nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              <p class="centered"><a><img src="assets/img/user/<?php echo $hasil_profil['gambar'];?>" class="img-circle" width="100" height="100"></a></p>
              	  <h5 class= "centered"> <?php echo $hasil_profil['nm_member'];?></h5>
                  <h5 class= "centered"> <?php echo $hasil_profil['NIK'];?></h5>
              	  	
                  <li class="mt">
                      <a href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-desktop"></i>
                          <span>Master <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                      </a>
                      <ul class="sub">
                          <li><a  href="index.php?page=barang">Barang</a></li>
                          <li><a  href="index.php?page=kategori">Kategori</a></li>
                          <li><a  href="index.php?page=user">User</a></li>
                          <li><a  href="index.php?page=pengguna">Profil Pengguna</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Transaksi <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                      </a>
                      <ul class="sub">

                        <!-- Start Code By Hanis -->
                        <?php if($_SESSION['admin']['id_member'] == 1){ ?>
                          <li><a  href="index.php?page=jual">Transaksi Jual</a></li>
                          <li><a  href="index.php?page=laporan">Laporan Penjualan</a></li>
                        <?php } elseif($_SESSION['kasir']['id_member'] == 2){ ?>
                        <?php echo '<li><a  href="index.php?page=jual">Transaksi Jual</a></li>';}?>
                            <!-- End Code By Hanis -->

                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cog"></i>
                          <span>Setting <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                      </a>
                      <ul class="sub">
                          <li><a href="index.php?page=pengaturan">Pengaturan Toko</a></li>
                      </ul>
                  </li>
                    
                    <li class="mt btn-danger">
                        <a class="logout" onclick="javascript: return confirm('Ingin Logout ?');" href="logout.php">
                          <i class="fa fa-power-off"></i>
                          <span>Log Out</span>
                        </a>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
