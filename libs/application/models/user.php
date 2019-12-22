<?php

class User extends Shared\Model
{
    public $registerSuccess;
    /**
    * @column
    * @readwrite
    * @primary
    * @type autonumber
    */
    protected $_id;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, alpha, min(3), max(32)
    * @label username
    */
    protected $_username;
    
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    * @index
    *
    * @validate required, max(100)
    * @label email address
    */
    protected $_email;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    * @index
    *
    * @validate required, min(8), max(32)
    * @label password
    */
    protected $_password;
/**
    * @column
    * @readwrite
    * @type text
    * @length 100
    * 
    *
    * 
    * @label token
    */
    protected $_token;

    public function isFriend($id)
    {
        $friend = Friend::first(array(
            "user" => $this->getId(),
            "friend" => $id
        ));
        
        if ($friend)
        {
            return true;
        }
        return false;
    }

    public static function hasFriend($id, $friend)
    {
        $user = new self(array(
            "id" => $id
        ));
        
        return $user->isFriend($friend);
    }

    public function getFile()
    {
        return File::first(array(
            "user = ?" => $this->id,
            "live = ?" => true,
            "deleted = ?" => false
        ), array("*"), "id", "DESC");
    }
    
public function register($data){
 
	//checks the data and writes the object
	$errors = $this->checkData($data);	

	if(!empty($errors)){

	return $this->set($errors);
	}
  
	//write the data to database
	$writeToDatabase = $this->writeToDatabase($data);

	if($writeToDatabase){
  
		/* success is registered at this point due to email returning false
		*/
	$this->registerSuccess = true;
		
	}else{
		//the user didn'd write to database;
		return 'failed to write to database';
	}
	
	//
	$sendEmail = $this->sendRegistrationEmail();

	
	return $this;
}

/**
 * Function write to database
 */
  public function writeToDatabase($data){

	
	$errors = array();
	$dbconnect  = new DB();
	//Bcryt used as the user field is of the same length
	$this->password = password_hash( $data[ 'r_pword1' ], PASSWORD_BCRYPT );
	$this->username = $data[ 'r_uname' ];
	$this->email = $data[ 'r_email' ];
 
    $query = "SELECT * 
	FROM `user` 
	WHERE `u_username` = '{$this->username}'";
	
   //check to see if the query returned rows 
	$userEmptyCheck = $dbconnect->query( $query)->fetch_row(); 	
	//rint_r($userEmptyCheck);
	//see if the number of rows are more than 0
	if(!empty($userEmptyCheck) > 0) {
	
	
		//failer handled outside of thes function
		return $error = array('username' => 'Username already taken');
		
		
	
	}
			//creates a token for users to verifiy  email
			$this->token =  Validator::generateFormToken('email');
	   
			$sql = "INSERT INTO `user` (`u_username`,`u_password`, `user_email`, `u_level`,`verification_token`)
			
			
			 VALUES ('{$this->username}' ,
			  '{$this->password}', 
			  '{$this->email}', 
			  	'user',
			   '{$this->token}')";
			
			// sends check to see if email is sent;

			if(!$register = $dbconnect->query( $sql)){
				return $this->errors[] = 'Could not connect to database.';
			}

            //set the objects properties
            /*
			$user = array('username' => $username,
			 'email' => $email,
             'token' => $token);

             */
           
		 
			//returns this allows function to be chainable
			return $this;
			

}

public function sendRegistrationEmail(){


			//check the email has been sent

			
				
			$emailMessage = <<<END
			<html>
			<head>
			  	<title>Garden Belle Registration</title>
			</head>
					<body>
					<table>
					<tr><td>Thanks for registering {$this->username} at gardenbelle.co.uk<td></tr>
					<tr><td> Please verify your email at : 
					<a href="http://gardenbelle.co.uk/email_confirm.php?v={$this->token}" /> Verify Email </a
					</td>
					</tr>
					
					</body>
			</html>
	END;
	
	$headers = "From: verification@gardenbelle.co.uk" ."\r\n";
	$headers .= "Reply-To: gardenbelle.co.uk" . "\r\n";
	$headers .= "CC: customerservices\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	 $mailSuccess =  mail($this->email, 'Verify Email Address', $emailMessage, $headers);
	
	 #mail success returns false even when sent,
	 /*
		if(!$mailSuccess){
		   
			//	$this->errors = array('email', $mailSuccess);
			}
		*/	
		
			return $this;


}



 public function checkData($data){
	
	if($data['r_pword1'] != $data['r_pword2']){
		 $this->errors = array('r_word2' => 'Passwords do not match');
	}
	
	$whitelist = array('r_uname', 'r_email', 'r_pword1', 'r_pword2' );

	$errors = array();
	$data = array();
	$errorString['r_uname'] = 'Please provide your username';
	$errorString['r_email'] = 'Please provide your email';
	$errorString['r_pword1'] = 'Please provide your password';
	$errorString['r_pword2'] = 'Please provide confirm your password';

				
	$message = array();
	$errorMessage =array();
	foreach($whitelist as $check){
		
		//checks if the string is empty
		if(empty($_POST[$check])){
			array_push($errors,$errorMessage[$check] = $errorString[$check]);
			array_push($data, trim( $_POST[$check]));
		}

		 
	}
	if(!empty($errors)){
		return $this->errors[] = $errorMessage;
    }
    print_r($data);

	 $data['r_uname'];
	 $data['r_email'];
	 $data['r_pword1'];
	

	return $data;

	}
}   
