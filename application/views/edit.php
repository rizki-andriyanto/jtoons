<html>

<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
<link rel="stylesheet" href="<?php echo base_url('assets-web/css/font-awesome.min.css') ?>"/>
<style>
            body{
                padding: 15px;
            }
        </style>

<body>
<form method="POST" action="<?php echo site_url('Uploadimages/edit_file_upload');?>" enctype='multipart/form-data'>
<h2 style="margin-top:0px">Edit Konten</h2>

<?php
    if(isset($edit_data) && is_array($edit_data) && count($edit_data)): $i=1;
    foreach ($edit_data as $key => $data) { 
  ?>

<div class="form-group">
  <label for="varchar">Judul</label>
  <input type="text" class="form-control" name="judul" value="<?php echo $data['judul']; ?>" id="judul" placeholder="Judul"/>
 </div>

 <div class="form-group">
  <label for="varchar">Konten</label>
  <input type="text" class="form-control" name="konten" value="<?php echo $data['konten']; ?>" id="konten" placeholder="Konten"/>
  <input type="hidden" name="userfile[]" value="<?php echo $data['c_id']; ?>" id="image_file" placeholder="class">
 </div>

 <div>
 <label for="varchar">Gambar Portofolio</label>
 
  <input type="file" name="userfile[]" value="<?php echo $data['c_id']; ?>" required id="image_file" accept=".png,.jpg,.jpeg,.gif" multiple />
 </div>
 <br>


<?php } endif; ?>
<?php
    if(isset($edit_data_image) && is_array($edit_data) && count($edit_data)): $i=1;
    foreach ($edit_data_image as $key => $data) { 
  ?>
<tr class="imagelocation<?php echo $data['id'] ?>">

<img src="<?php echo base_url(); ?>uploads/<?php echo $data['image']; ?>" style="vertical-align:middle;" width="250" height="150">
<span style="cursor:pointer;" onclick="javascript:deleteimage(<?php echo $data['id'] ?>)"><i class="fa fa-times fa-3x" aria-hidden="true"></i></span>

<?php echo $data['image']; ?>

<?php }endif; ?>



<br><br>
<input type="submit" class="btn btn-primary" value="Simpan">
<a href="<?php echo site_url('pagination') ?>" class="btn btn-default">Back</a>

</form>
</div>




<script type="text/javascript">
function deleteimage(image_id)
{
var answer = confirm ("Are you sure you want to delete from this post?");
if (answer)
{
        $.ajax({
                type: "POST",
                url: "<?php echo site_url('Uploadimages/deleteimage');?>",
                data: "image_id="+image_id,
                success: function (response) {
                  if (response == 1) {
                    $(".imagelocation"+image_id).remove(".imagelocation"+image_id);
                  };
                  
                }
            });
      }
}
</script>




</body>
</html>