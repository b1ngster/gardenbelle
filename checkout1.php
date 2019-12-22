<?php

session_start();

require('libs/bootstrap.php');



// include the header file
include('inc/header.php');
// include the Breadcrumbs file

?>

<div class="container">
	<h1>Checkout Stage 1</h1>
	<div class="form-group">
		<div class="cartdisplaydiv">
		</div>


		<?php
		
		?>


		<div>
			<form method="post" action="/mng/mng_checkout.php">
				<input type="hidden" name="stage" value="1" />
				<p><input type="text" class="form-control" name="fname" placeholder="First Name"></p>
				<p><input type="text" class="form-control" name="sname" placeholder="Surname"></p>
				<p><input type="text" class="form-control" name="phone" placeholder="Phone Number" /></p>
				<p><input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="E-Mail" />
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small></p>
				<p><input type="text" class="form-control" name="line1" placeholder="Address Line 1" /></p>
				<p><input type="text" class="form-control" name="line2" placeholder="Address Line 2" /></p>
				<p><input type="text" class="form-control" name="town" placeholder="Town" /></p>
				<p><input type="text" class="form-control" name="county" placeholder="County" /></p>
				<p><input type="text" class="form-control" name="pcode" placeholder="Post Code" /></p>
				<p><button type="submit" class="btn btn-primary" value="Submit details">Submit</button></p>
			</form>
		</div>
	</div>

	<?php include('inc/footer.php'); ?>