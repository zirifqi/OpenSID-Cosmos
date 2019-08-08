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
			<h3 class="box-title"><?php echo $heading; ?> Desa <?php echo $config->nama_desa ?></h3>
		</div>
		<div class="box-body">
			<div id="chart"></div>
		</div>
	</div>

	
	<script type="text/javascript">
		$(document).ready(function() {

			var options = {
                chart: {
                    renderTo: 'chart',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: '<?php echo $heading; ?> Desa <?php echo $config->nama_desa ?>'
                },
				subtitle: {
					text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, <?php echo $heading; ?> Semester II, 2018</a>'
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
	