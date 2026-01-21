<?php
ini_set('include_path', '.;C:\php\pear;C:\Users\ayman\Desktop\Site_DrMekour_Front_End\vendor');

require __DIR__ . '/../vendor/autoload.php';

use MailchimpMarketing\ApiClient;

$apiKey = "b6d8f952b48788d45b9a39e3bc01feda-us7"; // Your Mailchimp API Key
$serverPrefix = "us7"; // Extracted from your API Key

$listId = "374dd82ba3"; // Your audience ID

$client = new ApiClient();
$client->setConfig([
    'apiKey' => $apiKey,
    'server' => $serverPrefix,
    'verify' => false, // Should match the API Key's prefix
]);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    try {
        $response = $client->lists->addListMember($listId, [

            "email_address" => $email,

            "status" => "subscribed", // Just the basic fields
        ]);


        header('Location: ../index.html?status=success');
    } catch (\Exception $e) {
        header('Location: ../index.html?status=error');
    }
}
?>