<?php
	$this->load->view('page/header');
	$this->load->view('page/menu');
?>

<div id="headerwrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h3></h3>
                <h1>Halaman Login</h1>
            </div>
        </div><!-- /row -->
        <div class="row">
        	<form action="<?= base_url() ?>Homepage/PostLogin" method="post" role="form" enctype="multipart/form-data">
        	<div style="text-align:center">
						<div class="form-group" style="text-align:center;">
							<label for="name">Email</label><br>
							<input style="width:45%; margin-left:auto; margin-right:auto;" class="form-control" type="text" name="username">
						</div>
						<div class="form-group" >
							<label for="name">Password</label><br>
							<input style="width:45%; margin-left:auto; margin-right:auto;" class="form-control" type="password" name="password">
						</div>
							<button type="submit" name="button" class="btn btn-success">Masuk</button>
							<a href="<?= base_url() ?>Homepage/Register"><button type="button" name="button" class="btn btn-success">Daftar</button></a>
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
