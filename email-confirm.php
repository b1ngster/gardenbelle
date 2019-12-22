<?php

session_start();

// include database connection
include('libs/bootstrap.php');



$vcode = isset($_GET['v']);
$sql = 'SELECT * FROM `user`';


$database = \Framework\Registry::get("database");
            $database->connect();
			
			$query = new Framework\Database\Query\Mysql(array(
                "connector" => $database
            ));

			$result = $database->execute($sql);
while ($row = mysqli_fetch_assoc($result)){

print_r($row);	

}

if(isset($_GET['v'])){
	

}
	
	

// include the header file
include('inc/header.php');
// include the Breadcrumbs file
include('inc/dynamicBreadcrumbs.php');




	
	
?>




<div id="reg_container">
	<h1>Confirm Details</h1>
	<form action="" method="POST">
		
		<?php //* if the errors are set we echo errors; ?>
		<input type="text" name="r_uname" placeholder="Username" required="true"/>
		<?php if (isset($errors['field'])) : ?>
			<p class="error">ss<?php echo $errors['r_uname']; ?></p>
		<?php endif; ?>
	
		
		<br>
		<input type="password" name="r_pword1" placeholder="Password" required="true" />
		
		<?php if (isset($errors['field'])) : ?>
			<p class="error"><?php echo $errors['r_email']; ?></p>
		<?php endif; ?>
	
		<br>
		<input type="submit" name="Register" />
		<input type="hidden" name="mode" value="register" />
	</form>

</div>
<?php include('inc/footer.php'); ?>