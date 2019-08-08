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
					<div id="chart1"></div>
					<br>
					<hr>
					<br>
				</div>
				<div class="col-md-12">
					<div id="chart2"></div>
					<br>
					<hr>
					<br>
				</div>
				<div class="col-md-12">
					<div id="chart3"></div>
					<br>
					<hr>
					<br>
				</div>
				<div class="col-md-12">
					<div id="chart4"></div>
					<br>
					<hr>
					<br>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		var options_col={
			chart: {type: 'column'},
			title: {text: ''},
			subtitle: {text: ''},
			xAxis: {categories: [],crosshair: true},
			yAxis: {min: 0,title: {text: 'Orang '}},
			tooltip: {
					headerFormat: '<span >{point.key}</span></br>',
					pointFormat: '{series.name}: ' +' {point.y:.1f} org </br>',
					footerFormat: '',shared: true,useHTML: true
				},
				plotOptions: {column: {pointPadding: 0.2,borderWidth: 0.2}
				},credits: {enabled: false},
				series:[]
		
		}	
		var options_pie={
			chart: {
				type: 'pie',
				options3d: {enabled: true,alpha: 45,beta: 0}},
				title: {text: 'Komposisi Kepala Keluarga Berdasarkan Jenis Kelamin'},
				tooltip: {formatter: function() {return '<b>'+ this.point.name +'</b>: '+  this.percentage.toFixed(2) +' %';}},
				plotOptions: {
					pie: {allowPointSelect: true,cursor: 'pointer',depth: 35,
					dataLabels: {
							enabled: true,
							formatter: function() {
								return '<b>'+ this.point.name +'</b>:<br> '+  this.point.y+' ('+  this.percentage.toFixed(2) +' %)';
							}
						}
					}
				},credits: {enabled: false},
				series: [{type: 'pie',name: 'Jumlah ', data: []}]
		} 
		
		$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/jumlah_penduduk_pendidikan_kel/<?php echo $config->kode_desa; ?>", function(json) {
					du = JSON.parse(JSON.stringify(json));
					
					//chart1
					let ch1 = Object.assign({},options_col);
					ch1.chart.renderTo= 'chart1';
					ch1.chart.type= 'bar';
					ch1.colors = ['#113f67', '#87c0cd'];
					ch1.title.text= 'Jumlah Pendidikan Penduduk Desa <?php echo $config->nama_desa; ?>' ;
					ch1.xAxis.categories= du.data_1_col;
					ch1.series=[];
					ch1.series.push({name:"Laki-Laki", data:du.data_1_p,pointPadding: -0.2});
					ch1.series.push({name:"Perempuan", data:du.data_1_w});
					chart = new Highcharts.Chart(ch1);

					//chart2
					let ch2 = Object.assign({},options_col);
					ch2.chart.renderTo= 'chart2';
					ch2.chart.type= 'bar';
					ch2.colors = ['#ed3833', '#63aabc'];
					ch2.title.text= 'Jumlah Pendidikan yang Bekerja Penduduk Desa <?php echo $config->nama_desa; ?>' ;
					ch2.xAxis.categories= du.data_1_col;
					ch2.series=[];
					ch2.series.push({name:"Laki-Laki", data:du.data_2_p,pointPadding: -0.2});
					ch2.series.push({name:"Perempuan", data:du.data_2_w});
					chart = new Highcharts.Chart(ch2);	

					//chart3
					let ch3 = Object.assign({},options_col);
					ch3.chart.renderTo= 'chart3';
					ch3.chart.type= 'bar';
					ch3.colors = ['#f09c67', '#f7e0a3'];
					ch3.title.text= 'Jumlah Pendidikan Tidak Bekerja Penduduk Desa <?php echo $config->nama_desa; ?>' ;
					ch3.xAxis.categories= du.data_1_col;
					ch3.series=[];
					ch3.series.push({name:"Laki-Laki", data:du.data_3_p,pointPadding: -0.2});
					ch3.series.push({name:"Perempuan", data:du.data_3_w});
					chart = new Highcharts.Chart(ch3);	
					
				});
				
				
				
			});     
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/jumlah_penduduk_pendidikan_umur_kel/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json))[0];
				// Age categories
				desa = '<?php echo $config->nama_desa; ?>';

				Highcharts.chart('chart4', {
					chart: {
						type: 'column'
					},
					title: {
						text: 'Jumlah Penduduk Pendidikan Umur Desa <?php echo "Desa "; ?> ' + desa  
					},
					subtitle: {
						text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Data Penduduk Pendidikan Umur Semester II, 2018</a>'
					},
					xAxis: {
						categories: [
							'SD (7-12 Tahun)',
							'SMP (13-15 Tahun)',
							'SMA (16-18 Tahun)',
							'Perguruan Tinggi (DI-SIII) (19-24 Tahun)'
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
							(du['p_sd'])*1, 
							(du['p_smp'])*1,
							(du['p_sma'])*1,
							(du['p_pt'])*1
							]
					}, {
						name: 'Wanita',
						data: [
							(du['w_sd'])*1, 
							(du['w_smp'])*1,
							(du['w_sma'])*1,
							(du['w_pt'])*1
							]
					}, {
						name: 'Jumlah',
						data: [
							(du['j_sd'])*1, 
							(du['j_smp'])*1,
							(du['j_sma'])*1,
							(du['j_pt'])*1
							]
					}
					]
				});

				//--piramid
			
			});
		} );
	</script>