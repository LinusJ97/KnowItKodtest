<?php

$ammountOfComments = get_comments(array(
    'post_id' => $post->ID,
    'count' => 'true',
));
$comments = get_comments(array(
    'post_id' => $post->ID,
));
if(comments_open()){
    print"<p>Har du en annan åsikt? Känn dig fri att lämna ditt egna betyg!</p>";


$id = $post->ID;
$ratingsTotal = 0;
foreach ($comments as $comment) {
    $ratingsTotal += $comment->comment_content;
}
if($ammountOfComments == 0){
    print"<p>";
    for ($y=0; $y < 5; $y++) { 
        print'<i style="color:rgba(99, 99, 99, 0.255);" class="fas fa-2x fa-star rate'.($rating+$y+1).' ratingStar"></i>';
    }    print"</br>(".$ammountOfComments.")</p>";

    print"</p>";
    print"<p>Ingen har lämnat sin egna åsikt än!</p>";
    ?>
    <form action="<?php print get_site_url()?>/wp-comments-post.php" method="post" id="commentform" novalidate="">
        <input type="hidden" id="comment" name="comment" required="required"> 
        <input id="author" name="author" type="hidden" value="" size="30" maxlength="245"></p>
        <input id="email" name="email" type="hidden" value="" size="30" maxlength="100" aria-describedby="email-notes"></p>
        <input id="url" name="url" type="hidden" value="" size="30" maxlength="200"></p>
        <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="hidden" value="yes"> 
        <input name="submit" type="submit" id="submit" class="submit hidden" value="Post Comment">
        <input type="hidden" name="comment_post_ID" value="<?php print $post->ID;?>" id="comment_post_ID">
        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
        <input type="hidden" name="postID" class="postID" value="<?php print $post->ID;?>">
    </p>
    </form>
    <?php
}else if($ammountOfComments > 0 && !$_COOKIE[$id] == $post->ID){
    $rating = floor($ratingsTotal / $ammountOfComments);
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
            $color = "pink";
        break;
        case '5':
            $color = "gold";
        break;
        
    }

    for ($y=0; $y < $rating; $y++) { 
        print'<i style="color:'.$color.';" class="fas fa-2x fa-star rate'.($y+1).' ratingStar"></i>';
    }
    for ($i=0; $i < 5-$rating; $i++) { 
        print'<i style="color:rgba(99, 99, 99, 0.255);" class="fas fa-2x fa-star rate'.($rating+$i+1).' ratingStar"></i>';
    }

    print"</br>(".$ammountOfComments.")</p>";
    ?>
    <form action="<?php print get_site_url()?>/wp-comments-post.php" method="post" id="commentform" novalidate="">
        <input type="hidden" id="comment" name="comment" required="required"> 
        <input id="author" name="author" type="hidden" value="" size="30" maxlength="245"></p>
        <input id="email" name="email" type="hidden" value="" size="30" maxlength="100" aria-describedby="email-notes"></p>
        <input id="url" name="url" type="hidden" value="" size="30" maxlength="200"></p>
        <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="hidden" value="yes"> 
        <input name="submit" type="submit" id="submit" class="submit hidden" value="Post Comment">
        <input type="hidden" name="comment_post_ID" value="<?php print $post->ID;?>" id="comment_post_ID">
        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
        <input type="hidden" name="postID" class="postID" value="<?php print $post->ID;?>">

    </p>
    </form>
    <?php
}
else{
    $rating = floor($ratingsTotal / $ammountOfComments);
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
            $color = "pink";
        break;
        case '5':
            $color = "gold";
        break;
        
    }

    for ($y=0; $y < $rating; $y++) { 
        print'<i style="color:'.$color.';" class="fas fa-2x fa-star"></i>';
    }
    for ($i=0; $i < 5-$rating; $i++) { 
        print'<i style="color:rgba(99, 99, 99, 0.255);" class="fas fa-2x fa-star"></i>';
    }

    print"</br>(".$ammountOfComments.")</p>";

    ?>
    <p>Tack för ditt betyg!</p>
    <?php
}
}
else{
    print"<p>Omrösningen är tyvärr stängd för denna resturang!</p>";
}



?>
