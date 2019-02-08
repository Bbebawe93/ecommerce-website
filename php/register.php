<?php

// create connection to mongodb server
$client = new MongoClient();

// connect to the database
$db = $client->onePlayShop;

// use db customers collection
$collection = $db->customers;

// get and filter form values
$first_name = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
$last_name = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

// new user
$newUser = [
    "first name" => $first_name,
    "last name" => $last_name,
    "city" => $city,
    "username" => $username,
    "password" => $password,
];

//criteria array to check if user already registered
$findCriteria = [
    "username" => $username,
];

// find if username exists in the db
$registeredCustomers = $collection->find($findCriteria);

$userExists = false;

foreach ($registeredCustomers as $customer) {
    if ($customer["username"] === $username) {
        $userExists = true;
    }
} // end foreach

if ($userExists) {
    echo "<i class='error'> <i class='fas fa-times-circle'></i> username already exists, login instead or register using different username</i>";
} else {
    $query = $collection->insert($newUser);
    echo "<i class='success'><i class='fas fa-check-circle'></i> user account registered successfully, thank you {$first_name} {$last_name} </i>";
}
  //Close the connection
  $client->close();
    