<?php

class AuthModel extends CI_Model
{

	function __construct(){
			parent::__construct();		
			$this->load->model('webservice/CommonFormate');
	}
		
	function homeSlideImage()
	{
		 $this->db->select('*');
		 $this->db->from('slider_image');
		 $this->db->order_by("Id", "DESC");
		 $this->db->limit('5');
		 $result  = $this->db->get();
		 $finaldata = $result->result_array();
		 return $finaldata;
	}
	
	function FetchProductCategory($data)
	{
		 $area_id = $data['area_id'];
		 $this->db->select('*');
		 $this->db->from('Static_Category sac');
		 $result  = $this->db->get();
		 $address =  $result->result_array();
		 foreach($address as $cat)
		 {
			$subcat =  $this->CommonFormate->getSubcategary($cat['cat_id'],$area_id);
			 if($cat['cat_id'] == $subcat[0]['categoryId'])
			 {
				$cat['subcat'] = $subcat;
			 }
			 else
			 {
				 $cat['subcat'] = [];
			 }
			 $realdata[]=$cat;
			
		 }
		// print_r($realdata);

		 foreach ($realdata as $key => $value) 
		 {
		 	
		 	if(!empty($value['subcat'][0]))
		 	{
		 		$a = $value;
		 		$x[] = $a;
		 	}
		 	else
		 	{
		 		$b = $value;
		 	}
		 	
			
			
		 }
	//print_r($x);
		 return $x;
		 
	}
	
	
	function addAddress($data)
	{ 
		 $this->db->insert('user_adderss', $data);
		 return true;
	}
	
	function deleteAddress($data)
	{ 
		 
		
		$datas = array('user_adderss_status'=>'1');
		$this->db->select('*');
		$this->db->from('user_adderss');
		$this->db->where('userAddress_id',$data['address_id']);
		$this->db->update('user_adderss',$datas);
		 // $del=$this->db->delete('user_adderss'); 
		 return true;
	}
	function addRating($data)
	{
		$checkUser 		= $this->CommonFormate->checkUser($data['rarting_byId']);
		//print_r($checkUser);
		if($checkUser)
		{
			$this->db->insert('adminRating', $data);
			return true;
		}
		else
		{
			 return false;
		}
	}
	
	function fetchPromoCode($data)
	{
		 $date =  date('m/d/Y');
		 $this->db->select('*');
		 $this->db->from('user_promoCode');
		 // $this->db->where('is_deactive','0');
		 $this->db->where('pc_assignTo',$data['user_id']);
		 $this->db->where('expireDate >=',$date);
		 $this->db->order_by("promoCode_id", "DESC");
		 $result  = $this->db->get();
		 $results = $result->result_array();
		 $datesssss =  strtotime($date);
		 foreach($results as $data)
		 {
			$expireDates = strtotime($data['expireDate']);
			if($expireDates >= $datesssss)
			{
			$final_data[] = array('promoCode_id'=>$data['promoCode_id'],'pc_assignTo'=>$data['pc_assignTo'],'promoCode'=>$data['promoCode'],'promo_discount'=>$data['promo_discount'],'expireDate'=>$data['expireDate'],'is_deactive'=>$data['is_deactive'],'promo_type'=>$data['promo_type']);
			}
		 }
		 // print_r($results);
		 
		 return $final_data;
	}
	function apply_promocode($data)
	{
		// print_r($data);
		$checkPromo 		= $this->CommonFormate->checkPromo($data['rarting_byId'],$data['promoCode']);
		
		if($checkPromo)
		{
			 $date =  intval(strtotime(date('m/d/Y')));
			 $this->db->select('*');
			 $this->db->from('user_promoCode');
			 $this->db->where('pc_assignTo',$data['rarting_byId']);
			 $this->db->where('promoCode',$data['promoCode']);
			 // $this->db->where('is_deactive','0');
			 $result  = $this->db->get();
			 $deacData 	  =  $result->result_array();
			 $expireDate = intval(strtotime($deacData[0]['expireDate']));
			  if($expireDate < $date)
			  {
				 return "expired";
			  }else
			  {
					// $rarting_byId = $data['rarting_byId'];
				    // $promoCode = $data['promoCode'];
					// $data_array = array('pc_assignTo'=>$rarting_byId,'promoCode'=>$promoCode);
					// $datass = array('is_deactive'=>'1');
					// $this->db->select('*');
					// $this->db->from('user_promoCode');
					// $this->db->where($data_array);
					// $this->db->update('user_promoCode',$datass);
					return $checkPromo[0]['promo_discount'];
			  }
		}
		else
		{
			return "not";
		}
	}
	
	function getDateTime($data)
	{
		// $data['area_id'];
		 $this->db->select('au.time_from,au.time_to,au.pickup_date');
		 $this->db->from('static_city sit');
		 $this->db->join('admin_adderss au','au.city = sit.AI_cityId');
		 $this->db->where('city',$data['city_id']);
		 $this->db->where('area',$data['area_name']);
		 $this->db->or_where('areaArabic', $data['area_name']);
		 $this->db->order_by("au.time_from","asc");
		 $result  = $this->db->get();
		 return $result->result_array();
	}
}


