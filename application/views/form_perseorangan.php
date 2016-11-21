<?php
	$this->load->view('page/header');
	$this->load->view('page/menu');
?>
	<div id="headerwrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h3></h3>
                    <h1>FORM AP PERSEORANGAN</h1>
                </div>
            </div><!-- /row -->
            <div class="row">
            	<form action="<?= base_url() ?>homepage/action" method="post" role="form" enctype="multipart/form-data">
            	<div class="col-md-6" style="text-align:left">
            		<div style="text-align:center">
            			<h3>PERIHAL PERMOHONAN</h3>
            		</div>
            		<div class="cform" id="contact-form">
            			<div class="form-group" >
		                <label for="name">Tanggal Permohonan</label><br>
		                    <input style="height:40px;" type="date" class="form-control" id="date" data-format="YYYY-MM-DD" data-template="D MMM YYYY" name="tanggal_lahir">
                		</div>
                		<div class="form-group" >
		                <label for="name">Perihal</label><br>
		                    <textarea class="form-control" rows="3"> </textarea>
                		</div>
                		<div class="form-group" >
		                <label for="name">Desa / Kelurahan</label><br>
		                    <select class="form-control" rows="3">
		                    	<option selected="selected"> Pilih Desa / Kelurahan</option>
								<option>Kebondalem</option>
								<option>Ringintelu</option>
								<option>Sambimulyo</option>
								<option>Temenggungan</option>
								<option>Lateng</option>
		                    </select>
		                 </div>
		                 <div class="form-group" >
		                 <label for="name">Kecamatan</label><br>
		                    <select class="form-control" rows="3">
		                    	<option selected="selected">Pilih Kecamatan</option>
								<option>Kec. Banyuwangi</option>
								<option>Kec. Muncar</option>
								<option>Kec. Bangorejo</option>
								<option>Kec. Purwoharjo</option>
								<option>Kec. Srono</option>
		                    </select>
                		</div>
                		<div style="text-align:center">
            				<h3>IDENTITAS PEMOHON</h3>
            			</div>
            			<div class="form-group" >
	            			<label for="name">Nama</label><br>
	            			<input class="form-control" type="text">
            			</div>
            			<div class="form-group" >
	            			<label for="name">Alamat</label><br>
	            			<textarea class="form-control" rows="3"> </textarea>
            			</div>
            			<div class="form-group" >
	            			<label for="name">No. Telepon / HP</label><br>
	            			<input class="form-control" type="text">
            			</div>
            			<div class="form-group" >
	            			<label for="name">Email</label><br>
	            			<input class="form-control" type="text" >
	            			<!-- <h6 style="color:red;"> Gunakan email yang benar</h6> -->
            			</div>
            			<div style="text-align:center">
            				<h3>UPLOAD LAMPIRAN</h3>
            			</div>
            			<div class="form-group" >
	            			<label for="name">Upload File</label><br>
	            			<input type="file" class="filestyle" data-input="false">
            			</div>
            			<div class="panel panel-primary">
						  <div class="panel-body" style="color:black;min-height: 10; max-height: 10;">
						  			1. test.png <i class="fa fa-times" style="color:red"></i><br>
						  			2. ktp.png <i class="fa fa-times" style="color:red"></i><br>
						  </div>
						</div>
						<div class="form-group" >
	            			<input type="text" class="form-control" id="defaultReal" name="defaultReal">
            			</div>
            			<div class="form-group" >
	            			<button type="button" class="btn btn-success" id="submit">Kirim</button>
            			</div>
            		</div>
            	</div>
            	<div class="col-md-6" style="text-align:left">
            		<div style="text-align:center">
            			<h3>TANAH YANG DIMOHON</h3>
            		</div>
            		<div class="cform" id="contact-form">
	            		<div class="form-group" >
	            			<label for="name">Alamat</label><br>
	            			<input class="form-control" type="text">
	        			</div>
	    				<div class="form-group" >
		                <label for="name">Desa / Kelurahan</label><br>
		                    <select class="form-control" rows="3">
		                    	<option selected="selected"> Pilih Desa / Kelurahan</option>
								<option>Kebondalem</option>
								<option>Ringintelu</option>
								<option>Sambimulyo</option>
								<option>Temenggungan</option>
								<option>Lateng</option>
		                    </select>
		                 </div>
		                 <div class="form-group" >
		                 <label for="name">Kecamatan</label><br>
		                    <select class="form-control" rows="3">
		                    	<option selected="selected">Pilih Kecamatan</option>
								<option>Kec. Banyuwangi</option>
								<option>Kec. Muncar</option>
								<option>Kec. Bangorejo</option>
								<option>Kec. Purwoharjo</option>
								<option>Kec. Srono</option>
		                    </select>
	            		</div>
	            		<div class="form-group" >
		                 <label for="name">Kabupaten</label><br>
		                    <select class="form-control" rows="3">
		                    	<option selected="selected">Pilih Kabupaten</option>
								<option>Kab. Banyuwangi</option>
		                    </select>
	            		</div>
	            		<div class="form-inline">
		            		<div class="form-group" >
		            			<label for="name">Luas Tanah Sesuai Bukti Kepemilikan</label>
		            			<input class="form-control" type="text">
		        			</div>
		        			m<sup>2</sup>
		        		</div>
		        		<div class="form-inline">
		        			<div class="form-group" >
		            			<label for="name">Luas Tanah Yang Dimohon</label>
		            			<input class="form-control" type="text" >
		        			</div>
		        			m<sup>2</sup>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<div class="col-md-3">
		            				<input class="form-control" type="text" >
		            			</div>
		            			<label for="name" class="col-md-1 control-label" style="margin-top:2%">&deg;LS</label>
		            			<div class="col-md-3">
		            				<input class="form-control" type="text" >
		            			</div>
		            			<label for="name" class="col-md-1 control-label" style="margin-top:2%">&deg;BT</label>
		            			<button type="submit" class="btn btn-success"  style="margin-top:0.6%">Add</button>
		        			</div>
	        			</div>
	        			<div class="panel panel-primary">
						  <div class="panel-body" style="color:black;min-height: 10; max-height: 10;">
						  			1. 114&deg;22'5.38'' &deg;LS 13'13.24''&deg;BT <i class="fa fa-times" style="color:red"></i><br>
						  </div>
						</div>
						<div class="form-group" >
		                 <label for="name">Status Tanah</label><br>
		                    <select class="form-control" rows="3">
		                    	<option selected="selected">Pilih Status</option>
		                    </select>
	            		</div>
	            		<br>
	            		<div style="text-align:center;">
	            			<h4 >SHM</h4>
	            		</div>
	            		<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-1 control-label" style="margin-top:2%">No</label>
		        				<div class="col-md-7">
		            				<input class="form-control" type="text" >
		            			</div>
		            			<label for="name" class="col-md-1 control-label" style="margin-top:2%">Tahun</label>
		        				<div class="col-md-3">
		            				<input class="form-control" type="text" >
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-1 control-label" style="margin-top:2%">Luas</label>
		        				<div class="col-md-7">
		            				<input class="form-control" type="text" >
		            			</div>
		            			m<sup>2</sup>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-1 control-label" style="margin-top:2%">An.</label>
		        				<div class="col-md-11">
		            				<input class="form-control" type="text" >
		            			</div>
		        			</div>
	        			</div>
	        			<div style="text-align:center;">
	            			<h4 >Letter C</h4>
	            		</div>
	            		<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-2 control-label" style="margin-top:2%">No. Petok</label>
		        				<div class="col-md-10">
		            				<input class="form-control" type="text" >
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-2 control-label" style="margin-top:2%">No. Persil</label>
		        				<div class="col-md-10">
		            				<input class="form-control" type="text" >
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-1 control-label" style="margin-top:2%">Luas</label>
		        				<div class="col-md-7">
		            				<input class="form-control" type="text" >
		            			</div>
		            			m<sup>2</sup>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-1 control-label" style="margin-top:2%">An.</label>
		        				<div class="col-md-11">
		            				<input class="form-control" type="text" >
		            			</div>
		        			</div>
	        			</div>
	        			<div style="text-align:center;">
	            			<h4 >Lain-lain</h4>
	            		</div>
	            		<div class="form-group" >
	            			<textarea class="form-control" rows="3"> </textarea>
	            		</div>
	            		<br/>
	        			<div style="text-align:left;">
	            			<h4>Batas Tanah</h4>
	            		</div>
	            		<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-2 control-label" style="margin-top:2%">Utara</label>
		        				<div class="col-md-4">
		            				<input class="form-control" type="text" >
		            			</div>
		            			<label for="name" class="col-md-2 control-label" style="margin-top:2%">Timur</label>
		        				<div class="col-md-4">
		            				<input class="form-control" type="text" >
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-2 control-label" style="margin-top:2%">Selatan</label>
		        				<div class="col-md-4">
		            				<input class="form-control" type="text" >
		            			</div>
		            			<label for="name" class="col-md-2 control-label" style="margin-top:2%">Barat</label>
		        				<div class="col-md-4">
		            				<input class="form-control" type="text" >
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group" >
		                <label for="name">Penggunaan Tanah Sekarang</label><br>
		                    <textarea class="form-control" rows="3"> </textarea>
                		</div>
                		<div style="text-align:left;">
	            			<h4>Rencana Penggunaan Tanah</h4>
	            		</div>
                		<div class="form-group row">
		        			<div class="form-group" >
		        				<div class="col-md-1" style="margin-top:2%">
		        					<input type="checkbox">
		        				</div>
		        				<label for="name" class="col-md-5 control-label" style="margin-top:2%">Pembangunan Baru</label>
		        				<div class="col-md-6">
		            				<input class="form-control" type="text" >
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<div class="col-md-1" style="margin-top:2%">
		        					<input type="checkbox">
		        				</div>
		        				<label for="name" class="col-md-5 control-label" style="margin-top:2%">Perluasan</label>
		        				<div class="col-md-6">
		            				<input class="form-control" type="text" >
		            			</div>
		        			</div>
	        			</div>
            		</div>
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
