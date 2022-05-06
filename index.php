<?php get_header();?>	
		<content>
			<div class="content_fix">
				<div class="offer">
					<?php cats(); ?>
					<div class="slider">
						<?php $slider = get_field('слайдер',13); $n = 0;?>
						<?php foreach($slider as $slide): $n++;?>
							<div class="slide slide_<?php echo $n; ?>">
								<div class="slider_img" style="background: url('<?php echo $slide['фон']?>')no-repeat center/cover;"></div>
								<div class="slider_line"></div>
								<div class="slider_title"><?php echo $slide['описание']?></div>
							</div>
						<?php endforeach;?>
						<div class="nav_slider">
							<div class="nav_slider_button nav_slider_prev"><</div>
							<div class="nav_slider_button nav_slider_next">></div>
						</div>
					</div>
				</div>
				<div class="big_cats">
					<div class="big_cats_blocks">
						<?php 
							$k=1;
							$cats = get_categories( [
								'taxonomy'     => 'category',
								'parent'       => 3,
								'orderby'      => 'ID',
								'hide_empty'   => 0,
								
							] );

						?>
						<?php $i =1; foreach($cats as $cat): {
										
						}?>
						<a href="<?php echo get_category_link($cat->cat_ID)?>" class="big_cats_block big_cats_block_<?php echo $i; ?> ">
							<div class="big_cats_img" style="background: url('<?php echo get_field('фон_категории','category_'.$cat->cat_ID)['sizes']['small2'];?>')no-repeat center/cover;" ></div>
							<div class="big_cats_title"><?php echo $cat->name?></div>
						</a>
						<?php $k++; $i++;?>
						<?php endforeach;?>
					</div>
					<?php if (count($cats) > 6): ?>
					<div class="nav_big_cats">
						<div class="big_cats_button	nav_big_cats_prev"><</div>
						<div class="big_cats_button nav_big_cats_next">></div>
					</div>
					<?php endif; ?>
				</div>
				<div class="products">
					<div class="products_block">
						<div class="products_block_title">
							<div class="products_block_nav_prev" metka="акция" offset="-4"><</div>
							<div class="products_block_nav_text">Акции</div>
							<div class="products_block_nav_next" metka="акция" offset="4">></div>
						</div>
						<div class="products_block_list" metka="акция">
							<?php 
								$query = new WP_Query(
									$args = array (
										'posts_per_page' => 4,
										'category__in'=> array(3),
										'meta_query' => array(
											array(
												'key' => 'акция',
												'value' => 1,
												'compare' => '='
											)
										)

									)

								)


							?>
							<?php if( $query->have_posts()):?>
							<?php while( $query->have_posts()): $query->the_post();?>
							<?php product();?>
							<?php endwhile; ?>
							<?php else:?>
							<p>Товаров пока нет</p>
							<?php endif;?>
						</div>
					</div>
					<div class="products_block">
						<div class="products_block_title">
							<div class="products_block_nav_prev" metka="топ_продаж" offset="-4"><</div>
							<div class="products_block_nav_text">Топ продаж</div>
							<div class="products_block_nav_next" metka="топ_продаж" offset="4">></div>
						</div>
						<div class="products_block_list" metka="топ_продаж">
							<?php 
								$query = new WP_Query(
									$args = array (
										'posts_per_page' => 4,
										'category__in'=> array(3),
										'meta_query' => array(
											array(
												'key' => 'топ_продаж',
												'value' => 1,
												'compare' => '='
											)
										)

									)

								)


							?>
							<?php if( $query->have_posts()):?>
							<?php while( $query->have_posts()): $query->the_post();?>
							<?php product();?>
							<?php endwhile; ?>
							<?php else:?>
							<p>Товаров пока нет</p>
							<?php endif;?>
						</div>
					</div>
					<div class="products_block">
						<div class="products_block_title">
							<div class="products_block_nav_prev" metka="распродажа" offset="-4"><</div>
							<div class="products_block_nav_text">Распродажа</div>
							<div class="products_block_nav_next" metka="распродажа" offset="4">></div>
						</div>
						<div class="products_block_list" metka="распродажа">
							<?php 
								$query = new WP_Query(
									$args = array (
										'posts_per_page' => 4,
										'category__in'=> array(3),
										'meta_query' => array(
											array(
												'key' => 'распродажа',
												'value' => 1,
												'compare' => '='
											)
										)

									)

								)


							?>
							<?php if( $query->have_posts()):?>
							<?php while( $query->have_posts()): $query->the_post();?>
							<?php product();?>
							<?php endwhile; ?>
							<?php else:?>
							<p>Товаров пока нет</p>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>	
		</content>
<?php get_footer();?>		