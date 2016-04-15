<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Edit Tahun Angkatan</li>
    </ol>
</div>
    
    <?php
echo form_open($this->uri->segment(1).'/edit');
echo "<input type='hidden' name='id' value='$r[angkatan_id]'>";
?><div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Edit Tahun Angkatan</h3>
  </div>
  <div class="panel-body">
<table class="table table-bordered">
        <tr>
    <td width="150">Tahun Akademik</td><td>
        <?php echo inputan('text', 'tahun','col-sm-4','Tahun Akademik ..', 1, $r['keterangan'],'');?>
    </td>
    </tr>
    <tr><td>Status</td><td>
            <div class="col-sm-2">
                <?php
                $status=array('y'=>'Open','n'=>'Closed');
                echo form_dropdown('status',$status,$r['aktif'],"class='form-control'");
                ?>
            </div>
        </td></tr>
    <tr>
         <td></td><td colspan="2"> 
            <input type="submit" name="submit" value="simpan" class="btn btn-success  btn-sm">
            <?php echo anchor($this->uri->segment(1),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
        </td></tr>
</table>
  </div></div>
</form>