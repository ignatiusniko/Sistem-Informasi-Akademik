<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
  <ol class="breadcrumb">
    <li><a href="javascript:void(0)">Home</a></li>
    <li><?php echo anchor($this->uri->segment(1),$title);?></li>
    <li class="active">Tambah Siswa Baru</li>
  </ol>
</div>

<script src="<?php echo base_url()?>assets/js/jquery.min.js"> </script>

<script>
  $(document).ready(function(){
    loadjurusan();  
  });
</script>

<script type="text/javascript">
  function loadjurusan()
  {
   var prodi=$("#prodi").val();   
   $.ajax({
     url:"<?php echo base_url();?>siswa/tampilkankonsentrasi",
     data:"prodi=" + prodi ,
     success: function(html)
     {
      $("#konsentrasi").html(html);
      var konsentrasi=$("#konsentrasi").val();
    }
  });
 }
</script>
<script>
  $(document).ready(function(){
    $("#prodi").change(function(){

      loadjurusan();
    });
  });
</script>
<?php
echo $this->session->flashdata('pesan');
echo form_open_multipart($this->uri->segment(1).'/post');
if($this->session->userdata('level')==1)
{
  $param="";
}
else
{
  $param=array('prodi_id'=>$this->session->userdata('keterangan'));
}
?>
<div class="row">
  <div class="col-md-12 clearfix">
    <ul id="example-tabs" class="nav nav-tabs" data-toggle="tabs">
      <li class="active"><a href="#biodata">Data Diri</a></li>
      <li><a href="#orangtua">Data Orangtua</a></li>
      <li><a href="#sekolah">Sekolah Asal</a></li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane active" id="biodata">
        <table class="table table-bordered">
          <tr class="success"><th colspan="2">DATA DIRI</th></tr>
          <tr><td width="150">No Induk, Nama</td>
            <td>
              <?php echo inputan('text', 'nim','col-sm-2','No Induk', 1, '','');?>
              <?php echo inputan('text', 'nama','col-sm-4','Nama Lengkap', 1, '','');?>
            </td></tr>
            <tr><td>Tahun Angkatan</td><td>
              <?php echo buatcombo('tahun_angkatan','student_angkatan','col-sm-6','keterangan','angkatan_id','',''); ?>
            </td></tr>
            <tr><td>Jenis Kelamin</td><td>
              <div class="col-md-6">
                  <?php  echo form_dropdown('gender',array('1'=>'Laki Laki','2'=>'Perempuan'),'',"class='form-control'");?>
                </div>
            </td></tr>
            <tr><td>Agama</td>
              <td>
                <?php echo buatcombo('agama','app_agama','col-sm-6','keterangan','agama_id','',''); ?></td></tr>
                <tr><td>Tempat, Tanggal Lahir</td>
                  <td>
                    <?php echo inputan('text', 'tempat_lahir','col-sm-4','Tempat Lahir ..', 0, '','');?>
                    <?php echo inputan('text', 'tanggal_lahir','col-sm-2','Tanggal Lahir ..', 0, '',array('id'=>'datepicker'));?>
                  </td></tr>
                  <tr><td>Tingkat, Penjurusan</td>
                   <td>
                     <div class="col-sm-2">
                      <?php echo buatcombo('prodi', 'akademik_prodi', '', 'nama_prodi', 'prodi_id', $param, array('id'=>'prodi'))?>
                    </div>
                    <div class="col-sm-4">
                      <?php echo combodumy('konsentrasi', 'konsentrasi')?>
                    </div></td></tr>
                    <tr><td>Alamat</td><td> <?php echo textarea('alamat', '', 'col-sm-6', 2, '');?></td></tr>
                  </table>

                </div>




                <div class="tab-pane" id="orangtua">
                  <table class="table table-bordered">
                    <tr class="success"><th colspan="2">DATA ORANG TUA</th></tr>
                    <tr><td width="150">Nama Ayah, Ibu</td>
                      <td>
                        <?php echo inputan('text', 'nama_ayah','col-sm-6','Nama Ayah', 0, '','');?>
                        <?php echo inputan('text', 'nama_ibu','col-sm-6','Nama Ibu', 0, '','');?>
                      </td></tr>
                      <tr><td>Pekerjaan Ayah, Ibu</td>
                        <td>
                          <?php echo buatcombo('pekerjan_ayah','app_pekerjaan','col-sm-6','keterangan','pekerjaan_id','',''); ?>
                          <?php echo buatcombo('pekerjaan_ibu','app_pekerjaan','col-sm-6','keterangan','pekerjaan_id','',''); ?>
                        </td></tr>
                        <tr><td>Alamat Ayah, Ibu</td>
                          <td>
                            <?php echo textarea('alamat_ayah', '', 'col-sm-6', 2, '')?>
                            <?php echo textarea('alamat_ibu', '', 'col-sm-6', 2, '')?>
                          </td></tr>
                          <tr><td>Penghasilan Ayah, Ibu</td>
                            <td>
                              <?php
                              $penghasilan=array(0=>'Satu Juta s/d dua juta',2=>'Dua Juta s/d Tiga Juta',3=>'Tiga Juta Lebih')
                              ?>

                              <div class="col-sm-6">
                                <?php echo form_dropdown('penghasilan_ayah',$penghasilan,'',"class='form-control'");?>
                              </div>
                              <div class="col-sm-6">
                                <?php echo form_dropdown('penghasilan_ibu',$penghasilan,'',"class='form-control'");?>
                              </div>
                            </td></tr>
                            <tr><td>No HP Orang Tua</td>
                              <td>
                                <?php echo inputan('text', 'no_hp_ortu','col-sm-6','No Hp Orang Tua ..', 0, '','');?>
                              </td></tr>
                            </table>
                          </div>



                          <div class="tab-pane" id="sekolah">
                            <table class="table table-bordered">
                              <tr class="success"><th colspan="2">Data Sekolah Asal</th></tr>
                              <tr><td  width="150">Nama Sekolah</td><td>
                                <?php echo inputan('text', 'sekolah_nama','col-sm-12','Nama Sekolah', 0, '','');?>
                              </td></tr>
                              <tr><td>No Telpon</td><td>
                               <?php echo inputan('text', 'sekolah_telpon','col-sm-6','Telpon Sekolah', 0, '','');?>
                             </td></tr>
                             <tr><td>Jurusan/ Tahun Lulus</td><td>
                              <?php echo inputan('text', 'sekolah_jurusan','col-sm-9','Jurusan', 0, '','');?>
                              <?php echo inputan('text', 'sekolah_tahun','col-sm-3','Tahun Lulus', 0, '','');?>
                            </td></tr>
                            <tr><td>Alamat</td><td><?php echo textarea('sekolah_alamat', '', 'col-sm-12', 0, '')?></td></tr>
                         </table>
                       </div>
                      </div>
                    </div>

                    <div>
                    <br>
                    <input type="submit" name="submit" value="simpan" class="btn btn-success  btn-sm">
                    <?php echo anchor($this->uri->segment(1),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
                    </div>
                  </form>

