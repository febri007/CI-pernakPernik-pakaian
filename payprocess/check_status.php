<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FRPS Test Payment</title>
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-0p8lbY7CC1VMsL_y"></script>
</head>
<body>
<?php
require_once(dirname(__FILE__) . '/Midtrans.php');

//Set Your server key
\Midtrans\Config::$serverKey = "SB-Mid-server-Ee9g8BK7G0bvr52dj9TKWUG5";

// Uncomment for production environment
// \Midtrans\Config::$isProduction = true;

\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;


$snapToken = \Midtrans\Transaction::status('fiddy-6000');

if ($snapToken->status_code == "404") {
    echo "tidak perlu ada action";
}else {
    # code...
    echo "Bank ".$snapToken->va_numbers[0]->bank;
    echo "<br>"."Virtual Account : ".$snapToken->va_numbers[0]->va_number;
    echo "<br>"."Dibayar : ".$snapToken->payment_amounts[0]->paid_at;
    echo "<br>"."Total Bayar : ".$snapToken->payment_amounts[0]->amount;
    echo "<br>"."Status Bayar : ".$snapToken->transaction_status;
}

?>
</body>
</html>