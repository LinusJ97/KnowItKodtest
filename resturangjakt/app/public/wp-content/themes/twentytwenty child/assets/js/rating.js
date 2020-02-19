jQuery( document ).ready(function(){
    jQuery(".ratingStar").hover(function() {
        switch (jQuery(this).attr("class").split(/\s+/)[3]) {
            case 'rate1':
                var colour = "red";
            break;
            case 'rate2':
                var colour = "blue";
            break;
            case 'rate3':
                var colour = "green";
            break;
            case 'rate4':
                var colour = "pink";
            break;
            case 'rate5':
                var colour = "gold";
            break;
        }
        // alert("enter");
        jQuery(this).prevUntil("p").addClass(colour);
        jQuery(this).addClass(colour);
        
        // jQuery(this).css( "color", "red" );
        // jQuery(this).prevAll().addClass();
    }, function(){
        switch (jQuery(this).attr("class").split(/\s+/)[3]) {
            case 'rate1':
                var colour = "red";
            break;
            case 'rate2':
                var colour = "blue";
            break;
            case 'rate3':
                var colour = "green";
            break;
            case 'rate4':
                var colour = "pink";
            break;
            case 'rate5':
                var colour = "gold";
            break;
        }
        // alert("enter");
        jQuery(this).prevUntil("p").removeClass(colour);
        jQuery(this).removeClass(colour);
        // alert("exited");
    }) 
    jQuery(".ratingStar").click(function() {
        jQuery(".ratingStar").removeClass("Set-red")
        jQuery(".ratingStar").removeClass("Set-blue")
        jQuery(".ratingStar").removeClass("Set-green")
        jQuery(".ratingStar").removeClass("Set-pink")
        jQuery(".ratingStar").removeClass("Set-gold")
        switch (jQuery(this).attr("class").split(/\s+/)[3]) {
            case 'rate1':
                var score = "1";
                var colour = "Set-red";
            break;
            case 'rate2':
                var score = "2";
                var colour = "Set-blue";

            break;
            case 'rate3':
                var score = "3";
                var colour = "Set-green";

            break;
            case 'rate4':
                var score = "4";
                var colour = "Set-pink";

            break;
            case 'rate5':
                var score = "5";
                var colour = "Set-gold";
            break;
        }
        // alert("enter");
        jQuery("#comment").val(score);
        jQuery(this).addClass(colour);
        jQuery(this).prevUntil("p").addClass(colour);
        jQuery(".submit").removeClass("hidden");
        jQuery(".submit").val("Ge betyg");
        let rating = score;
    });
    jQuery(".submit").click(function(){
        document.cookie = jQuery(".postID").val()+"="+ jQuery(".postID").val();
    });
});