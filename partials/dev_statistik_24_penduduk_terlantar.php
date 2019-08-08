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
			<h3 class="box-title">Grafik <?php echo $heading; ?> Desa <?php echo $config->nama_desa ?></h3>
		</div>
		<div class="box-body">
			<div id="cont2" style="min-width: 360px; height: 400px; margin: 0 auto"></div>
		</div>
	</div>

	
	<script type="text/javascript">
		$(document).ready(function() {
			$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/penduduk_terlantar/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json))[0];
				// Age categories
				desa = '<?php echo $config->nama_desa; ?>';

				Highcharts.chart('cont2', {
					chart: {
						type: 'column'
					},
					title: {
						text: '<?php echo $heading. " Desa "; ?> ' + desa  
					},
					subtitle: {
						text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, <?php echo $heading; ?> Semester II, 2018</a>'
					},
					xAxis: {
						categories: [
							'Penduduk Terlantar Dengan SKOT',
							'Penduduk Terlantar Non SKOT'
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
							(du['pria_penduduk_terlantar_dengan_skot'])*1, 
							(du['pria_penduduk_terlantar_dengan_non_skot'])*1
							]
					}, {
						name: 'Wanita',
						data: [
							(du['wanita_penduduk_terlantar_dengan_skot'])*1, 
							(du['wanita_penduduk_terlantar_dengan_non_skot'])*1
							]
					}, {
						name: 'Jumlah',
						data: [
							(du['jumlah_penduduk_terlantar_dengan_skot'])*1, 
							(du['jumlah_penduduk_terlantar_dengan_non_skot'])*1
							]
					}
					]
				});

				//--piramid
			
			});
		} );
	</script>
	