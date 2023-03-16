
<?php
include_once "../template/header.php";
include_once "../template/sidebar.php";
include_once "../../controllers/c_produk.php";
include_once '../../controllers/c_outlet.php';
error_reporting(0);
$waduh = new c_produk();
$perin2 = new c_outlet();
?>
      <div id="main">
        <header class="mb-3">
          <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
          </a>
        </header>

        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Table Produk</h3>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                  aria-label="breadcrumb"
                  class="breadcrumb-header float-start float-lg-end"
                >
                </nav>
              </div>
            </div>
          </div>



          <!-- Bordered table start -->
          <section class="section">
            <div class="row" id="table-bordered">
              <div class="col-12">
              <a style=" margin-left:876px; margin-bottom:9px;"href="v_tambah_produk.php"><button type="button" class="btn btn-round btn-success">Tambah Produk</button></a>
                <div class="card">
                    <!-- table bordered -->
                    <div class="table-responsive">
                      <table class="table table-bordered mb-0">
                        <thead>
                          <center>
                          <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jenis</th>
                            <th>Outlet</th>
                            <th>Harga</th>
                            <th>action</th>
                          </tr>
                          </center>
                        </thead>
                        <tbody>
                          <?php 
                                            $no=1;
                                            
                                            foreach ($waduh->tampil_data() as $de ){?>

                                                <tr>
                                                    <th scope="row"><?php echo $no++?></th>
                                                    <td><?php echo $de->nama_paket?></td>
                                                    <td><?php echo $de->jenis?></td>
                                                    <?php foreach ($perin2->getoutlet() as $dot) {
                                            if ($de->id_outlet == $dot->id) { ?>
                                                    <td><?php echo $dot->nama?></td>
                                                    <?php }}?>
                                                    <td><?php echo $de->harga?></td>
                                                    <th>
                                                    <center>
                                              <a href="v_edit_produk.php?id=<?= $de->id ?>"><button type="button" class="btn btn-round btn-primary">Edit</button></a>
                            
                            <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="../../routers/r_produk.php?id=<?= $de->id ?>&aksi=hapus"><button type="button" name="hapus" class="btn btn-round btn-danger">Hapus</button></a>
                            </center>
                                                    </th>
                                                </tr>
                                                <?php }?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Bordered table end -->

<?php
include_once "../template/footer.php";
?>