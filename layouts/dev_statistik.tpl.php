<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view($folder_themes . '/commons/meta') ?>
	<?php $this->load->view($folder_themes . '/commons/source_css') ?>
	<?php $this->load->view($folder_themes . '/commons/source_js') ?>
</head>
<body>
	<div id="loader-wrapper">
		<div id="loader"></div>
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>
	<?php $this->load->view($folder_themes . '/commons/header') ?>
	<?php $this->load->view($folder_themes . '/commons/nav') ?>
	<section id="main-content">
		<main>
			<div class="container">
				<div class="col-12 px-0">
					<div class="row m-0 justify-content-between">
						<div class="col-lg-8 bg-white justify-content-start">
						<?php
						if($tipe == 1){
							//jiwa
							$this->load->view(Web_Controller::fallback_default($this->theme, '/partials/dev_statistik_1_jumlah_jiwa.php'));
						}elseif($tipe == 2){
							//kartu kk
							$this->load->view(Web_Controller::fallback_default($this->theme, '/partials/dev_statistik_2_kartu_kk.php'));
							//$this->load->view($folder_themes.'/partials/wilayah.php');
						}elseif($tipe == 3){
							//kempilikan kk
							$this->load->view(Web_Controller::fallback_default($this->theme, '/partials/dev_statistik_3_kepemilikan_ktp.php'));
						}elseif($tipe == 4){
							//statistik kk
							$this->load->view(Web_Controller::fallback_default($this->theme, '/partials/dev_statistik_4_statistik_kk.php'));
						}elseif($tipe == 5){
							//statistik pindah datang
							$this->load->view(Web_Controller::fallback_default($this->theme, '/partials/dev_statistik_5_pindah_datang.php'));
						}elseif($tipe == 6){
							//statistik pendidikan penduduk
							$this->load->view(Web_Controller::fallback_default($this->theme, '/partials/dev_statistik_6_pendidikan_penduduk.php'));
						}elseif($tipe == 7){
							//statistik pekerjaan penduduk
							$this->load->view(Web_Controller::fallback_default($this->theme, '/partials/dev_statistik_7_pekerjaan_penduduk.php'));
						}elseif($tipe == 22){
							//statistik penduduk disabilitas
							$this->load->view(Web_Controller::fallback_default($this->theme, '/partials/dev_statistik_22_penduduk.php'));
						}elseif($tipe == 23){
							//statistik penduduk disabilitas
							$this->load->view(Web_Controller::fallback_default($this->theme, '/partials/dev_statistik_23_kepemilikan_paspor.php'));
						}elseif($tipe == 24){
							//statistik penduduk disabilitas
							$this->load->view(Web_Controller::fallback_default($this->theme, '/partials/dev_statistik_24_penduduk_terlantar.php'));
						}else{
							$this->load->view(Web_Controller::fallback_default($this->theme, '/partials/dev_statistik_0_jumlah_jiwa.php'));
						}
						?>
					</div>
						<aside class="col-lg-4 justify-content-end">
							<div class="widget">
								<?php $this->load->view($folder_themes .'/partials/widget') ?>
							</div>	
						</aside>
					</div>
				</div>
			</div>
		</main>
	</section>
	<?php $this->load->view($folder_themes .'/commons/footer') ?>
	<script>
			$("#share").jsSocials({
					shares: ["email", "twitter", "facebook", "googleplus", "line", "whatsapp"],
					shareIn: 'blank'
			});
	</script>
</body>
</html>
