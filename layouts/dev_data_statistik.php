<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Quicksand:400,700');

		img {
		height: auto;
		max-width: 100%;
		vertical-align: middle;
		}

		.btn {
		color: #ffffff;
		padding: 0.8rem;
		font-size: 14px;
		text-transform: uppercase;
		border-radius: 4px;
		font-weight: 400;
		display: block;
		width: 100%;
		cursor: pointer;
		border: 1px solid rgba(255, 255, 255, 0.2);
		background: transparent;
		}

		.btn:hover {
		background-color: rgba(255, 255, 255, 0.12);
		}

		.cards {
		display: flex;
		flex-wrap: wrap;
		list-style: none;
		margin: 0;
		padding: 0;
		}

		.cards_item {
		display: flex;
		padding: 1rem;
		}

		@media (min-width: 40rem) {
		.cards_item {
			width: 50%;
		}
		}

		@media (min-width: 56rem) {
		.cards_item {
			width: 33.3333%;
		}
		}

		.card {
		background-color: white;
		border-radius: 0.25rem;
		box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
		display: flex;
		flex-direction: column;
		overflow: hidden;
		}

		.card_content {
		padding: 1rem;
		/* background: linear-gradient(to bottom left, #286090 40%, #00c0ef 100%); */
		background:#b22222;
		}

		.card_title {
		color: #ffffff;
		font-size: 0.8rem;
		font-weight: 700;
		letter-spacing: 1px;
		text-transform: capitalize;
		margin: 0px;
		text-align : center;
		}

		.card_text {
		color: #ffffff;
		font-size: 0.875rem;
		line-height: 1.5;
		margin-bottom: 1.25rem;    
		font-weight: 400;
		}
		.made_by{
		font-weight: 400;
		font-size: 13px;
		margin-top: 35px;
		text-align: center;
		}
	</style>
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
							<!-- <div class="box box-danger">
								<div class="box-header with-border">
									<h3 class="box-title"><?php echo $heading." Desa ".$config->nama_desa; ?></h3>
								</div>
								<div class="box-body"> -->
									<ul class="cards">
										<li class="cards_item">
											<a href="<?php echo base_url("/first/statistik_jumlah_jiwa/"); ?>" target="_blank" style="text-decoration: none;">
												<div class="card">
													<div class="card_image"><img src="http://sim.rembangkab.go.id/penduduk/assets/image/pemkab_rembang.jpg"></div>
													<div class="card_content">
													<h6 class="card_title">Data Statistik Jumlah Jiwa</h6>	
													</div>
												</div>
											</a>
										</li>
										<li class="cards_item">
											<a href="<?php echo base_url("/first/statistik_kepala_keluarga/"); ?>" target="_blank" style="text-decoration: none;">
												<div class="card">
													<div class="card_image"><img src="http://sim.rembangkab.go.id/penduduk/assets/image/pemkab_rembang.jpg"></div>
													<div class="card_content">
													<h6 class="card_title">Data Statistik Kepala Keluarga</h6>	
													</div>
												</div>
											</a>
										</li>
										<li class="cards_item">
											<a href="<?php echo base_url("/first/statistik_wajib_ktp_kepemilikan_ktp/"); ?>" target="_blank" style="text-decoration: none;">
												<div class="card">
													<div class="card_image"><img src="http://sim.rembangkab.go.id/penduduk/assets/image/pemkab_rembang.jpg"></div>
													<div class="card_content">
													<h6 class="card_title">Wajib KTP dan Kepemilikan KTP</h6>	
													</div>
												</div>
											</a>
										</li>
										<li class="cards_item">
											<a href="<?php echo base_url("/first/statistik_pindah_datang/"); ?>" target="_blank" style="text-decoration: none;">
												<div class="card">
													<div class="card_image"><img src="http://sim.rembangkab.go.id/penduduk/assets/image/pemkab_rembang.jpg"></div>
													<div class="card_content">
													<h6 class="card_title">Data Pindah Datang Kependudukan</h6>	
													</div>
												</div>
											</a>
										</li>	
										<li class="cards_item">
											<a href="<?php echo base_url("/first/statistik_pendidikan_penduduk"); ?>" target="_blank" style="text-decoration: none;">
												<div class="card">
													<div class="card_image"><img src="http://sim.rembangkab.go.id/penduduk/assets/image/pemkab_rembang.jpg"></div>
													<div class="card_content">
													<h6 class="card_title">Data Statistik Pendidikan Penduduk</h6>	
													</div>
												</div>
											</a>
										</li>
										<li class="cards_item">
											<a href="<?php echo base_url("/first/statistik_pekerjaan_penduduk"); ?>" target="_blank" style="text-decoration: none;">
												<div class="card">
													<div class="card_image"><img src="http://sim.rembangkab.go.id/penduduk/assets/image/pemkab_rembang.jpg"></div>
													<div class="card_content">
													<h6 class="card_title">Data Statistik Pekerjaan Penduduk</h6>	
													</div>
												</div>
											</a>
										</li>
										<li class="cards_item">
											<a href="<?php echo base_url("/first/statistik_penduduk"); ?>" target="_blank" style="text-decoration: none;">
												<div class="card">
													<div class="card_image"><img src="http://sim.rembangkab.go.id/penduduk/assets/image/pemkab_rembang.jpg"></div>
													<div class="card_content">
													<h6 class="card_title">Data Statistik Penduduk</h6>	
													</div>
												</div>
											</a>
										</li>
									</ul>
								<!-- </div>
							</div> -->
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