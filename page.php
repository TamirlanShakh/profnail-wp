<?php get_header();?>	
		<content>
			<div class="content_fix">
				<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post() ?>	
				<div class="page_content">
					<h1 class="page_title"><?php the_title(); ?></h1>
					<div class="page_text"><?php the_content(); ?></div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>	
		</content>
<?php get_footer();?>		