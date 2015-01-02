<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Documento sin título</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<!-- or -->
<script type="text/javascript" src="js/jquery.webRating.min.js"></script>
<script type="text/javascript" src="js/jquery.webRating.min.js"></script>
<link rel="stylesheet" href="css/styleCorazones.css" />
</head>

<body>
<div class="ec-stars-wrapper">
	<a href="#" data-value="1" title="Votar con 1 estrellas" color="#FF0000">&#9829;</a>
	<a href="#" data-value="2" title="Votar con 2 estrellas" color="#FF0000">&#9829;</a>
	<a href="#" data-value="3" title="Votar con 3 estrellas">&#9829;</a>
	<a href="#" data-value="4" title="Votar con 4 estrellas">&#9829;</a>
	<a href="#" data-value="5" title="Votar con 5 estrellas">&#9829;</a>
</div>

<div class="divClass" data-webRating="2.5" data-webRatingN="5" data-webRatingArg='{"type":"book","uid":12}'></div>
</body>
<script>
jQuery("div").webRating({     
        // count
        ratingCount     : 5,

        // image & color
        imgSrc          : "generalIcons.png",
        xLocation     	: 53, //in px
        yLocation	: 49, //in px
        width		: 15, //in px
        height          : 15, //in px

        //CSS
        onClass         : 'onClass',
        offClass        : 'offClass',
        onClassHover  	: 'onClassHover', //Optional
        offClassHover 	: 'offClassHover', //Optional

        //on click funcitons
        cookieEnable  : false,
        cookiePrefix  : "myRating_",
        maxClick      : 1,
        onClick       : function(clickScore, data){
            //Your function & post action
        },

        //Tooltip
        tp_showAverage  : true,
        prefixAverage   : "Avg",
        tp_eachStar     : {'1':'Very Bad','2':'Bad','3':'Ok','4':'Good','5':'Very Good'} //Rating guide
}); 

</script>

</html>
