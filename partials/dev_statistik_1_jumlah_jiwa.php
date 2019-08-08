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

	<div class="box box-danger">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo "Komposisi Penduduk Desa ".$config->nama_desa; ?></h3>
		</div>
		<div class="box-body">
			<?php
			echo "<div class=\"box-body\">
					<div id=\"cont2\"></div>
					<div id=\"contentpane\">
						<div class=\"ui-layout-north panel top\"></div>
					</div>
					</div>";
			?>
			<div class="table-responsive">
				<table id="tblumur" class="display table table-striped" style="width:100%">
					 
					<thead>
						<tr>
							<th>No.</th>
							<th>Kelompok Umur</th>
							<th>Jumlah Laki-Laki</th>
							<th>Jumlah Perempuan</th>
							<th>Total</th>
													
						</tr>
					</thead>
						 <tbody>
						</tbody>
					<tfoot>
						<tr id='jumlah'>
							<th></th>
							<th>Jumlah</th>
							
														
						</tr> 
					</tfoot>	 
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var data_umur=[];
 	
		$(document).ready(function() {
			var options = {
                chart: {
                    renderTo: 'container',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Data Jumlah Jiwa'
                },
				subtitle: {
					text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Laporan Penduduk Semester II, 2018</a>'
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
                    name: 'Komposisi Penduduk',
                    data: []
                }]
            }
            
            $.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/persentase_jumlah_jiwa_per_desa/<?php echo $config->kode_desa; ?>", function(json) {
               	du = $.parseJSON(JSON.stringify(json));
				var	t = "<th>"+du[0][1]+"</th><th>"+du[1][1]+"</th><th>"+((du[0][1])+(du[1][1]))+"</th>";
				$("#jumlah ").append(t);
				
				options.series[0].data = json;
                chart = new Highcharts.Chart(options);
            });
            
			
            
			$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/jumlah_jiwa_per_desa/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json))[0];
				var	t =           "<tr><td>1</td><td class='kiri'> Umur 00 - 04 tahun </td><td>"+du['p0004']+"</td><td>"+du['w0004']+"</td><td>"+du['j0004']+"</td></tr>";
						t = t  +  "<tr><td>2</td><td class='kiri'> Umur 05 - 09 tahun </td><td>"+du['p0509']+"</td><td>"+du['w0509']+"</td><td>"+du['j0509']+"</td></tr>";
						t = t  +  "<tr><td>3</td><td class='kiri'> Umur 10 - 14 tahun </td><td>"+du['p1014']+"</td><td>"+du['w1014']+"</td><td>"+du['j1014']+"</td></tr>";
						t = t  +  "<tr><td>4</td><td class='kiri'> Umur 15 - 19 tahun </td><td>"+du['p1519']+"</td><td>"+du['w1519']+"</td><td>"+du['j1519']+"</td></tr>";
						t = t  +  "<tr><td>5</td><td class='kiri'> Umur 20 - 24 tahun </td><td>"+du['p2024']+"</td><td>"+du['w2024']+"</td><td>"+du['j2024']+"</td></tr>";
						t = t  +  "<tr><td>6</td><td class='kiri'> Umur 25 - 29 tahun </td><td>"+du['p2529']+"</td><td>"+du['w2529']+"</td><td>"+du['j2529']+"</td></tr>";
						t = t  +  "<tr><td>7</td><td class='kiri'> Umur 30 - 34 tahun </td><td>"+du['p3034']+"</td><td>"+du['w3034']+"</td><td>"+du['j3034']+"</td></tr>";
						t = t  +  "<tr><td>8</td><td class='kiri'> Umur 35 - 39 tahun </td><td>"+du['p3539']+"</td><td>"+du['w3539']+"</td><td>"+du['j3539']+"</td></tr>";
						t = t  +  "<tr><td>9</td><td class='kiri'> Umur 40 - 44 tahun </td><td>"+du['p4044']+"</td><td>"+du['w4044']+"</td><td>"+du['j4044']+"</td></tr>";
						t = t  +  "<tr><td>10</td><td class='kiri'> Umur 45 - 49 tahun </td><td>"+du['p4549']+"</td><td>"+du['w4549']+"</td><td>"+du['j4549']+"</td></tr>";
						t = t  +  "<tr><td>11</td><td class='kiri'> Umur 50 - 54 tahun </td><td>"+du['p5054']+"</td><td>"+du['w5054']+"</td><td>"+du['j5054']+"</td></tr>";
						t = t  +  "<tr><td>12</td><td class='kiri'> Umur 55 - 59 tahun </td><td>"+du['p5559']+"</td><td>"+du['w5559']+"</td><td>"+du['j5559']+"</td></tr>";
						t = t  +  "<tr><td>13</td><td class='kiri'> Umur 60 - 64 tahun </td><td>"+du['p6064']+"</td><td>"+du['w6064']+"</td><td>"+du['j6064']+"</td></tr>";
						t = t  +  "<tr><td>14</td><td class='kiri'> Umur 65 - 69 tahun </td><td>"+du['p6569']+"</td><td>"+du['w6569']+"</td><td>"+du['j6569']+"</td></tr>";
						t = t  +  "<tr><td>15</td><td class='kiri'> Umur 70 - 74 tahun </td><td>"+du['p7074']+"</td><td>"+du['w7074']+"</td><td>"+du['j7074']+"</td></tr>";
						t = t  +  "<tr><td>16</td><td class='kiri'> Umur 75 tahun keatas </td><td>"+du['p7599']+"</td><td>"+du['w7599']+"</td><td>"+du['j7599']+"</td></tr>";

				$("#tblumur tbody").append(t);
				//--piramid
				// Age categories
				desa = '<?php echo $config->nama_desa; ?>';
				var categories = ['00 - 04',
									'05 - 09',
									'10 - 14',
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

				Highcharts.chart('cont2', {
					chart: {
						type: 'bar'
					},
					title: {
						text: 'Piramida Penduduk ' + desa  
					},
					subtitle: {
						text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Laporan Penduduk Semester II, 2018</a>'
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
							(du['p0004'])*-1, 
							(du['p0509'])*-1, 
							(du['p1014'])*-1, 
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
							(du['w0004'])*1, 
							(du['w0509'])*1, 
							(du['w1014'])*1, 
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
	