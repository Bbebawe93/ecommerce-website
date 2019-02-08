<?php
function getProfile() {
//Start session management
// session_start();
// create connection to mongodb server
$client = new MongoClient();

// connect to the database
$db = $client->onePlayShop;

// use db product collection
$collection = $db->customers;


$findCriteria = [
    "username" => $_SESSION["username"]
];
$registeredCustomers = $collection->find($findCriteria);
foreach($registeredCustomers as $customer) {
    echo "<li class='list-group-item'>First Name: {$customer['first name']}</li>";
    echo "<li class='list-group-item'>Last Name: {$customer['last name']}</li>";
    echo "<li class='list-group-item'>City: {$customer['city']}</li>";
    echo "<li class='list-group-item'>Username: {$customer['username']}</li>";
    echo "<li class='list-group-item'>Password: {$customer['password']}</li>";

}
}