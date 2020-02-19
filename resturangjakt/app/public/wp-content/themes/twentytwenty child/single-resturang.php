<?php
/**
 * Template Name: Startpage Template
 * Template Post Type: post, page
 */
get_header();
?>
<main id="site-content" role="main">
	<?php
	if ( have_posts()) :
        the_post()
           ?>            
            <div class="single-wrap">
                <h3><?php the_title(); ?></h3>
                <?php $image = get_field("main_image");?>
                <img src="<?php print $image['url']?>" alt="<?php print $image['alt']?>" class="mainimg">
                <span>
                    <?php 
                    print"<div class='ratingAndLocation'>";
                    print"<div class='left'>";
                    print"<h5>Betyg</h5>";
                    the_field("betyg_orsak");
                    $rating = get_field("rating");
                    switch ($rating) {
                        case '1':
                            $color = "red";
                        break;
                        case '2':
                            $color = "blue";
                        break;
                        case '3':
                            $color = "green";
                        break;
                        case '4':
                            $color = "silver";
                        break;
                        case '5':
                            $color = "gold";
                        break;
                        
                    }
                    print"<p>";
                    for ($i=0; $i < $rating; $i++) { 
                        print'<i style="color:'.$color.';" class="fas fa-2x fa-star"></i>';
                    }
                    for ($y=0; $y < (5-$rating); $y++) { 
                        print'<i style="color:rgba(99, 99, 99, 0.255);" class="fas fa-2x fa-star"></i>';
                    }
                    print"</p><hr>";

                    print"<p>Har du en annan åsikt? Känn dig fri att lämna ditt egna betyg!</p>";
                    get_template_part( 'template-parts/rating' );
                    print"</div><p class='horisontalRule'><div class='right'>";
                    print"<h5>Adress</h5>";
                    
                    $maptype = get_field("google_maps_eller_text");
                    if($maptype == "google"){
                        print get_field("map")["address"];
                    }
                    else{
                        the_field("adressText");
                    }
                    print"<hr>";

                    print"<h5>Hemsidan</h5>";
                    if(get_field("hemsida")){
                        print"<a href='".get_field("hemsida")."' target='_BLANK'>";
                        the_field("hemsida");
                        print"</a>";
                    }
                    print"<hr>";
                    print"<h5>Öppettider</h5>";

                    the_field("open_hours");
                    print"</div>";
                    
                    print"</div>";
                    print"<hr>";

                    print get_field("description");
                    ?>
                    
                </span>
		    <hr/>
			<a class="allPosts" href="<?php print get_post_type_archive_link("resturang") ?>"><h4>Se alla recensioner</h4></a>
			<!-- </div> -->
            </div>

            <?php
            
	endif;
?>

</main><!-- #site-content -->
<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
