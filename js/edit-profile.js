$(document).ready(function () {
    var user = {
        firstName: null,
        lastName: null,
        city: null,
        username: null,
        password: null
    }
    var currentUsername;
    $("#edit-button").click(function (evt) {
        evt.preventDefault();
        console.log("clicked");
        $("#update-button").removeClass("hide");
        $("#cancel-button").removeClass("hide");
        $(".form-control").removeAttr("disabled");
        currentUsername = $("#reg-username").val();
        console.log(currentUsername);

    });

    $("#update-button").click(function (evt) {
        evt.preventDefault();
        console.log(currentUsername);

        user.firstName = $("#first-name").val();
        user.lastName = $("#last-name").val();
        user.city = $("#residential-city").val();
        user.username = $("#reg-username").val();
        user.password = $("#reg-password").val();
        console.log(user);
        updateUser(user);
        $(".form-control").prop("disabled", true);
        $("#update-button").addClass("hide");
        $("#cancel-button").addClass("hide");
    });


    $("cancel-button")
    function updateUser(user) {
        //Create request object 
        var request = new XMLHttpRequest();
        //Set up request with HTTP method and URL 
        request.open("POST", "php/update-user.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //Create event handler that specifies what should happen when server responds
        request.onload = function () {
            //Check HTTP status code
            if (request.status === 200) {
                $("#profile-message").addClass("profile-info");
                $("#profile-message").html(request.responseText);
                setTimeout(function () {
                    $("#profile-message").removeClass("profile-info");
                    $("#profile-message").html("");
                }, 3000);
            } else {
                console.log(request.responseText);

            }

        };

        //Send request to server 
        request.send("currentUsername=" + currentUsername + "&firstName=" + user.firstName + "&lastName=" + user.lastName + "&city=" + user.city + "&username=" + user.username + "&password=" + user.password);
    }

});