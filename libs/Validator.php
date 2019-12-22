<?php
class Validator{

    /*  */

    /** Validator class 
     * thanks https://css-tricks.com/serious-form-security
     */

     /** generateFormToken
      *  provides Anti-CSRF Token
      * @params form
      * returns a token to be set in form 
      * sets the token in the session
      */
    public static function generateFormToken($form) {
    
        // generate a token from an unique value
         $token = md5(uniqid(microtime(), true));  
         
         // Write the generated token to the session variable to check it against the hidden field when the form is sent
         $_SESSION[$form.'_token'] = $token; 
         
         return $token;
    
    }


    function verifyFormToken($form) {
    
        // check if a session is started and a token is transmitted, if not return an error
        if(!isset($_SESSION[$form.'_token'])) { 
            return false;
        }
        
        // check if the form is sent with token in it
        if(!isset($_POST['token'])) {
            return false;
        }
        
        // compare the tokens against each other if they are still the same
        if ($_SESSION[$form.'_token'] !== $_POST['token']) {
            return false;
        }
        
        return true;
    }
    /** Creates a unique string used in User.php
     * 
     */
    public static function createToken(){
// generate a token from an unique value
$token = md5(uniqid(microtime(), true));  
         
// Write the generated token to the session variable to check it against the hidden field when the form is sent

return $token;
    }

  function stripcleantohtml($s){
		// Restores the added slashes (ie.: " I\'m John " for security in output, and escapes them in htmlentities(ie.:  &quot; etc.)
		// Also strips any <html> tags it may encouter
		// Use: Anything that shouldn't contain html (pretty much everything that is not a textarea)
		return htmlentities(trim(strip_tags(stripslashes($s))), ENT_NOQUOTES, "UTF-8");
}

function cleantohtml($s){
		// Restores the added slashes (ie.: " I\'m John " for security in output, and escapes them in htmlentities(ie.:  &quot; etc.)
		// It preserves any <html> tags in that they are encoded aswell (like &lt;html&gt;)
		// As an extra security, if people would try to inject tags that would become tags after stripping away bad characters,
		// we do still strip tags but only after htmlentities, so any genuine code examples will stay
		// Use: For input fields that may contain html, like a textarea
		return strip_tags(htmlentities(trim(stripslashes($s))), ENT_NOQUOTES, "UTF-8");
}
   

}


