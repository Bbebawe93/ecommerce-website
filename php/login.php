<?php

//Start session management
session_start();
// create connection to mongodb server
$client = new MongoClient();

// connect to the database
$db = $client->onePlayShop;

// use db product collection
$collection = $db->customers;


// get and search product value
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$findCriteria = [
    "username" => $username,
    "password" => $password,
];

$registeredUsers = $collection->find($findCriteria);


$customer = $registeredUsers->getNext(); 

if ($username === $customer["username"] && $password === $customer["password"]) {
    $_SESSION["username"] = $customer["username"];
   echo "login"; 
} else {
    echo "NO";
}
  //Close the connection
  $client->close();
    