<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Order extends CI_Controller 
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('webservice/OrderModel');
			$this->load->model('Admin_dashboard');
			$this->load->database();
			$this->load->helper(array('form','url'));
			$this->load->library(array('form_validation','email'));
		}
		function index()
		{
			echo "i-washy";
		}
	
		function MakeOrder()
		{
			 $Image_name = array();
			 if(!empty($_FILES["order_image"]))
			 {
				 foreach($_FILES["order_image"]["tmp_name"] as $key=>$tmp_name)
				 {
					$file_name = $_FILES["order_image"]["name"][$key];
					$file_tmp  = $_FILES["order_image"]["tmp_name"][$key];
					$newFileName = time().rand(1, 1000000);
					move_uploaded_file($file_tmp=$_FILES["order_image"]["tmp_name"][$key],"uploads/order/".$newFileName);
					$Image_name[] = 'uploads/order/'.$newFileName;
				 }
			 }
			 $order_image = array(
			 		'order_image' => $Image_name,		
			 );
			
			 $data = array(
					'order_userId' 		=> $this->input->post('user_id'),
					'product_id' 		=> rtrim($this->input->post('product_id'),','),
					'product_quantity' 	=> rtrim($this->input->post('product_quantity'),','),
					'order_pickupDate' 	=> $this->input->post('order_pickupDate'), 
					'order_pickupTime' 	=> $this->input->post('order_pickupTime'), 
					'address_id' 		=> $this->input->post('address_id'), 
					'languageType' 		=> $this->input->post('languageType'),
					'order_promoCode' 	=> $this->input->post('promoCode'),
					'specialNote' 		=> $this->input->post('specialNote'),
					'total_amount' 		=> $this->input->post('total_amount')
					);
			$user_true = $this->OrderModel->check_user($data['order_userId']);
			if(!$user_true)
			{
						$result = array(
							'code' 		=> '204',
							'status' 	=> 'failure',
							'message'	=>"user not found"
						);
				 print_r(json_encode($result));	

			}
			else
			{
				$query 				= $this->OrderModel->MakeOrder($data,$order_image);
				$query_order_id 	= $query;
				$queryss 			= $this->OrderModel->place_messagesss();
				$englishMessage 	= $queryss[0]['admin_place_message'];
				$arbicMessage   	= $queryss[0]['adminPlaceMessage'];
				$Emaildata 			= $this->Admin_dashboard->fetchOrderByid($query_order_id);
			
				if($query)
				{
					
					$user_emails 	= $this->Admin_dashboard->get_admin_mobile_no();
					$user_email 	= $user_emails[0]['email'];
					$subject 		= "i-washy order";
					$to 			= $user_email;				
		            $from    		= "testdemo198@gmail.com";
		            $message 		= "You have a New order order id ".$query_order_id."";
					$headers  		= "MIME-Version: 1.0" . "\r\n";
					$headers 	   .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$headers 	   .= 'From: $from' . "\r\n";
		        	 @mail('sanyam.singhal.php@a1professionals.info',$subject,$message,$headers);
		        	 mail('testeweb121@gmail.com',$subject,$message);
					if($data['languageType'] == 'English')
					{
						$message1 = $englishMessage;
					} 	
					else
					{
						$message1 = $arbicMessage;
					}		           
					$result = array(
						'code' 		=> '201',
						'status' 	=> 'success',
						'message'	=> $message1
					);
					print_r(json_encode($result));
				}
				else
				{
					$result = array(
						'code' 		=> '200',
						'status' 	=> 'failure',
						'message' 	=> 'Error Found.'
					);
					print_r(json_encode($result));		
				}
			}
		}
	
		function orderTracking()
		{	
			 $data = array(
					'order_id' 		=> $this->input->post('order_id')
					);
			$query = $this->OrderModel->orderTracking($data);
			if($query)
			{
				 $result = array(
							'code' 			=> '201',
							'status' 		=> 'success',
							'message'		=>'Order track successfully.',
							'arabicMessage' => 	'تتبع المسار بنجاح',
							'is_completed'	=> $query[0]['is_completed'],
							'data'			=>$query
						);
				 print_r(json_encode($result));
			}
			else
			{
				$result = array(
							'code' 		=> '200',
							'status' 	=> 'failure',
							'message' 	=> 'No order track.',
						);
				print_r(json_encode($result));		
			}
		}
	
		function FetchOrder()
		{ 
			$data = array(
				'user_id' 		=> $this->input->post('user_id')
			);
			
			$user_true = $this->OrderModel->check_user($data['user_id']);
			if(!$user_true)
			{
						$result = array(
							'code' 		=> '204',
							'status' 	=> 'failure',
							'message'	=>"user not found"
						);
				 print_r(json_encode($result));	

			}
			else
			{
				$query = $this->OrderModel->FetchOrder($data);//
				if($query)
				{
					 $result = array(
								'code' 			=> '201',
								'status' 		=> 'success',
								'arabicMessage' => 	'تم العثور على الطلب بنجاح',
								'message'		=>'Order found successfully.',
								'data'			=>$query
							);
					 print_r(json_encode($result));
				}
				else
				{
					$result = array(
								'code' 		=> '200',
								'status' 	=> 'failure',
								'arabicMessage' => 	'لم يتم العثور على الطلب',
								'message' 	=> 'Order not found successfully.',
							);
					print_r(json_encode($result));		
				}
			}
		}
}