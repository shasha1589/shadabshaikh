<?php 
    $effect = '<h3 class="fadein">I am Still Working on it.</h3>';
	require_once('recaptchalib.php');
    if(isset($_POST['email'])){
		$privatekey = "6LcylfESAAAAAElH_1YVklgMS6ZwvHNkZZQu0Aaw";
		$resp = recaptcha_check_answer ($privatekey,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);

		if (!$resp->is_valid) {
			// What happens when the CAPTCHA was entered incorrectly
			//die ("The reCAPTCHA wasn't entered correctly. Go back and try it again. (reCAPTCHA said: " . $resp->error . ")");
			$effect = '<h3 class="fadeout">CAPTCHA did not match, Please retry.</h3>';
		} else {
			// Your code here to handle a successful verification  
			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				include_once (dirname(__FILE__). DIRECTORY_SEPARATOR. 'config.php');
				$con = mysql_connect(DB_HOST,DB_USERNAME,DB_PASS) or die("Could not connect database");
				if (!$con)  {
					die('Could not connect: ' . mysql_error());
				}
				$db_selected = mysql_select_db(DB_NAME, $con) or die("Could not select database");
				$sql = "SELECT * FROM email WHERE email = '".$_POST['email']."'";
				$result = mysql_query($sql);
				if(!mysql_num_rows($result)) {
					 $sql = "INSERT INTO `email` (`id`,`email`) VALUES (NULL, '".$_POST['email']."');";
					$result = mysql_query($sql);
					$effect = '<h3 class="fadeout">Thank you for your email... :)</h3>';
				} else {
					$effect = '<h3 class="fadeout">I already have your email..... :) </h3>';
				}
			} else {
				$effect = '<h3 class="fadeout">Please provide a valid Email. </h3>';
			}
		}
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
		<meta name="keywords" content="Portfolios, wildlife, photos , Photography, Shadab Shaikh, Shadab, Shaikh, shaikhshadab, Nature, Mumbai, India ">
		<meta name="author" content="Shadab Shaikh">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
        <title>Shadab Shaikh</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Petit+Formal+Script' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans:300,400' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300' rel='stylesheet' type='text/css'>
		
        <style type='text/css'>
            @font-face {font-family: "lucidas";src: url('media/Lucida Grande Bold.ttf') format("truetype");}
        </style>
    </head>
    <body>
        <div class="content">
            <div class="wrap">				
                <div class="grid">
                    <div class="row1">
                        <span class="letter c">C</span>
                        <span class="letter o">O</span>
                        <span class="letter m">M</span>
                        <span class="letter i">I</span>
                        <span class="letter n">N</span>
                        <span class="letter g">G</span>
                    </div>
                    <div class="row2">
                        <span class="letter s">S</span>
                        <span class="letter o2">O</span>
                        <span class="letter o1">O</span>
                        <span class="letter n">N</span>
                    </div>
                    <span class="message">
                    <?php echo $effect;?>
                    </span>
                    <form action="" method="post">
						<?php
						  require_once('recaptchalib.php');
						  $publickey = "6LcylfESAAAAAE-79dr2p5kbva1YQQlS2r3HPlE5"; // you got this from the signup page
						  echo recaptcha_get_html($publickey);
						?>

                        <input type="text" size="30" required  onfocus="javascript:$('#recaptcha_widget_div').show()" placeholder="Your Email and Get Notified..." value="" name="email" id="email">
                        <a href="#">
							<button class="btn span btn-4 btn-4a icon-arrow-right"><span></span></button>
						</a>
                        <div id="response"></div>
                    </form>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="footer">
                    <p class="a"><a class="facebook" target="blank" href="https://www.facebook.com/ShadabShaikhPhotography">facebook</a></p>
                    <p>Copyright 2014 by shaikhshadab.com</p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
               window.setTimeout("fadeMyDiv();", 3000); //call fade in 3 seconds
             }
            );

            function fadeMyDiv() {
               $.when($(".fadeout").fadeOut('slow')).done(function () {
                   $('.message').html('<h3 class="fadein">I am Still Working on it.</h3>');                   
               });               
            }
			
        </script>
    </body>
</html>