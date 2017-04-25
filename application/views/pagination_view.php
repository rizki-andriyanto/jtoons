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
    <strong>Info!</strong>  Untuk <i>Hapus,Tambah, dan Cari Data </i>, Klik <a href="#" class="alert-link"><?php echo anchor(site_url('content'),'  <b>Setting Admin</b>'); ?></a>.
  </div>




<div align="center" class="container">


    <div class="row">
        <div>
        <?php 
        $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
        echo form_open("pagination/search", $attr);?>
            <div class="form-group">
                <div class="col-md-4">
                    <input class="form-control" id="portfolio" name="portfolio" placeholder="Cari Portofolio" type="text" value="<?php echo set_value('portfolio'); ?>" />
                </div><br>
                <div class="col-md-4">
                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Cari" />
                    <a href="<?php echo base_url(). "pagination/index"; ?>" class="btn btn-primary">Tampilkan Data</a>
                </div>
            </div>
        <?php echo form_close(); ?>
        </div>
    </div>

    <div class="row">
        <div class="table table-bordered" style="margin-bottom: 10px">
            <table class="table table-striped table-hover" >
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Gambar</th>
                    <th>Setting</th>
                    
                    </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < count($contentlist); ++$i) { ?>
                <tr>
                    <td><?php echo ($page+$i+1); ?></td>
                    <td><?php echo $contentlist[$i]->judul; ?></td>
                    <td><?php echo $contentlist[$i]->konten; ?></td>
                   <!--  <td><?php echo $contentlist[$i]->image; ?></td> -->
                    <td><img src="<?php echo base_url(); ?>uploads/<?php echo $contentlist[$i]->image; ?>" style="vertical-align:middle;" width="80" height="80"></td>
                    <!-- <td><?php echo $contentlist[$i]->isbn; ?></td> -->
                    <td>
                    <a href="<?php echo site_url(); ?>Uploadimages/read/<?php echo $contentlist[$i]->c_id; ?>">Lihat</a> | 
                    <a href="<?php echo site_url(); ?>Uploadimages/edit/<?php echo $contentlist[$i]->c_id; ?>">Edit</a>
                    </td>

    
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php echo $pagination; ?>
        </div>
    </div>
</div>
</body>
</html>