<!-- <?php

$access_token = "fyrtvz8dal4lWVkUy0qNlGGkNOAj";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if amount is set and numeric
    if (isset($_POST['amount']) && is_numeric($_POST['amount'])) {
        $amount = $_POST['amount'];
        stkPush($amount, $access_token);
    } else {
        echo "Amount must be a valid number.";
    }
}

function stkPush($amount, $access_token)
{
    $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

    // Prepare cURL post data
    $postData = [
        "BusinessShortCode" => 174379,
        "Password" => "MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMjQwNzA3MDgwMzE0",
        "Timestamp" => date('YmdHis'),
        "TransactionType" => "CustomerPayBillOnline",
        "Amount" => $amount,
        "PartyA" => 254110492568,
        "PartyB" => 174379,
        "PhoneNumber" => 254110492568,
        "CallBackURL" => "https://www.him.x10.mx/callback_url.php", // Replace with your localhost callback URL
        "AccountReference" => "TEAM SWAT",
        "TransactionDesc" => "Payment of a TICKET"
    ];

    // Encode data to JSON
    $data_string = json_encode($postData);

    // Initialize cURL session
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $access_token
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

    // Execute cURL session
    $curl_response = curl_exec($curl);
    if ($curl_response === false) {
        die("Curl failed: " . curl_error($curl));
    }

    // Print cURL response
    echo $curl_response;

    // Close cURL session
    curl_close($curl);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M-PESA STK Push Demo</title>
</head>
<body>
    <h2>M-PESA STK Push Demo</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Amount: <input type="number" name="amount" required><br><br>
        <input type="submit" value="Pay">
    </form>
</body>
</html> -->
