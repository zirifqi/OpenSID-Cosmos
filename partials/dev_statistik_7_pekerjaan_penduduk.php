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
			<h3 class="box-title"><?php echo "Jumlah Penduduk Pekerjaan Desa ".$config->nama_desa; ?></h3>
		</div>
		<div class="box-body">
			<div class="box-body">
				<div id="cont1">
				</div>
			</div>
			<div class="table-responsive">
				<table id="tblpekerjaan" class="display table table-striped" style="width:100%">
					 
					<thead>
						<tr>
							<th>No.</th>
							<th>Pekerjaan</th>
							<th>Jumlah Laki-Laki</th>
							<th>Jumlah Perempuan</th>
							<th>Total</th>
													
						</tr>
					</thead>
					<tbody>
					</tbody>	 
				</table>
			</div>
		</div>
	</div>
	<div class="box box-danger">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo "Jumlah Penduduk Usia Produktif Kerja Desa ".$config->nama_desa; ?></h3>
		</div>
		<div class="box-body">
			<div class="box-body">
				<div id="cont2">
				</div>
			</div>
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
				</table>
			</div>
		</div>
	</div>
	<div class="box box-danger">
		<div class="box-header with-border">
			<h3 class="box-title"><?php echo "Jumlah Penduduk Usia Produktif Tidak Bekerja Desa ".$config->nama_desa; ?></h3>
		</div>
		<div class="box-body">
			<div class="box-body">
				<div id="cont3">
				</div>
			</div>
			<div class="table-responsive">
				<table id="tblumur2" class="display table table-striped" style="width:100%">
					 
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
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
 	
		$(document).ready(function() {
						
			$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/jumlah_penduduk_pekerjaan_kel/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json))[0];
				var	t =           "<tr><td>1</td><td class='kiri'> Belum/Tidak Bekerja </td><td>"+du['idprof_01_p']+"</td><td>"+du['idprof_01_w']+"</td><td>"+du['idprof_01_j']+"</td></tr>";
				t = t +"<tr><td>2</td><td class='kiri'> Mengurus Rumah Tangga </td><td>"+du['idprof_02_p']+"</td><td>"+du['idprof_02_w']+"</td><td>"+du['idprof_02_j']+"</td></tr>";
				t = t +"<tr><td>3</td><td class='kiri'> Pelajar/Mahasiswa </td><td>"+du['idprof_03_p']+"</td><td>"+du['idprof_03_w']+"</td><td>"+du['idprof_03_j']+"</td></tr>";
				t = t +"<tr><td>4</td><td class='kiri'> Pensiunan </td><td>"+du['idprof_04_p']+"</td><td>"+du['idprof_04_w']+"</td><td>"+du['idprof_04_j']+"</td></tr>";
				t = t +"<tr><td>5</td><td class='kiri'> Pegawai Negeri Sipil </td><td>"+du['idprof_05_p']+"</td><td>"+du['idprof_05_w']+"</td><td>"+du['idprof_05_j']+"</td></tr>";
				t = t +"<tr><td>6</td><td class='kiri'> Tentara Nasional Indonesia </td><td>"+du['idprof_06_p']+"</td><td>"+du['idprof_06_w']+"</td><td>"+du['idprof_06_j']+"</td></tr>";
				t = t +"<tr><td>7</td><td class='kiri'> Kepolisian RI </td><td>"+du['idprof_07_p']+"</td><td>"+du['idprof_07_w']+"</td><td>"+du['idprof_07_j']+"</td></tr>";
				t = t +"<tr><td>8</td><td class='kiri'> Perdagangan </td><td>"+du['idprof_08_p']+"</td><td>"+du['idprof_08_w']+"</td><td>"+du['idprof_08_j']+"</td></tr>";
				t = t +"<tr><td>9</td><td class='kiri'> Petani/Pekebun </td><td>"+du['idprof_09_p']+"</td><td>"+du['idprof_09_w']+"</td><td>"+du['idprof_09_j']+"</td></tr>";
				t = t +"<tr><td>10</td><td class='kiri'> Peternak </td><td>"+du['idprof_10_p']+"</td><td>"+du['idprof_10_w']+"</td><td>"+du['idprof_10_j']+"</td></tr>";
				t = t +"<tr><td>11</td><td class='kiri'> Nelayan/Perikanan </td><td>"+du['idprof_11_p']+"</td><td>"+du['idprof_11_w']+"</td><td>"+du['idprof_11_j']+"</td></tr>";
				t = t +"<tr><td>12</td><td class='kiri'> Industri </td><td>"+du['idprof_12_p']+"</td><td>"+du['idprof_12_w']+"</td><td>"+du['idprof_12_j']+"</td></tr>";
				t = t +"<tr><td>13</td><td class='kiri'> Konstruksi </td><td>"+du['idprof_13_p']+"</td><td>"+du['idprof_13_w']+"</td><td>"+du['idprof_13_j']+"</td></tr>";
				t = t +"<tr><td>14</td><td class='kiri'> Transportasi </td><td>"+du['idprof_14_p']+"</td><td>"+du['idprof_14_w']+"</td><td>"+du['idprof_14_j']+"</td></tr>";
				t = t +"<tr><td>15</td><td class='kiri'> Karyawan Swasta </td><td>"+du['idprof_15_p']+"</td><td>"+du['idprof_15_w']+"</td><td>"+du['idprof_15_j']+"</td></tr>";
				t = t +"<tr><td>16</td><td class='kiri'> Karyawan BUMN </td><td>"+du['idprof_16_p']+"</td><td>"+du['idprof_16_w']+"</td><td>"+du['idprof_16_j']+"</td></tr>";
				t = t +"<tr><td>17</td><td class='kiri'> Karyawan BUMD </td><td>"+du['idprof_17_p']+"</td><td>"+du['idprof_17_w']+"</td><td>"+du['idprof_17_j']+"</td></tr>";
				t = t +"<tr><td>18</td><td class='kiri'> Karyawan Honorer </td><td>"+du['idprof_18_p']+"</td><td>"+du['idprof_18_w']+"</td><td>"+du['idprof_18_j']+"</td></tr>";
				t = t +"<tr><td>19</td><td class='kiri'> Buruh Harian Lepas </td><td>"+du['idprof_19_p']+"</td><td>"+du['idprof_19_w']+"</td><td>"+du['idprof_19_j']+"</td></tr>";
				t = t +"<tr><td>20</td><td class='kiri'> Buruh Tani/Perkebunan </td><td>"+du['idprof_20_p']+"</td><td>"+du['idprof_20_w']+"</td><td>"+du['idprof_20_j']+"</td></tr>";
				t = t +"<tr><td>21</td><td class='kiri'> Buruh Nelayan/Perikanan </td><td>"+du['idprof_21_p']+"</td><td>"+du['idprof_21_w']+"</td><td>"+du['idprof_21_j']+"</td></tr>";
				t = t +"<tr><td>22</td><td class='kiri'> Buruh Peternakan </td><td>"+du['idprof_22_p']+"</td><td>"+du['idprof_22_w']+"</td><td>"+du['idprof_22_j']+"</td></tr>";
				t = t +"<tr><td>23</td><td class='kiri'> Pembantu Rumah Tangga </td><td>"+du['idprof_23_p']+"</td><td>"+du['idprof_23_w']+"</td><td>"+du['idprof_23_j']+"</td></tr>";
				t = t +"<tr><td>24</td><td class='kiri'> Tukang Cukur </td><td>"+du['idprof_24_p']+"</td><td>"+du['idprof_24_w']+"</td><td>"+du['idprof_24_j']+"</td></tr>";
				t = t +"<tr><td>25</td><td class='kiri'> Tukang Listrik </td><td>"+du['idprof_25_p']+"</td><td>"+du['idprof_25_w']+"</td><td>"+du['idprof_25_j']+"</td></tr>";
				t = t +"<tr><td>26</td><td class='kiri'> Tukang Batu </td><td>"+du['idprof_26_p']+"</td><td>"+du['idprof_26_w']+"</td><td>"+du['idprof_26_j']+"</td></tr>";
				t = t +"<tr><td>27</td><td class='kiri'> Tukang Kayu </td><td>"+du['idprof_27_p']+"</td><td>"+du['idprof_27_w']+"</td><td>"+du['idprof_27_j']+"</td></tr>";
				t = t +"<tr><td>28</td><td class='kiri'> Tukang Sol Sepatu </td><td>"+du['idprof_28_p']+"</td><td>"+du['idprof_28_w']+"</td><td>"+du['idprof_28_j']+"</td></tr>";
				t = t +"<tr><td>29</td><td class='kiri'> Tukang Las/Pandai Besi </td><td>"+du['idprof_29_p']+"</td><td>"+du['idprof_29_w']+"</td><td>"+du['idprof_29_j']+"</td></tr>";
				t = t +"<tr><td>30</td><td class='kiri'> Tukang Jahit </td><td>"+du['idprof_30_p']+"</td><td>"+du['idprof_30_w']+"</td><td>"+du['idprof_30_j']+"</td></tr>";
				t = t +"<tr><td>31</td><td class='kiri'> Tukang Gigi </td><td>"+du['idprof_31_p']+"</td><td>"+du['idprof_31_w']+"</td><td>"+du['idprof_31_j']+"</td></tr>";
				t = t +"<tr><td>32</td><td class='kiri'> Penata Rias </td><td>"+du['idprof_32_p']+"</td><td>"+du['idprof_32_w']+"</td><td>"+du['idprof_32_j']+"</td></tr>";
				t = t +"<tr><td>33</td><td class='kiri'> Penata Busana </td><td>"+du['idprof_33_p']+"</td><td>"+du['idprof_33_w']+"</td><td>"+du['idprof_33_j']+"</td></tr>";
				t = t +"<tr><td>34</td><td class='kiri'> Penata Rambut </td><td>"+du['idprof_34_p']+"</td><td>"+du['idprof_34_w']+"</td><td>"+du['idprof_34_j']+"</td></tr>";
				t = t +"<tr><td>35</td><td class='kiri'> Mekanik </td><td>"+du['idprof_35_p']+"</td><td>"+du['idprof_35_w']+"</td><td>"+du['idprof_35_j']+"</td></tr>";
				t = t +"<tr><td>36</td><td class='kiri'> Seniman </td><td>"+du['idprof_36_p']+"</td><td>"+du['idprof_36_w']+"</td><td>"+du['idprof_36_j']+"</td></tr>";
				t = t +"<tr><td>37</td><td class='kiri'> Tabib </td><td>"+du['idprof_37_p']+"</td><td>"+du['idprof_37_w']+"</td><td>"+du['idprof_37_j']+"</td></tr>";
				t = t +"<tr><td>38</td><td class='kiri'> Paraji </td><td>"+du['idprof_38_p']+"</td><td>"+du['idprof_38_w']+"</td><td>"+du['idprof_38_j']+"</td></tr>";
				t = t +"<tr><td>39</td><td class='kiri'> Perancang Busana </td><td>"+du['idprof_39_p']+"</td><td>"+du['idprof_39_w']+"</td><td>"+du['idprof_39_j']+"</td></tr>";
				t = t +"<tr><td>40</td><td class='kiri'> Penterjemah </td><td>"+du['idprof_40_p']+"</td><td>"+du['idprof_40_w']+"</td><td>"+du['idprof_40_j']+"</td></tr>";
				t = t +"<tr><td>41</td><td class='kiri'> Imam Mesjid </td><td>"+du['idprof_41_p']+"</td><td>"+du['idprof_41_w']+"</td><td>"+du['idprof_41_j']+"</td></tr>";
				t = t +"<tr><td>42</td><td class='kiri'> Pendeta </td><td>"+du['idprof_42_p']+"</td><td>"+du['idprof_42_w']+"</td><td>"+du['idprof_42_j']+"</td></tr>";
				t = t +"<tr><td>43</td><td class='kiri'> Pastor </td><td>"+du['idprof_43_p']+"</td><td>"+du['idprof_43_w']+"</td><td>"+du['idprof_43_j']+"</td></tr>";
				t = t +"<tr><td>44</td><td class='kiri'> Wartawan </td><td>"+du['idprof_44_p']+"</td><td>"+du['idprof_44_w']+"</td><td>"+du['idprof_44_j']+"</td></tr>";
				t = t +"<tr><td>45</td><td class='kiri'> Ustadz/Mubaligh </td><td>"+du['idprof_45_p']+"</td><td>"+du['idprof_45_w']+"</td><td>"+du['idprof_45_j']+"</td></tr>";
				t = t +"<tr><td>46</td><td class='kiri'> Juru Masak </td><td>"+du['idprof_46_p']+"</td><td>"+du['idprof_46_w']+"</td><td>"+du['idprof_46_j']+"</td></tr>";
				t = t +"<tr><td>47</td><td class='kiri'> Promotor Acara </td><td>"+du['idprof_47_p']+"</td><td>"+du['idprof_47_w']+"</td><td>"+du['idprof_47_j']+"</td></tr>";
				t = t +"<tr><td>48</td><td class='kiri'> Anggota DPR-RI </td><td>"+du['idprof_48_p']+"</td><td>"+du['idprof_48_w']+"</td><td>"+du['idprof_48_j']+"</td></tr>";
				t = t +"<tr><td>49</td><td class='kiri'> Anggota DPD </td><td>"+du['idprof_49_p']+"</td><td>"+du['idprof_49_w']+"</td><td>"+du['idprof_49_j']+"</td></tr>";
				t = t +"<tr><td>50</td><td class='kiri'> Anggota BPK </td><td>"+du['idprof_50_p']+"</td><td>"+du['idprof_50_w']+"</td><td>"+du['idprof_50_j']+"</td></tr>";
				t = t +"<tr><td>51</td><td class='kiri'> Presiden </td><td>"+du['idprof_51_p']+"</td><td>"+du['idprof_51_w']+"</td><td>"+du['idprof_51_j']+"</td></tr>";
				t = t +"<tr><td>52</td><td class='kiri'> Wakil Presiden </td><td>"+du['idprof_52_p']+"</td><td>"+du['idprof_52_w']+"</td><td>"+du['idprof_52_j']+"</td></tr>";
				t = t +"<tr><td>53</td><td class='kiri'> Anggota Mahkamah Konstitusi </td><td>"+du['idprof_53_p']+"</td><td>"+du['idprof_53_w']+"</td><td>"+du['idprof_53_j']+"</td></tr>";
				t = t +"<tr><td>54</td><td class='kiri'> Anggota Kabinet/Kementerian </td><td>"+du['idprof_54_p']+"</td><td>"+du['idprof_54_w']+"</td><td>"+du['idprof_54_j']+"</td></tr>";
				t = t +"<tr><td>55</td><td class='kiri'> Duta Besar </td><td>"+du['idprof_55_p']+"</td><td>"+du['idprof_55_w']+"</td><td>"+du['idprof_55_j']+"</td></tr>";
				t = t +"<tr><td>56</td><td class='kiri'> Gubernur </td><td>"+du['idprof_56_p']+"</td><td>"+du['idprof_56_w']+"</td><td>"+du['idprof_56_j']+"</td></tr>";
				t = t +"<tr><td>57</td><td class='kiri'> Wakil Gubernur </td><td>"+du['idprof_57_p']+"</td><td>"+du['idprof_57_w']+"</td><td>"+du['idprof_57_j']+"</td></tr>";
				t = t +"<tr><td>58</td><td class='kiri'> Bupati </td><td>"+du['idprof_58_p']+"</td><td>"+du['idprof_58_w']+"</td><td>"+du['idprof_58_j']+"</td></tr>";
				t = t +"<tr><td>59</td><td class='kiri'> Wakil Bupati </td><td>"+du['idprof_59_p']+"</td><td>"+du['idprof_59_w']+"</td><td>"+du['idprof_59_j']+"</td></tr>";
				t = t +"<tr><td>60</td><td class='kiri'> Walikota </td><td>"+du['idprof_60_p']+"</td><td>"+du['idprof_60_w']+"</td><td>"+du['idprof_60_j']+"</td></tr>";
				t = t +"<tr><td>61</td><td class='kiri'> Wakil Walikota </td><td>"+du['idprof_61_p']+"</td><td>"+du['idprof_61_w']+"</td><td>"+du['idprof_61_j']+"</td></tr>";
				t = t +"<tr><td>62</td><td class='kiri'> Anggota DPRD Provinsi </td><td>"+du['idprof_62_p']+"</td><td>"+du['idprof_62_w']+"</td><td>"+du['idprof_62_j']+"</td></tr>";
				t = t +"<tr><td>63</td><td class='kiri'> Anggota DPRD Kabupaten/Kota </td><td>"+du['idprof_63_p']+"</td><td>"+du['idprof_63_w']+"</td><td>"+du['idprof_63_j']+"</td></tr>";
				t = t +"<tr><td>64</td><td class='kiri'> Dosen </td><td>"+du['idprof_64_p']+"</td><td>"+du['idprof_64_w']+"</td><td>"+du['idprof_64_j']+"</td></tr>";
				t = t +"<tr><td>65</td><td class='kiri'> Guru </td><td>"+du['idprof_65_p']+"</td><td>"+du['idprof_65_w']+"</td><td>"+du['idprof_65_j']+"</td></tr>";
				t = t +"<tr><td>66</td><td class='kiri'> Pilot </td><td>"+du['idprof_66_p']+"</td><td>"+du['idprof_66_w']+"</td><td>"+du['idprof_66_j']+"</td></tr>";
				t = t +"<tr><td>67</td><td class='kiri'> Pengacara </td><td>"+du['idprof_67_p']+"</td><td>"+du['idprof_67_w']+"</td><td>"+du['idprof_67_j']+"</td></tr>";
				t = t +"<tr><td>68</td><td class='kiri'> Notaris </td><td>"+du['idprof_68_p']+"</td><td>"+du['idprof_68_w']+"</td><td>"+du['idprof_68_j']+"</td></tr>";
				t = t +"<tr><td>69</td><td class='kiri'> Arsitek </td><td>"+du['idprof_69_p']+"</td><td>"+du['idprof_69_w']+"</td><td>"+du['idprof_69_j']+"</td></tr>";
				t = t +"<tr><td>70</td><td class='kiri'> Akuntan </td><td>"+du['idprof_70_p']+"</td><td>"+du['idprof_70_w']+"</td><td>"+du['idprof_70_j']+"</td></tr>";
				t = t +"<tr><td>71</td><td class='kiri'> Konsultan </td><td>"+du['idprof_71_p']+"</td><td>"+du['idprof_71_w']+"</td><td>"+du['idprof_71_j']+"</td></tr>";
				t = t +"<tr><td>72</td><td class='kiri'> Dokter </td><td>"+du['idprof_72_p']+"</td><td>"+du['idprof_72_w']+"</td><td>"+du['idprof_72_j']+"</td></tr>";
				t = t +"<tr><td>73</td><td class='kiri'> Bidan </td><td>"+du['idprof_73_p']+"</td><td>"+du['idprof_73_w']+"</td><td>"+du['idprof_73_j']+"</td></tr>";
				t = t +"<tr><td>74</td><td class='kiri'> Perawat </td><td>"+du['idprof_74_p']+"</td><td>"+du['idprof_74_w']+"</td><td>"+du['idprof_74_j']+"</td></tr>";
				t = t +"<tr><td>75</td><td class='kiri'> Apoteker </td><td>"+du['idprof_75_p']+"</td><td>"+du['idprof_75_w']+"</td><td>"+du['idprof_75_j']+"</td></tr>";
				t = t +"<tr><td>76</td><td class='kiri'> Psikiater/Psikolog </td><td>"+du['idprof_76_p']+"</td><td>"+du['idprof_76_w']+"</td><td>"+du['idprof_76_j']+"</td></tr>";
				t = t +"<tr><td>77</td><td class='kiri'> Penyiar Televisi </td><td>"+du['idprof_77_p']+"</td><td>"+du['idprof_77_w']+"</td><td>"+du['idprof_77_j']+"</td></tr>";
				t = t +"<tr><td>78</td><td class='kiri'> Penyiar Radio </td><td>"+du['idprof_78_p']+"</td><td>"+du['idprof_78_w']+"</td><td>"+du['idprof_78_j']+"</td></tr>";
				t = t +"<tr><td>79</td><td class='kiri'> Pelaut </td><td>"+du['idprof_79_p']+"</td><td>"+du['idprof_79_w']+"</td><td>"+du['idprof_79_j']+"</td></tr>";
				t = t +"<tr><td>80</td><td class='kiri'> Peneliti </td><td>"+du['idprof_80_p']+"</td><td>"+du['idprof_80_w']+"</td><td>"+du['idprof_80_j']+"</td></tr>";
				t = t +"<tr><td>81</td><td class='kiri'> Sopir </td><td>"+du['idprof_81_p']+"</td><td>"+du['idprof_81_w']+"</td><td>"+du['idprof_81_j']+"</td></tr>";
				t = t +"<tr><td>82</td><td class='kiri'> Pialang </td><td>"+du['idprof_82_p']+"</td><td>"+du['idprof_82_w']+"</td><td>"+du['idprof_82_j']+"</td></tr>";
				t = t +"<tr><td>83</td><td class='kiri'> Paranormal </td><td>"+du['idprof_83_p']+"</td><td>"+du['idprof_83_w']+"</td><td>"+du['idprof_83_j']+"</td></tr>";
				t = t +"<tr><td>84</td><td class='kiri'> Pedagang </td><td>"+du['idprof_84_p']+"</td><td>"+du['idprof_84_w']+"</td><td>"+du['idprof_84_j']+"</td></tr>";
				t = t +"<tr><td>85</td><td class='kiri'> Perangkat Desa </td><td>"+du['idprof_85_p']+"</td><td>"+du['idprof_85_w']+"</td><td>"+du['idprof_85_j']+"</td></tr>";
				t = t +"<tr><td>86</td><td class='kiri'> Kepala Desa </td><td>"+du['idprof_86_p']+"</td><td>"+du['idprof_86_w']+"</td><td>"+du['idprof_86_j']+"</td></tr>";
				t = t +"<tr><td>87</td><td class='kiri'> Biarawati </td><td>"+du['idprof_87_p']+"</td><td>"+du['idprof_87_w']+"</td><td>"+du['idprof_87_j']+"</td></tr>";
				t = t +"<tr><td>88</td><td class='kiri'> Wiraswasta </td><td>"+du['idprof_88_p']+"</td><td>"+du['idprof_88_w']+"</td><td>"+du['idprof_88_j']+"</td></tr>";
				t = t +"<tr><td>89</td><td class='kiri'> Lainnya </td><td>"+du['idprof_89_p']+"</td><td>"+du['idprof_89_w']+"</td><td>"+du['idprof_89_j']+"</td></tr>";

				$("#tblpekerjaan tbody").append(t);
				//--piramid
				// Age categories
				desa = '<?php echo $config->nama_desa; ?>';
				var categories = [
					'Belum/Tidak Bekerja',
					'Mengurus Rumah Tangga',
					'Pelajar/Mahasiswa',
					'Pensiunan',
					'Pegawai Negeri Sipil',
					'Tentara Nasional Indonesia',
					'Kepolisian RI',
					'Perdagangan',
					'Petani/Pekebun',
					'Peternak',
					'Nelayan/Perikanan',
					'Industri',
					'Konstruksi',
					'Transportasi',
					'Karyawan Swasta',
					'Karyawan BUMN',
					'Karyawan BUMD',
					'Karyawan Honorer',
					'Buruh Harian Lepas',
					'Buruh Tani/Perkebunan',
					'Buruh Nelayan/Perikanan',
					'Buruh Peternakan',
					'Pembantu Rumah Tangga',
					'Tukang Cukur',
					'Tukang Listrik',
					'Tukang Batu',
					'Tukang Kayu',
					'Tukang Sol Sepatu',
					'Tukang Las/Pandai Besi',
					'Tukang Jahit',
					'Tukang Gigi',
					'Penata Rias',
					'Penata Busana',
					'Penata Rambut',
					'Mekanik',
					'Seniman',
					'Tabib',
					'Paraji',
					'Perancang Busana',
					'Penterjemah',
					'Imam Mesjid',
					'Pendeta',
					'Pastor',
					'Wartawan',
					'Ustadz/Mubaligh',
					'Juru Masak',
					'Promotor Acara',
					'Anggota DPR-RI',
					'Anggota DPD',
					'Anggota BPK',
					'Presiden',
					'Wakil Presiden',
					'Anggota Mahkamah Konstitusi',
					'Anggota Kabinet/Kementerian',
					'Duta Besar',
					'Gubernur',
					'Wakil Gubernur',
					'Bupati',
					'Wakil Bupati',
					'Walikota',
					'Wakil Walikota',
					'Anggota DPRD Provinsi',
					'Anggota DPRD Kabupaten/Kota',
					'Dosen',
					'Guru',
					'Pilot',
					'Pengacara',
					'Notaris',
					'Arsitek',
					'Akuntan',
					'Konsultan',
					'Dokter',
					'Bidan',
					'Perawat',
					'Apoteker',
					'Psikiater/Psikolog',
					'Penyiar Televisi',
					'Penyiar Radio',
					'Pelaut',
					'Peneliti',
					'Sopir',
					'Pialang',
					'Paranormal',
					'Pedagang',
					'Perangkat Desa',
					'Kepala Desa',
					'Biarawati',
					'Wiraswasta',
					'Lainnya'];

				Highcharts.chart('cont1', {
					chart: {
						type: 'bar',
						height: 1500
					},
					title: {
						text: 'Piramida Pekerjaan Penduduk'  
					},
					subtitle: {
						text: 'Source: <a href="http://dindukcapil.rembangkab.go.id">Dindukcapil Kab Rembang, Laporan Pekerjaan Penduduk Semester II, 2018</a>'
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
							return '<b>' + this.series.name + ', ' + this.point.category + '</b><br/>' +
								'Jumlah: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
						}
					},

					series: [{
						name: 'Laki-Laki',
						data: [
							(du['idprof_01_p'])*-1, 
							(du['idprof_02_p'])*-1, 
							(du['idprof_03_p'])*-1, 
							(du['idprof_04_p'])*-1, 
							(du['idprof_05_p'])*-1, 
							(du['idprof_06_p'])*-1, 
							(du['idprof_07_p'])*-1, 
							(du['idprof_08_p'])*-1, 
							(du['idprof_09_p'])*-1, 
							(du['idprof_10_p'])*-1, 
							(du['idprof_11_p'])*-1, 
							(du['idprof_12_p'])*-1, 
							(du['idprof_13_p'])*-1, 
							(du['idprof_14_p'])*-1, 
							(du['idprof_15_p'])*-1, 
							(du['idprof_16_p'])*-1, 
							(du['idprof_17_p'])*-1, 
							(du['idprof_18_p'])*-1, 
							(du['idprof_19_p'])*-1, 
							(du['idprof_20_p'])*-1, 
							(du['idprof_21_p'])*-1, 
							(du['idprof_22_p'])*-1, 
							(du['idprof_23_p'])*-1, 
							(du['idprof_24_p'])*-1, 
							(du['idprof_25_p'])*-1, 
							(du['idprof_26_p'])*-1, 
							(du['idprof_27_p'])*-1, 
							(du['idprof_28_p'])*-1, 
							(du['idprof_29_p'])*-1, 
							(du['idprof_30_p'])*-1, 
							(du['idprof_31_p'])*-1, 
							(du['idprof_32_p'])*-1, 
							(du['idprof_33_p'])*-1, 
							(du['idprof_34_p'])*-1, 
							(du['idprof_35_p'])*-1, 
							(du['idprof_36_p'])*-1, 
							(du['idprof_37_p'])*-1, 
							(du['idprof_38_p'])*-1, 
							(du['idprof_39_p'])*-1, 
							(du['idprof_40_p'])*-1, 
							(du['idprof_41_p'])*-1, 
							(du['idprof_42_p'])*-1, 
							(du['idprof_43_p'])*-1, 
							(du['idprof_44_p'])*-1, 
							(du['idprof_45_p'])*-1, 
							(du['idprof_46_p'])*-1, 
							(du['idprof_47_p'])*-1, 
							(du['idprof_48_p'])*-1, 
							(du['idprof_49_p'])*-1, 
							(du['idprof_50_p'])*-1, 
							(du['idprof_51_p'])*-1, 
							(du['idprof_52_p'])*-1, 
							(du['idprof_53_p'])*-1, 
							(du['idprof_54_p'])*-1, 
							(du['idprof_55_p'])*-1, 
							(du['idprof_56_p'])*-1, 
							(du['idprof_57_p'])*-1, 
							(du['idprof_58_p'])*-1, 
							(du['idprof_59_p'])*-1, 
							(du['idprof_60_p'])*-1, 
							(du['idprof_61_p'])*-1, 
							(du['idprof_62_p'])*-1, 
							(du['idprof_63_p'])*-1, 
							(du['idprof_64_p'])*-1, 
							(du['idprof_65_p'])*-1, 
							(du['idprof_66_p'])*-1, 
							(du['idprof_67_p'])*-1, 
							(du['idprof_68_p'])*-1, 
							(du['idprof_69_p'])*-1, 
							(du['idprof_70_p'])*-1, 
							(du['idprof_71_p'])*-1, 
							(du['idprof_72_p'])*-1, 
							(du['idprof_73_p'])*-1, 
							(du['idprof_74_p'])*-1, 
							(du['idprof_75_p'])*-1, 
							(du['idprof_76_p'])*-1, 
							(du['idprof_77_p'])*-1, 
							(du['idprof_78_p'])*-1, 
							(du['idprof_79_p'])*-1, 
							(du['idprof_80_p'])*-1, 
							(du['idprof_81_p'])*-1, 
							(du['idprof_82_p'])*-1, 
							(du['idprof_83_p'])*-1, 
							(du['idprof_84_p'])*-1, 
							(du['idprof_85_p'])*-1, 
							(du['idprof_86_p'])*-1, 
							(du['idprof_87_p'])*-1, 
							(du['idprof_88_p'])*-1, 
							(du['idprof_89_p'])*-1 
							]
					}, {
						name: 'Perempuan',
						data: [
							(du['idprof_01_w'])*-1,
							(du['idprof_02_w'])*-1,
							(du['idprof_03_w'])*-1,
							(du['idprof_04_w'])*-1,
							(du['idprof_05_w'])*-1,
							(du['idprof_06_w'])*-1,
							(du['idprof_07_w'])*-1,
							(du['idprof_08_w'])*-1,
							(du['idprof_09_w'])*-1,
							(du['idprof_10_w'])*-1,
							(du['idprof_11_w'])*-1,
							(du['idprof_12_w'])*-1,
							(du['idprof_13_w'])*-1,
							(du['idprof_14_w'])*-1,
							(du['idprof_15_w'])*-1,
							(du['idprof_16_w'])*-1,
							(du['idprof_17_w'])*-1,
							(du['idprof_18_w'])*-1,
							(du['idprof_19_w'])*-1,
							(du['idprof_20_w'])*-1,
							(du['idprof_21_w'])*-1,
							(du['idprof_22_w'])*-1,
							(du['idprof_23_w'])*-1,
							(du['idprof_24_w'])*-1,
							(du['idprof_25_w'])*-1,
							(du['idprof_26_w'])*-1,
							(du['idprof_27_w'])*-1,
							(du['idprof_28_w'])*-1,
							(du['idprof_29_w'])*-1,
							(du['idprof_30_w'])*-1,
							(du['idprof_31_w'])*-1,
							(du['idprof_32_w'])*-1,
							(du['idprof_33_w'])*-1,
							(du['idprof_34_w'])*-1,
							(du['idprof_35_w'])*-1,
							(du['idprof_36_w'])*-1,
							(du['idprof_37_w'])*-1,
							(du['idprof_38_w'])*-1,
							(du['idprof_39_w'])*-1,
							(du['idprof_40_w'])*-1,
							(du['idprof_41_w'])*-1,
							(du['idprof_42_w'])*-1,
							(du['idprof_43_w'])*-1,
							(du['idprof_44_w'])*-1,
							(du['idprof_45_w'])*-1,
							(du['idprof_46_w'])*-1,
							(du['idprof_47_w'])*-1,
							(du['idprof_48_w'])*-1,
							(du['idprof_49_w'])*-1,
							(du['idprof_50_w'])*-1,
							(du['idprof_51_w'])*-1,
							(du['idprof_52_w'])*-1,
							(du['idprof_53_w'])*-1,
							(du['idprof_54_w'])*-1,
							(du['idprof_55_w'])*-1,
							(du['idprof_56_w'])*-1,
							(du['idprof_57_w'])*-1,
							(du['idprof_58_w'])*-1,
							(du['idprof_59_w'])*-1,
							(du['idprof_60_w'])*-1,
							(du['idprof_61_w'])*-1,
							(du['idprof_62_w'])*-1,
							(du['idprof_63_w'])*-1,
							(du['idprof_64_w'])*-1,
							(du['idprof_65_w'])*-1,
							(du['idprof_66_w'])*-1,
							(du['idprof_67_w'])*-1,
							(du['idprof_68_w'])*-1,
							(du['idprof_69_w'])*-1,
							(du['idprof_70_w'])*-1,
							(du['idprof_71_w'])*-1,
							(du['idprof_72_w'])*-1,
							(du['idprof_73_w'])*-1,
							(du['idprof_74_w'])*-1,
							(du['idprof_75_w'])*-1,
							(du['idprof_76_w'])*-1,
							(du['idprof_77_w'])*-1,
							(du['idprof_78_w'])*-1,
							(du['idprof_79_w'])*-1,
							(du['idprof_80_w'])*-1,
							(du['idprof_81_w'])*-1,
							(du['idprof_82_w'])*-1,
							(du['idprof_83_w'])*-1,
							(du['idprof_84_w'])*-1,
							(du['idprof_85_w'])*-1,
							(du['idprof_86_w'])*-1,
							(du['idprof_87_w'])*-1,
							(du['idprof_88_w'])*-1,
							(du['idprof_89_w'])*-1
							]
					}]
				});

				//--piramid
			
            });
		} );
	</script>
	<script type="text/javascript">
 	
		$(document).ready(function() {
						
			$.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/jumlah_penduduk_usia_produktif_kerja/<?php echo $config->kode_desa; ?>", function(json) {
				du = $.parseJSON(JSON.stringify(json))[0];
				var	t =           "<tr><td>4</td><td class='kiri'> Umur 15 - 19 tahun </td><td>"+du['p1519']+"</td><td>"+du['w1519']+"</td><td>"+du['j1519']+"</td></tr>";
						t = t  +  "<tr><td>5</td><td class='kiri'> Umur 20 - 24 tahun </td><td>"+du['p2024']+"</td><td>"+du['w2024']+"</td><td>"+du['j2024']+"</td></tr>";
						t = t  +  "<tr><td>6</td><td class='kiri'> Umur 25 - 29 tahun </td><td>"+du['p2529']+"</td><td>"+du['w2529']+"</td><td>"+du['j2529']+"</td></tr>";
						t = t  +  "<tr><td>7</td><td class='kiri'> Umur 30 - 34 tahun </td><td>"+du['p3034']+"</td><td>"+du['w3034']+"</td><td>"+du['j3034']+"</td></tr>";
						t = t  +  "<tr><td>8</td><td class='kiri'> Umur 35 - 39 tahun </td><td>"+du['p3539']+"</td><td>"+du['w3539']+"</td><td>"+du['j3539']+"</td></tr>";
						t = t  +  "<tr><td>9</td><td class='kiri'> Umur 40 - 44 tahun </td><td>"+du['p4044']+"</td><td>"+du['w4044']+"</td><td>"+du['j4044']+"</td></tr>";
						t = t  +  "<tr><td>10</td><td class='kiri'> Umur 45 - 49 tahun </td><td>"+du['p4549']+"</td><td>"+du['w4549']+"</td><td>"+du['j4549']+"</td></tr>";
						t = t  +  "<tr><td>11</td><td class='kiri'> Umur 50 - 54 tahun </td><td>"+du['p5054']+"</td><td>"+du['w5054']+"</td><td>"+du['j5054']+"</td></tr>";
						t = t  +  "<tr><td>12</td><td class='kiri'> Umur 55 - 59 tahun </td><td>"+du['p5559']+"</td><td>"+du['w5559']+"</td><td>"+du['j5559']+"</td></tr>";
						t = t  +  "<tr><td>13</td><td class='kiri'> Umur 60 - 64 tahun </td><td>"+du['p6064']+"</td><td>"+du['w6064']+"</td><td>"+du['j6064']+"</td></tr>";

				$("#tblumur tbody").append(t);
				//--piramid
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
									'60 - 64'
									];

				Highcharts.chart('cont2', {
					chart: {
						type: 'bar'
					},
					title: {
						text: 'Piramida Penduduk Usia Produktif '  
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
							(du['p1519'])*-1, 
							(du['p2024'])*-1, 
							(du['p2529'])*-1, 
							(du['p3034'])*-1, 
							(du['p3539'])*-1, 
							(du['p4044'])*-1, 
							(du['p4549'])*-1, 
							(du['p5054'])*-1, 
							(du['p5559'])*-1, 
							(du['p6064'])*-1
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
							(du['w6064'])*1 
							]
					}]
				});

				//--piramid
			
            });
		} );
	</script>

<script type="text/javascript">
 	
	 $(document).ready(function() {
					 
		 $.getJSON("http://sim.rembangkab.go.id/penduduk/api/publik/jumlah_penduduk_usia_produktif_tidak_kerja/<?php echo $config->kode_desa; ?>", function(json) {
			 du = $.parseJSON(JSON.stringify(json))[0];
			 var	t =           "<tr><td>4</td><td class='kiri'> Umur 15 - 19 tahun </td><td>"+du['p1519']+"</td><td>"+du['w1519']+"</td><td>"+du['j1519']+"</td></tr>";
					 t = t  +  "<tr><td>5</td><td class='kiri'> Umur 20 - 24 tahun </td><td>"+du['p2024']+"</td><td>"+du['w2024']+"</td><td>"+du['j2024']+"</td></tr>";
					 t = t  +  "<tr><td>6</td><td class='kiri'> Umur 25 - 29 tahun </td><td>"+du['p2529']+"</td><td>"+du['w2529']+"</td><td>"+du['j2529']+"</td></tr>";
					 t = t  +  "<tr><td>7</td><td class='kiri'> Umur 30 - 34 tahun </td><td>"+du['p3034']+"</td><td>"+du['w3034']+"</td><td>"+du['j3034']+"</td></tr>";
					 t = t  +  "<tr><td>8</td><td class='kiri'> Umur 35 - 39 tahun </td><td>"+du['p3539']+"</td><td>"+du['w3539']+"</td><td>"+du['j3539']+"</td></tr>";
					 t = t  +  "<tr><td>9</td><td class='kiri'> Umur 40 - 44 tahun </td><td>"+du['p4044']+"</td><td>"+du['w4044']+"</td><td>"+du['j4044']+"</td></tr>";
					 t = t  +  "<tr><td>10</td><td class='kiri'> Umur 45 - 49 tahun </td><td>"+du['p4549']+"</td><td>"+du['w4549']+"</td><td>"+du['j4549']+"</td></tr>";
					 t = t  +  "<tr><td>11</td><td class='kiri'> Umur 50 - 54 tahun </td><td>"+du['p5054']+"</td><td>"+du['w5054']+"</td><td>"+du['j5054']+"</td></tr>";
					 t = t  +  "<tr><td>12</td><td class='kiri'> Umur 55 - 59 tahun </td><td>"+du['p5559']+"</td><td>"+du['w5559']+"</td><td>"+du['j5559']+"</td></tr>";
					 t = t  +  "<tr><td>13</td><td class='kiri'> Umur 60 - 64 tahun </td><td>"+du['p6064']+"</td><td>"+du['w6064']+"</td><td>"+du['j6064']+"</td></tr>";

			 $("#tblumur2 tbody").append(t);
			 //--piramid
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
								 '60 - 64'
								 ];

			 Highcharts.chart('cont3', {
				 chart: {
					 type: 'bar'
				 },
				 title: {
					 text: 'Piramida Penduduk Usia Produktif Tidak Bekerja'  
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
						 (du['p1519'])*-1, 
						 (du['p2024'])*-1, 
						 (du['p2529'])*-1, 
						 (du['p3034'])*-1, 
						 (du['p3539'])*-1, 
						 (du['p4044'])*-1, 
						 (du['p4549'])*-1, 
						 (du['p5054'])*-1, 
						 (du['p5559'])*-1, 
						 (du['p6064'])*-1
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
						 (du['w6064'])*1 
						 ]
				 }]
			 });

			 //--piramid
		 
		 });
	 } );
 </script>
	