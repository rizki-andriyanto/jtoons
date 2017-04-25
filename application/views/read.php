<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        

<h2 style="margin-top:0px">Lihat Konten</h2>
<table class="table">
<?php
    if(isset($read_data) && is_array($read_data) && count($read_data)): $i=1;
    foreach ($read_data as $key => $data) { 
  ?>
<br>
<tr>
<td>Judul</td>
<td><?php echo $data['judul']; ?></td>
</tr>
<tr>
<td>Konten</td>
<td><?php echo $data['konten']; ?></td>
<input type="hidden" name="c_id" value="<?php echo $data['c_id']; ?>" id="file" placeholder="class">
</tr>
<?php } endif; ?>
<?php
    if(isset($edit_data_image) && is_array($read_data) && count($read_data)): $i=1;
    foreach ($edit_data_image as $key => $data) { 
  ?>
<tr class="imagelocation<?php echo $data['id'] ?>">
<td>Gambar</td>
<td><img src="<?php echo base_url(); ?>uploads/<?php echo $data['image']; ?>" style="vertical-align:middle;" width="250" height="150">
</td>
</tr>
<?php }endif; ?>

      
      <tr><td></td><td><a href="<?php echo site_url('pagination') ?>" class="btn btn-default">Back</a></td></tr>
  </table>

        </body>
</html>
