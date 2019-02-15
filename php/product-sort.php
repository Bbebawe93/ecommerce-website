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

$productCount = $productList->count(); 

$sortedProducts = $productList->sort(array('price'=>1));


if($productCount > 0 ) {
    $row = 1;
    foreach($sortedProducts as $product) {
        echo 
        "<tr>
        <th scope='row'>$row</th>
        <td>{$product['name']}</td>
        <td>{$product['size']}</td>
        <td>{$product['price']}</td>
        <td>{$product['description']}</td>
        <td><img id='product-image' class='img-thumbnail' src='{$product['image']}'></td>
        <td><button>Add to Basket</button></td>
        </tr>";
        $row++;
    }
} else{
    echo "Sorry, product not found";
    # code...
} 
?>