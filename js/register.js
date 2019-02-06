$(document).ready(function () {

    // registration form 
    var registrationForm = $("#registration-form");
    // form span messages 
    var firstNameMessage = $("span[id=first-name-message]");
    var lastNameMessage = $("span[id=last-name-message]");
    var residentialCityMessage = $("span[id=residential-city]");
    var regUsernameMessage = $("span[id=username-message]");
    var regPasswordMessage = $("span[id=reg-password-message]");
    var regErrorMessage = $("#reg-error");

    // form input fields 
    var firstNameInput = $("input[name=first-name]");
    var lastNameInput = $("input[name=last-name]");
    var regUsernameInput = $("input[name=reg-username]");
    var regPasswordInput = $("input[name=reg-password]");
    var residentialCityInput = $("input[id=residential-city]");


    // regular expressions
    var digitReg = /[0-9]/;
    var stringReg = /^[a-zA-Z]+$/;
    var usernameReg = /[a-zA-Z]/;
    var spaceReg = /\s{1}/;

    // user input 
    // validation object used to represent valid form
    var validForm = {
        validFirstName: false,
        validLastName: false,
        validUsername: false,
        validPassword: false
    };

    // valid userObject 
    var newUser = {
        firstName: null,
        lastName: null,
        city: null,
        username: null,
        password: null
    }
    var englandCities = ["Bath", "Birmingham", "Bradford", "Brighton and Hove", "Bristol", "Cambridge", "Canterbury", "Carlisle", "Chester", "Chichester", "Coventry", "Derby", "Durham", "Ely", "Exeter", "Gloucester", "Hereford", "Kingston upon Hull", "Lancaster", "Leeds", "Leicester", "Lichfield", "Lincoln", "Liverpool", "London", "Manchester", "Newcastle upon Tyne", "Norwich", "Nottingham", "Oxford", "Peterborough", "Plymouth", "Portsmouth", "Preston", "Ripon", "Salford", "Salisbury", "Sheffield", "Southampton", "St Albans", "Stoke-on-Trent", "Sunderland", "Truro", "Wakefield", "Wells", "Westminster", "Winchester", "Wolverhampton", "Worcester", "York"];

    // first name validation 
    firstNameInput.focus(function () {
        applyStyle(firstNameMessage, "#00529B", "#BDE5F8"); // blue 
        firstNameMessage.html(" <i class='fas fa-info-circle'></i> Enter your first name without using numbers or special characters");

    });
    firstNameInput.blur(function () {

        var firstName = firstNameInput.val();
        if (!stringReg.test(firstName) || digitReg.test(firstName)) {
            applyStyle(firstNameMessage, "#D8000C", "#FFD2D2"); // error
            firstNameMessage.html("<i class='fas fa-times-circle'></i> invalid name, retry");
        } else {
            validForm.validFirstName = true;
            newUser.firstName = firstName;
            firstNameMessage.html(" <i class='fas fa-check-circle'></i> ");
            applyStyle(firstNameMessage, "#4F8A10", "#DFF2BF"); // green 
        }
    });

    // last name validation 
    lastNameInput.focus(function () {
        applyStyle(lastNameMessage, "#00529B", "#BDE5F8"); // blue 
        lastNameMessage.html(" <i class='fas fa-info-circle'></i> Enter your last name without using numbers or special characters");
    });
    lastNameInput.blur(function () {
        var lastName = lastNameInput.val();
        if (!stringReg.test(lastName) || digitReg.test(lastName)) {
            applyStyle(lastNameMessage, "#D8000C", "#FFD2D2"); // error
            lastNameMessage.html("<i class='fas fa-times-circle'></i> invalid name, retry");
        } else {
            validForm.validLastName = true;
            newUser.lastName = lastName;
            applyStyle(lastNameMessage, "#4F8A10", "#DFF2BF"); // green 
            lastNameMessage.html(" <i class='fas fa-check-circle'></i>");

        }
    });

    // username validation 
    regUsernameInput.focus(function () {
        applyStyle(regUsernameMessage, "#00529B", "#BDE5F8"); // blue 
        regUsernameMessage.html(" <i class='fas fa-info-circle'></i> 5 characters or more, only letters and digits");
    });
    regUsernameInput.blur(function () {
        var username = regUsernameInput.val();
        if (!usernameReg.test(username) || !digitReg.test(username) || spaceReg.test(username)) {
            applyStyle(regUsernameMessage, "#D8000C", "#FFD2D2"); // error
            regUsernameMessage.html("<i class='fas fa-times-circle'></i> invalid username, retry");
        } else {
            validForm.validUsername = true;
            newUser.username = username;
            applyStyle(regUsernameMessage, "#4F8A10", "#DFF2BF"); // green 
            regUsernameMessage.html(" <i class='fas fa-check-circle'></i>");
        }
    });

    // password validation 
    regPasswordInput.focus(function () {
        applyStyle(regPasswordMessage, "#00529B", "#BDE5F8"); // blue 
        regPasswordMessage.html(" <i class='fas fa-info-circle'></i> 5 characters or more, only letters and digits");
    });
    regPasswordInput.blur(function () {
        var password = regPasswordInput.val();
        if (!usernameReg.test(password) || !digitReg.test(password) || spaceReg.test(password)) {
            applyStyle(regPasswordMessage, "#D8000C", "#FFD2D2"); // error
            regPasswordMessage.html("<i class='fas fa-times-circle'></i> invalid password, retry");
        } else {
            validForm.validPassword = true;
            newUser.password = password;
            applyStyle(regPasswordMessage, "#4F8A10", "#DFF2BF"); // green 
            regPasswordMessage.html(" <i class='fas fa-check-circle'></i>");
        }
    });

    // auto complete residential city field 
    $("#residential-city").autocomplete({
        source: englandCities,
        delay: 200,
        select: function (event, ui) {
            $("#residential-city").val(ui.item.value);
            newUser.city = $("#residential-city").val();
        }
    });




    console.log(newUser.city);
    $("#registration-form").submit(function (evt) {
        var submit = true;
        evt.preventDefault();
        for (key in validForm) {
            if (validForm[key] == false) {
                submit = false;
            }
        }
        if (!submit) {
            applyStyle(regErrorMessage, "#D8000C", "#FFD2D2"); // error
            regErrorMessage.html("<i class='fas fa-times-circle'></i> please fill up the incorrect fields");

        } else if (submit) {
            newUser.city = residentialCityInput.val(); 
            register(newUser);
            applyStyle(regErrorMessage, "#4F8A10", "#DFF2BF"); // green 
            regErrorMessage.html(" <i class='fas fa-check-circle'></i>");
            // addUsers(userFirstName, userLastName, userUsername, userPassword, 0, 3);
            // localStorage.setItem("userLoggedIn", "none")
            return true;
        }
    });

    function register(newUser) {
        //Create request object 
        var request = new XMLHttpRequest();
        //Set up request with HTTP method and URL 
        request.open("POST", "php/register.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //Create event handler that specifies what should happen when server responds
        request.onload = function () {
            //Check HTTP status code
            if (request.status === 200) {
                applyStyle(regErrorMessage, "#00529B", "#BDE5F8"); // blue 

                //Get data from server
                regErrorMessage.html(request.responseText);
            } else
                console.log("Error communicating with server: " + request.status);
        };

        //Send request to server 
        request.send("firstName=" + newUser.firstName + "&lastName=" + newUser.lastName + "&city=" + newUser.city + "&username=" + newUser.username + "&password=" + newUser.password);
    }

    // function to change style of an element 
    function applyStyle(element, color, background) {
        $(element).css({
            "color": color,
            "background-color": background
        });
    }
}); // ready function