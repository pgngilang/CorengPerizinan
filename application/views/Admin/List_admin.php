<?php
$this->load->view('page/HeaderAdmin');
$this->load->view('page/MenuAdmin');
?>

<!-- Main bar -->
  	<div class="mainbar">

      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-table"></i> Data Administrator</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="index.html"><i class="fa fa-home"></i> Home</a>
          <!-- Divider -->
          <span class="divider">/</span>
          <a href="#" class="bread-current">Dashboard</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->


	    <!-- Matter -->

	    <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">

                <div class="widget-content">
                  <div class="padd">
                    <button type="button" name="button" class="btn btn-info" data-toggle="modal" data-target="#tambahAdmin">Tambah Administrator</button>
                    <!-- Modal -->
                    <div id="tambahAdmin" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Tambah Administrator</h4>
                          </div>
                          <div class="modal-body">
                            <form action="<?= base_url() ?>admin/PostRegister" method="post">
                              <div class="form-group">
                  							<label for="name">Email</label>
                  							<input style="width:45%;" class="form-control" type="text" name="email">
                  						</div>
                  						<div class="form-group" >
                  							<label for="name">Password</label>
                  							<input style="width:45%;" class="form-control" type="password" name="password">
                  						</div>
                  						<div class="form-group" >
                  							<label for="name">Konfirmasi Password</label>
                  							<input style="width:45%;" class="form-control" type="password" name="konfirmasiPassword">
                  						</div>
                  						<div class="form-group">
                  							<label for="name">Nama</label>
                  							<input style="width:45%;" class="form-control" type="text" name="nama">
                  						</div>
                  						<div class="form-group">
                  							<label for="name">Alamat</label>
                  									<textarea style="width:45%;" class="form-control" rows="3" name="alamat"> </textarea>
                							</div>
                  						<div class="form-group">
                  							<label for="name">No HP/Telp</label>
                  							<input style="width:45%;" class="form-control" type="text" name="noTelp">
                                <input style="width:45%;" class="form-control" type="hidden" name="role" value="1">
                  						</div>
                              <button type="submit" class="btn btn-success">Tambah</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </form>
                            <br>
                          </div>
                          <div class="modal-footer">

                          </div>
                        </div>

                      </div>
                    </div>
							<!-- Table Page -->
							<div class="page-tables">
								<!-- Table -->
								<div class="table-responsive">
									<table cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
										<thead>
											<tr>
												<th>Nama</th>
												<th>Email</th>
												<th>No Telepon</th>
												<th>Alamat</th>
											</tr>
										</thead>
										<tbody>
                      <?php foreach ($pengguna as $p) { ?>
											<tr>
                        <td><?php echo $p->nama; ?></td>
                        <td><?php echo $p->email; ?></td>
                        <td><?php echo $p->no_telp; ?></td>
                        <td><?php echo $p->alamat; ?></td>
                        <!-- <td><?php echo $p->kecamatan; ?></td>
                        <td><?php echo $p->jenis; ?></td>
                        <td><?php echo $p->status; ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>Permohonan/DetailPermohonan/<?php echo $p->id_permohonan; ?>"><button class="btn btn-xs btn-success" data-toggle="tooltip" title="Detail"><i class="fa fa-search-plus"></i> </button></a>
                        </td> -->
											</tr>
                      <?php } ?>
										</tbody>
									</table>
									<div class="clearfix"></div>
								</div>
								</div>
							</div>


                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
		  </div>

		<!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->
   <div class="clearfix"></div>

</div>
<!-- Content ends -->
<?php
$this->load->view('page/FooterAdmin');
?>
