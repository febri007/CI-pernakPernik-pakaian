<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FRPS Test Payment</title>
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-0p8lbY7CC1VMsL_y"></script>
</head>

<body>
  <form action="" id="form_input">
    <input type="text" name="order_id" value="<?= "fiddy-" . rand(100, 2000);  ?>">
  </form>

  <?php
  // move to backend checkout
  ?>
  <button id="pay-button" onclick="prosesBayar('<?= "fiddy-" . rand(100, 2000);  ?>')">Bayar Ke FRP Solution!</button>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    var payButton = document.getElementById('pay-button');

    function prosesBayar(_order_id) {
      $.ajax({
        url: 'backend_checkout.php',
        data: {
          order_id: _order_id
        },
        type: 'POST',
        dataType: 'json',
        success: (result) => {
          console.log(result);
          console.log(result.message);
          snap.pay(result.snap_token, {
            onSuccess: function(result) {
              /* You may add your own implementation here */
              alert("payment success!");
              console.log(result);
            },
            onPending: function(result) {
              /* You may add your own implementation here */
              alert("wating your payment!");
              console.log(result);
            },
            onError: function(result) {
              /* You may add your own implementation here */
              alert("payment failed!");
              console.log(result);
            },
            onClose: function() {
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          }); // store your snap token here
        },
        error: (error) => {
          console.error(error.responseText);
        }

      });
    }
    // payButton.addEventListener('click', function () {
    //   $.ajax({
    //     url : 'backend_checkout.php',
    //     data : $('#form_input').serialize(),
    //     type : 'POST',
    //     dataType : 'json',
    //     success : (result)=>{
    //       console.log(result);
    //       snap.pay(result); // store your snap token here
    //     },
    //     error : (error)=>{
    //       console.error(error);
    //     }

    //   });



    // });
  </script>
</body>

</html>