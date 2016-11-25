<?php
	$this->load->view('page/header');
	$this->load->view('page/menu');
	$pesan = $this->session->flashdata('message');
	if(isset($pesan)) {
		echo "<script>alert('Terjadi Kesalahan! Data gagal ditambahkan. Silahkan coba lagi');</script>";
	}
?>
	<div id="headerwrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h3></h3>
                    <h1>Riwayat Permohonan</h1>
                </div>
            </div><!-- /row -->
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive" >
									<table class="table table-bordered">
								    <thead >
								      <tr>
								        <th style="text-align:center;">No</th>
								        <th style="text-align:center;">Tanggal</th>
								        <th style="text-align:center;">Jenis Permohonan</th>
								        <th style="text-align:center;">Status</th>
												<th style="text-align:center;"></th>
								      </tr>
								    </thead>
								    <tbody>
											<?php $i=1; foreach($permohonan as $p){ ?>

								      <tr>
								        <td style="text-align:left;"><?php echo $i; ?></td>
								        <td style="text-align:left;"><?php echo $p->tanggal; ?></td>
								        <td style="text-align:left;"><?php echo $p->jenis; ?></td>
								        <td style="text-align:left;"><?php echo $p->status; ?></td>
								        <td style="text-align:left;"><a href="<?php echo base_url(); ?>Permohonan/DetailPermohonan/<?php echo $p->id_permohonan; ?>">Detail</a></td>
								      </tr>

											<?php $i++; } ?>

								    </tbody>
								  </table>
								</div>
							</div>
						</div>


        </div> <!-- /container -->
    </div><!-- /headerwrap -->


<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.plugin.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.realperson.js"></script>
<script type="text/javascript">
$(function() {
	$('#defaultReal').realperson();
});

</script>
<?php
	$this->load->view('page/footer');
?>
