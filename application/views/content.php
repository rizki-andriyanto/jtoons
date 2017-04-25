<!-- Content -->
				<?php foreach( $photos  as $post  )  : 
					$image = $post->image;
					$id = $post->id;
					


				?>
				<article class="item thumb" data-width="300">
					<!-- <h2><a href="<?php echo base_url() ?>post?post_id=<?php echo $id?>" class="icon fa-eye">&nbsp;&nbsp;<?php echo 'Detail'; ?></a></h2> -->
						

					<a href="<?php echo base_url() ?>uploads/<?php echo $image ?>" class="image"><img src="<?php echo base_url() ?>uploads/<?php echo $image?>" alt=""></a>
					</article>
					

			<?php endforeach; ?>
			</div>
		</div>

		

				