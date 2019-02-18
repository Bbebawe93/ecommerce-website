$(document).ready(function () {
    var productToSort = null;
    var sortCriteria = null;
    $("#sort-low-high").click(function (evt) {
        evt.preventDefault();
        productToSort = $("#product-search").val();
        sortCriteria = "price-low-high";
        sortProduct(productToSort, sortCriteria);
    });
    $("#sort-high-low").click(function (evt) {
        evt.preventDefault();
        productToSort = $("#product-search").val();
        sortCriteria = "price-high-low";
        sortProduct(productToSort, sortCriteria);
    });
    $("#sort-name-a-z").click(function (evt) {
        evt.preventDefault();
        productToSort = $("#product-search").val();
        sortCriteria = "name-a-z";
        sortProduct(productToSort, sortCriteria);
    });

    $("#sort-name-z-a").click(function (evt) {
        evt.preventDefault();
        productToSort = $("#product-search").val();
        sortCriteria = "name-z-a";
        sortProduct(productToSort, sortCriteria);
    });

    function sortProduct(productToSort, sortCriteria) {
        //Create request object 
        var request = new XMLHttpRequest();
        //Set up request with HTTP method and URL 
        request.open("POST", "php/product-sort.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //Create event handler that specifies what should happen when server responds
        request.onload = function () {
            //Check HTTP status code
            if (request.status === 200) {
                //Get data from server
                $(".product-info").html(request.responseText);
            } else {
                $(".product-info").html("Error communicating with server: " + request.status);
            }
        };
        //Send request to server 
        request.send("productToSort=" + productToSort + "&sortCriteria=" + sortCriteria);
    }
});