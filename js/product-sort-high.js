$(document).ready(function() {
    var productToSearch = null;

    $("#sort-high-low").click(function (evt) {
        evt.preventDefault();
        productToSearch = $("#product-search").val();
        sortProduct(productToSearch);
        console.log("clicked");
    });


    function sortProduct(productToSearch) {
        //Create request object 
        var request = new XMLHttpRequest();
        //Set up request with HTTP method and URL 
        request.open("POST", "php/product-sort-high.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //Create event handler that specifies what should happen when server responds
        request.onload = function () {
            //Check HTTP status code
            if (request.status === 200) {
                //Get data from server
                $(".product-info").html(request.responseText);
                returnedProductList = request.responseText;
            } else
                console.log("Error communicating with server: " + request.status);
        };

        //Send request to server 
        request.send("productToSearch=" + productToSearch);
    }

}); 