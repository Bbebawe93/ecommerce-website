<?php
function getProfile()
{
//Start session management
    // session_start();
    // create connection to mongodb server
    $client = new MongoClient();

// connect to the database
    $db = $client->onePlayShop;

// use db product collection
    $collection = $db->customers;

    $findCriteria = [
        "username" => $_SESSION["username"],
    ];
    $registeredCustomers = $collection->find($findCriteria);
// foreach($registeredCustomers as $customer) {
    //     echo "<li class='list-group-item'>First Name: {$customer['first name']}</li>";
    //     echo "<li class='list-group-item'>Last Name: {$customer['last name']}</li>";
    //     echo "<li class='list-group-item'>City: {$customer['city']}</li>";
    //     echo "<li class='list-group-item'>Username: {$customer['username']}</li>";
    //     echo "<li class='list-group-item'>Password: {$customer['password']}</li>";

// }

    foreach ($registeredCustomers as $customer) {

        echo <<<PROFILE
    <form id="profile-form" class="" action="" method="POST">
    <fieldset class="form-group">
    <label for="first-name"> <i class="fas fa-id-card icon"></i> First Name:</label><span id="first-name-message"></span>
    <input class="form-control" type="text" name="first-name" id="first-name" required value= {$customer['first name']} disabled>
    <label for="last-name"><i class="fas fa-id-card icon"></i> Last Name:</label><span id="last-name-message"></span>
    <input class="form-control" type="text" name="last-name" id="last-name" required value = {$customer['last name']} disabled>
    <label for="residential-city"><i class="fas fa-home"></i> Residential City: (auto complete)</label><span
        id="residential-city-message"></span>
    <input class="form-control" type="text" name="residential-city" id="residential-city" required value= {$customer['city']} disabled>
    <label for="reg-username"><i class="fa fa-user icon"></i> Username:</label><span id="username-message"></span>
    <input class="form-control" type="text" name="reg-username" id="reg-username" required value = {$customer['username']} disabled>
    <label for="reg-password"><i class="fas fa-key icon"></i> Password:</label><span id="reg-password-message"></span>
    <input class="form-control" type="text" name="reg-password" id="reg-password" required value = {$customer['password']} disabled>
    <span id="reg-error"></span>
    <button type="submit" id="edit-button" class="btn btn-warning">Edit Profile</button>
    <br>
    <br>

    <button type="submit" id="update-button" class="btn btn-success hide">Update</button>
    <br>
    <br>

    <button type="submit" id="cancel-button" class="btn btn-primary hide">Cancel</button>
    <br>
    <br>

    <button type="button" id="logout" class="btn btn-danger">Logout</button>
    <div class="form-group row">
    </div>
PROFILE;
    }

}
