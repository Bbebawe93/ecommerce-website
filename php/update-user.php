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
$currentUsername = filter_input(INPUT_POST, 'currentUsername', FILTER_SANITIZE_STRING);
$first_name = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
$last_name = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$updateUser = $collection->update(["username" => $currentUsername], ["first name" => $first_name,
    "last name" => $last_name,
    "city" =>$city,
    "username" => $username,
    "password" => $password]); 

// update session 
$_SESSION["username"] = $username;
echo "Personal Updated Successfully";
  //Close the connection
  $client->close();
    