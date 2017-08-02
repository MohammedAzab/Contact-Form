<?php
	// Check if user coming from a requset
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//assign variable
		$user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) ;
		$cell = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
		$msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING) ;

		echo $user . '<br>';
		echo $mail . '<br>';
		echo $cell . '<br>';
		echo $msg . '<br>';

		/*
		$userError = '';
		$msgError = '';
		if (strlen($user) <= 3) {
			$userError = 'The Character Must Be More Than 3';
		}
		if(strlen($msg) < 10){
			$msgError = 'Message Can\'t be Less Than 10 Characters';
		}
		*/

		// creating array of errors
		$formErrors = array();
		if (strlen($user) <= 3) {
			$formErrors[] = 'The Character Must Be More Than 3';
		}
		if(strlen($msg) < 10){
			$formErrors[] = 'Message Can\'t be Less Than 10 Characters';
		}
		// if no errors send email [mail(to, subject, message, headers, parameters)]
		$headers = 'from: ' . $mail . '\r\n';

		if (empty($formErrors)){
			mail('mohamedazab.work@gmail.com', 'contact form', $msg, $headers);

			$user = '';
			$mail = '';
			$cell = '';
			$msg = '';

			$success = '<div class="alert alert-success">we have recived yor message</div>';


		}

	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Form</title>
	<link rel="stylesheet"  href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/contact.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
<h1 class="text-center">Contact Me</h1>



	<form class="contact-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

			<?php if(!empty($formErrors)){ ?>
			<div class="alert alert-danger" role="statr">
				<?php
					foreach ($formErrors as $error) {
						echo $error . '<br>';
					}
			?>
			</div>
			<?php }?>
			<?php if(isset($success)) { echo $success; } ?>
		<div class="form-group">
			<input class="username form-control" type="text" name="username" placeholder="Type Your Username" value="<?php if (isset($user)){echo $user;}?>">
			<i class="fa fa-user fa-fw"></i>
			<span class="asterisx">*</span>
			<div class="alert alert-danger custom-alert">The Character Must Be More Than <strong>3</strong></div>
		</div>

		<div class="form-group">
			<input class="form-control email" type="email" name="email" placeholder="Plase Type a Valid Email" value="<?php if (isset($mail)){echo $mail;}?>">
			<i class="fa fa-envelope fa-fw"></i>
			<span class="asterisx">*</span>
			<div class="alert alert-danger custom-alert">The Email Can't Be <strong>Empty</strong></div>
		</div>

		<input class="form-control" type="text" name="cellphone" placeholder="Type Your Cell Phone" value="<?php if(isset($cell)){echo $cell;} ?>">
		<i class="fa fa-phone fa-fw"></i>

		<div class="form-group">
			<textarea class="message form-control" name="message" placeholder="Your Message!"><?php if(isset($msg)){echo $msg;} ?></textarea>
			<span class="asterisx">*</span>
			<div class="alert alert-danger custom-alert">Message Can't be Less Than <strong>10</strong> Characters</div>
		</div>

		<input class="btn btn-success " type="submit" value="send massage">
		<i class="fa fa-send fa-fw send-icon"></i>
	</form>
</div>

<script src="https://use.fontawesome.com/2777c3d147.js"></script> 
<script
      src="https://code.jquery.com/jquery-1.12.4.min.js"
      integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
      crossorigin="anonymous">
 </script>  
 <script src="js/contact.js"></script>
</body>
</html>