<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Simple Captcha Code with PHP</title>
	<link rel="stylesheet" href="styles.css" />
	<style>
		body { margin: 0; padding: 0; font-family: Arial, sans-serif; font-size: 14px; line-height: 180%; }
		.center { margin: 0 auto; max-width: 900px; }
	</style>
</head>
<body>

<?php
	// init variables
	$min_number = 1;
	$max_number = 15;

	// generating random numbers
	$random_number1 = mt_rand($min_number, $max_number);
	$random_number2 = mt_rand($min_number, $max_number);
?>

<div class="center">
	<h1>Simple PHP Captcha Code for HTML Forms</h1>
	

	<form action="captcha.php" method="POST">
		<p>
			Resolve the simple captcha below: <br />
			<?php
				echo $random_number1 . ' + ' . $random_number2 . ' = ';
			?>
			<input name="captchaResult" type="text" size="2" />

			<input name="firstNumber" type="hidden" value="<?php echo $random_number1; ?>" />
			<input name="secondNumber" type="hidden" value="<?php echo $random_number2; ?>" />
		</p>

		<p>
			<input type="submit" value="submit" />
		</p>
	</form>
</div>

</body>
</html>