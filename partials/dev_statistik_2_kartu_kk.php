<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script src="<?php echo base_url()?>assets/js/highcharts/highcharts.js"></script>
<script src="<?php echo base_url()?>assets/js/highcharts/highcharts-more.js"></script>
<script src="<?php echo base_url()?>assets/js/highcharts/exporting.js"></script>
<style>
	tr.lebih{
		display:none;
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
<?php

	echo "
	<div class=\"box box-danger\">
		<div class=\"box-header with-border\">
			<h3 class=\"box-title\">Grafik ". $heading." Desa ".$config->nama_desa."</h3>
		</div>
		<div class=\"box-body\">
			<div id=\"container\"></div>
			<div id=\"contentpane\">
				<div class=\"ui-layout-north panel top\"></div>
			</div>
		</div>
	</div>"; ?>

	

<script type="text/javascript">
 $(document).ready(function() {
	var data1 = [{  "name":"14704","y": 0.17},{  "name":"14706","y": 0.20},{  "name":"21304","y": 0.25}];
    var options = {
			chart: {
				  renderTo: 'container',
				  type: 'column',
				  options3d: {
					enabled: true,
					alpha: 0,
					beta: 0,
					depth: 0,
					viewDistance: 25
				  }
				},
				title: {
				  text: 'Data'
				},
				subtitle: {
				  text: 'Dataset'
				},
				plotOptions: {
				  column: {
					depth: 0
				  }
				},
				series: [
					
				],
				xAxis: {
				  categories: ['Laki-Laki', 'Perempuan']
				},
				credits: {
				  enabled: false
				}
			  };

            
            $.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/profil_kk/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json));
               // console.log(json);
                console.log(du.data_1);
                console.log(du.data_2);
                console.log('- . ' + du.data_1["pkk"]);
				
				//options.series[0].data = du.data[0];
				//options.series[0].data = json;
                //chart = new Highcharts.Chart(options);
				// //---
								Highcharts.chart('container', {
									chart: {
										type: 'bar'
									},
									title: {text: 'Jumlah Kepala Keluarga & Kepala Keluarga ber-KK'},
									subtitle: {text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Laporan Penduduk Semester II, 2018</a>'},
									  
									xAxis: {
										categories: ['Laki-Laki', 'Perempuan'],
										title: {text: null}
									},
									yAxis: {
										min: 0,
										title: {
											text: 'Orang',
											align: 'high'
										},
										labels: {
											overflow: 'justify'
										}
									},
									tooltip: {
										valueSuffix: ' org'
									},
									plotOptions: {
										bar: {
											dataLabels: {enabled: true},
											
										}
									},
									legend: {
										layout: 'vertical',
										align: 'right',
										verticalAlign: 'bottom',
										x: 0,
										y: -30,
										floating: true,
										borderWidth: 1,
										backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
										shadow: true
									},
									credits: {
										enabled: false
									},
									series: [{
												name: 'Kepala Keluarga',
												pointPadding: -0.5,
												data: [du.data_1["pkk"], du.data_1["wkk"]]
											}, 
											{
												name: 'Kepala Keluarga ber KK',
												pointPlacement: 0.1,
												pointPadding: -0.2,
												data: [du.data_1["pkk_kk"], du.data_1["wkk_kk"]]
											}]
								});				// //---
				
            });
            
            
            
        });     
</script>
