


    


                    <div class="nav-item mr-auto">
                        <div class="basket-container">

                            <div class="btn btn-success ml-2" id="header-cart-btn"><i class="fas fa-shopping-basket"></i>
                                <div class="basket-number"><span id="headercart">-</span></div>
                            </div>

                            <div class="basket-drop">
                                <div class="basket-title">
                                    My Basket
                                </div>
                                <hr />
                                <div class="basket-list">

                                </div>
                                <div class="basket-price">

                                </div>
                                <div class="basket-checkout">
                                    <a href="/cart.php" class="btn  btn-primary">View</a>
                                    <a href="/checkout1.php" class="btn btn-success">Checkout</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    </nav>
                </div>
           


            <!-- Mobile header -->
            <header class="mobile-header">
                <div class="mobile-header-title">Garden Belle</div>

                <div id="mobile-nav-open">
                    <i class="fas fa-bars"></i>
                </div>
            </header>

            <!-- End of mobile header -->

            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                                    <input type="text" class="form-control form-control-lg rounded-0" name="l_uname" id="l_uname" required="">
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
            <div class="modal fade" id="reg-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog login-pop-container">
                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header ">
                            <h3 class="mb-0">Register</h3>
                        </div>
                        <div class="card-body">
                            <form action="../mng/mng_user.php" method="POST" id="registerForm">
                                <div class="form-group">
                                    <label for="uname1">Username</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="r_uname" id="r_uname" required="">
                                    <div class="invalid-feedback">Oops, you missed this one.</div>
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
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->
                </div>
            </div>
            <div class="header-search">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <form action="../listings.php" method="get" class="form">
                                <div class="input-group ">
                                    <input type="text" class="form-control" placeholder="Search" name="searchterm" id="searchterm">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary header-search-btn" type="submit"><i class="fas fa-search-plus" title="My Basket"></i></button>
                                    </div>
                                </div>
                            </form>
                          
                        </div>
                    </div>
                </div>
