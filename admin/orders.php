<?phprequire ($_SERVER["DOCUMENT_ROOT"]  .'/libs/bootstrap.php');
// Start the PHP session
session_start();

// Check if the user level session _DOES NOT_ eaqul 'admin'
if (empty($_SESSION['u_level']) ||$_SESSION['u_level'] != 'admin') {
 header('location: /');
    // Exit the script and stop executing code
    exit();
} // End if session _not_ admin

// include database connection
include('inc/dbconnect.inc.php');

// include the header file
include('inc/header.php');

// include the Breadcrumbs file
include('inc/dynamicBreadcrumbs.php');

$ordersSql = "SELECT * FROM `sales` 
 JOIN
`sales_row` ON `product_id` = `product_id`";

