<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"].'/libs/bootstrap.php';


include( $_SERVER[ 'DOCUMENT_ROOT' ] . '/inc/dbconnect.inc.php' );

require('user.php');



// Start the PHP session 
 

/*
 
	@ The purpose of this document is to handle
	@ the users login and register forms. 
	@ Once the forms are submitted, the data is sent
	@ to this script and is processed accordingly

*/

/*require is used as this throws an error when not found 
  this throws

*/




// Include database connection




/*
█████████████████████████████████████████████████████

				REGISTER SCRIPT



				*/
if ( $_POST[ 'mode' ] == "register" ) { 

$user = new User();
//* User Register method called   */

print_r($_POST);
	$user= $user->register( $_POST);

	if($user->registerSuccess){
			 // Set the users ID to the session data
		
			 $_SESSION[ 'user_id' ] = $registered->id;
			 // Set the users username for quick access for application such as the header
			 $_SESSION[ 'u_username' ] = $registered->username ;
			 // Set the users access level for quick access and security between users and user areas
			 $_SESSION[ 'u_level' ] = $registered->u_level;
			 

	
	header('Location: /thankyou.php');
	}

	//if the user is successful return a json encoded string
if(!$registered->failed){
	
	$_SESSION['user'] = $
	$response['failed'] = $registered->errors;
	echo json_encode($response);
}
	
	



	


	//**  if the user is not registered the fuction  
	// send them to the accounts index page
	// or should retun something ffs
		//if($registered){
			

		//header('Location: /accounts/index.php');


//	}
//	$response['message'] = "There was an issue with your username and password";

			/*
				@ Here we are echoing a json object created from the response
				@ array, this means that we can parse the data at the ajax
				@ script and easily read the variables
			*/
			//echo json_encode($response);
	
	// ║║																	    ║║
	// ║╚█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╝║
    // ╚══════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚═════╝



}; // End of register script



/*
█████████████████████████████████████████████████████

				END OF REGISTER SCRIPT

█████████████████████████████████████████████████████
*/





/*
█████████████████████████████████████████████████████

					LOGIN SCRIPT

		@ The purpose of the login script
		@ is to check if the users credentials
		@ that have been submitted to the script
		@ match any credentials that are 
		@ stored in the database. 

		@ If any of the credentials are invalid or
		@ not found in the databse, the script
		@ will return a helpful error message to 
		@ let the user know that there was 
		@ an issue with the credentials they 
		@ provided.

█████████████████████████████████████████████████████
*/


// @ This if statement checks if the mode requested is the
// @ login script and will only execute if required
if ( $_POST[ 'mode' ] == "login" ) { 


	// Set valid flag ( If changed throughout the script, 
	// 				    it will tell the checker that the input is invalid )
	$valid = true; 

	// ╔═█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████═╗
    // ║╔═════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╗║
	// ║║																		║║
	/*

				@ This small if statement is responsible for checking
				@ if the user even submitted any credentials for 
				@ checking.
	*/

	// This if statement checks if both the username and password fields
	// submitted are not empty by checking if the lengh of the string is bigger than 0
	if ( strlen( $_POST[ 'l_uname' ] ) === 0 || strlen( $_POST[ 'l_pword' ] ) === 0 ) {

		// If ether of the strings are empty, the script will 
		// echo an error message
		echo 'Username or password is empty';

		// Set the valid flag to false to tell the script
		// the submitted information is invalid.
		$valid = false;

	}; //End if statement
    
	// ║║																	    ║║
	// ║╚█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╝║
    // ╚══════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚═════╝


	/*
		@ This array is used as a response to the ajax script
		@ to manage showing the user an error message 
		@ or logging the user in. 

		@ The array holds 2 vales that are set during the script
		@
		@ 1. A success boolean to tell the ajax if the login
		@ 	 was succesful or not
		@
		@ 2. A message string to the user trying to login 
		@ 	 to alert them of the issue with their credentials. 
	*/
	$response = array(
		'success' => false,
		'message' => ""
	);


	// This if statement checks if the valid flag, that was set
	// earlier in the code is true or false.
	if ( !$valid ) {

	// ╔═█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████═╗
    // ║╔═════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╗║
	// ║║																		║║

		/*

			@ This code will be executed if the valid flag was
			@ false as we used a '!' before the variable, 
			@ checking if the flag was NOT true

		*/

		// Here we set the message variable in the response array defined above.
		$response['message'] = "There was an issue with your username and password";

		/*
			@ Here we are echoing a json object created from the response
			@ array, this means that we can parse the data at the ajax
			@ script and easily read the variables
		*/
		echo json_encode($response);

		// Tell the server to leave the script and stop executing code
		exit();


	// ║║																	    ║║
	// ║╚█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╝║
    // ╚══════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚═════╝

	} else {

	// ╔═█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████═╗
    // ║╔═════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╗║
	// ║║																		║║
		/*

			@ This section of the code takes the submitted
			@ credentials by the user and checks if the
			@ database holds this users information.
			@ If the credentials are not found, the
			@ script returns a user friendly error
			@ message. If the credentials are found, 
			@ the script logs the user in and lets 
			@ the user know.
	
		*/


		// █====================================█
			/*
				@ Here we are getting the credentials submitted
				@ by the user and setting them to variables
			*/

		//Get the posted username
		$username = $_POST[ 'l_uname' ];

		//Get the posted password

		/** The password is encrypted using php default hasing algorithm
		 * PHP can use ARGON"I and ARGON"ID but needs to be installed on machine
		 */
	$password = $_POST[ 'l_pword' ];
		/*
					^^^
					Here we are getting the posted password
					and running it through the md5 function.

					The purpose of the md5 function is to encrypt the
					input so only the person that knows the original 
					password will be able to read it

					You can read more about MD5 here: 
					https://searchsecurity.techtarget.com/definition/MD5
		*/

		// █================END=================█




		// █====================================█
			/*
				@ Here we are asking the database for all
				@ the rows that contain the username and
				@ password the user submitted
			*/

		// Write the SQL to a string for convenience
		$sql = "SELECT * FROM 
				`user` 
				WHERE 
				`u_username` ='{$username}' 
				Limit 0,1
				";


		// Here we execute the SQL on the database and  
		// put the results from the server into a variable 
		$login = mysqli_query( $dbconnect,  $sql);
        
       


		// █================END=================█

		
		/*
			@ Here we are checking the number of rows
			@ returned from the server. If the number
			@ of rows is greater than 0, we know that
			@ the users credentials were found in the
			@ database, if the number of rows are 0,
			@ we know that the database couldnt find
			@ the users credentials
		*/
		if ( mysqli_num_rows( $login ) > 0 ) {

		// ╔═█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████═╗
	    // ║╔═════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╗║
		// ║║																		║║
			/*

				@ This block will execute if the user is found in the database,
				@ we need to get the users information and set the users 
				@ PHP session to tell the server that we are logged in.
			
			*/

			/*
				@ Now we have confirmed that the user was found in the database
				@ we can fetch the result from the SQL query in an array
				@ to use and manipulate in any way we choose. 

				@ Here we are getting the array and loading it into
				@ the variable row to represent the row in the database

				@ We use a while() loop to recursivly loop through each of the
				@ rows in the database, since we should only have one
				@ user, it will only loop once and exit.
			*/
			
			if ( $row = mysqli_fetch_assoc( $login ) ){

				
				if( password_verify( $password, $row['u_password'],)){
					error_log('password verified');
				/*
					@ Now we have the users information in an array, we can set the users
					@ session and use the data throughout the website to 
					@ confirm the user is logged in and to get the correct
					@ user information for the logged in user. 
				*/

				// Set the users ID to the session data
				$_SESSION[ 'user_id' ] = $row[ 'user_id' ];
				// Set the users username for quick access for application such as the header
				$_SESSION[ 'u_username' ] = $row[ 'u_username' ];
				// Set the users access level for quick access and security between users and user areas
				$_SESSION[ 'u_level' ] = $row[ 'u_level' ];
				}

			}; // Close the wile loop

			/*
				@ Now we have confirmed the user has an account on the website
				@ from checking the credentials in the database and we have set
				@ the users session for the website, we can now set the response 
				@ 'success' flag to true so we can manipulate the respose
				@ differently with the login being successful. 
			*/

			// set the response success flag to true
			$response['success'] = true;
			// Set the response message to welcome the user to the website
			$response['message'] = "Welcome to gardenbelle ".$_SESSION ['u_username']."!";

			/*
				@ Here we are echoing a json object created from the response
				@ array, this means that we can parse the data at the ajax
				@ script and easily read the variables
			*/
			echo json_encode($response);

			// Tell the server to leave the script and stop executing code
			exit();
		
		
		// ║║																	    ║║
		// ║╚█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╝║
	    // ╚══════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚═════╝

		} else {

		// ╔═█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████═╗
	    // ║╔═════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╗║
		// ║║																		║║
			/*

				@ This block of code will only execute if the number of rows
				@ in the database were 0, meaning the users credentials were
				@ not found. 
			
			*/

			// Set a user friendly error message so the user understands the
			// credentials submitted were not found in the database
			$response['message'] = "There was an issue with your username and password";

			/*
				@ Here we are echoing a json object created from the response
				@ array, this means that we can parse the data at the ajax
				@ script and easily read the variables
			*/
			echo json_encode($response);

			// Tell the server to leave the script and stop executing code
			exit();


		// ║║																	    ║║
		// ║╚█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╝║
    	// ╚══════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚═════╝


		}; //End of IF user rows


	// ║║																	    ║║
	// ║╚█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╗█████╝║
    // ╚══════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚════╝╚═════╝


	}; // End of IF NOT valid

    function userRegEmail($email){

		/*generate token to be saved in database */

		$token = Vaidator::generateFormToken('registration');

		$database = new database;

		$userMessage = <<<END
			Thanks for registering with gardenbelle please confirm your email
		<a href="http://gardenbelle.co.uk/reg_success.php?email=$email&$token">
		Verify Email Address </a>.

		END;
		
		email($to, 'Registering With Garden Belle');

		

	}


/*
	@ Close the if statement that checks if the
	@ login script is requested
*/

}; // End of if statement.

/*
█████████████████████████████████████████████████████

				END OF LOGIN SCRIPT

█████████████████████████████████████████████████████
*/

