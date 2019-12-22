<?php header("Set-Cookie: key=value; path=/; domain=gardenbelle.co.uk; HttpOnly; SameSite=Lax"); ?> 
<!DOCTYPE html>
<html lang="en" >

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta lang="en" charset="utf-8">
    <title>Garden Belle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- font awesome -->
    <script src="https://kit.fontawesome.com/9eebc731e0.js" crossorigin="anonymous"></script>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

        <!--JQuery CSS-->
        <link rel="stylesheet" type="text/css" href="../js/jquery-ui.css" />

        <!-- JQuery -->
        <script src="/js/jquery.js"></script>
        <script src="../js/jquery-ui.js"></script>


     
        <!-- bootstrap -->
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap-grid.min.css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap-reboot.min.css">
        
        
        <!--favicons -->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
       
        <!-- google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <!-- Slick.js -->
         <script src="/js/slick.min.js"></script>
         <script src="/js/search.js"></script>
        
        <!-- Overrides -->
        <link rel="stylesheet" type="text/css" href="/css/core.css">
        <script src="/js/core.js"></script>
        
        <script src="/js/bingsterfied.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/bingsterfied.css">
  
        <link rel="manifest" href="/manifest.json">
        </head>
<body> 
<div class="container-fluid green" >
    <div class="row justifiy-content-center">
      <nav class="navbar navbar-default">
         <div class="navbar" >

 <div class="col-2  justify-content-center">
               <a class="btn btn-outline-light " href="/">
               <i class="fas fa-home fa-fw" ></i> 
               <span class="d-none d-lg-block">Home</span>
             </a>
</div>
        <div class="col-2 justify-content-center">
               <a class="btn btn-outline-light " href="/listings.php">
               <i class="fas fa-seedling fa-fw"> </i> 
               <span class="d-none d-lg-block">Shop</span>
             </a>
</div>
        <div class="col-2 justify-content-center">
               <a class="btn btn-outline-light" href="/contact.php" >
               <i class="fas fa-envelope fa-fw" >
                   </i> <span class="d-none d-lg-block">Contact</span>
            </a>
</div>

          <div class="col-2 justify-content-center">
              <a class="btn btn-outline-light " id="loginBtn" 
                    data-toggle="modal" data-target="#login-modal">
                  <i class="fas fa-user fa-fw"></i>
                  <span class="d-none d-lg-block">Login</span></a>
</div>
            
  

</div>
</nav>            
    </div>
    </div>

<div class="row">
    <div class="col-3 offset-1">
    <a class="navbar-brand" href="/">
        <img src="/img/logo.png" width="150" height="100" alt="Logo"/>
    </a>
</div>
<div class="col-4 offset-3">
    <div class="basket-container">

    <div class="btn" id="header-cart-btn">
    
    <i class="fas fa-shopping-basket"></i> 

<span class="d-none d-lg-block">basket</span>
<div class="basket-number  btn-outline-white">
    <span id="headercart">0

    </span></div></div>

<div class="basket-drop">
   
    <hr>
    <div class="basket-list">Cart is empty</div>
    <div class="basket-price">£0.00</div>
    <div class="basket-checkout">
        <a href="/cart.php" class="btn  btn-primary">View</a>
        <a href="/checkout1.php" class="btn btn-success">Checkout</a>
    </div>
    
</div>
</div>  
</div>
</div>
    
<div class="container-fluid green" id="search-container">
<form class="navbar-form" role="search">
        <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="searchterm" id="searchterm">
            <div class="input-group-btn">
                <button class="btn search-btn" type="submit">

                <i class="fas fa-search fa-fw search-icon"></i>

                </button>
             </div>
             <div id="searchbox"></div>
        </div>
        </form>
    </div>   
    
  
  
    <div id="sidebar">
   <nav id="sidenav">
   <div class="sidebar-container">
     
       <div id="logo-sidebar">
            <a class="navbar-brand" href="../index.php">
                    <img src="/img/logo-mobile.png"  id="logo" alt="Welcome this is our logo" />
                        <h1 class="sr-only">Garden Belle</h1>
                    </a>
                    <span id="sidebar-close">
                    <i onclick="navOpener()" >&times;</i></span>
            </div>
 
<div class="row" id="side">
           <div id="aside-container">
            <?php
            
        /* This function adds a html space charater */

            function HtmlLink( $value){
                $url = str_replace(' ','%20', trim($value));
                 $str = '<a href="listings.php?cat='. $url .'">' .$value . '</a>'; 

            return $str;
}      ?>     
         
            
        <ul>
   
             <li>
          <a href="#pageSubmenu" ></a>


           <ul id="pageSubmenu">
               <li> <a href="/articles.php?article=about">About Us</a> </li>
                    <li> <a href="">Recipes</a></li>
                           
            </ul>

            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Products</a>
           
             <li>
            <ul class="collapse list-unstyled" id="homeSubmenu">
          
        <?php
          $queryString = "SELECT DISTINCT `p_species` FROM `product` WHERE `p_category` = 'Vegetable Seeds'";
                  $result = new DB();
                     $menuResult =  $result->query($queryString);
                     
             
           while ($row = $menuResult->fetch_array()) {
                    echo  '<li>' .HtmlLink($row['p_species']) .'</li>';
                                    
                                    }     
                                    
                                    ?>
                     
                          
                    </ul>
               
             </ul>
       </div>
    </div>
    </div>
</nav>
</div>
          
<div class="mobile-basket-widget">
                <div class="mobile-basket-widget-inner">
	<div class="mobile-basket-widget-title">
    <span class="navbar-toggler-icon btn" onclick="navOpener()" >
    </span>
	</div>
	

	<div class="float-right">
		<div class="mobile-basket-widget-total">
		<span class="mobile-basket-widget-items">0</span> x <span class="mobile-basket-widget-price">£0.00</span>
	</div>
	    <a href="/cart.php" class="btn btn-success mobile-basket-widget-btn">View Cart</a>
	</div>
</div>           

</div>

	

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog"  aria-hidden="true" style="display: none;">
                <div class="modal-dialog login-pop-container">
                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Login</h3>
                        </div>
                        <div class="card-body" id="login-body-container">
                            <div class="alert alert-danger" id="login-error">
                                <strong>Error!</strong> Username or password not found.
                            </div>
                            <div class="alert alert-warning" id="loginload">
                                Loading....
                            </div>
                            <form action="../mng/mng_user.php" method="POST" id="loginform">
                                <div class="form-group">
                                    <label for="uname1">Username</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="l_uname" id="uname1" required="">
                                    <div class="invalid-feedback">Oops, you missed this one.</div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" id="l_pword" name="l_pword" required="" autocomplete="new-password">
                                    <div class="invalid-feedback">Enter your password too!</div>
                                </div>
                                <div>
                                </div>
                                <input type="hidden" name="mode" value="login" />
                                <input type="submit" class="btn btn-primary" name="login" />
                                <p class="float-right login-register" data-toggle="modal" data-target="#reg-modal" onclick="$('#login-modal').modal('hide');"> Need an account? </p>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->
                </div>
            </div>
            <!-- Register form-->
            <div class="modal fade" id="reg-modal" tabindex="-1" role="dialog"  aria-hidden="true" style="display: none;">
                <div class="modal-dialog login-pop-container">
                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header ">
                            <h3 class="mb-0">Register</h3></div>
                         <div class="card-body">
                            <form action="../mng/mng_user.php" method="POST" id="registerForm">
                                
                                <div class="form-group">
                                    <label for="uname1">Username</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="r_uname" id="r_uname" required="">
                                    <div class="invalid-feedback">Oops, you missed this one.</div>
                                </div>


                                <div class="form-group">
                                    <label for="r_email">Email</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="r_email" id="r_email" required="">
                                    <div class="invalid-feedback">Please provide an email address.</div>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" id="r_pword1" name="r_pword1" required="" autocomplete="new-password">
                                    <div class="invalid-feedback">Enter your password too!</div>
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" id="r_pword2" name="r_pword2" required="" autocomplete="new-password">
                                    <div class="invalid-feedback">Enter your password too!</div>
                                </div>

                                <input type="hidden" name="mode" value="register" />
                                <input type="submit" class="btn btn-primary" name="login" />
                            </form>
                     </div>

                 </div>
                        <!--/card-block-->
             </div>
                    <!-- /form card login -->
              
    
            
            

    </div>


      <script>
    //When loginfrom is submitted (live event)
    $(document).on("submit", "#loginform", function() {
        var randNum = Math.floor(Math.random() * 1000000000);

        $.ajax({
            url: "/mng/mng_user.php?rand=" + randNum,
            dataType: 'text',
            type: 'POST',
            data: {
                "l_uname": $("[name='l_uname']").val(),
                "l_pword": $("[name='l_pword']").val(),
                "mode": "login"
            },
            beforeSend: function() {
                $('#loginload').show();
            },
            complete: function() {
                $('#loginload').hide();
            },
            success: function(result) {


                this.response = JSON.parse(result);

                if (this.response['success']) {

                    $('#login-body-container')[0].innerHTML = this.response['message'] + "<br> <small class='text-info'>Click outside of this box to close</small>";


                } else {

                    $('#login-error')[0].innerHTML = this.response['message'];
                    $('#login-error').show();

                };

                updateUserHeader();
                cartDisplayUpdate();
            }
        });
        return false; //stops the from submitting normally
    });
    </script>	


  

    