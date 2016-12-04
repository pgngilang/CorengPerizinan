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
        	<form action="<?= base_url() ?>Permohonan/Survey" method="post" role="form" enctype="multipart/form-data">
        	<div style="text-align:center">
						<div class="form-group" >
							<label for="name">Tanggal Survey</label><br>
							<input style="width:45%; margin-left:auto; margin-right:auto;" type="text" class="form-control" id="datepicker" name="tanggal">
						</div>
						<div class="form-group" style="text-align:center;">
							<label for="name">Nama Petugas Survey</label><br>
							<input style="width:45%; margin-left:auto; margin-right:auto;" class="form-control" type="text" name="nama">
							<input style="width:45%; margin-left:auto; margin-right:auto;" class="form-control" type="hidden" name="id" value="<?php echo $id; ?>" >
						</div>
						<div class="form-group" >
							<label for="name">Keterangan</label><br>
							<textarea name="keterangan" style="width:45%; color:black;"  rows="8"></textarea>
						</div>
						<div class="form-group" >
							<label for="name">Upload File Hasil Survey</label><br>
							<div class="row">
								<div class="col-lg-6 col-lg-offset-4">
									<input style="margin-left:auto; margin-right:auto;" type="file" name="files[]" id="filer_input" multiple="multiple">
								</div>
							</div>
						</div>
						<button type="submit" name="button" class="btn btn-success">Kirim</button><br>
					</div>
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
