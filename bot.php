<?php
$access_token = 'YNQ5IhAh8gvZtOCrt+EfXlvUoqApL5KVARLEINs0P4kR+y9sj5i0+jgLq0y8xaJdQXq9EjBMU1EIXL/d0eipVQqCXVLOLBts64dn8KtRkK1ofWblS8LAHhNYqCwL2p2QdQjSWBctZP8Y968cNhwnTwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$msgPayload = $event['message']['text'];
			//$text = "Chatpeth Kenanan";
			if(strcmp(msgPayload, "Hi\r\n") == 0)
			{
				$text = "Hi";
			}
			else
			{
				$text = "Hello";
			}
			//$text = "Hello " . $event['message']['text'];
			
			
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
