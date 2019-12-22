<?php

session_start();

// include database connection
include('inc/dbconnect.inc.php');
// include the header file
include('inc/header.php');
// include the Breadcrumbs file
include('inc/dynamicBreadcrumbs.php');


if (isset($_GET['success'])) : ?>
	<h1 class="green success"><?php echo $errors['r_email']; ?></h1>
<?php endif; ?>



<div id="reg_container">
	<h1>Register</h1>
	<form action="mng/mng_user.php" method="POST">
		
		<?php //* if the errors are set we echo errors; ?>
		<input type="text" name="r_uname" placeholder="Username" required="true"/>
		<?php if (isset($errors['field'])) : ?>
			<p class="error"><?php echo $errors['r_uname']; ?></p>
		<?php endif; ?>
		
		<br>
		<input type="text" name="r_email" placeholder="Email" required="true" />
		<?php if (isset($errors['field'])) : ?>
			<p class="error"><?php echo $errors['r_email']; ?></p>
		<?php endif; ?>
		
		<br>
		<input type="password" name="r_pword1" placeholder="Password" required="true" />
		
		<?php if (isset($errors['field'])) : ?>
			<p class="error"><?php echo $errors['r_email']; ?></p>
		<?php endif; ?>
		<br>
		<input type="password" name="r_pword2" placeholder="Password again" required="true" />
		<?php if (isset($errors['field'])) : ?>
			<p class="error"><?php echo $errors['r_email']; ?></p>
		<?php endif; ?>
		<br>
		<input type="submit green" name="Register" />
		<input type="hidden" name="mode" value="register" />
	</form>
	<?php if (isset($_SESSION['message'])) { ?>
		<div class="message"><?php echo $_SESSION['message']; ?></div>
	<?php }; ?>
</div>