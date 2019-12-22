<?php
// include database connection
include('dbconnect.inc.php');
// include the header file
include('header.php');
// include the Breadcrumbs file
include('dynamicBreadcrumbs.php');
// include the login Script
include('inc_loginform.php');


echo $pageContent;


include('../footer.php'); 

?>