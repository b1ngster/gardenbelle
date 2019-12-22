<?php
session_start();

// include database connection
include('inc/dbconnect.inc.php');
//include the header file
include('inc/header.php');
//include the Breadcrumbs file
include('inc/dynamicBreadcrumbs.php');
// include the login Script
include('inc/inc_loginform.php');




//Connect to the database and get all of the products 
/** pagination check */ 

if (isset($_GET['article'])) {

$sql = "SELECT * FROM `articles` WHERE `title` = '{$_GET['article']}'";
	$check = mysqli_query($dbconnect, $sql);
} 
$article = mysqli_fetch_array($check);


?>
<div class="container mt-5">





	<div class="search-container">
		<div class="row">

			<!--Loop through each row from results-->
		
				<!--col-lg-4 = columnLarge4 | ColumnMedium6 | Meduim4 -->
				<div class="col-lg-9 col-md-9 mb-9">

					<!--col-lg-4 = columnLarge4 | ColumnMedium6 | Meduim4 -->
					<div class="card ">
				
						


						<div class="card-body">
							<h4 class="card-title">
									<?php echo $article['title']; ?>
								</a>
							</h4>

							<p class="card-text">
								<?php echo $article['contents'] ?>
							</p>
						</div>
						<div class="card-footer">
							<!--This is the star ratings-->

						
						</div>
						<!--Footer close-->
					</div>
				</div>
				<!-- col-lg-3 col-md-6 mb-4-->
		
	</div>
	<!--Close search-container-->
</div>
</div>
<!--Close Container-->
<!-- include the Footer File -->
<?php include('inc/footer.php');
?>