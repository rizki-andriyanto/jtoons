<html>
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
<style>
            body{
                padding: 15px;
            }
        </style>


<body>
<h2 style="margin-top:0px">Tambah Konten</h2>
<form method="POST" action="<?php echo site_url('Uploadimages/file_upload');?>" enctype='multipart/form-data'>
<br>
 <div class="form-group">
  <label for="varchar">Judul</label>
  <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul"/>
 </div>

 <div class="form-group">
  <label for="varchar">Konten</label>
  <input type="text" class="form-control" name="konten" id="konten" placeholder="Konten"/>
 </div>

 <div>
 <label for="varchar">Gambar Portofolio</label>
 
  <input type="file" name="userfile[]" required id="image_file" accept=".png,.jpg,.jpeg,.gif" multiple />
 </div>
	    <br><button type="submit" class="btn btn-primary">Simpan</button>&nbsp;&nbsp;<?php echo anchor(site_url('content'),'Back', 'class="btn btn-default"'); ?><br>

    </body>
</html>
