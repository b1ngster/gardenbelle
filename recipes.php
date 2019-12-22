<?php session_start();
//include 'ChromePhp.php';
require('libs/bootstrap.php');

//ChromePhp::log('hello world');
// include database connection
require('inc/dbconnect.inc.php');
//include the header file
include('inc/header.php');
//include the Breadcrumbs file
include('inc/dynamicBreadcrumbs.php');
// include the login Script
//include('inc/inc_loginform.php');
?>
<div class="container mt-5">
	<div class="search-container">
		<div class="row">

			<!--Loop through each row from results-->
		
				<!--col-lg-4 = columnLarge4 | ColumnMedium6 | Meduim4 -->
				<div class="col-lg-9 col-md-9 mb-9">
<?php
$rss_feed = simplexml_load_file("https://www.bonappetit.com/feed/healthyish/rss");

	$i=0;
if(!empty($rss_feed)) {

	foreach ($rss_feed->channel->item as $feed_item) {
		echo
<<<HEREDOC
		<div class="card ">
			<div class="card-body">
				<h4 class="card-title">
				{$feed_item->title}
	
				
				</h4>
				<p class="card-text">
				 {$feed_item->description}
				</p>
				</div>
				<div class="card-footer">
				<a class="feed_title" href="{ $feed_item->link}">Read More</a>
				</div>
						
					</div>
				</div>
				<!--Close Card-->
		
		
	

HEREDOC;

	}
}
?>
</div>
	