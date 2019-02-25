<!DOCTYPE html>
<?php
if(defined('VERSION') && !defined('version'))
	define('version', VERSION);
if(version<'2.0.0')
	defined('INC_ROOT') OR die('Direct access is not allowed.');

wCMS::addListener('menu', 'colorSelector');

function colorSelector ($args) {
	$args[0] .= '
<li>
	<ul class="color-selector">
		<li><a href="" id="nightmode"><span class="fa fa-moon-o fa-lg" aria-hidden="true"></span></a></li><li><a href="" id="default"><span class="fa fa-sun-o fa-lg" aria-hidden="true"></span></a></li>
	    <li><p><font size="-8">Theme</font></p></li>
	</ul>
</li>';
	return $args;
}
if(isset($_COOKIE['stylesheet'])) {
	switch($_COOKIE['stylesheet']) {
		case 'nightmode':
			$css = 'css/style-night.css';
			break;
		default:
			$css = 'css/style-default.css';
			break;
	}
} else {
	$css = 'css/style-default.css';
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#75b1f2">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=wCMS::get('config','siteTitle')?> - <?=wCMS::page('title')?></title>
	<meta name="description" content="<?=wCMS::page('description')?>">
	<meta name="keywords" content="<?=wCMS::page('keywords')?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link id="stylesheet" rel="stylesheet" href="<?=wCMS::asset($css)?>">

	<?=wCMS::css()?>

</head>
<body>
	<div style="margin-top:65px">
	<?=wCMS::alerts()?>
	<?=wCMS::settings()?>
    </div>

	<nav class="navbar navbar-light navbar-expand-lg fixed-top" id="thisNav" style="display:none;">
		<div class="container-fluid colorBackground" style=" border-radius:4px;">
		    <a class="navbar-brand site-title" href="<?=wCMS::url()?>" title="Home"></a>
			<button class="navbar-toggler navbar-toggler-right collapsed no-border" type="button" data-toggle="collapse" data-target="#navbar-collapse-x" aria-controls="navbar-collapse-x" aria-expanded="false" aria-label="Toggle Nav">
                <span> </span>
                <span> </span>
                <span> </span>
            </button>

			<div class="collapse navbar-collapse" id="navbar-collapse-x">
				<ul class="nav navbar-nav ml-auto">
					<?=wCMS::menu()?>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
	    <div class="row sm-gutter">
			<div class="col-xs-12 col-sm-8">
			<div class="box css3-shadow whiteBackground padding10">
				<?=wCMS::page('content')?>
			    <?php if (wCMS::$currentPage == 'gallery'): ?>
                <iframe src="https://www.powr.io/plugins/instagram-feed/view?unique_label=1aee9b35_1550449208&external_type=iframe" width="100%" height="870" frameborder="0"></iframe>
                <?php endif ?>
			</div>
			</div>
			<div class="col-xs-12 col-sm-4">
			    <div class="box css3-shadow whiteBackground padding10">
			        <iframe style="border: 0; width: 100%; height: 120px;" src="https://bandcamp.com/EmbeddedPlayer/album=1814967126/size=large/bgcol=333333/linkcol=0f91ff/tracklist=false/artwork=small/transparent=true/" seamless>
			            <a href="http://carbide.bandcamp.com/album/house-of-snakes">House of Snakes by Carbide</a></iframe>
                    <?=newEditableArea()?>
                </div>
			    <div class="box css3-shadow whiteBackground padding10">
				    <?=wCMS::block('subside')?>


				    <div class="wrapper">
				    <div class="links">
                    <a href="https://open.spotify.com/artist/46FMfS2QJiBsbD42BYviN0"><span class="fa fa-spotify fa-lg padding7" style="color: #75b1f2;" aria-hidden="true"></span></a>
                    <a href="https://instagram.com/carbide_band"><span class="fa fa-instagram fa-lg padding7" style="color: #75b1f2;" aria-hidden="true"></span></a>
                    <a href="https://facebook.com/carbideband"><span class="fa fa-facebook-square fa-lg padding7" style="color: #75b1f2;" aria-hidden="true"></span></a>
                    <a href="https://youtube.com/channel/UCqQJBHyLgElK4gSFF2d5d-g"><span class="fa fa-youtube-play fa-lg padding7" style="color: #75b1f2;" aria-hidden="true"></span></a>
                    <a href="https://github.com/carbideband"><span class="fa fa-github fa-lg padding7" style="color: #75b1f2;" aria-hidden="true"></span></a>
	    		    </div>
		    	    </div>
                </div>
			</div>
		</div>

	</div>

	<footer class="container-fluid css3-shadow whiteFont colorBackground padding20">
				<p><?= wCMS::footer() ?></p>
	</footer>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?=wCMS::js()?>
    <script src="<?=wCMS::asset('js/js.cookie.js')?>"></script>
	<script>
		$( document ).ready(function() {
			$('body').css('margin-bottom', $('footer').height()+'px');
			
			function change_stylesheet(c) {
				switch(c) {
					case 'nightmode':
						var stylesheet = $('#stylesheet').attr('href').replace(/css\/style\-(.*)/g, 'css/style-night.css');
						break;
					case 'default':
						var stylesheet = $('#stylesheet').attr('href').replace(/css\/style\-(.*)/g, 'css/style-default.css');
						break;
				}
				Cookies.set("stylesheet", c, { expires: 7 });
				$("#stylesheet").attr({href: stylesheet});
			}
			
			if(Cookies.get("stylesheet")) {
				change_stylesheet(Cookies.get("stylesheet"));
			}
			
			$('.color-selector li a').click(function(e){
				e.preventDefault();
				change_stylesheet($(this).attr('id'));
			});
		    var prevScroll = 0;

            $('#thisNav').fadeIn("fast");

			$(window).scroll(function () {
			    var currScroll = $('html').scrollTop();

			    if ((currScroll > 80) && (prevScroll < currScroll)) {
			        $('#thisNav').fadeOut("fast");
			    } else if (((currScroll < prevScroll) && (prevScroll - currScroll >= 7)) || (currScroll <= 7 )) {
			        $('#thisNav').fadeIn("fast");
			    }
			    prevScroll = currScroll;
			});
		});
	</script>
</body>
</html>
