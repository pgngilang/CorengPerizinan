<?php
	$this->load->view('page/header');
	$this->load->view('page/menu');
	$pesan = $this->session->flashdata('message');
	if(isset($pesan)) {
		echo "<script>alert('Terjadi Kesalahan! Data gagal ditambahkan. Silahkan coba lagi');</script>";
	}
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
                    <h1>FORM AP PERSEORANGAN</h1>
                </div>
            </div><!-- /row -->
            <div class="row">
            	<form action="<?php echo base_url(); ?>Permohonan/TambahPermohonanPerseorangan" method="post" role="form" enctype="multipart/form-data">
            	<div class="col-md-6" style="text-align:left">
            		<div style="text-align:center">
            			<h3>PERIHAL PERMOHONAN</h3>
            		</div>
            		<div class="cform" id="contact-form">
									<div class="form-group" >
										<?php
											foreach($no_form as $no){
												$nomor = $no->no_form;
											}
										 ?>
		                <label for="name">Nomor Formulir</label><br>
										<input type="text" class="form-control" name="noForm" readonly="readonly" value="<?php echo $nomor; ?>">
                    <!-- <input style="height:40px;" type="date" class="form-control" id="date" data-format="YYYY-MM-DD" data-template="D MMM YYYY" name="tanggalPermohonan"> -->
              		</div>
            			<div class="form-group" >
		                <label for="name">Tanggal Permohonan</label><br>
												<input type="text" id="datepicker" class="form-control" name="tanggalPermohonan">
		                    <!-- <input style="height:40px;" type="date" class="form-control" id="date" data-format="YYYY-MM-DD" data-template="D MMM YYYY" name="tanggalPermohonan"> -->
                		</div>
                		<div class="form-group" >
		                <label for="name">Perihal</label><br>
		                    <textarea class="form-control" rows="3" name="alamatPerihal"> </textarea>
                		</div>
                		<div class="form-group" >
		                <label for="name">Desa / Kelurahan</label><br>
		                    <!-- <select class="form-control" rows="3">
		                    	<option selected="selected"> Pilih Desa / Kelurahan</option>
								<option>Kebondalem</option>
								<option>Ringintelu</option>
								<option>Sambimulyo</option>
								<option>Temenggungan</option>
								<option>Lateng</option>
		                    </select> -->
												<input type="text" name="desaPerihal">
		                 </div>
		                 <div class="form-group" >
		                 <label for="name">Kecamatan</label><br>
		                    <!-- <select class="form-control" rows="3">
		                    	<option selected="selected">Pilih Kecamatan</option>
								<option>Kec. Banyuwangi</option>
								<option>Kec. Muncar</option>
								<option>Kec. Bangorejo</option>
								<option>Kec. Purwoharjo</option>
								<option>Kec. Srono</option>
		                    </select> -->
												<input type="text" name="kecamatanPerihal">
                		</div>
                		<div style="text-align:center">
            				<h3>IDENTITAS PEMOHON</h3>
										<?php
											$identitas = $this->session->userdata('userDetail');
										 ?>
            			</div>
            			<div class="form-group" >
	            			<label for="name">Nama</label><br>
										<input class="form-control" name="idIdentitas" type="hidden" value="<?php echo $identitas['idUser'] ?>" readonly="readonly">
	            			<input class="form-control" name="namaIdentitas" type="text">
            			</div>
            			<div class="form-group" >
	            			<label for="name">Alamat</label><br>
	            			<textarea class="form-control" rows="3" name="alamatIdentitas"></textarea>
            			</div>
            			<div class="form-group" >
	            			<label for="name">No. Telepon / HP</label><br>
										<input class="form-control" name="noTelpIdentitas" type="text">
            			</div>
            			<div class="form-group" >
	            			<label for="name">Email</label><br>
										<input class="form-control" name="emailIdentitas" type="text">
	            			<!-- <h6 style="color:red;"> Gunakan email yang benar</h6> -->
            			</div>
									<fieldset class="gllpLatlonPicker">
										<h3 style="text-align:center;">KOORDINAT LOKASI TANAH</h3>
										<div class="form-group" >
											<div class="col-md-9">
												<input type="text" class="gllpSearchField form-control">
											</div>
											<div class="col-md-3">
												<input type="button" class="gllpSearchButton form-control" value="search">
											</div>
										</div>
										<div class="gllpMap col-md-12" style="width:100%;">Google Maps</div>
										<div class="form-group">
											<div class="col-md-6">
												<label>Latitute</label>
												<input type="text" class="gllpLatitude form-control" name="latitute" value="-8.2192335"/>
											</div>
											<div class="col-md-6">
												<label>Longitude</label>
												<input type="text" class="gllpLongitude form-control" name="longitude" value="114.36922670000001"/>
												<input type="hidden" class="gllpZoom" value="14"/>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-4">
												<input type="button" class="gllpUpdateButton form-control" value="Update Peta">
											</div>
											<div class="col-md-6">
												<a href="http://gis.banyuwangikab.go.id/FrontEnd/GoogleMapView?land_page=2" target="_blank"><button type="button" class="btn btn-success form-control">Peta Perencanaan Banyuwangi</button></a>
											</div>
										</div>
									</fieldset>
            			<div style="text-align:center">
            				<h3>UPLOAD LAMPIRAN</h3>
            			</div>
            			<div class="form-group" >
	            			<label for="name">Upload File</label><br>
	            			<input type="file" name="files[]" id="filer_input" multiple="multiple">
            			</div>

						<!-- <div class="form-group" >
	            			<input type="text" class="form-control" id="defaultReal" name="defaultReal" >
            			</div> -->
            			<div class="form-group" >
	            			<button type="submit" class="btn btn-success" id="submit">Kirim</button>
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
	            			<input class="form-control" type="text" name="alamatTanah">
	        			</div>
								<div class="form-group" >
									<label for="name">Desa/Kelurahan</label><br>
									<input class="form-control" type="text" name="desaTanah">
							</div>
	    				<!-- <div class="form-group" >
		                <label for="name">Desa / Kelurahan</label><br>
		                    <select class="form-control" rows="3">
		                    	<option selected="selected"> Pilih Desa / Kelurahan</option>
								<option>Kebondalem</option>
								<option>Ringintelu</option>
								<option>Sambimulyo</option>
								<option>Temenggungan</option>
								<option>Lateng</option>
		                    </select>
		                 </div> -->
		                 <div class="form-group" >
		                 <label for="name">Kecamatan</label><br>
		                    <!-- <select class="form-control" rows="3">
		                    	<option selected="selected">Pilih Kecamatan</option>
								<option>Kec. Banyuwangi</option>
								<option>Kec. Muncar</option>
								<option>Kec. Bangorejo</option>
								<option>Kec. Purwoharjo</option>
								<option>Kec. Srono</option>
		                    </select> -->
												<input class="form-control" type="text" name="kecamatanTanah">
	            		</div>
	            		<div class="form-group" >
		                 <label for="name">Kabupaten</label><br>
		                    <!-- <select class="form-control" rows="3">
		                    	<option selected="selected">Pilih Kabupaten</option>
								<option>Kab. Banyuwangi</option>
		                    </select> -->
												<input class="form-control" type="text" name="kabupatenTanah">
	            		</div>
	            		<div class="form-inline">
		            		<div class="form-group" >
		            			<label for="name">Luas Tanah Sesuai Bukti Kepemilikan</label>
		            			<input class="form-control" type="text" name="luasTanahKepemilikan">
		        			</div>
		        			m<sup>2</sup>
		        		</div>
		        		<div class="form-inline">
		        			<div class="form-group" >
		            			<label for="name">Luas Tanah Yang Dimohon</label>
		            			<input class="form-control" type="text" name="luasTanahDimohon">
		        			</div>
		        			m<sup>2</sup>
	        			</div>
	        			<!-- <div class="form-group row">
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
						</div> -->
						<div class="form-group" >
		                 <label for="name">Status Tanah</label><br>
		                    <select class="form-control" rows="3" name="statusTanah">
													<option value="Surat Hak Milik" selected="selected">Surat Hak Milik</option>
													<option value="Letter C">Letter C</option>
													<option value="Lain-Lain">Lain-Lain</option>
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
		            				<input class="form-control" type="text" name="noShm">
		            			</div>
		            			<label for="name" class="col-md-1 control-label" style="margin-top:2%">Tahun</label>
		        				<div class="col-md-3">
		            				<input class="form-control" type="text" name="tahunShm">
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-1 control-label" style="margin-top:2%">Luas</label>
		        				<div class="col-md-7">
		            				<input class="form-control" type="text" name="luasShm">
		            			</div>
		            			m<sup>2</sup>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-1 control-label" style="margin-top:2%">An.</label>
		        				<div class="col-md-11">
		            				<input class="form-control" type="text" name="namaShm">
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
		            				<input class="form-control" type="text" name="petokLetc">
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-2 control-label" style="margin-top:2%">No. Persil</label>
		        				<div class="col-md-10">
		            				<input class="form-control" type="text" name="persilLetc">
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-1 control-label" style="margin-top:2%">Luas</label>
		        				<div class="col-md-7">
		            				<input class="form-control" type="text" name="luasLetc">
		            			</div>
		            			m<sup>2</sup>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-1 control-label" style="margin-top:2%">An.</label>
		        				<div class="col-md-11">
		            				<input class="form-control" type="text" name="namaLetc">
		            			</div>
		        			</div>
	        			</div>
	        			<div style="text-align:center;">
	            			<h4 >Lain-lain</h4>
	            		</div>
	            		<div class="form-group" >
	            			<textarea class="form-control" rows="3" name="lainLain"> </textarea>
	            		</div>
	            		<br/>
	        			<div style="text-align:left;">
	            			<h4>Batas Tanah</h4>
	            		</div>
	            		<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-2 control-label" style="margin-top:2%">Utara</label>
		        				<div class="col-md-4">
		            				<input class="form-control" type="text" name="batasUtara">
		            			</div>
		            			<label for="name" class="col-md-2 control-label" style="margin-top:2%">Timur</label>
		        				<div class="col-md-4">
		            				<input class="form-control" type="text" name="batasTimur">
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-2 control-label" style="margin-top:2%">Selatan</label>
		        				<div class="col-md-4">
		            				<input class="form-control" type="text" name="batasSelatan">
		            			</div>
		            			<label for="name" class="col-md-2 control-label" style="margin-top:2%">Barat</label>
		        				<div class="col-md-4">
		            				<input class="form-control" type="text" name="batasBarat">
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group" >
		                <label for="name">Penggunaan Tanah Sekarang</label><br>
		                    <textarea class="form-control" rows="3" name="penggunaanSekarang"> </textarea>
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
		            				<input class="form-control" type="text" name="pembangunanBaru">
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
		            				<input class="form-control" type="text" name="perluasan">
		            			</div>
		        			</div>
	        			</div>
            		</div>
            	</div>
            	</form>
            </div>

        </div> <!-- /container -->
    </div><!-- /headerwrap -->
</script>
<?php
	$this->load->view('page/footer');
?>
