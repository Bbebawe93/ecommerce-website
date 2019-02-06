$(document).ready(function () {
    var loginError = $("#log-username-error");
    var username;
    var password;
    $("#login-form").submit(function (evt) {
        evt.preventDefault();
        username = $("#log-username").val();
        password = $("#log-password").val();
        login(username, password);
    });

    function login(username, password) {
        var request = new XMLHttpRequest();
        request.open("POST", "php/login.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.onload = function () {
            //Check HTTP status code
            if (request.status === 200) {
                //Get data from server
                loginError.html(request.responseText);
                console.log(request.responseText);
            } else
                console.log("Error communicating with server: " + request.status);
        };
        //Send request to server 
        request.send("username=" + username + "&password=" + password);
    }
});