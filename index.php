<?php
session_start();

require('libs/bootstrap.php');

// include database connection
include('inc/dbconnect.inc.php');

// include the header file

#include('inc/headerDesktop.php');
include('inc/header.php');


$seeds_outdoor_sow= mysqli_query($dbconnect, 
"SELECT * FROM `product`
RIGHT JOIN `veg_calendar` ON 
`veg_calendar` . `product_id` = `product`. `product_id` 
WHERE `p_category`='Vegetable Seeds' 
 AND plant_outdoor_end < DATE_ADD(NOW(), INTERVAL 4 MONTH) 
  AND plant_outdoor_start >= NOW() 
 AND plant_outdoor_end != '2020-00-00' 
 AND plant_outdoor_start != '2020-00-00' 
 ORDER BY DATE(plant_outdoor_end) "

);

$seeds_indoor = mysqli_query($dbconnect, "SELECT * FROM `product`
RIGHT JOIN `veg_calendar` ON 
`veg_calendar` . `product_id` = `product`. `product_id` 
WHERE `p_category`='Vegetable Seeds' 
 AND plant_indoor_end < DATE_ADD(NOW(), INTERVAL 4 MONTH) 
  AND plant_indoor_start >= NOW() 
 AND plant_indoor_end != '2020-00-00' 
 AND plant_indoor_start != '2020-00-00' 
 ORDER BY DATE(plant_outdoor_end)
 ");

 $results = array();


//create array of indoor and grow outdoor
 
while($sowOut = mysqli_fetch_array($seeds_outdoor_sow))
{

 $results[] = $sowOut;
 while ($sowIn = mysqli_fetch_array($seeds_indoor)){

	if(!in_array( $sowIn, $results)){
	$results[] = $sowIn;
	}
 }
}
?>


	
<div class="container" id="main-container">
<div class="card-columns d-flex justify-content-center image-links">

	<div class="card " style="border:none">
	
	<figure class="recipe-figure">
    <picture>
    <source media="(min-width: 900px)"
            srcset="img/dinner-1042518_1920.jpg 2x,
                    img/dinner-1042518_1920.jpg" />
    <source media="(min-width: 500px)"
            srcset="img/dinner-1042518_640.jpg" />
    <img src="imgdinner-1042518_640.jpg" alt="Horses in Hawaii">
    </picture>
    <figcaption class="sr-only" >Seasonal Recipes</figcaption>
</figure>
<div class="card-img-overlay">
 <h3 class="card-title text-light">Seasonal Recipes</h3>
 <p class="card-text text-light">Amazing recipes using food    </p>
 <a href="/recipes.php">Read more...</a>
</div>


</div>



<div class="card"  style="border:none">

	<figure class="seedlings-figure">
    <picture >
    <source media="(min-width: 900px)"
            srcset="img/seed-3296391_1280.jpg 2x,
                    img/seed-3296391_1920.jpg" />
    <source media="(min-width: 500px)"
            srcset="img/seedlings-4186033_640.jpg" />
    <img src="img/seed-3296391_640.jpg" alt="Seeds to sow this Season">
    </picture>
    <figcaption class="sr-only" >This Seasons Vegetables</figcaption>
</figure>

<div class="card-img-overlay">
 <h3 class="card-title">This Month </h3>
 <p class="card-text">Sow vegitable beans</p>
 <p class="card-text">Prepare the Greenhouse</p>
 <a href="#">Read more...</a>
</div>
</div>


</div>

</div>
<div class="search-container">

	

<!-- homepage content -->
		
			<h5 class="card-header card text-white bg-primary mb-3">Featured Products</h5>
			<div class="row pl-3 pr-3">
				
			<?php
			
	// Loop through each row from results
		$featuredCount = 0;
		
	
		 foreach( $results as $row ){
			
			if($featuredCount < 6){
				$featuredCount++;
				?>
				<div class="col-lg-4 col-md-6 mb-4 ">
					<div class="card h-100">
						<div class="image-container">
							<a href="/detail.php?id=<?php echo $row['product_id'] ?>">
							<img class="card-img-top" src="<?php echo str_replace(' ','%20', trim($row['p_image'] ))?>
							" alt="">
							</a>
						</div>
						<div class="card-body">
							<h4 class="card-title">
								<?php echo $row['p_name'] ?>
							
							</h4>

							<p class="card-text">
								<?php echo $row['p_name'] ?>
							</p>
						</div>
						<div class="card-footer">
							<div class="btn btn-success quickAdd" data-data="<?php echo $row['product_id'] ?>">Add <i class="fa fa-shopping-basket"></i></div>
							<!--This is the see product button-->
							<a href="/detail.php?id=<?php echo $row['product_id'] ?>" class="btn btn-primary float-right">See Product</a>
						</div>
					</div>
				</div>
		 <?php }} ;
		?>

		
		<div style="clear:both"></div>
			
			
			<a class="float-right" href="/listings.php?">
			
			<div class="btn btn-success" >
			<small>View More</small>
			 </div></a>
				
		
	
</div>
</div>


<!--Close Row-->
<!-- include the Footer File -->

<?php include('inc/footer.php'); ?>
