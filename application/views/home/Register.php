<?php
	$this->load->view('page/header');
	$this->load->view('page/menu');
?>

<div id="headerwrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h3></h3>
                <h1>Halaman Register</h1>
            </div>
        </div><!-- /row -->
        <div class="row">
        	<form action="<?= base_url() ?>Homepage/PostRegister" method="post" role="form" enctype="multipart/form-data">
        	<div style="text-align:center">
						<div class="form-group" style="text-align:center;">
							<label for="name">Email</label><br>
							<input style="width:45%; margin-left:auto; margin-right:auto;" class="form-control" type="text" name="email">
						</div>
						<div class="form-group" >
							<label for="name">Password</label><br>
							<input style="width:45%; margin-left:auto; margin-right:auto;" class="form-control" type="password" name="password">
						</div>
						<div class="form-group" >
							<label for="name">Konfirmasi Password</label><br>
							<input style="width:45%; margin-left:auto; margin-right:auto;" class="form-control" type="password" name="konfirmasiPassword">
						</div>
						<div class="form-group" style="text-align:center;">
							<label for="name">Nama</label><br>
							<input style="width:45%; margin-left:auto; margin-right:auto;" class="form-control" type="text" name="nama">
						</div>
						<div class="form-group" style="text-align:center;">
							<label for="name">Alamat</label><br>
									<textarea style="width:45%; margin-left:auto; margin-right:auto;" class="form-control" rows="3" name="alamat"> </textarea>
							</div>
						</div>
						<div class="form-group" style="text-align:center;">
							<label for="name">No HP/Telp</label><br>
							<input style="width:45%; margin-left:auto; margin-right:auto;" class="form-control" type="text" name="noTelp">
						</div>
							<button type="submit" name="button" class="btn btn-success">Daftar</button>
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
