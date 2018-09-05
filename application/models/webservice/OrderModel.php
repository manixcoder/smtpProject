<?php

class OrderModel extends CI_Model
{

	function __construct(){
			parent::__construct();
			date_default_timezone_set("Africa/Cairo");
			
			$this->load->model('webservice/CommonFormate');
	}

	function check_user($user_id)
	{
				$this->db->select('*');
				$this->db->from('user');
				$this->db->where('user_id',$user_id);
				$result  = $this->db->get();
				if($result->num_rows())
				{
					return true;
				}else
				{
					return false;
				}
	}
	
	function MakeOrder($data,$order_image)
	{
			$address_id = $data['address_id'];

			$this->db->select('*');
			$this->db->from('user_adderss');
			$this->db->where('userAddress_id',$address_id);
			$result  	= $this->db->get();
			$datas_categoryssss = $result->result_array();

			$selected_addressId_datas_categoryssss 	= $datas_categoryssss[0]['selected_addressId'];
			$selected_addressId_street_address 		= $datas_categoryssss[0]['street_address'];
			$selected_addressId_bulding_number 		= $datas_categoryssss[0]['bulding_number'];
			$selected_addressId_floor_number 		= $datas_categoryssss[0]['floor_number'];
			$selected_addressId_flat_number 		= $datas_categoryssss[0]['flat_number'];

			$this->db->select('area,city,areaArabic');
			$this->db->from('admin_adderss');
			$this->db->where('adminAddress_id',$selected_addressId_datas_categoryssss);
			$result  		= $this->db->get();
			$datas_areass 	= $result->result_array();

			if($data['languageType'] == "Arabic")
			{
				$datas_areassss   = $datas_areass[0]['areaArabic'];
			}
			else
			{
				$datas_areassss   = $datas_areass[0]['area'];
			}
			$datas_city 	= $datas_areass[0]['city'];
			
			$this->db->select('city_name,cityNameArabic');
			$this->db->from('static_city');
			$this->db->where('AI_cityId',$datas_city);
			$result  = $this->db->get();
			$datas_areass_city 	= $result->result_array();

			if($data['languageType'] == "Arabic")
			{
				$get_datas_areass_city   = $datas_areass_city[0]['cityNameArabic'];
			}
			else
			{
				$get_datas_areass_city   = $datas_areass_city[0]['city_name'];
			}
			
			$this->db->select('name,mobile');
			$this->db->from('user');
			$this->db->where('user_id',$data['order_userId']);
			$result  = $this->db->get();
			$datas_areass_cityss 		= $result->result_array();
			$get_datas_areass_name 		= $datas_areass_cityss[0]['name'];
			$get_datas_areass_mobile 	= $datas_areass_cityss[0]['mobile'];
			
			$product_id					= $data['product_id'];
			$order_promoCode			= $data['order_promoCode'];

			$this->db->select('promo_discount');
			$this->db->from('user_promoCode');
			$this->db->where('promoCode',$order_promoCode);
			$result  = $this->db->get();
			$orders_promoCodesss 	= $result->result_array();
			$orders_promoCode 		= $orders_promoCodesss[0]['promo_discount'];
		
		
		$product_id_array 			= explode(',',$product_id);
		foreach($product_id_array as $get_product_price_base)
		{
			$this->db->select('price');
			$this->db->from('dsshboard');
			$this->db->where('category_id',$get_product_price_base);
			$this->db->where('location_Id',$selected_addressId_datas_categoryssss);
			$result  = $this->db->get();
			$datas_category[] = $result->result_array();
			
			$this->db->select('sub_Category,category_image,categoryId,subCategoryArabic');
			$this->db->from('sub_category');
			$this->db->where('s_Id',$get_product_price_base);
			$result  = $this->db->get();
			$datas_category_sub_category[] = $result->result_array();
		}
		
		foreach($datas_category as $name_space_price)
		{
			$final_data_pr[] = $name_space_price[0]['price'];
			
		}
		foreach($datas_category_sub_category as $datas_category_sub_category)
		{
			$final_data_sub_Category[] 	= $datas_category_sub_category[0]['sub_Category'];
			$subCategoryArabic[] 		= $datas_category_sub_category[0]['subCategoryArabic'];
			$image_sub_Category[] 		= $datas_category_sub_category[0]['category_image'];
			$categoryId_sub_Category[] 	= $datas_category_sub_category[0]['categoryId'];
			
		}
			$product_id_array_price  = implode(',',$final_data_pr);
			$categoryId_sub_Category = implode(',',$categoryId_sub_Category);
			$product_id_sub_Category = implode(',',$final_data_sub_Category);
			$subCategoryArabic 		 = implode(',',$subCategoryArabic);
			$image_product_id 		 = implode(',',$image_sub_Category);
		if(empty($orders_promoCode))
		{
			$orders_promoCode = '';
		}
		if(empty($get_datas_areass_city))
		{
			$get_datas_areass_city = '';
		}
		if(empty($categoryId_sub_Category))
		{
			$categoryId_sub_Category = '';
		}
		if(empty($datas_areassss))
		{
			$datas_areassss = '';
		}
		if(empty($image_product_id))
		{
			$image_product_id = '';
		}
		if(empty($product_id_sub_Category))
		{
			$product_id_sub_Category = '';
		}
		if(empty($subCategoryArabic))
		{
			$subCategoryArabic = '';
		} ##
		if(empty($product_id_array_price))
		{
			$product_id_array_price = '';
		}
		$curr_date 		= date("Y-m-d G:i:s");
		$array_mergess 	= 	array(
		'base_price'				=>$product_id_array_price,
		'product_sub_Category'		=>$product_id_sub_Category,
		'productSubArbicCategory'	=>$subCategoryArabic,
		'product_image'			=>$image_product_id,
		'area'					=>$datas_areassss,
		'categoryId'			=>$categoryId_sub_Category,
		'city_name'				=>$get_datas_areass_city,
		'discount_promoCode'	=>$orders_promoCode,
		'current_date_time'		=>$curr_date,
		'user_name'				=>$get_datas_areass_name,
		'user_mobile'			=>$get_datas_areass_mobile,
		'user_adderss'			=>$selected_addressId_street_address,
		'user_bulding_number'	=>$selected_addressId_bulding_number,
		'user_floor_number'		=>$selected_addressId_floor_number,
		'user_flat_number'		=>$selected_addressId_flat_number
		);
		$data 		= array_merge($data,$array_mergess);
		$userId 	= $data['order_userId'];
		$promoCode	= $data['order_promoCode'];
		$checkUser 	= $this->CommonFormate->checkUser($userId);
		if(!empty($checkUser))
		{
			 $this->db->insert('user_order', $data);
			 $Oid = $this->db->insert_id();	 
			  foreach($order_image['order_image'] as $a )
			  {
				  $imgArr = array(
							'image_orderId' 	=> $Oid,
							'order_ImageName' 	=> $a ,
 							);
				 $this->db->insert('orderImage', $imgArr);
			  }
			  
			 if(!empty($promoCode))
			 {
				 $data=array('is_deactive' =>'1');
				 $this->db->where('pc_assignTo',$userId);
				 $this->db->where('promoCode',$promoCode);
				 $this->db->update('user_promoCode',$data);
			
			 }
			 return $Oid;
		}
		else
		{
			 return false;
		}
	}
	function orderTracking($data)
	{
		 $this->db->select('ot.*,uo.is_completed');
		 $this->db->from('user_order uo');
		 $this->db->join('orderTracking ot','ot.order_id = uo.order_id');
		 $this->db->where('uo.order_id',$data['order_id']);
		 $this->db->order_by("ot.tracking_id", "desc");
		 $result  	= $this->db->get();
		 $Trackdata = $result->result_array();
		 return  $Trackdata;
	}
	function FetchOrder($data)
	{
		 $checkorder 	= $this->CommonFormate->checkorder($data['user_id']);		 
		 foreach($checkorder as $check)
		 {
			 $this->db->select('*');
			 $this->db->from('orderImage uo');
			 $this->db->where('image_orderId',$check['order_id']);
			 $result  	= $this->db->get();
			 $Imadata   = $result->result_array();
			 
			 if(!empty($Imadata))
			 {
				 $check['orderImage']  =  $Imadata;
			 }
			 else
			 {
				 $check['orderImage']  =  [];
				
			 }
			 $all[] = $check;
		 }
		 return $all;
		 
	}
	public function place_messagesss()
	{
			$this->db->select('*');
			$this->db->from('place_message');
			$result  = $this->db->get();
			return $result->result_array();
	}
	
}