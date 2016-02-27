<?php
	include('config.php');
	date_default_timezone_set('Asia/Tehran');
	
	$end_date = explode('/' , $end_date);
	$end_time = explode(':' , $end_time);
	
	$end_timestamp = mktime($end_time[0], $end_time[1], $end_time[2], $end_date[1], $end_date[2], $end_date[0]);
	$timestamp = $end_timestamp - time();
	
	if($timestamp < 0){ $timestamp = 0; }
	
	$day = floor( $timestamp / (60*60*24) );
	$timestamp -= ($day * (60*60*24));
	
	$hour = floor( $timestamp / (60*60) );
	$timestamp -= ($hour * (60*60));
	
	$minute = floor( $timestamp / (60) );
	$timestamp -= ($minute * (60));
	
	$second = $timestamp;
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	
    <title><?php echo $top_text; ?></title>
	
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/general.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/colors/<?php echo $theme_color; ?>.css" />
	
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.js"></script>
    <script type="text/javascript" src="js/flipClock/flipClock.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script>
    	$(document).ready(function(e) {
            $('div.clock_parent').flipClock({theme:'matte_white_1_medium', type:'countdown', show_day:true, second:<?php echo $second; ?>, minute:<?php echo $minute; ?>, hour:<?php echo $hour; ?>, day:<?php echo $day; ?>});
			
			var $height = $('div.general_container').height() + 100;
			$('div.general_container').height($height).addClass('center');
        });
    </script>
    
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
	<link rel="icon" type="image/x-icon" href="images/favicon.png" />
    
    <style>
		<?php
			echo '
				@font-face {
					font-family: "'.$font.'";
					src: url("fonts/'.$font.'.eot"); /* IE9 Compat Modes */
					src: url("fonts/'.$font.'.eot?#iefix") format("embedded-opentype"), /* IE6-IE8 */
					url("fonts/'.$font.'.woff") format("woff"), /* Modern Browsers */
					url("fonts/'.$font.'.ttf") format("truetype"); /* Safari, Android, iOS */
				}
				div.main_container *{
					font-family:'.$font.', "segoe ui", tahoma;
				}
			';
		?>
    </style>
</head>

<body>
    <div class="general_container coming_soon">
        
        <!---------------- Main ----------------->
         
        <div class="main_container">
            <div class="top_text"><?php echo $top_text; ?></div>
            
            <div class="divider"></div>
            
            <div class="clock_block">
            	<div class="clock_parent">
                	<div class="clock_texts">
                        <div style="width:136px;">ثانیه</div>
                        <div style="width:136px;margin-right:31px;">دقیقه</div>
                        <div style="width:136px;margin-right:31px;">ساعت</div>
                        <div style="width:204px;margin-right:50px;">روز</div>
                	</div>
                </div>
            </div>
            
            <?php if($show_subscribe){ ?>
            
            <div class="bottom_text"><?php echo $bottom_text; ?></div>
            
            <div class="divider"></div>
            
            <div class="subscribe_container">
            	<div class="subscribe">
                	<input type="text" class="textbox" id="email" placeholder="Email" />
                    <button type="button" id="submit_button">ثبت</button>
                    <div class="message"></div>
                </div>
            </div>
            
            <?php } ?>
        </div>
        
    </div>
</body>
</html>
