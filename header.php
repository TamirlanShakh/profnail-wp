<!DOCTYPE html>
<html lang="ru">
<head>
	<title><?php bloginfo($show = 'title')?></title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/scripts.js"></script>
	<script type="text/javascript">
	    var ajaxurl = '<?php echo get_home_url();?>/wp-admin/admin-ajax.php';
	</script>
<?php wp_head();?>
</head>
<body>
	<main>
		<header>
			<div class="modal">
				<div class="modal_window ">
					<div class="close_modal">x</div>
					<div class="modal_title">ЗАКАЗАТЬ ЗВОНОК</div>
					<div class="modal_form">
						<form action="">
							<input type="text" placeholder="Ваше имя">
							<input type="tel" placeholder="Ваш телефон">
							<input type="submit" value="Отправить">
						</form>
					</div>
				</div>
			</div>
			<div class="header_top">
				<div class="header_top_fix">
						<nav class="header_top_menu">
							<?php $menu = wp_get_nav_menu_items(2);?>
							<ul>
								<?php foreach ($menu as $menu_li):?>
								<li><a href="<?php echo $menu_li->url;?>"><?php echo $menu_li->title;?></a></li>
								<?php endforeach;?>
							</ul>
						</nav>
					
					    <div class="header_instamail">
						    <a href="mailto:<?php echo get_field('почта',13);?>" class="header_mail"><img src="<?php echo get_template_directory_uri();?>/images/header_mail.png"><?php echo get_field('почта',13);?></a>
                            <a href="<?php echo get_field('инстаграм',13);?>" class="header_insta">Мы в инстаграм<img src="<?php echo get_template_directory_uri();?>/images/header_insta.png"></a> 
					    </div>
				</div>
			</div>
			<div class="header_bottom">
				<a href="<?php echo get_home_url();?>" class="header_bottom_logo">
					<img src="<?php echo get_template_directory_uri();?>/images/header_logo.png" alt="">
				</a>
				<div class="header_bottom_contacts">
					<a href="tel:<?php echo get_field('номер1',13);?>" class="header_bottom_num"><img src="<?php echo get_template_directory_uri();?>/images/header_num.png" alt=""><?php echo get_field('номер1',13);?></a>
					<a href="tel:<?php echo get_field('номер2',13);?>" class="header_bottom_num"><img src="<?php echo get_template_directory_uri();?>/images/header_num.png" alt=""><?php echo get_field('номер2',13);?></a>
					<div class="header_bottom_graf"><?php echo get_field('режим_работы',13);?></div>
				</div>
				<div class="header_conf">
					<div class="header_conf_top">
						<a href="<?php the_permalink(95)?>" class="header_conf_cart">
							<img src="<?php echo get_template_directory_uri();?>/images/header_conf_cart_count.png">
							<div class="header_conf_cart_count" id="wpshop_minicart">
							</div>
						</a>
						<div class="header_conf_fav">
							<img src="<?php echo get_template_directory_uri();?>/images/header_conf_fav.png">
							<span>Добавить сайт в избранное</span>
						</div>
					</div>
					<div class="header_conf_search">
						<form action="<?php echo get_home_url();?>">
							<input type="text" placeholder="Поиск..." name="s" value="<?php echo $_GET['s'];?>">
						</form>
					</div>
				</div>
				<div class="header_call">
					<div class="header_call_info">*Отправляем в любой<br> регион РФ</div>
					<a href="#openModal" class="consul" id="consul_link">ЗАКАЗАТЬ ЗВОНОК
						
					</a>
				</div>
			</div>
		</header>