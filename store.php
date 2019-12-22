<?php
session_start();
require('libs/autoloader.php');


$detect = new Detection\MobileDetect();

$scripts = "";
// include database connection
include('inc/dbconnect.inc.php');

// include the header file

if( $detect->isMobile() && $detect->isTablet() ){
	include('inc/header.php');
	// include the Breadcrumbs file
	include('inc/dynamicBreadcrumbs.php');
	// include the login Script
	include('inc/inc_loginform.php');
	
}else{
	include('inc/headerDesktop.php');

}

?>


<?php


// Display All Products
$general_result = mysqli_query($dbconnect, "SELECT * FROM `product` ORDER BY RAND() LIMIT 3");

$harvest_now = mysqli_query($dbconnect, "SELECT * FROM `product`
 WHERE `p_category`='Vegetable Seeds' 
 AND harvest_start >= NOW() 
 AND harvest_start <= NOW() 
 ");

$plant_now = mysqli_query($dbconnect, "SELECT * FROM `product` WHERE `p_category`='Vegetable Seeds' 
AND plant_outdoor_start >= NOW()
AND plant_outdoor_start <= NOW()
");


?>

<!-- Display the product detail in the container -->
<div class="container">
	<div class="search-container">

		<div class="card">
			<h5 class="card-header card text-white bg-primary mb-3">Featured Products</h5>
			<div class="row pl-3 pr-3">
				<?php
				// Loop through each row from results
				while ($row = mysqli_fetch_array($general_result)) {
					?>
					<div class="col-lg-4 col-md-6 mb-4">
						<div class="card h-100 border-primary mb-3">

							<div class="image-container">
								<a href="/detail.php?id=<?php echo $row['product_id'] ?>"><img class="card-img-top" src="<?php echo $row['p_image'] ?>" alt=""></a>
							</div>
							<div class="card-body">
								<h4 class="card-title">
									<a href="/detail.php?id=<?php echo $row['product_id'] ?>">
										<?php echo $row['p_name']; ?>
									</a>
								</h4>
								<h5>£
									<?php echo $row['p_price']; ?>
								</h5>
								<h5>
									<?php echo $row['p_category']; ?>
								</h5>
								<p class="card-text">
									<?php echo $row['p_detail-thumb'] ?>
								</p>

							</div>
							<div class="card-footer bg-transparent border-primary">
								<div class="btn btn-success quickAdd" data="<?php echo $row['product_id'] ?>">Add <i class="fa fa-shopping-basket"></i></div>
								<!--This is the see product button-->
								<a href="/detail.php?id=<?php echo $row['product_id'] ?>" class="btn btn-primary float-right">See Product</a>
							</div>
						</div>
					</div>
				<?php }; ?>
				<!--Close while loop-->
			</div>
		</div>




		<div class="home-title-container">
			<div class="home-featured-title">Vegetables in Season</div>
			<a class="float-right" href="/listings.php?cat=Boiled Sweets"><small>VIEW ALL</small></a>
			<div style="clear:both"></div>
		</div>
		<div class="row">
			<?php
			


			// Loop through each row from results
			
			while ($row = mysqli_fetch_array($harvest_now)) {
				?>
				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100">
						<div class="image-container">
							<a href="/detail.php?id=<?php echo $row['product_id'] ?>"><img class="card-img-top" src="<?php echo $row['p_image'] ?>" alt=""></a>
						</div>
						<div class="card-body">
							<h4 class="card-title">
								<a href="/detail.php?id=<?php echo $row['product_id'] ?>">
									<?php echo $row['p_name']; ?>
								</a>
							</h4>

							<h5>£
								<?php echo $row['p_price']; ?>
							</h5>
							<h5>
								<?php echo $row['p_category']; ?>
							</h5>
							<p class="card-text">
								<?php echo $row['p_detail-thumb'] ?>
							</p>
						</div>
						<div class="card-footer">
							<div class="btn btn-success quickAdd" data="<?php echo $row['product_id'] ?>">Add <i class="fa fa-shopping-basket"></i></div>
							<!--This is the see product button-->
							<a href="/detail.php?id=<?php echo $row['product_id'] ?>" class="btn btn-primary float-right">See Product</a>
						</div>
					</div>
				</div>
			<?php };
		
$month = strtotime('2011-01-01');
$months= Array();
$i =1;
while($i <= 12)
{
    $month_name = date('F', $month);
    echo '<option value="'. $month_name. '">'.$month_name.'</option>';
    $month = strtotime('+1 month', $month);
    $i++;
}
			$JanauryProducts = mysqli_query($dbconnect, 
			"SELECT * FROM `product` WHERE `p_category`='Vegetable Seeds' 
			AND plant_outdoor_start >= '2020-01-06'
			AND plant_outdoor_end <= '2020-01-06'")->fetch_array();	
			echo 'hello there';
			//print_r($JanauryProducts);


?>
			<!--Close while loop-->
		</div>





	
	<!--Close search-container-->
</div>
<!--Close Row-->
<!-- include the Footer File -->
<?php include('footer.php'); ?>