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
			<div class="col-md-12">
				<div id="chart5"></div>
				<br>
				<hr>
				<br>
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
		
		$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/profil_kk/<?php echo $config->kode_desa; ?>", function(json) {
					du = JSON.parse(JSON.stringify(json));
					var kolom=[];
					var pria=[];
					var wanita=[];
					var jumlah=[];
					$.each(du.data_2_col, function( index, value ) {
						if(value.substring(0,1) == "p") {pria.push(du.data_2_val[index]);kolom.push("Umur " + value.substring(1,3)+"-"+value.substring(3,5) ); };
						if(value.substring(0,1) == "w") wanita.push(du.data_2_val[index]);
						if(value.substring(0,1) == "j") jumlah.push(du.data_2_val[index]);
					//console.log( index + ": " + value );
					});
					jumlah.pop();
								
					//chart2
					options_pie.chart.renderTo= 'chart2';
					options_pie.colors = ['#2f4858', '#f6ae2d'];
					options_pie.title.text= 'Komposisi Kepala Keluarga berdasar Jenis Kelamin';
					options_pie.series[0].data= [['Laki-Laki', du.data_1["pkk"]],['Perempuan', du.data_1["wkk"]]];
					chart = new Highcharts.Chart(options_pie);		
					//end chart2
					//chart3
					options_pie.chart.renderTo= 'chart3';
					options_pie.colors = ['#9EA09E', '#F08331'];
					options_pie.title.text= 'Komposisi Kartu Keluarga berdasar Jenis Kelamin';
					options_pie.series[0].data= [['Laki-Laki', du.data_1["pkk_kk"]],['Perempuan', du.data_1["wkk_kk"]]];
					chart = new Highcharts.Chart(options_pie);		
					//end chart2
					
					//test chart1
			
					let ch1 = Object.assign({},options_col);
					ch1.chart.renderTo= 'chart1';
					ch1.chart.type= 'column';
					ch1.title.text= 'Jumlah Kepala Keluarga & Kepala Keluarga ber-KK';
					ch1.xAxis.categories= ['Laki-Laki', 'Perempuan'];
					ch1.plotOptions= {column: {grouping: false,shadow: false,borderWidth: 0}};
					ch1.series=[];
					ch1.series.push({name:"Kepala Keluarga",data:[du.data_1["pkk"], du.data_1["wkk"]],pointPadding: 0.3,pointPlacement: -0.2});
					ch1.series.push({name:"Kepala Keluarga ber Kartu KK", data:[du.data_1["pkk_kk"], du.data_1["wkk_kk"]],pointPadding: 0.4,pointPlacement: -0.2});
					chart = new Highcharts.Chart(ch1);		
					//end test 
					
					//chart4
					let ch4 = Object.assign({},options_col);
					ch4.chart.renderTo= 'chart4';
					ch4.chart.type= 'column';
					ch4.title.text= 'Komposisi Kepala Keluarga berdasar Umur';
					ch4.xAxis.categories= kolom;
					ch4.series=[];
					ch4.series.push({name:"Laki-Laki", data:pria,pointPadding: -0.2});
					ch4.series.push({name:"Perempuan", data:wanita});
					chart = new Highcharts.Chart(ch4);		
					
					//chart5
					let ch5 = Object.assign({},options_col);
					ch5.chart.renderTo= 'chart5';
					ch5.chart.type= 'bar';
					ch5.colors = ['#C2DE3B', '#FE7B11'];
					ch5.title.text= 'Komposisi Kepala Keluarga berdasar Pendidikan';
					ch5.xAxis.categories= du.data_3_col;
					ch5.series=[];
					ch5.series.push({name:"Laki-Laki", data:du.data_3_p,pointPadding: -0.2});
					ch5.series.push({name:"Perempuan", data:du.data_3_w});
					chart = new Highcharts.Chart(ch5);	
					
					
				});
				
				
				
			});     
	</script>
	