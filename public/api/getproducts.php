<?php
// readfile('data/getproducts.json');

require_once('mysqlconnect.php');

$query = "SELECT p.`id`, p.`name`, p.`price`,
        i.`url` AS `images`
    FROM `products` AS p
    JOIN `images` AS i
        ON p.`id` = i.`products_id`
    ORDER BY p.`id`
";

/* procedural */
$result = mysqli_query($conn, $query);

$data = [];
$images = [];

while($row = mysqli_fetch_assoc($result)){
    $currentID = $row['id'];
    if( isset($data[$currentID]) ){
        $image = $row['images'];
        $data[$currentID]['images'][] = $image;
    } else {
        $image = $row['images'];
        //delete is the same as splice in JS
        unset( $row['images'] );
        $row['images'][] = $image;

        $row['price'] = intval($row['price']);

        //when the id is the same as the previous id, add it to the same array
        $data[$currentID] = $row;
    }
}

//stripping away associative array keys to turn it back into a numeric array
$pureData = [];
foreach($data as $value){
    $pureData[] = $value;
}

$output = [
    'success' => true,
    'products'=> $pureData
];

$json_output = json_encode($output);

print($json_output);

?>