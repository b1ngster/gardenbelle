<?php
include('inc/dbconnect.inc.php');
echo '<ul>';

if (isset($_POST['searchterm'])) {
    $searchterm = $_GET['searchterm'];
  
	$check = mysqli_query($dbconnect, "SELECT * FROM `product` WHERE `p_name` LIKE '%{$_GET['searchterm']}%' or `p_category` LIKE '%{$_GET['searchterm']}%' ");
    
  
    foreach($check as $row){
       
?>
<?
<li>
<div class="image-container card h-10">';
<a href="/detail.php?id=<?php echo $row['product_id'] ."\">" ."\n" ?>
    <img class="card-img-top" width="50px" height="50px" 
    src="
    <?php echo $row['p_image'] ?>" alt="">

<?php echo $row['p_name'] ?>
    </a>

 </div>
</li>

   <?php
   
    }
     
    
}else

echo '<li> no results </li>'; 
echo '</ul>';
?>
