<?php
class UserRegister extends CI_Model

	{
	function registers($data)
		{
		$this->db->select('email');
		$this->db->from('user');
		$this->db->where('user.email', $data['email']);
		$result = $this->db->get();
		if ($result->num_rows())
			{
			return false;
			}
		  else
			{
			$this->db->insert('user', $data);
			$ids = $this->db->insert_id();
			$date = date('m/d/Y');
			$this->db->select('*');
			$this->db->from('user_promoCode');
			$this->db->where('promo_type', 'public');
			$this->db->group_by('promoCode');
			$query = $this->db->get();
			$dataProduct = $query->result_array();
			foreach($dataProduct as $dp)
				{
				$datas = array(
					'pc_assignTo' => $ids,
					'promo_discount' => $dp['promo_discount'],
					'promoCode' => $dp['promoCode'],
					'expireDate' => $dp['expireDate'],
					'promo_type' => 'public'
				);
				$this->db->insert('user_promoCode', $datas);
				}

			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('user.user_id', $ids);
			$result = $this->db->get();
			return $result->result_array();
			}
		}

	function login($data)
	{

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email',$data['email']);
		$query     = $this->db->get();
		$post_data =  $query->result_array();
	
		if (!empty($post_data)) {

			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('email',$data['email']);
			$this->db->where('password',$data['password']);
			$query     = $this->db->get();
			$loginData =  $query->result_array();
			if (!empty($loginData)) 
			{
				return $loginData;
			}
			else
			{
				return "NotExit";
			}
		}
		else
		{
			return "wrong";
		}
	}

	function editAddress($data)
		{
		$array_data = array(
			'street_address' => $data['street_address'],
			'bulding_number' => $data['bulding_number'],
			'floor_number' => $data['floor_number'],
			'flat_number' => $data['flat_number'],
			'selected_addressId' => $data['selected_addressId']
		);
		$where = array(
			'address_userId' => $data['address_userId'],
			'userAddress_id' => $data['userAddress_id']
		);
		$this->db->select('*');
		$this->db->from('user_adderss');
		$this->db->where($where);
		$result = $this->db->get();
		if ($result->num_rows())
			{
			$this->db->select('*');
			$this->db->from('user_adderss');
			$this->db->where($where);
			$this->db->update('user_adderss', $array_data);
			return true;
			}
		  else
			{
			return false;
			}
		}

	function forget_password($data)
		{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user.email', $data['email']);
		$result = $this->db->get();
		if ($result->num_rows())
			{
			return $result->result_array();
			}
		  else
			{
			return false;
			}
		}

	function forget_password_update($finale_rand, $to)
		{
		$array_data = array(
			'password' => $finale_rand
		);
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $to);
		$this->db->update('user', $array_data);
		return true;
		}

	function get_admin_no()
		{
		$this->db->select('contact_no');
		$this->db->from('admin_user');
		$result = $this->db->get();
		if ($result->num_rows())
			{
			return $result->result_array();
			}
		  else
			{
			return false;
			}
		}

	function change_password($data)
		{
		$whare = array(
			'user_id' => $data['userId'],
			'password' => $data['oldPassword']
		);
		$data = array(
			'password' => $data['newPassword']
		);
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($whare);
		$result = $this->db->get();
		if ($result->num_rows())
			{
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where($whare);
			$this->db->update('user', $data);
			return true;
			}
		  else
			{
			return false;
			}
		}

	function edit_profile($data)
		{
		$whare = array(
			'user_id' => $data['user_id']
		);
		if (isset($data['profile_image']))
			{
			$data = array(
				'name' => $data['name'],
				'mobile' => $data['mobile'],
				'profile_image' => $data['profile_image']
			);
			}
		  else
			{
			$data = array(
				'name' => $data['name'],
				'mobile' => $data['mobile']
			);
			}

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($whare);
		$result = $this->db->get();
		if ($result->num_rows())
			{
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where($whare);
			$this->db->update('user', $data);
			$this->db->select('');
			$this->db->from('user');
			$this->db->where($whare);
			$result = $this->db->get();
			return $result->result_array();
			}
		  else
			{
			return false;
			}
		}

	function contacttoadmin($data)
		{
		date_default_timezone_set("Africa/Cairo");
		$curr_date = date("Y-m-d G:i:s");
		$data = array(
			'c_user_id' => $data['userId'],
			'message' => $data['message'],
			'user_cur_date_time' => $curr_date
		);
		if ($data['c_user_id'] != '')
			{
			$this->db->insert('contact_to_admin', $data);
			return true;
			}
		  else
			{
			return false;
			}
		}

	function slider_image($data)
		{
		$datas = array(
			'profile_image' => $data
		);
		$this->db->insert('slider_image', $datas);
		$ids = $this->db->insert_id();
		$this->db->select('profile_image');
		$this->db->from('slider_image');
		$this->db->order_by("Id", "DESC");
		$this->db->limit('5');
		$result = $this->db->get();
		$finaldata = $result->result_array();
		return $finaldata;
		}

	function products_api($data)
		{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($whare);
		$result = $this->db->get();
		}

	function getsubaddress()
		{
		$querys = $this->db->query("SELECT DISTINCT city,city_name,cityNameArabic FROM admin_adderss inner join static_city on static_city.AI_cityId = admin_adderss.city");
		$datas = $querys->result_array();
		if (!empty($datas))
			{
			foreach($datas as $zip)
				{
				$number = $zip['city'];
				$whare = array(
					'city' => $number
				);
				$this->db->select('adminAddress_id, city, area,areaArabic, times,pickup_date');
				$this->db->from('admin_adderss');
				$this->db->where($whare);
				$this->db->group_by('area');
				$result = $this->db->get();
				$data = $result->result_array();
				$zip['area'] = $data;
				$all[] = $zip;
				}

			return $all;
			}
		  else
			{
			return false;
			}
		}

	function getproductdetail($data)
		{
		$this->db->select('a.*,d.price,d.pickup_time,sc.sub_Category');
		$this->db->from('admin_adderss a');
		$this->db->join('dsshboard d', 'd.location_Id = a.adminAddress_id', 'inner');
		$this->db->join('sub_category sc', 'sc.categoryId = d.category_id', 'left');
		$result = $this->db->get();
		$data = $result->result_array();
		return $data;
		}

	function userareadetail()
		{
		$this->db->select('adminAddress_id as id,city');
		$this->db->from('admin_adderss');
		$result = $this->db->get();
		$data = $result->result_array();
		return $data;
		}

	function getaddress($data)
		{
		$user_id = $data['user_id'];
		$this->db->select('*');
		$this->db->from('user_adderss ua');
		$this->db->join('admin_adderss au', 'au.adminAddress_id = ua.selected_addressId');
		$this->db->join('static_city scCt', 'scCt.AI_cityId = au.city');
		$this->db->where('address_userId', $user_id);
		$this->db->where('user_adderss_status', '0');
		$result = $this->db->get();
		$data = $result->result_array();
		return $data;
		}

	function getnotification($data)
		{
		$this->db->select('*');
		$this->db->from('notification');
		$this->db->where('noti_user_id', $data);
		$this->db->order_by("notification_Id", "DESC");
		$result = $this->db->get();
		return $result->result_array();
		}

	function deletenotification($data)
		{
			$this->db->select('*');
			$this->db->from('notification');
			$this->db->where('notification_Id', $data);
			$result = $this->db->get();
			if ($result->num_rows())
				{
					$test = array(
						'notification_Id' => $data
					);
					$this->db->delete('notification', $test);
					return true;
				}
			  else
				{
				return false;
				}
		}
	function userLanguage($data)
		{
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('user.user_id', $data['userId']);
			$result = $this->db->get();
			$da =  $result->result_array();
			if (!empty($da)) 
			{
				$userId 		= $data['userId'];
				$languageType 	= $data['languageType'];

				$this->db->where('user_id',$userId);
				$this->db->update('user',array(
										"selectedLanguage" => $languageType 
									));
				return true;		
			}
			else
			{
				return false;
			}				
		}	
	}
