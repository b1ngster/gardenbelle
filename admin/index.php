<?php
require ($_SERVER["DOCUMENT_ROOT"]  .'/libs/bootstrap.php');
// Start the PHP session
session_start();

// Check if the user level session _DOES NOT_ eaqul 'admin'
if (empty($_SESSION['u_level']) ||$_SESSION['u_level'] != 'admin') {
 //header('location: /');
    // Exit the script and stop executing code
   // exit();
} // End if session _not_ admin

// include database connection
include('inc/dbconnect.inc.php');

// include the header file
include('inc/header.php');

// include the Breadcrumbs file
include('inc/dynamicBreadcrumbs.php');

?>
<div class="container container-padded-10">
    <div class="card-deck">
		
	<div class="card text-center">
            <div class="card-block">
                <h4 class="card-title">Products and Orders</h4>
                <p class="card-text">
                    <a href="orders_manage.php">View Orders </a>
                    <br> <a href="product_order.php">Add Products </a>
                   
                </p>
            </div>
            
        </div>

        <div class="card text-center">
            <div class="card-block">
                <h4 class="card-title">System</h4>
                <p class="card-text">
				<a href="products_view">PHP Unit Test </a>
                   
                </p>
            </div>
          
        </div>

        
	</div>
	

    <div class="card-deck mt-4">
       

        <div class="card text-center">
            <div class="card-block">
                <h4 class="card-title">Customers</h4>
                
				<a href="customers_view">Customers </a>
                    <br> <a href="products_view">Add  </a>
                   
            </div>
           
        </div>
        <div class="card text-center">
            <div class="card-block">
                <h4 class="card-title">Content</h4>
                <p class="card-text">
				<a href="products_view">Manage Pages</a>
                   
                </p>
            </div>
            
        </div>
    </div>
</div>
<?php 
include '../../inc/footer.php";'
?>
