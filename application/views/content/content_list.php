<!doctype html>
<html>
    <head>
        
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Setting Admin</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
               
                 
                 <?php echo anchor(site_url('Uploadimages'),'Tambah', 'class="btn btn-primary"'); ?>
                 <?php echo anchor(site_url('Pagination'),'Back', 'class="btn btn-default"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('content/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('content'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Judul</th>
		<th>Konten</th>
		<th>Action</th>
            </tr><?php
            foreach ($content_data as $content)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $content->judul ?></td>
			<td><?php echo $content->konten ?></td>
          
            
			<td style="text-align:center" width="200px">
				<?php 
				// echo anchor(site_url('content/read/'.$content->c_id),'Read'); 
				// echo ' | '; 
				// echo anchor(site_url('content/update/'.$content->c_id),'Update'); 
				// echo ' | '; 
				echo anchor(site_url('content/delete/'.$content->c_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
	    </div>
        <br>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>