<?php
	$this->load->view('page/header');
	$this->load->view('page/menu');
?>

    <div id="twrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h3></h3>
                </div>
               <!--  <div class="col-lg-8 col-lg-offset-2 himg">
                    <img src="<?= base_url() ?>assets/img/banyuwangi.jpg" class="img-responsive">
                </div> -->

            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /headerwrap -->


    <!-- *****************************************************************************************************************
     SERVICE LOGOS
     ***************************************************************************************************************** -->
     <div id="service">
        <div class="container">
            <div class="row centered">
                <div class="col-md-4">
                    <i class="fa fa-book"></i>
                    <h4 style="color:#00b3fe;">Fitur Advice Planning</h4>
                    <p>AP atau Advice Planning adalah suatu Pertimbangan Teknis Perencanaan untuk setiap orang pribadi dan atau Badan Usaha yang akan mengajukan Ijin Pemanfaatan Ruang dengan luas lahan minimal 500 (lima ratus) meter persegi. </p>
                    <p>
                    <a href="#" class="btn btn-theme">Regulasi</a></p>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-male"></i>
                    <h4 style="color:#00b3fe;">Form AP Perseorangan</h4>
                    <p>Pertimbangan Teknis Perencanaan untuk setiap orang pribadi mengajukan Ijin Pemanfaatan Ruang dengan luas lahan minimal 500 (lima ratus) meter persegi.</p>
                    <p><br/>
                    <a href="<?= base_url()?>homepage/form_perseorangan" class="btn btn-theme">Ajukan Form</a></p>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-university" aria-hidden="true"></i>
                    <h4 style="color:#00b3fe;">Form AP Badan Usaha</h4>
                    <p>Pertimbangan Teknis Perencanaan untuk Badan Usaha yang akan mengajukan Ijin Pemanfaatan Ruang dengan luas lahan minimal 500 (lima ratus) meter persegi.</p>
                    <p><br/>
                    <a href="<?= base_url()?>homepage/form_badan" class="btn btn-theme">Ajukan Form</a></p>
                </div>
            </div>
        </div><! --/container -->
     </div><! --/service -->



<?php
	$this->load->view('page/footer');
?>
