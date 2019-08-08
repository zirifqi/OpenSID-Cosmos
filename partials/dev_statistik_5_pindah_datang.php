<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script src="<?php echo base_url()?>assets/js/highcharts/highcharts.js"></script>
<script src="<?php echo base_url()?>assets/js/highcharts/highcharts-more.js"></script>
<script src="<?php echo base_url()?>assets/js/highcharts/exporting.js"></script>
<style>
	tr.lebih{
		display:none;
	}
	td, th {
	  text-align: center;
	}
	td.kiri {
	  text-align: left;
	}

</style>
<script>
$(function(){
	$('#showData').click(function(){
		$('tr.lebih').show();
		$('#showData').hide();
	});
});
</script>

	<div class="box box-danger">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo $heading. " Desa ".$config->nama_desa; ?></h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div id="cont1"></div>
					<br>
					<hr>
					<br>
				</div>
				<div class="col-md-12">
					<div id="cont2"></div>
					<br>
					<hr>
					<br>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var data_umur=[];
 	
		$(document).ready(function() {
		
			$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/pindah_datang/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json))[0];
				// Age categories
				desa = '<?php echo $config->nama_desa; ?>';

				Highcharts.chart('cont1', {
					chart: {
						type: 'column'
					},
					title: {
						text: 'Data Statistik Perpindahan dan Kedatangan <br>Penduduk Desa ' + desa  
					},
					subtitle: {
						text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Perpindahan dan Kedatangan Penduduk Semester II, 2018</a>'
					},
					xAxis: {
						categories: [
							'Pindah Antar Kab. / Kota',
							'Datang Antar Kab. / Kota',
							'Pindah Antar Provinsi',
							'Datang Antar Provinsi'
						]
					},
					yAxis: [{
						min: 0,
						title: {
							text: null
						},
						opposite: true
					}],
					legend: {
						shadow: false
					},
					tooltip: {
						shared: true
					},
					plotOptions: {
						column: {
							pointPadding: 0.2,
							borderWidth: 0
						}
					},
					series: [{
						name: 'Pria',
						data: [
							(du['pindah_pria_jumlah'])*1, 
							(du['datang_pria_jumlah'])*1,
							(du['pindah_prov_pria_jumlah'])*1,
							(du['datang_prov_pria_jumlah'])*1
							]
					}, {
						name: 'Wanita',
						data: [
							(du['pindah_wanita_jumlah'])*1, 
							(du['datang_wanita_jumlah'])*1,
							(du['pindah_prov_wanita_jumlah'])*1,
							(du['datang_prov_wanita_jumlah'])*1
							]
					}, {
						name: 'Jumlah',
						data: [
							(du['pindah_jumlah'])*1, 
							(du['datang_jumlah'])*1,
							(du['pindah_prov_jumlah'])*1,
							(du['datang_prov_jumlah'])*1
							]
					}
					]
				});			
            });


			$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/pindah_datang_in/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json))[0];
				// Age categories
				desa = '<?php echo $config->nama_desa; ?>';

				Highcharts.chart('cont2', {
					chart: {
						type: 'column'
					},
					title: {
						text: 'Data Statistik Perpindahan dan Kedatangan Internasional <br>Penduduk Desa ' + desa  
					},
					subtitle: {
						text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Perpindahan dan Kedatangan Penduduk Semester II, 2018</a>'
					},
					xAxis: {
						categories: [
							'Pindah SIAK',
							'Datang SIAK',
							'Pindah NON SIAK',
							'Datang NON SIAK'
						]
					},
					yAxis: [{
						min: 0,
						title: {
							text: null
						},
						opposite: true
					}],
					legend: {
						shadow: false
					},
					tooltip: {
						shared: true
					},
					plotOptions: {
						column: {
							pointPadding: 0.2,
							borderWidth: 0
						}
					},
					series: [{
						name: 'Pria',
						data: [
							(du['pria_pindah_siak'])*1, 
							(du['pria_datang_siak'])*1,
							(du['pria_pindah_non_siak'])*1,
							(du['pria_datang_non_siak'])*1
							]
					}, {
						name: 'Wanita',
						data: [
							(du['wanita_pindah_siak'])*1, 
							(du['wanita_datang_siak'])*1,
							(du['wanita_pindah_non_siak'])*1,
							(du['wanita_datang_non_siak'])*1
							]
					}, {
						name: 'Jumlah',
						data: [
							(du['jumlah_pindah_siak'])*1, 
							(du['jumlah_datang_siak'])*1,
							(du['jumlah_pindah_non_siak'])*1,
							(du['jumlah_datang_non_siak'])*1
							]
					}
					]
				});			
            });

		} );
	</script>
	