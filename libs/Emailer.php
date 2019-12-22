<?php

   //Load PHPMailer dependencies
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;
   
require 'vendor/autoload.php';
   
   
class Emailer{
 
 public   $credentials = array(
        'email'     => 'customerservices@gardenbelle',    //Your GMail adress
        'password'  => 'BFC350350=Blackpool'               //Your GMail password
 );
    
    /* SPECIFIC TO GMAIL SMTP */
  public  $smtp = array(
    
    'host' => 'smpt.1and1.com',
    'port' =>  25, #587,
    'secure' => 'tls' //SSL or TLS
    
    );

/**
 * @function send
 * @params $to -> 67551@blackpool.ac.uk //the recpient
 * @params $subject-> 'test data' //subject of the email
 * @params $body-> 'body text' // the body of the text
 * @params //optional implemented within Emailer class
 */
public function send($to, $subject, $body, $headers = null){

  
   
print_r($to);



$email = mail($to,
 'customerservices@gardenbelle.co.uk',
'test against');

if($email){
    echo 'success';
}else{
    echo $email = error_get_last()['message'];
    
}
}
}


