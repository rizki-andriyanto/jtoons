<html>
<title>Detail Content List</title>
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>


<h2 style="margin-top:10px">Detail Content</h2>
<div class="col-md-4">
                <?php echo anchor(site_url('content'),'Content', 'class="btn btn-info"'); ?><p>
                
</div>




<div align="center" class="container">


<table class="table table-bordered" style="margin-bottom: 10px">
  <tr>
    <td>No</td>
    <td>Judul</td> 
    <td>Konten</td>
    <td>Gambar</td>
    <td>Setting</td>
  </tr>
  <?php
    if(isset($view_data) && is_array($view_data) && count($view_data)): $i=1;
    foreach ($view_data as $key => $data) { 
    ?>
  <tr>
    <td width="80px"><?php echo $i++ ?></td>
    <td><?php echo $data['judul']; ?></td> 
    <td><?php echo $data['konten']; ?></td>

     <td colspan="1" align="center">
<img src="<?php echo base_url(); ?>uploads/<?php echo $data['image']; ?>" style="vertical-align:middle;" width="80" height="80"></td>
    <td>
    <a href="<?php echo site_url(); ?>Uploadimages">Create</a> | 
    <a href="<?php echo site_url(); ?>Uploadimages/read/<?php echo $data['c_id']; ?>">Read</a> | 
    <a href="<?php echo site_url(); ?>Uploadimages/edit/<?php echo $data['c_id']; ?>">Update</a> | 
    
   
    </td>

  </tr>
  <?php } endif; ?>
</table>

</div>


</body>
</html>




