<?php

use Bhaktaraz\RSSGenerator\Item;
use Bhaktaraz\RSSGenerator\Feed;
use Bhaktaraz\RSSGenerator\Channel;
require ('vendor/autoload.php');
require('libs/bootstrap.php');


$dateNow = date("Y/m/d");


$month_name = date('F',strtotime($dateNow) );
			
	
/*
	$JanauryProducts = mysqli_query($dbconnect, 
			"SELECT * FROM `product` WHERE `p_category`='Vegetable Seeds' 
			AND plant_outdoor_start >= '2020-01-06'
			AND plant_outdoor_end <= '2020-01-06'")->fetch_array();	
			
	*/	

$DB = new DB();

$sql=
"SELECT * FROM `product`
RIGHT JOIN `veg_calendar` ON 
`veg_calendar` . `product_id` = `product`. `product_id` 
WHERE `p_category`='Vegetable Seeds' 
 AND plant_outdoor_end < DATE_ADD(NOW(), INTERVAL 4 MONTH) 
  AND plant_outdoor_start >= NOW() 
 AND plant_outdoor_end != '2020-00-00' 
 AND plant_outdoor_start != '2020-00-00' 
 ORDER BY DATE(plant_outdoor_end) ";

try{
$result = $DB->query($sql);
$vegetables = array();
while($row = mysqli_fetch_array($result)) {
    $vegetables[] = $row;
}


}
catch(exception $e){

	$Logger = new Logger();
	Logger::write('feedErrorLog', $e);
}


$feed = new Feed();

$channel = new Channel();
$channel
	->title("Vegetable Calendar")
	->description("Seeds to plant this month")
	->appendTo($feed);

// RSS item

foreach($vegetables as $veg){
	

$item = new Item();
$item
	->title($veg['p_species'] . $veg['p_variety'] ."-" .$veg['p_name'])
	->description("Grow under glass for early crops.")
	->url('http://gardenbelle.co.uk/listings.php?id=' .$veg['product_id'])
	->enclosure('http://gardenebelle.co.uk/' .$veg['p_image'], 4889, 'image/jpeg')
	->appendTo($channel);
}
echo $feed;