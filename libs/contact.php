<?php
// load Smarty library

require('libs/bootstrap.php');
session_start();


$newToken =  Validator::generateFormToken('contact_from' );

if(isset($_POST['submit']) ){
	

	/*  function validates submitted values against a whitelist
	 * sets errorMessage variable which is displayed in the form
		*/
	$whitelist = array('f_name', 'l_name', 'email', 'email_conf', 'message');
	
	$error = array();
	

	
				$errorString['f_name'] = 'Please provide your first name';
				$errorString ['l_name'] = 'Please provide your last name';
				$errorString['email'] = 'Please provide your email';
				$errorString['email_conf'] = 'Please provide confirm your email';
				$errorString['message'] = 'Message cannot be empty';
				
	$message = array();
	$errorMessage =array();
	foreach($whitelist as $check){

		if(empty($_POST[$check])){
			$error[$check] = $check;
			$errorMessage[$check] = $errorString[$check];
}
	}
	if(!$error){
	
	
				/*all fields are not empty now check if emails match */
				if( $_POST['email'] !== $_POST['email_conf']){
					$errorMessage['email'][0] = 'Emails do not match';
				}
				
				if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
					$errorMessage['email'] = 'Please provide a valid email';
			
				}
				
	}
			
			if(!$errorMessage){

				
				$firstname = $_POST['firstname'];
				$lastname =  $_POST['lastname'];
				$message =   Validator::cleantohtml($_POST['message']);
			 
				if(strlen($firstName) > 20 ){

				$errorMessage = 'There\'s something wrong with your email ';
			}
				
			if(strlen($lastname) > 20 ){

				$errorMessage = 'There\'s something wrong with your email ';
			}
			if(strlin($message) > 1000){
				$errorMessage = 'Sorry you email is to long';
			}
			
			$message =<<<MAIL
			Internal Mail
			You have a message from {$firstname} {$lastname}.
			Reply to : $email;
			Message:
			{$message}
MAIL;
			
			
				$email =	mail('customersevice@gardenbelle.co.uk',
									'Customer Message',
									$message
				
			);
					$log = 	$_POST['email'] . $_POST['message'];

			/*keep a copy of the message incase email fails 
			*/
			Logger::write('customer_message', $message);

			
				header('Location:/thankyou.php');
		
		}
		}

		
		
	function formatErrorString($errorMessage){


	}

?>
<?php 
$scripts =<<<END

<script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js" ></script>
<script>
bootstrapValidate('#email', 'email:Enter a valid E-Mail!')
bootstrapValidate('#email', 'email:Enter a valid E-Mail!')
include('inc/header.php');

END;

include('inc/header.php');
?>

<div class="container" id="contact-form_container">

<form method="post" action="">
  <div class="form-group">
    <label for="f_name">First name:</label>
	<input type="text" class="form-control" name="f_name" >
	<?php if(isset($errorMessage['f_name'])){
				echo $errorMessage['f_name'];
	}
?>
  </div>
  <div class="form-group">
    <label for="l_name">Last Name:</label>
	<input type="text" class="form-control" name="l_name">
	<?php if(isset($errorMessage['l_name'])){
				echo $errorMessage['l_name'];
	}
?>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
	<input type="email" name="email" class="form-control" id="email">
	<?php if(isset($errorMessage['email'])){
				echo $errorMessage['email'];
	}
?>
  </div>
  <div class="form-group">
    <label for="email">Confirm Email address:</label>
	<input type="email" name="email_conf" class="form-control" id="email_conf">
	
	
	
	<?php if(isset($errorMessage['email_conf'])){
				echo $errorMessage['email_conf'];
	}
?>
  </div>
  <div class="form-group">
    <label for="email">Message:</label>
    <textarea class="form-control" name="message" id="message">
    </textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-default">
	  Submit</button>
</form>
</div>

<?php include 'inc/footer.php'; ?>