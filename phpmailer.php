
<?php

//Load PHPMailer dependencies
require 'libs/bootstrap.php';

$mailer = new Emailer;
$mailer->send('67551@blackpool.ac.uk', 'legend', 'dairy');

if($mailer){
echo 'success';
}