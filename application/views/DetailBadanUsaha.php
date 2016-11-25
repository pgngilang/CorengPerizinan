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
                    <h1>FORM AP BADAN USAHA</h1>
										<?php
											foreach ($detail as $d) {
										 ?>
                </div>
								<?php $sess = $this->session->userdata('userDetail'); $role = $sess['role'];  if ($role == 1) { ?>
								<div class="row">
									<form action="<?php echo base_url(); ?>Permohonan/GantiStatusPermohonan" method="post">
										<div class="col-md-12" >
											<label for="">Status</label>
											<input readonly="readonly" style="height:40px;" type="hidden" class="form-control" readonly="readonly" value="<?php echo $d->id_permohonan; ?>" name="id">
											<select class="form-control" name="status" style="margin-left:auto; margin-right:auto; width:30%;">
												<option value="1" <?php if($d->status_permohonan == 1) echo "selected='selected';"; ?> >Mendaftar</option>
												<option value="2" <?php if($d->status_permohonan == 2) echo "selected='selected';"; ?> >Proses Survey</option>
												<option value="3" <?php if($d->status_permohonan == 3) echo "selected='selected';"; ?> >Proses Administrasi</option>
												<option value="4" <?php if($d->status_permohonan == 4) echo "selected='selected';"; ?> >Selesai</option>
												<option value="5" <?php if($d->status_permohonan == 5) echo "selected='selected';"; ?> >Terima</option>
												<option value="6" <?php if($d->status_permohonan == 6) echo "selected='selected';"; ?> >Tolah</option>
											</select>
											<button type="submit" class="btn btn-success" name="button">Ganti</button>
											<?php $sess = $this->session->userdata('userDetail'); $role = $sess['role'];  if ($role == 1) { ?>
												<a href="<?php echo base_url(); ?>Admin"><button type="Button" class="btn btn-success" name="button">Kembali</button></a>
											<?php } elseif($role == 2) { ?>
												<a href="<?php echo base_url(); ?>Permohonan/DataPengajuanUser"><button type="Button" class="btn btn-success" name="button">Kembali</button></a>
											<?php } ?>
										</div>
									</form>
								</div>
							<?php } ?>
            </div><!-- /row -->
            <div class="row">

            	<form role="form" enctype="multipart/form-data">
            	<div class="col-md-6" style="text-align:left">
            		<div style="text-align:center">
            			<h3>PERIHAL PERMOHONAN</h3>
            		</div>
            		<div class="cform" id="contact-form">
            			<div class="form-group" >
		                <label for="name">Tanggal Permohonan</label><br>
		                    <input readonly="readonly" style="height:40px;" type="date" class="form-control" readonly="readonly" value="<?php echo $d->tanggal; ?>" id="date" data-format="YYYY-MM-DD" data-template="D MMM YYYY" name="tanggalPermohonan">
                		</div>
                		<div class="form-group" >
		                <label for="name">Perihal</label><br>
		                    <textarea class="form-control" rows="3" name="alamatPerihal" readonly="readonly"><?php echo $d->perihal; ?> </textarea>
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
												<input readonly="readonly" class="form-control" type="text" name="desaPerihal" value="<?php echo $d->desa; ?>">
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
												<input readonly="readonly" class="form-control" type="text" name="kecamatanPerihal" value="<?php echo $d->kecamatan; ?>">
                		</div>
                		<div style="text-align:center">
            				<h3>IDENTITAS PEMOHON</h3>
										<?php
											$identitas = $this->session->userdata('userDetail');
										 ?>
            			</div>
									<div class="form-group" >
	            			<label for="name">Nama Badan Usaha</label><br>
	            			<input class="form-control" name="namaIdentitas" type="text" value="<?php echo $identitas['nama'] ?>" readonly="readonly">
            			</div>
            			<div class="form-group" >
	            			<label for="name">Nama Pemilik/Penanggung Jawab</label><br>
										<input class="form-control" name="idIdentitas" type="hidden" value="<?php echo $identitas['idUser'] ?>" readonly="readonly">
	            			<input class="form-control" name="namaIdentitas" type="text" value="<?php echo $identitas['nama'] ?>" readonly="readonly">
            			</div>
            			<div class="form-group" >
	            			<label for="name">Alamat</label><br>
	            			<textarea class="form-control" rows="3" name="alamatIdentitas" readonly="readonly"><?php echo $identitas['alamat'] ?></textarea>
            			</div>
            			<div class="form-group" >
	            			<label for="name">No. Telepon / HP</label><br>
										<input readonly="readonly" class="form-control" name="noTelpIdentitas" type="text" value="<?php echo $identitas['noTelp'] ?>" readonly="readonly">
            			</div>
            			<div class="form-group" >
	            			<label for="name">Email</label><br>
										<input readonly="readonly" class="form-control" name="emailIdentitas" type="text" value="<?php echo $identitas['email'] ?>" readonly="readonly">
	            			<!-- <h6 style="color:red;"> Gunakan email yang benar</h6> -->
            			</div>
            			<div style="text-align:center">
            				<h3>UPLOAD LAMPIRAN</h3>
            			</div>
									<div class="panel panel-primary">
									  <div class="panel-body" style="color:black;min-height: 10; max-height: 10;">
											<?php
												$i = 1;
												foreach($file as $f) {
											 ?>
									  			<a href="<?php echo base_url().$f->direktori; ?>" target="_blank"><?php echo $i.". ".$f->nama; ?> <i class="fa fa-search-plus" style="color:red"></i></a><br>
												<?php $i++; } ?>
									  </div>
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
	            			<input readonly="readonly" class="form-control" type="text" name="alamatTanah" value="<?php echo $d->alamat; ?>">
	        			</div>
								<div class="form-group" >
									<label for="name">Desa/Kelurahan</label><br>
									<input readonly="readonly" class="form-control" type="text" name="desaTanah" value="<?php echo $d->desa; ?>">
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
												<input readonly="readonly" class="form-control" type="text" name="kecamatanTanah" value="<?php echo $d->kecamatan; ?>">
	            		</div>
	            		<div class="form-group" >
		                 <label for="name">Kabupaten</label><br>
		                    <!-- <select class="form-control" rows="3">
		                    	<option selected="selected">Pilih Kabupaten</option>
								<option>Kab. Banyuwangi</option>
		                    </select> -->
												<input readonly="readonly" class="form-control" type="text" name="kabupatenTanah" value="<?php echo $d->kabupaten; ?>">
	            		</div>
	            		<div class="form-inline">
		            		<div class="form-group" >
		            			<label for="name">Luas Tanah Sesuai Bukti Kepemilikan</label>
		            			<input readonly="readonly" class="form-control" type="text" name="luasTanahKepemilikan" value="<?php echo $d->luas_kepemilikan; ?>">
		        			</div>
		        			m<sup>2</sup>
		        		</div>
		        		<div class="form-inline">
		        			<div class="form-group" >
		            			<label for="name">Luas Tanah Yang Dimohon</label>
		            			<input readonly="readonly" class="form-control" type="text" name="luasTanahDimohon" value="<?php echo $d->luas_dimohon; ?>">
		        			</div>
		        			m<sup>2</sup>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<div class="col-md-3">
		            				<input readonly="readonly" class="form-control" type="text" >
		            			</div>
		            			<label for="name" class="col-md-1 control-label" style="margin-top:2%">&deg;LS</label>
		            			<div class="col-md-3">
		            				<input readonly="readonly" class="form-control" type="text" >
		            			</div>
		            			<label for="name" class="col-md-1 control-label" style="margin-top:2%">&deg;BT</label>
		        			</div>
	        			</div>
	        			<div class="panel panel-primary">
						  <div class="panel-body" style="color:black;min-height: 10; max-height: 10;">
						  			1. 114&deg;22'5.38'' &deg;LS 13'13.24''&deg;BT <i class="fa fa-times" style="color:red"></i><br>
						  </div>
						</div>
						<div class="form-group" >
		                 <label for="name">Status Tanah</label><br>
										 <input readonly="readonly" class="form-control" type="text" name="luasTanahDimohon" value="<?php echo $d->status_tanah; ?>">
		                    <!-- <select class="form-control" rows="3" name="statusTanah">
													<option value="Surat Hak Milik" selected="selected">Surat Hak Milik</option>
													<option value="Letter C">Letter C</option>
													<option value="Lain-Lain">Lain-Lain</option>
		                    </select> -->
	            		</div>
	            		<br>
	            		<div style="text-align:center;">
	            			<h4 >SHM</h4>
	            		</div>
	            		<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-1 control-label" style="margin-top:2%">No</label>
		        				<div class="col-md-7">
		            				<input readonly="readonly" class="form-control" type="text" name="noShm" value="<?php echo $d->no_shm; ?>">
		            			</div>
		            			<label for="name" class="col-md-1 control-label" style="margin-top:2%">Tahun</label>
		        				<div class="col-md-3">
		            				<input readonly="readonly" class="form-control" type="text" name="tahunShm" value="<?php echo $d->tahun_shm; ?>">
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-1 control-label" style="margin-top:2%">Luas</label>
		        				<div class="col-md-7">
		            				<input readonly="readonly" class="form-control" type="text" name="luasShm" value="<?php echo $d->luas_shm; ?>">
		            			</div>
		            			m<sup>2</sup>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-1 control-label" style="margin-top:2%">An.</label>
		        				<div class="col-md-11">
		            				<input readonly="readonly" class="form-control" type="text" name="namaShm" value="<?php echo $d->an_shm; ?>">
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
		            				<input readonly="readonly" class="form-control" type="text" name="petokLetc" value="<?php echo $d->petok_letc; ?>">
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-2 control-label" style="margin-top:2%">No. Persil</label>
		        				<div class="col-md-10">
		            				<input readonly="readonly" class="form-control" type="text" name="persilLetc" value="<?php echo $d->persil_letc; ?>">
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-1 control-label" style="margin-top:2%">Luas</label>
		        				<div class="col-md-7">
		            				<input readonly="readonly" class="form-control" type="text" name="luasLetc" value="<?php echo $d->luas_letc; ?>">
		            			</div>
		            			m<sup>2</sup>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-1 control-label" style="margin-top:2%">An.</label>
		        				<div class="col-md-11">
		            				<input readonly="readonly" class="form-control" type="text" name="namaLetc" value="<?php echo $d->an_letc; ?>">
		            			</div>
		        			</div>
	        			</div>
	        			<div style="text-align:center;">
	            			<h4 >Lain-lain</h4>
	            		</div>
	            		<div class="form-group" >
	            			<textarea class="form-control" rows="3" name="lainLain"><?php echo $d->lain_lain; ?></textarea>
	            		</div>
	            		<br/>
	        			<div style="text-align:left;">
	            			<h4>Batas Tanah</h4>
	            		</div>
	            		<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-2 control-label" style="margin-top:2%">Utara</label>
		        				<div class="col-md-4">
		            				<input readonly="readonly" class="form-control" type="text" name="batasUtara" value="<?php echo $d->batas_utara; ?>">
		            			</div>
		            			<label for="name" class="col-md-2 control-label" style="margin-top:2%">Timur</label>
		        				<div class="col-md-4">
		            				<input readonly="readonly" class="form-control" type="text" name="batasTimur" value="<?php echo $d->batas_timur; ?>">
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<label for="name" class="col-md-2 control-label" style="margin-top:2%">Selatan</label>
		        				<div class="col-md-4">
		            				<input readonly="readonly" class="form-control" type="text" name="batasSelatan" value="<?php echo $d->batas_selatan; ?>">
		            			</div>
		            			<label for="name" class="col-md-2 control-label" style="margin-top:2%">Barat</label>
		        				<div class="col-md-4">
		            				<input readonly="readonly" class="form-control" type="text" name="batasBarat" value="<?php echo $d->batas_barat; ?>">
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group" >
		                <label for="name">Penggunaan Tanah Sekarang</label><br>
		                    <textarea class="form-control" rows="3" name="penggunaanSekarang"> <?php echo $d->penggunaan_sekarang; ?></textarea>
                		</div>
                		<div style="text-align:left;">
	            			<h4>Rencana Penggunaan Tanah</h4>
	            		</div>
                		<div class="form-group row">
		        			<div class="form-group" >
		        				<div class="col-md-1" style="margin-top:2%">
		        					<input readonly="readonly" type="checkbox">
		        				</div>
		        				<label for="name" class="col-md-5 control-label" style="margin-top:2%">Pembangunan Baru</label>
		        				<div class="col-md-6">
		            				<input readonly="readonly" class="form-control" type="text" name="pembangunanBaru" value="<?php echo $d->rencana_pembangunan; ?>">
		            			</div>
		        			</div>
	        			</div>
	        			<div class="form-group row">
		        			<div class="form-group" >
		        				<div class="col-md-1" style="margin-top:2%">
		        					<input readonly="readonly" type="checkbox">
		        				</div>
		        				<label for="name" class="col-md-5 control-label" style="margin-top:2%">Perluasan</label>
		        				<div class="col-md-6">
		            				<input readonly="readonly" class="form-control" type="text" name="perluasan" value="<?php echo $d->rencana_perluasan; ?>">
		            			</div>
		        			</div>
	        			</div>
            		</div>
            	</div>
            	</form>
							<?php
								}
							 ?>
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
