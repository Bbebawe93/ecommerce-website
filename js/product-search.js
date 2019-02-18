$(document).ready(function () {
    var returnedProductList;
    var productToSearch = null;
    var productForm = $("#product-search-form");
    $("#product-search").focus(function () {
        $("#product-search-message").html(" enter the product name");
    });

    var productList = ["ball", "live", "paddle"];
    $("#product-search").autocomplete({
        source: productList,
        delay: 200,
        select: function (event, ui) {
            $("#product-search").val(ui.item.value);
            productToSearch = $("#product-search").val();
        }
    });

    productForm.submit(function (evt) {
        evt.preventDefault();
        productToSearch = $("#product-search").val();
        searchProduct(productToSearch);
    });


    // loop over products 
    $(".product-info").html(returnedProductList);

    function searchProduct(productToSearch) {
        //Create request object 
        var request = new XMLHttpRequest();
        //Set up request with HTTP method and URL 
        request.open("POST", "php/product-search.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //Create event handler that specifies what should happen when server responds
        request.onload = function () {
            //Check HTTP status code
            if (request.status === 200) {
                //Get data from server
                $(".product-info").html(request.responseText);
                returnedProductList = request.responseText;
            } else {
                $(".product-info").html("Error communicating with server: " + request.status);
            }
        };

        //Send request to server 
        request.send("productToSearch=" + productToSearch);
    }
});