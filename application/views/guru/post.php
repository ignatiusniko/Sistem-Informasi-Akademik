 <h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Tambah Data Guru</li>
    </ol>
</div>
 
<?php
echo form_open_multipart($this->uri->segment(1).'/post');
$gender=array(1=>'Laki Laki',2=>'Perempuan');
$kawin=array(1=>'Kawin',2=>'Belum Kawin');
$class="class='form-control'";
?>
 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Tambah Data Guru</h3>
  </div>
  <div class="panel-body">
<table class="table table-bordered">

    <tr>
    <td width="150">Nama Lengkap</td><td>
        <?php echo inputan('text', 'nama','col-sm-6','Nama Lengkap', 1, '','');?>
    </td>
    </tr>
 
            <tr>
    <td width="150">NIGN ,NIP</td><td>
        <?php echo inputan('text', 'nidn','col-sm-3','Nomor Induk Guru Nasional', 0, '','');?> 
         <?php echo inputan('text', 'nip','col-sm-3','Nomor Induk Pegawai', 0, '','');?>
    </td>
    </tr>
     <tr>
    <td width="150">Tempat, Tanggal Lahir</td><td>
        <?php echo inputan('text', 'tempat_lahir','col-sm-4','Tempat Lahir', 0, '','');?>
        <?php echo inputan('text', 'tanggal_lahir','col-sm-2','Tanggal Lahir', 0, '',array('id'=>'datepicker'));?>
    </td>
    </tr>
 
            <tr>
            <td width="180">Jenis Kelamin</td><td>
                <div class="col-sm-6">
                        <?php echo form_dropdown('gender',$gender,'',$class)?>
                 </div>
            </td>
            </tr>
            
        <tr>
    <td width="150">Agama ,Status Kawin</td><td>
        <?php echo buatcombo('agama','app_agama','col-sm-3','keterangan','agama_id','',''); ?>
         <div class="col-sm-3">
                        <?php echo form_dropdown('kawin',$kawin,'',$class)?>
                 </div>
    </td>
    </tr>
 
            <tr>
    <td width="150">Alamat</td><td>
        <?php echo textarea('alamat', '', 'col-sm-6', 2, '');?>
    </td>
    </tr>
        <tr>
    <td width="150">No Hp, Email</td><td>
        <?php echo inputan('text', 'hp','col-sm-2','No HP', 0, '','');?> 
         <?php echo inputan('email', 'email','col-sm-4','Email', 0, '','');?>
    </td>
    </tr>
 <tr>
    <td width="150">Username & Password</td><td>
        <?php echo inputan('text', 'username','col-sm-3','Username', 1, '','');?> 
        <?php echo inputan('password', 'password','col-sm-3','Password', 1, '','');?>
    </td>
    </tr>
           
         <td></td><td colspan="2"> 
            <input type="submit" name="submit" value="simpan" class="btn btn-success  btn-sm">
            <?php echo anchor($this->uri->segment(1),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
        </td></tr>
    
</table>
  </div></div>
</form>