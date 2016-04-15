<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <a href="javascript:void(0)">Home</a></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Kelola Penjurusan</li>
    </ol>
</div>
 
 <?php
echo anchor($this->uri->segment(1).'/post',"<i class='fa fa-pencil-square-o'></i> Tambah Data",array('class'=>'btn btn-danger   btn-sm','title'=>'Tambah Data'))
?>
      
                    <table id="example-datatables" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="90"></th>
                                <th width="7">Nomor</th>
                                <th>Penjurusan</th>
                                <th>Tingkat</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            $i=1;
                            foreach ($record as $r)
                            {
                            ?>
                            
                            <tr>
                                <td class="text-center" width="120">
                                    <div class="btn-group">
                                        <a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->konsentrasi_id;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-success">Edit</a>
                                        <a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->konsentrasi_id;?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger">Delete</a>
                                                                            </div>
                                </td>
                                <td><?php echo $i;?></td>
                                <td><?php echo strtoupper($r->nama_konsentrasi)?></td>
                                <td><?php echo strtoupper($r->nama_prodi);?></td>
         
                            </tr>
                            <?php $i++;}?>
                            
                            
                        </tbody>
                    </table>
                    <!-- END Datatables -->