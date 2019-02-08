$(document).ready(function () {

    $("#logout").click(function (evt) {
        evt.preventDefault();
        console.log("clicked");
        logout();

    });

    function logout() {
        var request = new XMLHttpRequest();
        request.open("POST", "php/logout.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.onload = function () {
            if (request.status === 200) {
                document.write("logged out successfully, redirecting to homepage...")
                setTimeout(function () {
                    window.location.href = "index.php";
                }, 2000);

            }

        };
        //Send request to server 
        request.send();
    }
});