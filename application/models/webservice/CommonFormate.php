<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class CommonFormate extends CI_Model 
	{
		function __construct()
		{
			parent::__construct();
			error_reporting(0);
		}
		
		
		function getSubcategary($cat_id,$area_id)
		{
			$this->db->select('d.price, sub.s_Id, sub.sub_Category,sub.subCategoryArabic, sub.categoryId, sub.category_image');
			$this->db->from('sub_category sub');
			$this->db->join('dsshboard d','d.category_id = sub.s_Id');
			$this->db->where('categoryId',$cat_id);
			$this->db->where('location_Id',$area_id);
			$result  = $this->db->get();
			return $result->result_array();	
		}
		
		
		function checkUser($user_id)
		{
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('user_id',$user_id);
			$result  = $this->db->get();
			return $result->result_array();			
		}
		
		function checkPromo($user_id,$promoCode)
		{
			$this->db->select('*');
			$this->db->from('user_promoCode');
			$this->db->where('pc_assignTo',$user_id);
			$this->db->where('promoCode',$promoCode);
			$result  = $this->db->get();
			return $result->result_array();			
		}
		
		function checkorder($user_id) 
		{
			 $this->db->select('uo.order_id, uo.order_userId, uo.product_id, uo.product_quantity, uo.specialNote, uo.order_pickupTime, uo.address_id, uo.order_promoCode, uo.total_amount, uo.order_pickupDate, uo.is_completed, uo.base_price, uo.product_sub_Category, uo.product_image,uo.productSubArbicCategory, uo.area, uo.categoryId,uo.city_name, uo.discount_promoCode, uo.current_date_time, uo.user_name, uo.user_mobile, uo.user_adderss as street_address, uo.user_bulding_number as bulding_number, uo.user_floor_number as floor_number, uo.user_flat_number as flat_number,sc.category_name,sc.categoryNameArabic');
			 $this->db->from('user_order uo');
			 $this->db->join('Static_Category sc', 'uo.categoryId=sc.cat_id');
			 $this->db->where('uo.order_userId',$user_id);
			 $this->db->order_by("order_id", "desc");
			 $result  	= $this->db->get();
			 $checkorder = $result->result_array();
			
			foreach($checkorder as $ckordr)
			{
				 $categoryId 				=  $ckordr['categoryId'];
				 $product_sub_Category 		=  $ckordr['product_sub_Category'];
				 $productSubArbicCategory 	=  $ckordr['productSubArbicCategory'];
				 $product_image 			=  $ckordr['product_image'];
				 $pro_id 					=  $ckordr['product_id'];
				 $queId 					=  $ckordr['product_quantity'];
				 $base_price 				=  $ckordr['base_price'];

				 $base_prices 			= explode(',',$base_price);
				 $categoryId 			= explode(',',$categoryId);
				 $quantity 				= explode(',',$queId);
				 $product  				= explode(',',$pro_id);
				 $product_sub_Category  = explode(',',$product_sub_Category);
				 $productSubArbicCategory  = explode(',',$productSubArbicCategory);
				 $product_image  		= explode(',',$product_image);
				 
				 $m = 0;
				 foreach($product as $p_id)
				  {
					 $abed[0]['categoryId'] 		= $categoryId[$m];
					 $abede[0]['base_prices'] 		= $base_prices[$m];
					 $abe[0]['category_image'] 		= $product_image[$m];
					 $abd[0]['product_quentuty'] 	= $quantity[$m];
					 $abc[0]['sub_Category'] 		= $product_sub_Category[$m];
					 $arc[0]['sub_Category'] 		= $productSubArbicCategory[$m];
					 $ab[0] = array(
					 	'product_quentuty'	=>$abd[0]['product_quentuty'],
					 	'sub_Category'		=>$abc[0]['sub_Category'],
					 	'SubArbicCategory'		=>$arc[0]['sub_Category'],
					 	'category_image'	=>$abe[0]['category_image'],
					 	'base_price'		=>$abede[0]['base_prices']
					 );
					 $ckordr['orderProduct'][] = $ab[0];
					 $m++;
			      }	
				$all[] =$ckordr;
			   
			}
			return $all;
		}

	}