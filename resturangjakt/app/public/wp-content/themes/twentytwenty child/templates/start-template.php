<?php
/**
 * Template Name: Startpage Template
 * Template Post Type: post, page
 */
get_header();
?>
<main id="site-content" role="main">
	<h2 style="text-align: center;">Senaste resturang</h2>
	<?php
	$loop = new WP_Query( array( 'post_type' => 'resturang', 'posts_per_page' => 7) );
		$i = 0;
	if ( $loop->have_posts() ) :
		while ( $loop->have_posts() ) : $loop->the_post(); 
			$i++;
			if($i == 1){
				?>
				<div class="latest-post">
					<div class="wrapper">
					<a href="<?php the_permalink()?>">
						<h3><?php the_title(); ?></h3>
					</a>
					<a href="<?php the_permalink()?>">
						<?php $image = get_field("main_image");?>
						<div class="image">
						<img src="<?php print $image['url']?>" alt="<?php print $image['alt']?>">
						<span>
							<?php the_field("beskrivning_sammanfattning");?>
						</span>
						</div>
					</a>
					</div>
				</div>
				<hr/>
				
					<h3 style="text-align: center;">Äldre recensioner</h3>
					<div class="other-posts">
						<div class="wrapper">

				<?php
			}
			if ( $i > 1 ) {
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
									<?php the_field("beskrivning_sammanfattning");?>
								</span>
							</div>
							</a>
						</div>

				<?php
			}
		endwhile;

			?>
			</div>
			<a href="<?php print get_post_type_archive_link("resturang") ?>"><h4>Se alla recensioner</h4></a>
			</div>
			<?php
	endif;
?>

</main><!-- #site-content -->
<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
