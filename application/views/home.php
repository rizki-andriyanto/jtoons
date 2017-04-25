<html>
<title>Detail Content List</title>
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.js') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>


<h2 style="margin-top:10px">Detail Konten</h2>
<div class="alert alert-info">
    <strong>Info!</strong>  Untuk <i>Hapus,Tambah, dan Cari Data </i>, Klik <a href="#" class="alert-link"><?php echo anchor(site_url('pagination'),'  <b>Setting Admin</b>'); ?></a>.
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
   
    <a href="<?php echo site_url(); ?>Uploadimages/read/<?php echo $data['c_id']; ?>">Lihat</a> | 
    <a href="<?php echo site_url(); ?>Uploadimages/edit/<?php echo $data['c_id']; ?>">Edit</a>
    
    
    </td>

  </tr>
  <?php } endif; ?>
</table>

</div>


</body>
</html>




