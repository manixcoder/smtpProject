<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('webservice/AuthModel');
		$this->load->model('webservice/OrderModel');
		$this->load->database();
		$this->load->helper(array('form','url'));
		$this->load->library(array('form_validation','email'));
	}
	function index()
	{
		echo "i-washy";
	}	
	function homeSlideImage()
	{
		$query = $this->AuthModel->homeSlideImage();
		foreach ($query as $data_result)
		{
			$data_result_Id = $data_result['Id'];
			$data_result_slider_image = $data_result['slider_image'];
			$string_slider_image = str_replace(' ', '_', $data_result_slider_image);
			$data[] = array('Id'=>$data_result_Id,'slider_image'=>$string_slider_image);
		}
		if($query)
		{
			 $result = array(
						'code' 		=> '201',
						'status' 	=> 'success',
						'message' 	=> 'Images found successfully.',
						'arabicMessage' => 'تم العثور على الصور بنجاح',
						'data'		=> $data
					);
			 print_r(json_encode($result));
		}
		else
		{
			$result = array(
						'code' 		=> '200',
						'status' 	=> 'failure',
						'arabicMessage' => 'لم يتم العثور على الصور',
						'message' 	=> 'Images not found successfully.'
					);
			print_r(json_encode($result));		
		}
	}
	function FetchProductCategory() 
	{
		$data = array(
			'area_id' 	  => $this->input->post('area_id')
		);		
		 $query = $this->AuthModel->FetchProductCategory($data);
		if($query)
		{
			 $result = array(
						'code' 		=> '201',
						'status' 	=> 'success',
						'message' 	=> 'Services found successfully.',
						'arabicMessage' => 'تم العثور على الخدمات بنجاح',
						'data'		=> $query
					);
			 print_r(json_encode($result));
		}
		else
		{
			$result = array(
						'code' => '200',
						'status' => 'failure',
						'arabicMessage' => 'لم يتم العثور على الخدمات',
						'message' => 'Services not found successfully.'
					);
			print_r(json_encode($result));		
		}
	}	
	function addAddress()
	{ 
		 $data = array(
				'selected_addressId'  => $this->input->post('area_id') ,
				'street_address' 	  => $this->input->post('street_address'), 
				'bulding_number' 	  => $this->input->post('bulding_number'),
				'floor_number' 		  => $this->input->post('floor_number'),
				'flat_number' 		  => $this->input->post('flat_number'),
				'address_userId' 	  => $this->input->post('user_id')  # login user
			);
		$user_true = $this->OrderModel->check_user($data['address_userId']);
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
				$query = $this->AuthModel->addAddress($data);
				if($query)
					{
						$result = array(
							'code' 			=> '201',
							'status' 		=> 'success',
							'arabicMessage' =>  'تمت إضافة العنوان بنجاح',
							'message' 		=> 'Address added successfully.'
						);
						print_r(json_encode($result));
					}
					else
					{
							$result = array(
								'code' => '200',
								'status' => 'failure',
								'arabicMessage' =>  'لميتم إضافة العنوان',
								'message' => 'Address not added successfully.'
							);
							print_r(json_encode($result));
					}
		}
	}
	
	function deleteAddress()
	{ 
		  $data = array(
				'address_id' 	  => $this->input->post('address_id')
				);
			$query = $this->AuthModel->deleteAddress($data);
		if($query)
		{
			 $result = array(
						'code' => '201',
						'status' => 'success',
						'arabicMessage' =>  'تم حذف العنوان',
						'message' => 'Address deleted successfully.'
					);
			 print_r(json_encode($result));
		}
		else
		{
			$result = array(
						'code' => '200',
						'status' => 'failure',
						'message' => 'Address not found.'
					);
			print_r(json_encode($result));		
		}	
	}
	
	function addRating()
	{
		date_default_timezone_set("Africa/Cairo");
		$curr_date = date("Y-m-d G:i:s");
		  $data = array(
				'rarting_byId' 	=> $this->input->post('user_id'),
				'ratingComment' => $this->input->post('ratingComment'),
				'appRating' 	=> $this->input->post('appRating'),
				'current_date_time' 	=> $curr_date
				);
			$user_true = $this->OrderModel->check_user($data['rarting_byId']);
		if(!$user_true)
		{
					$result = array(
						'code' 		=> '204',
						'status' 	=> 'failure',
						'message'	=>"user not found"
					);
			 print_r(json_encode($result));	

		}else{
			$query = $this->AuthModel->addRating($data);
		if($query)
		{
			 $result = array(
						'code' => '201',
						'status' => 'success',
						'message' => 'Your Rating has been sent successfully.',
						'arabicMessage' => 	'تم إرسال تقييمك بنجاح',
						'data' => 'Your Rating has been sent successfully.'
					);
			 print_r(json_encode($result));
		}
		else
		{
			$result = array(
						'code' => '200',
						'status' => 'failure',						
						'message' => 'Your Rating has not been sent successfully.'
					);
			print_r(json_encode($result));		
		}
		}
	}
	
	function fetchPromoCode()
	{
		 $data = array(
				'user_id' 	=> $this->input->post('user_id')
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
		$query = $this->AuthModel->fetchPromoCode($data);
		if($query)
		{
			 $result = array(
						'code' 		=> '201',
						'status' 	=> 'success',
						'message'	=>'Promo Code found successfully.',
						'arabicMessage' => 	'تم العثور على الرمز الترويجي بنجاح',
						'data'		=> $query
						
					);
			 print_r(json_encode($result));
		}
		else
		{
			$result = array(
						'code' => '200',
						'status' => 'failure',
						'message' => 'Promo Code not found successfully.'
					);
			print_r(json_encode($result));		
		}
		}
	}
	
	function apply_promocode()
	{
		 $data = array(
				'rarting_byId' 	=> $this->input->post('user_id'),
				'promoCode' 	=> $this->input->post('promoCode')
				);
		$user_true = $this->OrderModel->check_user($data['rarting_byId']);
		if(!$user_true)
		{
					$result = array(
						'code' 		=> '204',
						'status' 	=> 'failure',
						'message'	=>"user not found"
					);
			 print_r(json_encode($result));	

		}else{
		$query = $this->AuthModel->apply_promocode($data);
		if($query == "expired")
		{
			 $result = array(
						'code' 		=> '200',
						'status' 	=> 'failure',
						'message' 		=> 'Promocode is expired which you used.',
						'arabicMessage' => 	'انتهت صلاحية الرمز الترويجي الذي استخدمته'  
						
					);
			 print_r(json_encode($result));
		}
		else if($query == "used")
		{
			$result = array(
						'code' => '200',
						'status' => 'failure',
						'message' => 'Enter Promocode is already used.'
					);
			print_r(json_encode($result));		
		}

		else if($query == "not")
		{
			$result = array(
						'code' => '200',
						'status' => 'failure',
						'message' => 'Promocode not found.',
						'arabicMessage' => 	'الرمز الترويجي غير موجود'
					);
			print_r(json_encode($result));		
		}		
		else
		{
			$result = array(
						'code' 		=> '201',
						'status' 	=> 'success',
						'message' 	=> 'Promocode applied successfully.',
						'arabicMessage' => 	'تم تطبيق الرمز الترويجي بنجاح',
						'discount'		=> $query
					);
			print_r(json_encode($result));		
		}
		}
	}
	
	function getDateTime()
	{
		
		$data = array(
			'city_id' 	=> $this->input->post('city_id'),
			'area_name' 	=> $this->input->post('area_name')
		);
		$query = $this->AuthModel->getDateTime($data);
		foreach($query as $result)
		{
			$time_fir12 = $result['time_from'];
			$time_sec12 = $result['time_to'];
			$time_fir = date("h:i a", strtotime($time_fir12));
			$time_sec = date("h:i a", strtotime($time_sec12));
			$final_result[] = array('times'=>$time_fir." to ".$time_sec); 
		}
		if($query)
		{
			 $result = array(
						'code' 		=> '201',
						'status' 	=> 'success',
						'arabicMessage' => 	'تم العثورعلى التاريخ والوقت بنجاح',
						'message'	=>'Date & Time found successfully.',
						'data'		=>$final_result
					);
			 print_r(json_encode($result));
		}
		else
		{
			$result = array(
						'code' 		=> '200',
						'status' 	=> 'failure',
						'message' 	=> 'Date & Time not found.',
					);
			print_r(json_encode($result));		
		}
	}
}