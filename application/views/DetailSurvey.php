<?php
	$this->load->view('page/header');
	$this->load->view('page/menu');
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
	$( "#datepicker" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: "d MM yy",
		altFormat: "yy-mm-dd"
	});
} );
</script>
<div id="headerwrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h3></h3>
                <h1>Form Hasil Survey</h1>
            </div>
        </div><!-- /row -->
        <div class="row">
        	<form action="" method="post" role="form" enctype="multipart/form-data">
					<div style="text-align:center">
					<?php
						foreach($detail as $d){
					?>
						<div class="form-group" >
							<label for="name">Tanggal Survey</label><br>
							<input style="width:45%; margin-left:auto; margin-right:auto;" type="text" class="form-control" name="tanggal" readonly="readonly" value="<?php echo $d->tanggal; ?>">
						</div>
						<div class="form-group" style="text-align:center;">
							<label for="name">Nama Petugas Survey</label><br>
							<input style="width:45%; margin-left:auto; margin-right:auto;" class="form-control" type="text" name="nama" readonly="readonly" value="<?php echo $d->petugas; ?>">
							<input style="width:45%; margin-left:auto; margin-right:auto;" class="form-control" type="hidden" name="id" value="<?php echo $d->permohonan; ?>" >
						</div>
						<div class="form-group" >
							<label for="name">Keterangan</label><br>
							<textarea readonly="readonly" name="keterangan" style="width:45%; color:black;"  rows="8"><?php echo $d->keterangan; ?></textarea>
						</div>
						<div class="form-group" >
							<label for="name">Upload File Hasil Survey</label><br>
							<div class="row">
								<div class="">
									<div class="panel-body" style="color:black;min-height: 10; max-height: 10;">
										<?php
											$i = 1;
											foreach($file as $f) {
										 ?>
												<a href="<?php echo base_url().$f->direktori; ?>" target="_blank"><?php echo $i.". [". $f->status."]".$f->nama; ?> <i class="fa fa-search-plus" style="color:red"></i></a><br>
											<?php $i++; } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
        	</form>
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
