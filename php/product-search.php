<?php


// create connection to mongodb server
$client = new MongoClient();

// connect to the database
$db = $client->onePlayShop;

// use db product collection
$collection = $db->products;

// get and search product value
$productToSearch = filter_input(INPUT_POST, 'productToSearch', FILTER_SANITIZE_STRING);

$searchCriteria = [
    '$text' => ['$search' => $productToSearch],
];

// find product in the database, 
$productList = $collection->find($searchCriteria);
// get the count to avoid curser iteration 
$productListCount = $collection->find($searchCriteria);

$productsFoundCount =$productListCount->count(); 

if($productsFoundCount > 0 ) {
    $row = 1;
    foreach($productList as $product) {
        echo 
        "<tr>
        <th scope='row'>$row</th>
        <td>{$product['name']}</td>
        <td>{$product['size']}</td>
        <td>{$product['price']}</td>
        <td>{$product['description']}</td>
        <td><img id='product-image' class='img-thumbnail' src='{$product['image']}'></td>
        <td>Add to Basket</td>
        </tr>";
        $row++;
    }
} else{
    echo "Sorry, product not found";
    # code...
} 
