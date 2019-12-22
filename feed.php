<?php
session_start();
// include database connection
include('inc/dbconnect.inc.php');

echo "<rss version='2.0' xmlns:atom='http://www.w3.org/2005/Atom'>\n";
echo "<channel>\n";

echo "<title>Demo RSS Feed</title>\n";
echo "<description>RSS Description</description>\n";
echo "<link>Garden belle</link>\n";

$plant_now = mysqli_query($dbconnect, "SELECT * FROM `product` WHERE `p_category`='Vegetable Seeds' 
AND plant_outdoor_start <= NOW()" );




while ($row = mysqli_fetch_array($plant_now)) {
?>
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
    <?php

}
echo "</channel>\n";
echo "</rss>\n";
			