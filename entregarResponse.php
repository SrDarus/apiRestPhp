
<?php 

	function entregarResponse($status, $status_messaje, $data){

		header("HTTP/1.1 $status $status_messaje");

		$response['status'] = $status; 
		$response['status_messaje'] = $status_messaje;
		$response['data'] = $data;

		$json_response = json_encode($response);
		echo $json_response;

	}
 ?>