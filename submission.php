<!DOCTYPE HTML>  
<html>
<head>
  <style>
    body {background-color: powderblue;}
    </style>
</head>
<body>  

<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>


<h2 style="text-align:center"> Animal Information </h2>

<form method="post" style="margin-left:560px" action="db.php">  
 Animal  Name: <input type="text" name="name">
  <br><br>
  Animal Category :
  <input type="radio" name="category" value="Herbivores">Herbivores
  <input type="radio" name="category" value="omnivores">omnivores
  <input type="radio" name="category" value="carnivours">carnivours
  <br><br>
  Discription : <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  <label for="Life Expectancy">Life Expectancy:</label>
  <select name="life" id="life">
    <option value="0-1">0-1 Year </option>
    <option value="1-5">1-5 year </option>
    <option value="5-10">5-10 year </option>
    <option value="aboveten">10+ year </option>
  </select>
  <br><br>

  <form name="file" action="filedb.php" method="post" enctype="multipart/form-data">
   <input type="file" name="file" value="" />
   
</form>
  <?php
	// init variables
	$min_number = 1;
	$max_number = 15;

	// generating random numbers
	$random_number1 = mt_rand($min_number, $max_number);
	$random_number2 = mt_rand($min_number, $max_number);
?>

<!--generating captcha-->
<form action="captcha.php" style="margin-left:560px" method="POST">
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

	


  <input type="submit" name="submit" value="submit" style="padding-bottom: 12px;padding-top: 12px;padding-right: 35px;padding-left: 27px;margin-left:560px"> 
</form>



</body>
</html>