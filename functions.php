<?php 

add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
	register_nav_menu( 'topmenu', 'Верхнее меню' );
}

?>

<?php

function product() {

?>

<div class="product">
	<a href="<?php the_permalink(); ?>" class="product_top">
		<div class="product_title"><?php the_title() ?></div>
		<div class="product_img" style="background: url('<?php echo get_field('фото_товара')['sizes']['small'];?>')no-repeat center/contain;"></div>
	</a>
	<div class="product_old_cost">
		<div class="product_old_cost_title">Старая цена</div>
		<div class="product_old_cost_count"><?php echo get_field('старая_цена'); ?> руб.</div>
	</div>
	<div class="product_new_cost">
		<div class="product_new_cost_cart" title="Добавить в корзину"><?php echo $GLOBALS['wpshop_obj']->GetGoodWidget();?></div>
		<div class="product_new_cost_count"><?php echo get_field('cost_1'); ?> руб.</div>
	</div>
</div>

<?php } ?>


<?php 

	function cats() {

 ?>

 <div class="cats_list">
	<div class="cats_title">Каталог</div>
	<div class="cats_li">
		<?php 
		$k = 0;
		$cats = get_categories( [
			'taxonomy'     => 'category',
			'parent'       => 3,
			'orderby'      => 'ID',
			'hide_empty'   => 0,
			
		] );

		?>
		<ul>
			<?php foreach($cats as $cat): {
				
			}?>
			<li><a href="<?php echo get_category_link($cat->cat_ID)?>"><?php echo $cat->name ?></a></li>
			<?php $k++; if($k==15) {break;}?>
			<?php endforeach;?>
		</ul>

	</div>
	<a href="<?php echo get_category_link(3);?>" class="cats_more">Показать весь каталог</a>
</div>

 <?php } ?>


 <?php function sort_cat_single() {
 	$cat_id_array = get_the_category(get_the_ID());
 	$i = 0;
 	while (true) {
 		if(!$cat_id_array[$i]->term_id) {
 			break;
 		}
 		$new_cat_id_array[$i] = $cat_id_array[$i]->term_id;
 		$i++;
 	}
 	sort($new_cat_id_array);
 	foreach ($new_cat_id_array as $key=>$cat_id) {
 		echo '<a href="'.get_category_link($cat_id).'">'.get_the_category_by_ID($cat_id).'</a>/';
 	
 	}
 	echo get_the_title();




 }

// отключаем создание миниатюр файлов для указанных размеров
add_filter( 'intermediate_image_sizes_advanced', function( $sizes ) {

	unset( $sizes['medium'] );
	unset( $sizes['medium_large'] );
	unset( $sizes['large'] );
	unset( $sizes['1536x1536'] );
	unset( $sizes['2048x2048'] );

	return $sizes;
} );

# Отменим `-scaled` размер - ограничение максимального размера картинки 
add_filter( 'big_image_size_threshold', '__return_zero' );

/*Задать свои размеры*/

add_image_size('small', 155, 125, false);
add_image_size('small2', 155, 155, false);
add_image_size('small3', 555, 0, false);

/*AJAX*/

add_action( 'wp_ajax_load_posts', 'load_posts' );
add_action( 'wp_ajax_nopriv_load_posts', 'load_posts' );

function load_posts() {

?>
<?php 
	$metka_val = $_POST['metka_val'];
	$offset_val = $_POST['offset_val'];

	$query = new WP_Query(
		$args = array (
			'posts_per_page' => 4,
			'category__in'=> array(3),
			'offset' => $offset_val,
			'meta_query' => array(
				array(
					'key' => $metka_val,
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
	<p noposts="noposts">Товаров пока нет</p>
	<?php endif;?>




<?php
wp_die();
 } 
 ?>
