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
			
			<div class="box-body">
				<div id="cont2" style="min-width: 360px; height: 400px; margin: 0 auto"></div>
			</div>
			
		</div>
	</div>
	<script type="text/javascript">
		var data_umur=[];
 	
		$(document).ready(function() {
		
            
			$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/kepemilikan_ktp/<?php echo $config->kode_desa; ?>", function(json) {
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
						text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Laporan Wajib KTP dan Kepemilikan KTP Semester II, 2018</a>'
					},
					xAxis: {
						categories: [
							'Pria',
							'Wanita'
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
							grouping: false,
							shadow: false,
							borderWidth: 0
						}
					},
					series: [{
						name: 'Wajib KTP',
						color: 'rgba(165,170,217,1)',
						data: [
							(du['wajib_ktp_pria_jumlah'])*1, 
							(du['wajib_ktp_wanita_jumlah'])*1],
						pointPadding: 0.3,
        				pointPlacement: -0.2
					}, {
						name: 'Kepemilikan KTP',
						color: 'rgba(126,86,134,.9)',
						data: [
							(du['kepemilikan_ktp_pria_jumlah'])*1, 
							(du['kepemilikan_ktp_wanita_jumlah'])*1],
						pointPadding: 0.4,
        				pointPlacement: -0.2
					}
					]
				});

				//--piramid
			
            });
		} );
	</script>
	