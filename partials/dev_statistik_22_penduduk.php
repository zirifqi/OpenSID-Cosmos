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
			<div class="row">
				<div class="col-md-12">
					<div id="cont18"></div>
					<br>
					<hr>
					<br>
				</div>
				<div class="col-md-12">
					<div id="cont19"></div>
					<br>
					<hr>
					<br>
				</div>
				<div class="col-md-12">
					<div id="cont20"></div>
					<br>
					<hr>
					<br>
				</div>
				<div class="col-md-12">
					<div id="cont21"></div>
					<br>
					<hr>
					<br>
				</div>
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
				<div class="col-md-12">
					<div id="cont3"></div>
					<br>
					<hr>
					<br>
				</div>
				<div class="col-md-12">
					<div id="cont4"></div>
					<br>
					<hr>
					<br>
				</div>
				<div class="col-md-12">
					<div id="cont5"></div>
					<br>
					<hr>
					<br>
				</div>
				<div class="col-md-12">
					<div id="cont6"></div>
					<br>
					<hr>
					<br>
				</div>
			</div>
			
		</div>
	</div>

	<!-- chart 18 -->
	<script type="text/javascript">
		$(document).ready(function() {
			$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/jumlah_penduduk_gol_darah/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json))[0];
				// Age categories
				desa = '<?php echo $config->nama_desa; ?>';

				Highcharts.chart('cont18', {
					chart: {
						type: 'column'
					},
					title: {
						text: 'Statistik Golongan Darah Penduduk Desa <?php echo "Desa "; ?> ' + desa  
					},
					subtitle: {
						text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Data Golongan Darah Penduduk Semester II, 2018</a>'
					},
					xAxis: {
						categories: [
							'Gol Darah A',
							'Gol Darah B',
							'Gol Darah AB',
							'Gol Darah O',
							'Gol Darah A+',
							'Gol Darah A-',
							'Gol Darah B+',
							'Gol Darah B-',
							'Gol Darah AB+',
							'Gol Darah AB-',
							'Gol Darah O+',
							'Gol Darah O-',
							'Tidak Tahu',
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
							(du['p_a'])*1, 
							(du['p_b'])*1,
							(du['p_ab'])*1,
							(du['p_o'])*1,
							(du['p_a_plus'])*1,
							(du['p_a_min'])*1,
							(du['p_b_plus'])*1,
							(du['p_b_min'])*1,
							(du['p_ab_plus'])*1,
							(du['p_ab_min'])*1,
							(du['p_o_plus'])*1,
							(du['p_o_min'])*1,
							(du['p_tidak_tahu'])*1
							]
					}, {
						name: 'Wanita',
						data: [
							(du['w_a'])*1, 
							(du['w_b'])*1,
							(du['w_ab'])*1,
							(du['w_o'])*1,
							(du['w_a_plus'])*1,
							(du['w_a_min'])*1,
							(du['w_b_plus'])*1,
							(du['w_b_min'])*1,
							(du['w_ab_plus'])*1,
							(du['w_ab_min'])*1,
							(du['w_o_plus'])*1,
							(du['w_o_min'])*1,
							(du['w_tidak_tahu'])*1
							]
					}, {
						name: 'Jumlah',
						data: [
							(du['j_a'])*1, 
							(du['j_b'])*1,
							(du['j_ab'])*1,
							(du['j_o'])*1,
							(du['j_a_plus'])*1,
							(du['j_a_min'])*1,
							(du['j_b_plus'])*1,
							(du['j_b_min'])*1,
							(du['j_ab_plus'])*1,
							(du['j_ab_min'])*1,
							(du['j_o_plus'])*1,
							(du['j_o_min'])*1,
							(du['j_tidak_tahu'])*1
							]
					}
					]
				});
			});
		} );
	</script>
	<!-- end chart 18 -->

	<!-- chart 19 -->
	<script type="text/javascript">
		$(document).ready(function() {
			$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/jumlah_penduduk_agama/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json))[0];
				// Age categories
				desa = '<?php echo $config->nama_desa; ?>';

				Highcharts.chart('cont19', {
					chart: {
						type: 'column'
					},
					title: {
						text: 'Statistik Agama Penduduk Desa <?php echo "Desa "; ?> ' + desa  
					},
					subtitle: {
						text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Data Agama Penduduk Semester II, 2018</a>'
					},
					xAxis: {
						categories: [
							'Islam',
							'Kristen',
							'Katholik',
							'Hindu',
							'Budha',
							'Konghuchu',
							'Aliran Kepercayaan'
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
							(du['p_islam'])*1, 
							(du['p_kristen'])*1,
							(du['p_katholik'])*1,
							(du['p_hindu'])*1,
							(du['p_budha'])*1,
							(du['p_konghuchu'])*1,
							(du['p_aliran_kepercayaan'])*1
							]
					}, {
						name: 'Wanita',
						data: [
							(du['w_islam'])*1, 
							(du['w_kristen'])*1,
							(du['w_katholik'])*1,
							(du['w_hindu'])*1,
							(du['w_budha'])*1,
							(du['w_konghuchu'])*1,
							(du['w_aliran_kepercayaan'])*1
							]
					}, {
						name: 'Jumlah',
						data: [
							(du['j_islam'])*1, 
							(du['j_kristen'])*1,
							(du['j_katholik'])*1,
							(du['j_hindu'])*1,
							(du['j_budha'])*1,
							(du['j_konghuchu'])*1,
							(du['j_aliran_kepercayaan'])*1
							]
					}
					]
				});
			});
		} );
	</script>
	<!-- end chart 19 -->

	<!-- chart 20 -->
	<script type="text/javascript">
		$(document).ready(function() {
			$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/penduduk_status_kawin/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json))[0];
				// Age categories
				desa = '<?php echo $config->nama_desa; ?>';

				Highcharts.chart('cont20', {
					chart: {
						type: 'column'
					},
					title: {
						text: 'Statistik Status Kawin Penduduk <?php echo "Desa "; ?> ' + desa  
					},
					subtitle: {
						text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Data Status Kawin Penduduk Semester II, 2018</a>'
					},
					xAxis: {
						categories: [
							'Belum Kawin',
							'Kawin',
							'Cerai Hidup',
							'Cerai Mati'
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
							(du['p_belum_kawin'])*1, 
							(du['p_kawin'])*1,
							(du['p_cerai_hidup'])*1,
							(du['p_cerai_mati'])*1
							]
					}, {
						name: 'Wanita',
						data: [
							(du['w_belum_kawin'])*1, 
							(du['w_kawin'])*1,
							(du['w_cerai_hidup'])*1,
							(du['w_cerai_mati'])*1
							]
					}, {
						name: 'Jumlah',
						data: [
							(du['j_belum_kawin'])*1, 
							(du['j_kawin'])*1,
							(du['j_cerai_hidup'])*1,
							(du['j_cerai_mati'])*1
							]
					}
					]
				});
			});
		} );
	</script>
	<!-- end chart 20 -->

	<!-- chart 21 -->
	<script type="text/javascript">
		var data_umur=[];
 	
		$(document).ready(function() {

                $.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/penduduk_kawin_umur/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json))[0];
				// Age categories
				desa = '<?php echo $config->nama_desa; ?>';
				var categories = [
									'15 - 19',
									'20 - 24',
									'25 - 29',
									'30 - 34',
									'35 - 39',
									'40 - 44',
									'45 - 49',
									'50 - 54',
									'55 - 59',
									'60 - 64',
									'65 - 69',
									'70 - 74',
									'75 ++',
									];

				Highcharts.chart('cont21', {
					chart: {
						type: 'bar'
					},
					title: {
						text: 'Piramida Penduduk Kawin Umur ' + desa  
					},
					subtitle: {
						text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Laporan Penduduk Kawin Umur Semester II, 2018</a>'
					},
					xAxis: [{
						categories: categories,
						reversed: false,
						labels: {
							step: 1
						}
					}, { // mirror axis on right side
						opposite: true,
						reversed: false,
						categories: categories,
						linkedTo: 0,
						labels: {
							step: 1
						}
					}],
					yAxis: {
						title: {
							text: null
						},
						labels: {
							formatter: function () {
								return Math.abs(this.value);
							}
						}
					},

					plotOptions: {
						series: {
							stacking: 'normal'
						}
					},

					tooltip: {
						formatter: function () {
							return '<b>' + this.series.name + ', umur ' + this.point.category + '</b><br/>' +
								'Jumlah: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
						}
					},

					series: [{
						name: 'Laki-Laki',
						data: [ 
							(du['p1519'])*-1, 
							(du['p2024'])*-1, 
							(du['p2529'])*-1, 
							(du['p3034'])*-1, 
							(du['p3539'])*-1, 
							(du['p4044'])*-1, 
							(du['p4549'])*-1, 
							(du['p5054'])*-1, 
							(du['p5559'])*-1, 
							(du['p6064'])*-1, 
							(du['p6569'])*-1, 
							(du['p7074'])*-1, 
							(du['p7599'])*-1 
							]
					}, {
						name: 'Perempuan',
						data: [
							(du['w1519'])*1, 
							(du['w2024'])*1, 
							(du['w2529'])*1, 
							(du['w3034'])*1, 
							(du['w3539'])*1, 
							(du['w4044'])*1, 
							(du['w4549'])*1, 
							(du['w5054'])*1, 
							(du['w5559'])*1, 
							(du['w6064'])*1, 
							(du['w6569'])*1, 
							(du['w7074'])*1, 
							(du['w7599'])*1, 
							]
					}]
				});

				//--piramid
			
            });
		} );
	</script>
	<!-- end chart 21 -->

	<!-- chart 22 -->
	<script type="text/javascript">
		$(document).ready(function() {
			$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/penduduk_disabilitas/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json))[0];
				// Age categories
				desa = '<?php echo $config->nama_desa; ?>';

				Highcharts.chart('cont1', {
					chart: {
						type: 'column'
					},
					title: {
						text: 'Data Penduduk Disabilitas <?php echo "Desa "; ?> ' + desa  
					},
					subtitle: {
						text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Data Penduduk Disabilitas Semester II, 2018</a>'
					},
					xAxis: {
						categories: [
							'Fisik',
							'Netra/Buta',
							'Rungu/Wicara',
							'Mental/Jiwa',
							'Fisik Mental',
							'Lainya'
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
							(du['pria_fisik'])*1, 
							(du['pria_buta'])*1,
							(du['pria_rungu'])*1,
							(du['pria_mental'])*1,
							(du['pria_fisik_mental'])*1,
							(du['pria_lainya'])*1
							]
					}, {
						name: 'Wanita',
						data: [
							(du['wanita_fisik'])*1, 
							(du['wanita_buta'])*1,
							(du['wanita_rungu'])*1,
							(du['wanita_mental'])*1,
							(du['wanita_fisik_mental'])*1,
							(du['wanita_lainnya'])*1
							]
					}, {
						name: 'Jumlah',
						data: [
							(du['jumlah_fisik'])*1, 
							(du['jumlah_buta'])*1,
							(du['jumlah_rungu'])*1,
							(du['jumlah_mental'])*1,
							(du['jumlah_fisik_mental'])*1,
							(du['jumlah_lainya'])*1
							]
					}
					]
				});
			});
		} );
	</script>
	<!-- end chart 22 -->
	
	<!-- chart 23 -->
	<script type="text/javascript">
		$(document).ready(function() {

			var options = {
                chart: {
                    renderTo: 'cont2',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Data Kepemilikan Paspor Desa <?php echo $config->nama_desa ?>'
                },
				subtitle: {
					text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Data Kepemilikan Paspor Semester II, 2018</a>'
				},
                tooltip: {
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>: '+  this.percentage.toFixed(2) +' %';
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: '#000000',
							// distance: '15',
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>:<br> '+  this.point.y+' ('+  this.percentage.toFixed(2) +' %)';
                            }
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Kepemilikan Paspor',
                    data: []
                }]
            }
            
            $.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/kepemilikan_paspor/<?php echo $config->kode_desa; ?>", function(json) {
               	du = $.parseJSON(JSON.stringify(json));
				
				
				options.series[0].data = json;
                chart = new Highcharts.Chart(options);

				console.log('tesss', du[0]);
            });
			
		
		});
	</script>
	<!-- end chart 23 -->

	<!-- chart 24 -->
	<script type="text/javascript">
		$(document).ready(function() {
			$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/penduduk_terlantar/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json))[0];
				// Age categories
				desa = '<?php echo $config->nama_desa; ?>';

				Highcharts.chart('cont3', {
					chart: {
						type: 'column'
					},
					title: {
						text: 'Statistik Penduduk Terlantar Desa <?php echo $config->nama_desa; ?> ' 
					},
					subtitle: {
						text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Laporan Penduduk Desa Terlantar Semester II, 2018</a>'
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
	<!-- end chart 24 -->

	<!-- chart 25 -->
	<script type="text/javascript">
		$(document).ready(function() {
			$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/penduduk_komunitas_terpencil/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json))[0];
				// Age categories
				desa = '<?php echo $config->nama_desa; ?>';

				Highcharts.chart('cont4', {
					chart: {
						type: 'column'
					},
					title: {
						text: 'Statistik Penduduk Komunitas Terpencil Desa <?php echo $config->nama_desa; ?> ' 
					},
					subtitle: {
						text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Laporan Penduduk Komunitas Terpencil Semester II, 2018</a>'
					},
					xAxis: {
						categories: [
							'Penduduk Komunitas terpencil dengan STK',
							'Penduduk Komunitas terpencil dengan NON STK'
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
							(du['pria_komunitas_terpencil_dengan_stk'])*1, 
							(du['pria_komunitas_terpencil_dengan_non_stk'])*1
							]
					}, {
						name: 'Wanita',
						data: [
							(du['wanita_komunitas_terpencil_dengan_stk'])*1, 
							(du['wanita_komunitas_terpencil_dengan_non_stk'])*1
							]
					}, {
						name: 'Jumlah',
						data: [
							(du['jumlah_komunitas_terpencil_dengan_stk'])*1, 
							(du['jumlah_komunitas_terpencil_dengan_non_stk'])*1
							]
					}
					]
				});
			
			});
		} );
	</script>
	<!-- end chart 25 -->

	<!-- chart 26 -->
	<script type="text/javascript">
		$(document).ready(function() {
			$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/penduduk_pemegang_plb/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json))[0];
				// Age categories
				desa = '<?php echo $config->nama_desa; ?>';

				Highcharts.chart('cont5', {
					chart: {
						type: 'column'
					},
					title: {
						text: 'Statistik Penduduk Pemegang PLB Desa <?php echo $config->nama_desa; ?> ' 
					},
					subtitle: {
						text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Laporan Penduduk Pemegang PLB Semester II, 2018</a>'
					},
					xAxis: {
						categories: [
							'Pemegang PLB Terdaftar',
							'Pemegang PLB Tidak Terdaftar'
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
							(du['pria_pemegang_plb_terdaftar'])*1, 
							(du['pria_pemegang_plb_tidak_terdaftar'])*1
							]
					}, {
						name: 'Wanita',
						data: [
							(du['wanita_pemegang_plb_terdaftar'])*1, 
							(du['wanita_pemegang_plb_tidak_terdaftar'])*1
							]
					}, {
						name: 'Jumlah',
						data: [
							(du['jumlah_pemegang_plb_terdaftar'])*1, 
							(du['jumlah_pemegang_plb_tidak_terdaftar'])*1
							]
					}
					]
				});
			
			});
		} );
	</script>
	<!-- end chart 26 -->

	<!-- chart 27 -->
	<script type="text/javascript">
		$(document).ready(function() {
			$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/penduduk_wna/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json))[0];
				// Age categories
				desa = '<?php echo $config->nama_desa; ?>';

				Highcharts.chart('cont6', {
					chart: {
						type: 'column'
					},
					title: {
						text: 'Jumlah Penduduk WNA Desa <?php echo $config->nama_desa; ?> ' 
					},
					subtitle: {
						text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Laporan Jumlah Penduduk WNA Semester II, 2018</a>'
					},
					xAxis: {
						categories: [
							'WNA Pemegang KITAS',
							'WNA Pemegang KITAS yang tercatat di SIAK',
							'WNA Pemegang KITAP',
							'WNA Pemegang KITAP yang tercatat di SIAK'
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
							(du['pria_wna_pemegang_kitas'])*1, 
							(du['pria_wna_pemegang_kitas_tercatat_siak'])*1,
							(du['pria_wna_pemegang_kitap'])*1,
							(du['pria_wna_pemegang_kitap_tercatat_siak'])*1
							]
					}, {
						name: 'Wanita',
						data: [
							(du['wanita_wna_pemegang_kitas'])*1, 
							(du['wanita_wna_pemegang_kitas_tercatat_siak'])*1,
							(du['wanita_wna_pemegang_kitap'])*1,
							(du['wanita_wna_pemegang_kitap_tercatat_siak'])*1
							]
					}, {
						name: 'Jumlah',
						data: [
							(du['jumlah_wna_pemegang_kitas'])*1, 
							(du['jumlah_wna_pemegang_kitas_tercatat_siak'])*1,
							(du['jumlah_wna_pemegang_kitap'])*1,
							(du['jumlah_wna_pemegang_kitap_tercatat_siak'])*1
							]
					}
					]
				});
			
			});
		} );
	</script>
	<!-- end chart 27 -->