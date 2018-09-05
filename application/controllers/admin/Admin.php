<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('UserRegister');
			$this->load->model('webservice/OrderModel');
			$this->load->database();
			$this->load->helper(array('form','url','captcha'));
			$this->load->library(array('session','form_validation','email'));
		}
		function index()
		{
			echo 'hello my world';
		}
		function editAddress()
		{
			$data = array(
				'userAddress_id' 	 => $this->input->post('userAddress_id') ,
				'selected_addressId' => $this->input->post('area_id') ,
				'street_address' 	 => $this->input->post('street_address') ,
				'bulding_number' 	 => $this->input->post('bulding_number') ,
				'floor_number' 		 => $this->input->post('floor_number') ,
				'flat_number'  	 	 => $this->input->post('flat_number') ,
				'address_userId' 	 => $this->input->post('user_id') // login user
			);
			$user_true = $this->OrderModel->check_user($data['address_userId']);
			if (!$user_true)
				{
					$result = array(
						'code' => '204',
						'status' => 'failure',
						'message' => "user not found"
					);
					print_r(json_encode($result));
				}
				else
				{
					$query = $this->UserRegister->editAddress($data);
					if ($query)
						{
							$result = array(
								'code' => '201',
								'status' => 'success',
								'arabicMessage' => 	'تم تحديث العنوان بنجاح',
								'message' => "Address has been updated successfully."
							);
						}
						else
						{
							$result = array(
								'code' => '200',
								'status' => 'failure',
								'message' => "Address not updated successfully"
							);
						}
						print_r(json_encode($result));
				}
		}
		function do_upload()
		{
			if (!isset($_FILES["profile_image"]["name"]))
				{
					$profile_image = 'noprifile.png';
				}
				else
				{
					$profile_image = $_FILES["profile_image"]["name"];
				}
				$data = array(
					'name' => $this->input->post('name') ,
					'email' => $this->input->post('email') ,
					'mobile' => $this->input->post('mobile') ,
					'password' => $this->input->post('password') ,
					'username' => $this->input->post('username') ,
					'device_type' => $this->input->post('device_type') ,
					'device_token' => $this->input->post('device_token') ,
					'profile_image' => 'uploads/userProfile/' . $profile_image
				);
				if (isset($_FILES["profile_image"]["name"]) && $_FILES["profile_image"]["name"] != "")
					{
						$config['upload_path'] = './uploads/userProfile/';
						$config['allowed_types'] = '*';
						$config['max_size'] = '100';
						$config['max_width']  = '1024';
						$config['max_height']  = '768';
						$config['overwrite'] = TRUE;
						$config['encrypt_name'] = FALSE;
						$config['remove_spaces'] = TRUE;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						$upload_data = $this->upload->do_upload('profile_image');
					}
					$query = $this->UserRegister->registers($data);
					if ($query)
						{
							$result = array(
								'code' => '201',
								'status' => 'success',
								'message' => "Register successfully.",
								'user_id' => $query[0]['user_id'],
								'name' => $query[0]['name'],
								'email' => $query[0]['email'],
								'mobile' => $query[0]['mobile'],
								'username' => $query[0]['username'],
								'profile_image' => $query[0]['profile_image']
							);
						}
						else
						{
							$result = array(
								'code' => '200',
								'status' => 'failure',
								'arabicMessage' => 	'البريد الإلكتروني موجود بالفعل',
								'message' => "email already exist."
							);
						}
						print_r(json_encode($result));
		}
		function login()
		{
			$data = array(
				'email' 		=> $this->input->post('email') ,
				'password' 		=> $this->input->post('password') ,
				'device_type' 	=> $this->input->post('device_type') ,
				'device_token' 	=> $this->input->post('device_token')
			);
			$query = $this->UserRegister->login($data);
			if ($query == 'NotExit')
				{
					$result = array(
						'code' 			=> '200',
						'status' 		=> 'failure',
						'arabicMessage' => 	'كلمة السر ليست جيدة',
						'message' 		=>  "Password not match."
					);
				}
				else if ($query == 'wrong')
				{
					$result = array(
						'code' 			=> '200',
						'status' 		=> 'failure',
						'arabicMessage' => 	'هذا البريد ليس لديه حساب',
						'message' 		=>  "This mail dont have account."
					);
				}
				else
				{
					$result = array(
						'code' 			=> '201',
						'status' 		=> 'success',
						'message' 		=> "Login successfully.",
						'arabicMessage' => 	'تسجيل الدخول',
						'user_id' 		=> $query[0]['user_id'],
						'name' 			=> $query[0]['name'],
						'username' 		=> $query[0]['username'],
						'email' 		=> $query[0]['email'],
						'mobile' 		=> $query[0]['mobile'],
						'profile_image' => $query[0]['profile_image']
					);
				}
				print_r(json_encode($result));
		}
		function forget_password()
		{
			$this->load->library('mailclass');
			$data = $this->input->post();
			$query = $this->UserRegister->forget_password($data);
			$user_email = $query[0]['email'];
			$user_password = $query[0]['password'];
			$name = $query[0]['name'];
			$subject ="Forgot Password";
			if ($query)
				{
					$user_mail = $user_email;
					//$message = "your i-washy password is :".$user_password;
					$message = '<html>
						   <body style="background-color:#F4F4F4;">
							  <table style="max-width:500px;min-width:500px;margin:0 auto;background-color:#fff;text-align:center;">
								 <tr>
									<td style="color:#696969;font-family:open sans;font-size:14px;padding:7px 0;text-align:left;
									   padding-left:20px;padding-right:20px;padding-top:40px;">
									   Dear '.$name.'
									</td>
								 </tr>
								 <tr>
									<td style="color:#696969;font-family:open sans;font-size:14px;padding:7px 0;
									   text-align:left;padding-left:20px;padding-right:20px;line-height:24px;">
									   You have requested the new password.
									</td>
								 </tr>
								 <tr>
									<td style="color:#696969;font-family:open sans;font-size:14px;padding:30px 0;
									   text-align:left;padding-left:20px;padding-right:20px;">
									   Please use this password for login: ' . $user_password . '
									</td>
								 </tr>
								 <tr>
									<td style="color:#696969;font-family:open sans;font-size:14px;padding:0;
									   text-align:left;padding-left:20px;padding-right:20px;">
									   Regards
									</td>
								 </tr>
								 <tr>
									<td style="color:#23A8E0;font-family:open sans;font-size:14px;padding:0;
									   text-align:left;padding-left:20px;padding-right:20px;padding-bottom:40px;">
									   i-washy Team
									</td>
								 </tr>
							  </table>
						   </body>
						</html>';
					$data = $this->mailclass->some_method($user_mail, $message,$subject);
					$result = array(
						'code' 			=> '201',
						'status' 		=> 'success',
						'arabicMessage' => 	'تمالإرسالإلي البريد الإلكتروني',
						'message' 		=> 'Email sent successfully.'
					);
				}
				else
				{
					$result = array(
						'code' 			=> '200',
						'status' 		=> 'failure',
						'arabicMessage' => 	'هذا الميل غير مسجل',
						'message' 		=> "This mail not saved"
					);
				}
				print_r(json_encode($result));
			}
			function image_get()
			{
				echo base_url() . '/uploads/userProfile/download.JPEG';
			}
			function get_admin_no()
			{
				$query = $this->UserRegister->get_admin_no();
				if ($query)
					{
						$result = array(
							'code' => '201',
							'status' => 'success',
							'message' => 'mobile no',
							'data' => $query[0]['contact_no']
						);
					}
					else
					{
						$result = array(
							'code' => '200',
							'status' => 'failure',
							'message' => 'Mobile number not found'
						);
					}
					print_r(json_encode($result));
		}
		function change_password()
		{
			$data = $this->input->post();
			$query = $this->UserRegister->change_password($data);
			if ($query)
				{
					$result = array(
						'code' => '201',
						'status' => 'success',
						'arabicMessage' => 	'سيتم تغيير كلمة المرور الخاصة بك',
						'message' 		=> 'Your password will be changed.'
					);
					print_r(json_encode($result));
				}
				else
				{
					$result = array(
						'code' => '200',
						'status' => 'failure',
						'arabicMessage' => 	'كلمة المرور القديمة غير متطابقة',
						'message' => 'Your old password does not match.'
					);
					print_r(json_encode($result));
				}
		}
		function edit_profile()
		{
			$user_true = $this->OrderModel->check_user($this->input->post('user_id'));
			if (!$user_true)
				{
					$result = array(
						'code' => '204',
						'status' => 'failure',
						'message' => "user not found"
					);
					print_r(json_encode($result));
				}
				else
				{
					if (!isset($_FILES["profile_image"]["name"]))
						{
							$profile_image = 'noprifile.png';
						}
						else
						{
							$profile_image = $_FILES["profile_image"]["name"];
							$config['upload_path'] = './uploads/userProfile/';
							$config['allowed_types'] = 'gif|jpg|png|jpeg';
							$config['max_size'] = '10000';
							$config['max_width'] = '102400';
							$config['max_height'] = '76800';
							$config['overwrite'] = TRUE;
							$config['encrypt_name'] = FALSE;
							$config['remove_spaces'] = TRUE;
							$this->load->library('upload', $config);
							$this->upload->initialize($config);
							$upload_data = $this->upload->do_upload('profile_image');
						}
						if (isset($_FILES["profile_image"]["name"]))
							{
								$data = array(
									'user_id' => $this->input->post('user_id') ,
									'name' => $this->input->post('name') ,
									'mobile' => $this->input->post('mobile') ,
									'profile_image' => 'uploads/userProfile/' . $profile_image
								);
							}
							else
							{
								$data = array(
									'user_id' => $this->input->post('user_id') ,
									'name' => $this->input->post('name') ,
									'mobile' => $this->input->post('mobile')
								);
							}
							$query = $this->UserRegister->edit_profile($data);
							if ($query)
								{
									$result = array(
										'code' => '201',
										'status' => 'success',
										'message' => 'Your profile has been updated successfully.',
										'arabicMessage' => 	'تم تحديث ملفك الشخصي بنجاح',
										'user_id' => $query[0]['user_id'],
										'name' => $query[0]['name'],
										'mobile' => $query[0]['mobile'],
										'profile_image' => $query[0]['profile_image']
									);
								}
								else
								{
									$result = array(
										'code' => '200',
										'status' => 'failure',
										'message' => 'Your profile has not been updated successfully'
									);
								}
								print_r(json_encode($result));
				}
		}
		function homepage()
		{
			echo 'hello';
		}
		function contacttoadmin()
		{
			$data = $this->input->post();
			$userId = $this->input->post('userId');
			$user_true = $this->OrderModel->check_user($userId);
			if (!$user_true)
				{
					$result = array(
						'code' => '204',
						'status' => 'failure',
						'message' => "User not found"
					);
					print_r(json_encode($result));
				}
				else
				{
					$query = $this->UserRegister->contacttoadmin($data);
					if (!$query)
						{
							$result = array(
								'code' => '200',
								'status' => 'failure',
								'message' => 'Your message has not been sent to admin'
							);
						}
						else
						{
							$result = array(
								'code' => '201',
								'status' => 'success',
								'arabicMessage' => 	'تم إرسال رسالتك إلى المسؤول',
								'message' => 'Your message has been sent to admin.'
							);
						}
						print_r(json_encode($result));
				}
		}
		function slider_image()
		{
			if (isset($_FILES["profile_image"]["name"]) && $_FILES["profile_image"]["name"] != "")
				{
					$config['upload_path'] = './uploads/slider_image/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = '100000';
					$config['max_width'] = '102400';
					$config['max_height'] = '76800';
					$config['overwrite'] = TRUE;
					$config['encrypt_name'] = FALSE;
					$config['remove_spaces'] = TRUE;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$upload_data = $this->upload->do_upload('profile_image');
				}
				if (isset($_FILES["profile_image"]["name"]))
					{
						$data = "/uploads/slider_image/" . $_FILES["profile_image"]["name"];
						$query = $this->UserRegister->slider_image($data);
						if ($query)
							{
								$result = array(
									'code' => '201',
									'status' => 'success',
									'image1' => $query[0]['profile_image'],
									'image2' => $query[1]['profile_image'],
									'image3' => $query[2]['profile_image'],
									'image4' => $query[3]['profile_image'],
									'image5' => $query[4]['profile_image']
								);
							}
							else
							{
								$result = array(
									'code' => '200',
									'status' => 'failure',
									'message' => 'no pfofile'
								);
							}
							print_r(json_encode($result));
						}
		}
		function products_api()
		{
			$data = $this->input->post();
			$query = $this->UserRegister->products_api($data);
		}
		function getsubaddres()
		{
			$query = $this->UserRegister->getsubaddress();
			if (!empty($query))
				{
					$result = array(
						'code' => '201',
						'status' => 'success',
						'data' => $query
					);
				}
				else
				{
					$result = array(
						'code' => '200',
						'status' => 'failure',
						'message' => 'no address found successfully'
					);
				}
				print_r(json_encode($result));
		}
		function getproductdetail()
		{
			$data = $this->input->post();
			$query = $this->UserRegister->getproductdetail($data);
			if (!empty($query))
				{
					$result = array(
						'code' => '201',
						'status' => 'success',
						'data' => $query
					);
				}
				else
				{
					$result = array(
						'code' => '200',
						'status' => 'failure',
						'message' => 'no product found successfully'
					);
				}
				print_r(json_encode($result));
		}
		function userareadetail()
		{
			$query = $this->UserRegister->userareadetail();
			if (!empty($query))
				{
					$result = array(
						'code' => '201',
						'status' => 'success',
						'data' => $query
					);
				}
				else
				{
					$result = array(
						'code' => '200',
						'status' => 'failure',
						'message' => 'no data'
					);
				}
				print_r(json_encode($result));
		}
		function getaddress()
		{
			$data = $this->input->post();
			$user_id = $this->input->post('user_id');
			$user_true = $this->OrderModel->check_user($user_id);
			if (!$user_true)
				{
					$result = array(
						'code' => '204',
						'status' => 'failure',
						'message' => "user not found"
					);
					print_r(json_encode($result));
				}
				else
				{
					$query = $this->UserRegister->getaddress($data);
					if (!empty($query))
						{
							$result = array(
								'code' => '201',
								'status' => 'success',
								'arabicMessage' => 	'تم العثور على العنوان بنجاح',
								'message' => 'Address found successfully.',
								'data' => $query
							);
						}
						else
						{
							$result = array(
								'code' => '200',
								'status' => 'failure',
								'message' => 'No address found successfully'
							);
						}
						print_r(json_encode($result));
				}
		}
		function getnotification()
		{
			$data = $this->input->post('userId');
			$user_true = $this->OrderModel->check_user($data);
			if (!$user_true)
				{
					$result = array(
						'code' => '204',
						'status' => 'failure',
						'message' => "user not found"
					);
					print_r(json_encode($result));
				}
				else
				{
					$query = $this->UserRegister->getnotification($data);
					if (!empty($query))
						{
							$result = array(
								'code' => '201',
								'status' => 'success',
								'message' => 'Notification found successfully.',
								'arabicMessage' => 	'تم العثور على الإشعار بنجاح',
								'data' => $query
							);
						}
						else
						{
							$result = array(
								'code' => '200',
								'status' => 'failure',
								'arabicMessage' => 	'لم يتم العثور على الإخطار بنجاح',
								'message' => 'Notification not found successfully'
							);
						}
						print_r(json_encode($result));
			}
	}
	function deletenotification()
	{
		$data = $this->input->post('notification_Id');
		$query = $this->UserRegister->deletenotification($data);
		if (!empty($query))
			{
				$result = array(
					'code' => '201',
					'status' => 'success',
					'arabicMessage' => 	'لم يتم العثور على الإخطار بنجاح',
					'message' => 'Notification delete successfully.'
				);
			}
			else
			{
				$result = array(
					'code' => '200',
					'status' => 'failure',
					'message' => 'notification not exit'
				);
			}
			print_r(json_encode($result));
		}
		function userLanguage()
		{
			$data = array(
				'userId' 		=> $this->input->post('loginUserid') ,
				'languageType' 	=> $this->input->post('languageType')
			);
			$query = $this->UserRegister->userLanguage($data);
			if ($query)
				{
					$result = array(
						'code' 		=> '201',
						'status' 	=> 'sucess',
						'message' 	=> "Language changed."
					);
					print_r(json_encode($result));
				}
				else
				{
					$result = array(
						'code' 		=> '200',
						'status' 	=> 'failure',
						'message' 	=> "language not changed."
					);
					print_r(json_encode($result));
				}
			}

	}

