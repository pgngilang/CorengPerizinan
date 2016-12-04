<?php
$this->load->view('page/HeaderAdmin');
$this->load->view('page/MenuAdmin');
?>

<!-- Main bar -->
  	<div class="mainbar">

      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-table"></i> Data Pengguna</h2>

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
