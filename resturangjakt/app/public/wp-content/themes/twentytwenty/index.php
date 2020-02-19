<?php


get_header();
?>

<main id="site-content" role="main">
	<?php

	$loop = new WP_Query( array( 'post_type' => 'resturang') );
		$i = 0;
	if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) : $loop->the_post(); 
            $i++;
				if ( $i > 1 ) {
					echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';
				}
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

        endwhile;
	endif;
	// if ( have_posts() ) {


	// 	while ( have_posts() ) {
	// 		$i++;
	// 		if ( $i > 1 ) {
	// 			echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';
	// 		}
	// 		the_post();

	// 		get_template_part( 'template-parts/content', get_post_type() );

	// 	}
	// } elseif ( is_search() ) {
	 	?>

	 	<!-- <div class="no-search-results-form section-inner thin"> -->

	 		<?php
	// 		get_search_form(
	// 			array(
	// 				'label' => __( 'search again', 'twentytwenty' ),
	// 			)
	// 		);
	 		?>

	 	<!-- </div> -->

	 	<?php
	// }
	?>

	<?php get_template_part( 'template-parts/pagination' ); ?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
