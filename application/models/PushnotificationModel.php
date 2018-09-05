<?php
class PushnotificationModel extends CI_Model
	{
	function __construct()
		{
			parent::__construct();
			date_default_timezone_set('GMT');
		}
	function send_notifications($device_token, $message, $userData,$badge=null) 
		{
			$this->load->library('Apn');

			$this->apn->payloadMethod = 'enhance';
			$this->apn->connectToPush();
			$this->apn->setData(array(
				'someKey' => true
			));		
			$send_result = $this->apn->sendMessage($device_token, $message, (int)$badge, 'default', $ids = array(
				'message' 				=> $userData['message'],
				'order_id' 				=> $userData['title'],
				'arbaicMessage' 		=> $userData['arbaicMessage'],
				'type' 					=> $userData['type'],
				'vibrate' 				=> $userData['vibrate'],
				'sound' 				=> $userData['sound']
			));
			if ($send_result)
				{
					log_message('debug', 'Sending successful');
				}
			  else
				{
					print_r('error' . $this->apn->error);
					$this->apn->disconnectPush();
					print_r($send_result);
				}
		}
	
	function send_gcm($device_token, $message)
		{
			$this->load->library('gcm');
			$this->gcm->setMessage($message);
			$this->gcm->addRecepient($device_token);
			$this->gcm->setTtl(500);
			$this->gcm->setTtl(false);
			$this->gcm->setGroup('Test');
			$this->gcm->setGroup(false);
			$this->gcm->send();
				if ($this->gcm->send())
				{
					echo 'Success for all messages';
				}
				else
				{
					echo 'errors';
				}
			
		}
	}

?>