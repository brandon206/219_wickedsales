<?php

if(!function_exists('handleError')){
	function handleError( $error ){
		$output = [
			'success'=>false,
			'error'=> $error->getMessage()
		];
		$json_output = json_encode($output);
		print($json_output);
	}
}

?>