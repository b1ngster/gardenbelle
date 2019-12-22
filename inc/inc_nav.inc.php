<?php

//include database connection 
include('dbconnect.inc.php');

$navResult = mysqli_query($dbconnect, "SELECT DISTINCT `p_category` FROM `product`");

$detect = new Detection\MobileDetect();




?>

<ul>
	<li>Home</li>
	<li>
	<?php
	echo'hello';
	if( !$detect->isMobile() && !$detect->isTablet() ){
 		echo 'hello there';
	}

	while ($navRow = mysqli_fetch_array($navResult)) {?>

		<li>
			<a href="../listings.php?cat=<?php echo $navRow['p_category']; ?>">
				<?php echo $navRow['p_category']; ?>
			</a>
		</li>
	
	<?php
	} //End While loop 
	?>
</ul>