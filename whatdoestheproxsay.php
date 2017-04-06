<?php
//FoxyProx core functions
class ProxSays
{
	public function authServer($username, $password,  $server, $port)
	{
		$server_address = "https://".$server.":".$port;												//Generate Proxmox Server address (SSL is forced)
		$fields = array('username' => urlencode($username),'password' => urlencode($password),);	//Set username & password				
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; } 				//url-ify the data for the POST
		rtrim($fields_string, '&');							//Cut to size, size 34 jeans are a little big for me
		$ch = curl_init(); 									// Initiate curl
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_URL,$url);					// Set the url
		curl_setopt($ch,CURLOPT_POST, count($fields));		//Throw in some params
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);//What are the params
		$result=curl_exec($ch);								// Execute
		curl_close($ch);									// Closing
		var_dump(json_decode($result, true));				// Will dump a JSON
	}
	
}
?>