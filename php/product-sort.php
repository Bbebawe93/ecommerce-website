<?php
// create connection to mongodb server
$client = new MongoClient();

// connect to the database
$db = $client->onePlayShop;

// use db product collection
$collection = $db->products;

// get and search product value
$productToSort = filter_input(INPUT_POST, 'productToSort', FILTER_SANITIZE_STRING);
$sortCriteria = filter_input(INPUT_POST, 'sortCriteria', FILTER_SANITIZE_STRING);


$searchCriteria = [
    '$text' => ['$search' => $productToSort],
];



switch($sortCriteria) {
    case "price-low-high":
    $productList = $collection->find($searchCriteria)->sort(array("price" => 1));
    $productCount = $productList->count(); 
    if($productCount > 0 ) {
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
            <td><button>Add to Basket</button></td>
            </tr>";
            $row++;
        }
    } else{
        echo "Sorry, product not found";
        # code...
    } 
    break;
    case "price-high-low":
    $productList = $collection->find($searchCriteria)->sort(array("price" => -1));
    $productCount = $productList->count(); 
    if($productCount > 0 ) {
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
            <td><button>Add to Basket</button></td>
            </tr>";
            $row++;
        }
    } else{
        echo "Sorry, product not found";
        # code...
    } 
    break;
    case "name-a-z" :
    $productList = $collection->find($searchCriteria)->sort(array("name" => 1));
    $productCount = $productList->count(); 
    if($productCount > 0 ) {
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
            <td><button>Add to Basket</button></td>
            </tr>";
            $row++;
        }
    } else{
        echo "Sorry, product not found";
        # code...
    } 
    break; 
    case "name-z-a" :
    $productList = $collection->find($searchCriteria)->sort(array("name" => -1));
    $productCount = $productList->count(); 
    if($productCount > 0 ) {
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
            <td><button>Add to Basket</button></td>
            </tr>";
            $row++;
        }
    } else{
        echo "Sorry, product not found";
        # code...
    } 
    
   

}

?>