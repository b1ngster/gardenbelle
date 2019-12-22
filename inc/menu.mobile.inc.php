<?php
//<div class="col-2  col-md-offset-4 col-sm-1 collapse d-md-flex bg-light pt-2 min-vh-100" id="sidebar">

$queryString = "SELECT DISTINCT `p_species` FROM `product` WHERE `p_category` = 'Vegetable Seeds'";

$menuResult = mysqli_query($dbconnect, $queryString);

$plants = mysqli_query($dbconnect, $queryString);


//$menuRow = mysqli_fetch_array($menuResult);
////print_r($menuRow);
/** 
?>

<ul class="nav flex-column float-left bg-light m-4">
 <li class="nav-item"><a class="nav-link" href="#">All Veg</a></li>
  
<?php 

function HtmlLink( $value){

 
 $url = str_replace(' ','%20', trim($value));
$str = '<a href="listings.php?'. $url .'">' .$value . '</a>'; 

return $str;
}
while ($row = mysqli_fetch_array($menuResult)) {
 
      ?> 
   <li>
      <?php echo HtmlLink($row['p_species']);
       </li>      */
      ?>
      
  
  <?php

?>


     <button class="navbar-toggler " id="" type="button"
    data-toggle="collapse" data-target="#navbarSupportedContent15"
    aria-controls="navbarSupportedContent15" aria-expanded="false" 
    aria-label="Toggle navigation">
    <span class="navbar-toggler-icon btn" onclick="navOpener()" ></span></button>
 
   <nav class="sidenav navbar navbar-expand-lg navbar-light bg-light" 
   id="mySidenav">
      
   
   
   <ul>
            <p>Dummy Heading</p>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
<ul class="collapse " id="pageSubmenu">
    <li>
        <a href="#">Page 1</a>
    </li>
    <li>
        <a href="#">Page 2</a>
    </li>
    <li>
        <a href="#">Page 3</a>
    </li>
</ul>
            </li>
</ul>
    </nav>
   
    