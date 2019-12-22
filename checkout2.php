<?php

$scripts = <<<EOT
  <script src="https://js.braintreegateway.com/web/dropin/1.20.4/js/dropin.min.js"></script>';
  <script>
  var submitButton = document.querySelector('#submit-button');

  braintree.dropin.create({
    authorization: 'CLIENT_AUTHORIZATION',
    selector: '#dropin-container'
  }, function (err, dropinInstance) {
    if (err) {
      // Handle any errors that might've occurred when creating Drop-in
      console.error(err);
      return;
    }
    submitButton.addEventListener('click', function () {
      dropinInstance.requestPaymentMethod(function (err, payload) {
        if (err) {
          // Handle errors in requesting payment method
        }

        // Send payload.nonce to your server
      });
    });
  });
</script>

EOT;



session_start();

// include database connection
include('inc/dbconnect.inc.php');
// include the header file
include('inc/header.php');
// include the Breadcrumbs file
include('inc/dynamicBreadcrumbs.php');

?>

<?php if ($_SESSION['message'] !== "") {
  $message = $_SESSION['message'];
  echo <<<END
      <div class="alert alert-success p-4">
                    $message
                    </div>
END;
  $_SESSION['message'] = "";
}  ?>
<div class="container">
  <h1> Checkout 2 </h1>


  <form action="checkout3.php" id="my-sample-form">
  
  <label for="card-number">Card Number</label>
  <input type="text" name="payment_method">
  <div id="card-number"></div>

  <label for="cvv">CVV</label>
  <input type="text" name="payment_method">
  <div id="cvv"></div>

  <label for="expiration-date">Expiration Date</label>
  <div id="expiration-date"></div>

  <input id="my-submit" type="submit" value="Pay" />
</form>

  <!--Paypal , Nochex API -->
  <br />



  <p><a href="checkout3.php">Next Stage </a></p>
</div>

<?php include('inc/footer.php'); ?>