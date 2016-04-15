 <h2 style="font-weight: normal;"><?php echo $title;?></h2>
 <div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Edit Data Siswa</li>
    </ol>
</div>
<script src="<?php echo base_url()?>assets/js/jquery.min.js">
</script>
<script>
    $(document).ready(function(){
      $("#prodi").change(function(){
          var prodi=$("#prodi").val();
          $.ajax({
             url:"<?php echo base_url();?>siswa/tampilkankonsentrasi",
             data:"prodi=" + prodi ,
             success: function(html)
             {
                $("#konsentrasi").html(html);

            }
        });


      });
  });
</script>

<?php
echo form_open_multipart($this->uri->segment(1).'/edit');
echo "<input type='hidden' name='id' value='$r[siswa_id]'>";
if($this->session->userdata('level')==1)
{
    $param="";
}
else
{
    $param=array('prodi_id'=>$this->session->userdata('keterangan'));
}
?>
<table class="table table-bordered">
    <tr class="success"><th colspan="2">BIODATA PRIBADI</th><th colspan="2">BIODATA ORANG TUA</th></tr>
    <tr><td width="150">NPM /NAMA</td><td WIDTH="450"> 
        <?php echo inputan('text', 'nim','col-sm-4','Nim ..', 1, $r['nim'],'');?>
        <?php echo inputan('text', 'nama','col-sm-8','Nama ..', 1, $r['nama'],'');?></td>
        
        <td width="150">Nama Ayah, Ibu</td><td>
        <?php echo inputan('text', 'nama_ayah','col-sm-6','Nama Ayah ..', 0, $r['nama_ayah'],'');?>
        <?php echo inputan('text', 'nama_ibu','col-sm-6','Nama Ibu ..', 0, $r['nama_ibu'],'');?>
    </td>
</tr>
<tr>
    <td width="050">Jenis Kelamin, Agama</td><td>
    <div class="col-md-4">
        <?php
        echo form_dropdown('gender',array('1'=>'Laki Laki','2'=>'Perempuan'),$r['gender'],"class='form-control'");
        ?>
    </div>
    <?php echo editcombo('agama','app_agama','col-sm-4','keterangan','agama_id','','',$r['agama_id']); ?>
</td>
<td>Pekerjaan Ayah ,Ibu</td>
<td>
    <?php echo editcombo('pekerjan_ayah','app_pekerjaan','col-sm-6','keterangan','pekerjaan_id','','',$r['pekerjaan_id_ayah']); ?>
    <?php echo editcombo('pekerjaan_ibu','app_pekerjaan','col-sm-6','keterangan','pekerjaan_id','','',$r['pekerjaan_id_ibu']); ?>
</td>
</tr>  
<tr>
    <td width="050">Tempat ,Tanggal Lahir</td><td>
    <?php echo inputan('text', 'tempat_lahir','col-sm-8','Tempat Lahir ..', 0, $r['tempat_lahir'],'');?>
    <?php echo inputan('text', 'tanggal_lahir','col-sm-4','Tanggal Lahir ..', 0, $r['tanggal_lahir'],array('id'=>'datepicker'));?>
</td>
<td>Alamat Ayah, Ibu</td>
<td><?php echo textarea('alamat_ayah', '', 'col-sm-6', 2, $r['alamat_ayah'])?>
    <?php echo textarea('alamat_ibu', '', 'col-sm-6', 2, $r['alamat_ibu'])?>
</td>
</tr>
<tr>
    <td width="050">Prodi / Konsentrasi</td><td>
    <div class="col-sm-6">
        <?php
        $prodi=  getField('akademik_konsentrasi', 'prodi_id', 'konsentrasi_id', $r['konsentrasi_id'])
        ?>
        <?php echo buatcombo('prodi', 'akademik_prodi', '', 'nama_prodi', 'prodi_id', $param, array('id'=>'prodi'))?>
    </div>
    <div class="col-sm-6">
     <?php echo editcombo('konsentrasi', 'akademik_konsentrasi', '', 'nama_konsentrasi', 'konsentrasi_id', array('prodi_id'=>$prodi), array('id'=>'konsentrasi'),$r['konsentrasi_id'])?>
 </div>
</td>
<td>Penghasilan Ayah, Ibu</td>
<td>
    <?php
    $penghasilan=array(0=>'Satu Juta s/d dua juta',2=>'Dua Juta s/d Tiga Juta',3=>'Tiga Juta Lebih')
    ?>

    <div class="col-sm-6">
        <?php echo form_dropdown('penghasilan_ayah',$penghasilan,$r['penghasilan_ayah'],"class='form-control'");?>
    </div>
    <div class="col-sm-6">
        <?php echo form_dropdown('penghasilan_ibu',$penghasilan,$r['penghasilan_ibu'],"class='form-control'");?>
    </div>
    
</td>

</tr>


<tr>
    <td width="050">Alamat</td><td>
    <?php echo textarea('alamat', '', 'col-sm-02', 2, $r['alamat']);?>
</td>
<td>No Hp Ortu</td><td>
<?php echo inputan('text', 'no_hp_ortu','col-sm-7','No Hp Orang Tua ..', 0, $r['no_hp_ortu'],'');?>
</td>
</tr>
<tr class="success"><th colspan="2">Data Sekolah Asal</th></tr>
<tr>
    <td>Nama Sekolah, Telpon</td>
    <td>
     <?php echo inputan('text', 'sekolah_nama','col-sm-7','Nama Sekolah ..', 0, $r['sekolah_nama'],'');?>
     <?php echo inputan('text', 'sekolah_telpon','col-sm-5','Telpon Sekolah ..', 0, $r['sekolah_telpon'],'');?>
 </td>
</tr>
<tr>
    <tr>
        <td>Alamat</td><td><?php echo textarea('sekolah_alamat', '', 'col-sm-02', 0, $r['sekolah_alamat'])?></td>
    </tr>
    <tr>
        <td>Jurusan/ Tahun Lulus</td>
        <td>
            <?php echo inputan('text', 'sekolah_jurusan','col-sm-9','Jurusan ..', 0, $r['sekolah_jurusan'],'');?>
            <?php echo inputan('text', 'sekolah_tahun','col-sm-3','Lulus ..', 0, $r['sekolah_tahun_lulus'],'');?></td>
    </tr>
    <td colspan="2"> 
            <input type="submit" name="submit" value="simpan" class="btn btn-success  btn-sm">
            <?php echo anchor($this->uri->segment(1),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
        </td>

    </table>
</form>

