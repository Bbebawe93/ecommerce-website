<?php

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
$registeredUsername = null;
$registeredPassword = null;

foreach ($registeredUsers as $user) {
    $registeredUsername = $user["username"];
    $registeredPassword = $user["password"];
}

if ($username === $registeredUsername && $password === $registeredPassword) {
    echo "user found";
} else {
    echo "<i class='error'> <i class='fas fa-times-circle'></i> invalid username or password</i>";
}
