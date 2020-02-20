<?php
get_header();
?>

<main id="site-content" role="main">
	<?php
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$loop = new WP_Query( array( 'post_type' => 'resturang', 'posts_per_page' => 9, 'paged' => $paged) );
	if ( $loop->have_posts() ) :
		print'<div class="other-posts"><div class="wrapper">';
		$count = 0;
        while ( $loop->have_posts() ) : $loop->the_post(); 
			?>
									<div class="block">
							<a href="<?php the_permalink()?>">
							<h5><?php the_title(); ?></h5>
							</a>
							<a href="<?php the_permalink()?>">
								<?php $image = get_field("main_image");?>
								<div class="image">
								<img src="<?php print $image['url']?>" alt="<?php print $image['alt']?>">
								<span>
								<?php 								
									the_field("beskrivning_sammanfattning");
								?>
								</span>
							</div>
							</a>
						</div>
			<?php	
		$count++;
		endwhile;
		$rest = $count%3;
		for ($i=1; $i < $rest; $i++) { 
			?>
			<div class="image">
			</div>
			<?php
		}
		print"</div></div>";
	endif;
	?>

	<?php get_template_part( 'template-parts/pagination' ); ?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
