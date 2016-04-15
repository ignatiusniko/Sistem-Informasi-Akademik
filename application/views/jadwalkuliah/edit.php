 <h3 class="page-header page-header-top"> <?php echo $title;?> <small><?php echo $desc;?></small> </h3>
 <script src="<?php echo base_url()?>assets/js/jquery.min.js">
</script>
<script>
$(document).ready(function(){
    loadkonsentrasi();
});
</script>

<script>
$(document).ready(function(){
  $("#prodi").change(function(){
      loadkonsentrasi();
  });
});
</script>


<script type="text/javascript">
function loadkonsentrasi()
{
    var prodi=$("#prodi").val();
    $.ajax({
    url:"<?php echo base_url();?>matakuliah/tampilkonsentrasi",
    data:"prodi=" + prodi ,
    success: function(html)
    { 
       $("#konsentrasi").html(html);
       loadsemester();
    }
          });
}
</script>


<?php
echo $this->session->flashdata('pesan');
?>
     <?php
echo form_open($this->uri->segment(1).'/edit');
echo "<input type='hidden' name='id' value='$r[makul_id]'>";
$semester=array(1=>'Semester 1',
                2=>'Semester 2',
                3=>'Semester 3',
                4=>'Semester 4',
                5=>'Semester 5',
                6=>'Semester 6',
                7=>'Semester 7',
                8=>'Semester 8');
?>
<table class="table table-bordered">
    
    <tr>
    <td width="150">Kode / Nama Matakuliah</td><td>
        <?php echo inputan('text', 'kode','col-sm-2','Kode Matakuliah ..', 1, $r['kode_makul'],'');?>
        <?php echo inputan('text', 'nama','col-sm-4','Nama Matakuliah ..', 1, $r['nama_makul'],'');?>
    </td>
    </tr>
    
    
    <tr>
    <td width="150">SKS / Semester</td><td>
        <?php echo inputan('text', 'sks','col-sm-1','SKS ..', 1, $r['sks'],'');?>
        <div class="col-sm-2">
        <?php echo form_dropdown('semester',$semester,$r['semester'],"class='form-control'")?>
        </div>
    </td>
    </tr>
    
      <tr>
    <td width="150">Kelompok Matakuliah</td><td>
         <div class="col-sm-6">
        <?php echo editcombo('kelompok', 'makul_kelompok', '', 'nama', 'kelompok_id', '', '',$r['kelompok_id'])?>
         </div>
    </td>
    </tr>
    
    <tr>
        <td width="150">Konsentrasi /Prodi</td><td>
            <div class="col-sm-3">
        <?php echo editcombo('prodi', 'akademik_prodi', '', 'nama_prodi', 'prodi_id', '', array('id'=>'prodi'),  getField('akademik_konsentrasi', 'prodi_id', 'konsentrasi_id', $r['konsentrasi_id']))?>
            </div>
            
         <div class="col-sm-3">
        <?php echo editcombo('konsentrasi', 'akademik_konsentrasi', '', 'nama_konsentrasi', 'konsentrasi_id', '', array('id'=>'konsentrasi'),$r['konsentrasi_id'])?>
            </div>
    </td>
    </tr>
    
    <tr>
         <td></td><td colspan="2"> 
            <input type="submit" name="submit" value="simpan" class="btn btn-danger  btn-sm">
            <?php echo anchor($this->uri->segment(1),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
        </td></tr>
    
</table>
</form>
