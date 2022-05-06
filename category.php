<?php get_header();?>	
		<content>
			<div class="content_fix">
				<div class="category">
					<div class="category_left">
						<?php cats(); ?>
					</div>
					<div class="category_right">
						<div class="products_block">
							<div class="products_block_title"><?php echo single_cat_title();?></div>
							<div class="products_block_list">
							<?php if(have_posts()): ?>
							<?php while(have_posts()): the_post() ?>	
							<?php product();?>
							<?php endwhile; ?>
							<?php else: ?>
							<p class="products_not">Пока ничего нет</p>
							<?php endif; ?>
							<?php 
								$args = array(
									
									'prev_text'    => __('<'),
									'next_text'    => __('>'),
								);

								the_posts_pagination($args);


							 ?>
								
							</div>
						</div>
					</div>
				</div>	
			</div>	
		</content>
<?php get_footer();?>		