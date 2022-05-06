<?php get_header();?>	
		<content>
			<div class="content_fix">
				<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post() ?>	
				<div class="s_product_nav"><?php sort_cat_single()  ?></div>
				<div class="s_product">
					<div class="s_product_left">
						<div class="s_product_img">
							<a href="<?php echo get_field('фото_товара')['url']?>" rel="lightbox"><img src="<?php echo get_field('фото_товара')['sizes']['small3'] ?>" alt=""></a>
						</div>	
						<div class="s_product_imgs">
							<?php 
								$gallery = get_field('доп_фотография');
								foreach ($gallery as $img):
							?>
							<a href="<?php echo $img	['url']; ?>" rel="lightbox"><img src="<?php echo $img['sizes']['small2']; ?>" alt=""></a>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="s_product_right">
						<div class="s_product_title"><?php the_title() ?></div>
						<div class="s_product_cart">
							<div class="s_product_cart_top">
								<div class="s_product_cart_new_cost"><?php echo number_format(get_field('cost_1'), 0, ',', ' '); ?> руб.</div>
								<div class="s_product_cart_old_cost"><?php echo number_format(get_field('старая_цена'), 0, ',', ' '); ?> руб.</div>
							</div>
							<div class="s_product_cart_bottom">
								<div class="s_product_cart_metka">Акция</div>
								<div class="s_product_cart_button">В корзину<?php echo $GLOBALS['wpshop_obj']->GetGoodWidget();?></div>
							</div>
						</div>
						<div class="s_product_desc"><?php echo get_field('описание') ?></div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>	
		</content>
<?php get_footer();?>		