		<footer>
			<div class="footer_fix">
				<div class="footer_contacts">
					<a href="tel:<?php echo get_field('номер1',13);?>" class="footer_num"><img src="<?php echo get_template_directory_uri();?>/images/footer_num.png" alt=""><?php echo get_field('номер1',13);?></a>
					<a href="tel:<?php echo get_field('номер2',13);?>" class="footer_num"><img src="<?php echo get_template_directory_uri();?>/images/footer_num.png" alt=""><?php echo get_field('номер2',13);?></a>
					<div class="footer_graf"><?php echo get_field('режим_работы',13);?></div>
				</div>
				<nav class="footer_menu">
					<?php $menu = wp_get_nav_menu_items(2);?>
					<ul>
						<?php foreach ($menu as $menu_li):?>
						<li><a href="<?php echo $menu_li->ID;?>"><?php echo $menu_li->title;?></a></li>
						<?php endforeach;?>
					</ul>
				</nav>
				<div class="footer_call">
					<a href="<?php echo get_field('инстаграм',13);?>" class="footer_insta">Мы в инстаграм<img src="<?php echo get_template_directory_uri();?>/images/header_insta.png"></a> 
					<a href="#openModal" class="footer_call_but">Заказать звонок</a>
				</div>
				<div class="footer_dev">Разработка сайтов – «TRONIUM»</div>
			</div>
		</footer>
	</main>
	<?php wp_footer();?>
</body>
</html>