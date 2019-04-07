<?php
require_once('config.php');

require_once('functions.php');

set_exception_handler('handleError');

require_once('mysqlconnect.php');

$query = "SELECT p.`id`, p.`name`, p.`price`,
		i.`url` AS `images`
	FROM `products` AS p
	JOIN `images` AS i
		ON p.`id` = i.`products_id`
	ORDER BY p.`id`
";

/*procedural*/
$result = mysqli_query($conn, $query);

if(!$result){
	throw new Exception('invalid query: '. mysqli_error($conn));
}

$data = [];

while($row = mysqli_fetch_assoc($result)){
	$currentID = $row['id'];
	$currentID = intval($currentID);
	$image = $row['images'];
	if( isset( $data[$currentID] ) ){
		$data[$currentID]['images'][] = $image; //new push way
	} else {
		unset($row['images']);
		$row['images'] = [];
		$row['images'][] = $image;
		$row['price'] = intval($row['price']);
		$data[$currentID] = $row;	
	}
}

$pureData = [];
foreach($data as $value){
	$pureData[] = $value;
}

$output = [
	'success'=>true,
	'products'=> $pureData
];

$json_output = json_encode( $output );

print( $json_output );

?>




