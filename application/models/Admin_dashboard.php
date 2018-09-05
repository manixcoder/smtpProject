<?php

class Admin_dashboard extends CI_Model



	{

	var $table  = 'sub_category';

	var $table2 = 'Static_Category';



	var $column_order = array(

		null,

		's_Id',

		'sub_Category',

		'category_name'

	);

	var $column_search = array(

		's_Id',

		'sub_Category',

		'category_name'

	);

	var $order = array(

		's_Id' => 'desc'

	);

	function __construct()

		{

		parent::__construct();

		$this->load->database();

		}



	function getStaticCategory()

		{

		$this->db->select('*');

		$this->db->from('Static_Category');

		$result = $this->db->get();

		return $result->result_array();

		}



	function getAllStaticCategory()

		{

		$this->db->select('*');

		$this->db->from('Static_Category');

		$this->db->order_by("cat_id", "DESC");

		$result = $this->db->get();

		return $result->result();

		}



	function FetchCategoryUpdateData($id)

		{

		$this->db->select('*');

		$this->db->from('Static_Category');

		$this->db->where("cat_id", $id);

		$result = $this->db->get();

		return $result->result();

		}



	function updateCategoryData($id, $data)

		{



		$this->db->where("cat_id", $id);

		$this->db->update('Static_Category', $data);

		$this->db->select('*');

		$this->db->from('Static_Category');

		$this->db->where("cat_id", $id);

		$result = $this->db->get();

		return $result->result();

		}

	function addStaticCategory($category_name, $categoryNameArabic)

		{

		$this->db->insert('Static_Category', array(

			'category_name' => $category_name,

			'categoryNameArabic' => $categoryNameArabic

		));

		$lastId = $this->db->insert_id();

		if ($lastId)

			{

			return true;

			}

		  else

			{

			return false;

			}

		}

	private

	function _get_datatables_query()

		{

		$this->db->from($this->table);



		$i = 0;

		foreach($this->column_search as $item)

			{

			if ($_POST['search']['value'])

				{

				if ($i === 0)

					{

					$this->db->group_start();

					$this->db->like($item, $_POST['search']['value']);

					}

				  else

					{

					$this->db->or_like($item, $_POST['search']['value']);

					}



				if (count($this->column_search) - 1 == $i) $this->db->group_end();

				}



			$i++;

			}



		if (isset($_POST['order'])) 

			{

			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

			}

		  else

		if (isset($this->order))

			{

			$order = $this->order;

			$this->db->order_by(key($order) , $order[key($order) ]);

			}

		}

	function get_datatables()

		{

			$this->_get_datatables_query();

			if ($_POST['length'] != - 1) $this->db->limit($_POST['length'], $_POST['start']);

			$query = $this->db->join('Static_Category', 'Static_Category.cat_id = sub_category.categoryId');

			$query = $this->db->get();

			return $query->result();

		}



	function count_filtered()

		{

			$this->_get_datatables_query();

			$query = $this->db->join('Static_Category', 'Static_Category.cat_id = sub_category.categoryId');

			$query = $this->db->get();

			return $query->num_rows();

		}

	function count_all()

		{

			$this->db->from($this->table);

			return $this->db->count_all_results();

		}

	function get_area_from_city($data)

		{

			$this->db->select('*');

			$this->db->from('city_location');

			$this->db->where($data);

			$result = $this->db->get();

			return $result->result_array();

		}

	function user_detail()
		{
			$this->db->select('user_id,name,email,mobile,profile_image');
			$this->db->from('user');
			$result = $this->db->get();
			$this->db->order_by("user_id", "desc");
			return $result->result();
		}
	function login($data)
		{
			
			$whare = array(
				'email' => $data['email'],
				'password' => $data['password']
			);
			$this->db->select('*');
			$this->db->from('admin_user');
			$this->db->where('email', $data['email']);
			$this->db->where('password',$data['password']);
			$query = $this->db->get();
			$userData = $query->result_array();
			//echo "<pre>";print_r($userData);die;

			if (!empty($userData))
				{
					return true;
				}
			  else
				{
					return false;
				}
		}

	function insert_category($data)

		{

			$this->db->insert('sub_category', $data);

			return true;

		}

	function edit_category($ids)

		{

			$this->db->select('s.sub_Category,s.subCategoryArabic,s.category_image,s.categoryId,c.category_name,c.categoryNameArabic');

			$this->db->from('sub_category s');

			$this->db->join('Static_Category c', 's.s_Id = c.cat_id', 'left');

			$this->db->where('s_Id', $ids);

			$result = $this->db->get();

			return $result->result();

		}

	function update_category($data)

		{

		$s_Id = $data['s_Id'];		

		if ($data['categoryId'] == '0' && $data['category_image'] == "")

			{

				$datas = array(

					'sub_Category' => $data['sub_Category'],

					'subCategoryArabic' => $data['categoryNameArabic']

				);

			}

		  else if ($data['categoryId'] == '0' && $data['category_image'] != "")

			{

				$datas = array(

					'sub_Category' => $data['sub_Category'],

					'subCategoryArabic' => $data['categoryNameArabic'],

					'category_image' => $data['category_image']

				);

			}

		  else if ($data['categoryId'] != '0' && $data['category_image'] == "")

			{

				$datas = array(

					'sub_Category' => $data['sub_Category'],

					'subCategoryArabic' => $data['categoryNameArabic'],

					'categoryId' => $data['categoryId']

				);

			}

		  else

			{

				$datas = array(

					'sub_Category' => $data['sub_Category'],

					'subCategoryArabic' => $data['categoryNameArabic'],

					'categoryId' => $data['categoryId'],

					'category_image' => $data['category_image'] 

				);

			}		

		$this->db->where('s_Id',$s_Id);

		$this->db->update('sub_category', $datas);

		return true;

		}

	function count_category()

		{

		$this->db->select('*');

		$this->db->from('sub_category');

		$count = $this->db->count_all_results();

		return $count;

		}

	function static_city()

		{

		$this->db->select('*');

		$this->db->from('static_city');

		$result = $this->db->get();

		return $result->result();

		}

	function count_location()

		{

		$this->db->select('*');

		$this->db->from('admin_adderss');

		$count = $this->db->count_all_results();

		return $count;

		}

	function count_user()

		{

		$this->db->select('*');

		$this->db->from('user');

		$count = $this->db->count_all_results();

		return $count;

		}

	function insert_location($data)

		{

		$data_array = array(

			'city' => $data['city'],

			'area' => $data['area'],

			'areaArabic' => $data['areaArabic'],

			'time_from' => $data['time_from'],

			'time_to' => $data['time_to']

		);

		$data_time = array(

			'city' => $data['city'],

			'area' => $data['area']

		);

		$datass = array(

			'time_from' => $data['time_from'],

			'time_to' => $data['time_to']

		);

		$this->db->select('*');

		$this->db->from('admin_adderss');

		$this->db->where($data_array);

		$result = $this->db->get();

		if ($result->num_rows())

			{

			$this->db->where($data_time);

			$this->db->update('admin_adderss', $datass);

			return true;

			}

		  else

			{

			$this->db->insert('admin_adderss', $data_array);

			return true;

			}

		}

	function fetch_category()

		{

		$this->db->select('d.Id, d.price, c.sub_Category,c.subCategoryArabic, sc.city_name, il.area ,sct.category_name');

		$this->db->from('dsshboard d');

		$this->db->join('admin_adderss il', 'il.adminAddress_id = d.location_Id');

		$this->db->join('sub_category c', 'c.s_Id = d.category_id');

		$this->db->join('Static_Category sct', 'c.categoryId=sct.cat_id');

		$this->db->join('static_city sc', 'sc.AI_cityId = d.location_Id', 'left');

		$this->db->order_by("c.sub_category", "ASC");

		$result = $this->db->get();

		return $result->result();

		}

	function fetch_location()

		{

		$this->db->select('a.*,sc.city_name');

		$this->db->from('admin_adderss a');

		$this->db->join('static_city sc', 'sc.AI_cityId = a.city', 'left');

		$this->db->group_by(['a.city', 'a.area']);

		$this->db->order_by("sc.city_name", "ASC");

		$result = $this->db->get();

		return $result->result();

		}

	function edit_location($adminAddress_id)

		{

		$this->db->select('aa.*,sc.city_name');

		$this->db->from('admin_adderss aa');

		$this->db->join('static_city sc', 'sc.AI_cityId = aa.city', 'left');

		$this->db->where('aa.adminAddress_id', $adminAddress_id);

		$result = $this->db->get();

		return $result->result();

		}

	function get_area_location($adminAddress_id)

		{

		$this->db->select('aa.*,sc.city_name');

		$this->db->from('admin_adderss aa');

		$this->db->join('static_city sc', 'sc.AI_cityId = aa.city', 'left');

		$this->db->where('aa.adminAddress_id', $adminAddress_id);

		$result = $this->db->get();

		$datas = $result->result();

		$data = $datas[0]->city;

		$this->db->select('adminAddress_id,area');

		$this->db->from('admin_adderss');

		$this->db->where('city', $data);

		$this->db->group_by("area");

		$result = $this->db->get();

		return $result->result();

		}

	function update_location($data)

		{

		$datas = array(

			'time_from' => $data['time_from'],

			'time_to'   => $data['time_to']

		);

		$this->db->select('*');

		$this->db->from('admin_adderss');

		$this->db->where('adminAddress_id', $data['adminAddress_id']);

		$result = $this->db->get();

		if ($result->num_rows())

			{

			if (!empty($data['time_to']) && !empty($data['city']))

			{

				$this->db->select('*');

				$this->db->from('admin_adderss1');

				$this->db->where($datas);

				$result_check = $this->db->get();



				if ($result_check->num_rows())

					{

					$this->db->where('adminAddress_id', $data['adminAddress_id']);

					$this->db->delete('admin_adderss');

					return true;

					die;

					}

				  else

					{

					$this->db->where('adminAddress_id', $data['adminAddress_id']);

					$this->db->update('admin_adderss', $datas);

					return true;

					die;

					}

			}



			$this->db->where('adminAddress_id', $data['adminAddress_id']);

			$this->db->update('admin_adderss', $datas);

			return true;

			}

		  else

			{

			return false;

			}

		}

	function insert_full_category($array)

		{

		$whare = array(

			'location_Id' => $array['location_Id'],

			'category_id' => $array['category_id']

		);

		$updates = array(

			'price' => $array['price']

		);

		$this->db->select('*');

		$this->db->from('dsshboard');

		$this->db->where($whare);

		$result = $this->db->get();

		if ($result->num_rows())

			{

			$this->db->where($whare);

			$this->db->update('dsshboard', $updates);

			}

		  else

			{

			$this->db->insert('dsshboard', $array);

			return true;

			}

		}

	function fetch_selected_category()

		{

		$this->db->select('*');

		$this->db->from('sub_category sc');

		$this->db->join('Static_Category st', 'sc.categoryId=st.cat_id');

		$this->db->order_by("sc.sub_category", "ASC");

		$result = $this->db->get();

		return $result->result();

		}



	function categoryData()

	{

		$this->db->select('*');

		$this->db->from('Static_Category sc');

		$this->db->order_by("sc.category_name", "ASC");

		$result 	= $this->db->get();

		$mainCat 	=  $result->result();		 

        foreach ($mainCat as $key => $value) 

        {

			$this->db->select('*');

			$this->db->from('sub_category sc');

			$this->db->where('categoryId',$value->cat_id);

			$this->db->order_by("sc.sub_Category", "ASC");

			$result 	= $this->db->get();

			$subCat 	=  $result->result();

			

            if ($value->cat_id==$subCat[0]->categoryId) 

            {

            	$value->sub = $subCat;

            }

          

            $all[] = $value;

        }

        return $all;

				echo "<pre>";

              	print_r($all);

              	echo "</pre>";

	

	}



	function edit_pricedashboard($Id)

		{

		$this->db->select('*');

		$this->db->from('dsshboard');

		$this->db->where('Id', $Id);

		$result = $this->db->get();

		return $result->result_array();

		}

	function update_pricedashboard($Id, $datas)

		{

		$this->db->select('*');

		$this->db->from('dsshboard');

		$this->db->where('Id', $Id['Id']);

		$this->db->update('dsshboard', $datas);

		return true;

		}

	function fetch_locations()

		{

		$this->db->select('s.city_name as city, a.adminAddress_id, a.area, a.times, a.pickup_date, a.time_from, a.time_to ,a.areaArabic');

		$this->db->from('admin_adderss a');

		$this->db->join('static_city s', 's.AI_cityId = a.city', 'left');

		$this->db->order_by("adminAddress_id", "desc");

		$result = $this->db->get();

		return $result->result();

		}

	function fetch_wash_category()

		{

			$this->db->select('s_Id,sub_Category,category_name as categoryId');

			$this->db->from('sub_category c');

			$this->db->join('Static_Category sc', 'sc.cat_id = c.categoryId', 'left');

			$this->db->order_by("s_Id", "desc");

			$result = $this->db->get();

			return $result->result();

		}

	function promo_code_user()

		{

			$this->db->select('*');

			$this->db->from('user');

			$this->db->order_by("name", "ASC");

			$result = $this->db->get();

			return $result->result();

		}

	function promo_code_users()

		{

			$this->db->select('*');

			$this->db->from('user');

			$result = $this->db->get();

			return $result->result_array();

		}

	function get_slider_Images()

		{

			$this->db->select('*');

			$this->db->from('slider_image');

			$this->db->order_by("Id", "desc");

			$this->db->limit('5', '0');

			$result = $this->db->get();

			return $result->result();

		}

	function count_slider_Images()

		{

			$this->db->select('*');

			$this->db->from('slider_image');

			$count = $this->db->count_all_results();

			return $count;

		}

	function get_admin_mobile_no()

		{

			$location = '1';

			$this->db->select('*');

			$this->db->from('admin_user');

			$result = $this->db->get();

			return $result->result_array();

		}

	function promo_code_users_by_id($location)

		{

			$this->db->select('*');

			$this->db->from('user');

			$this->db->where('user_id', $location);

			$result = $this->db->get();

			return $result->result_array();

		}

	function promo_code()

		{

			$this->db->select('up.*,u.name');

			$this->db->from('user_promoCode up');

			$this->db->join('user u', 'u.user_id = up.pc_assignTo');

			$this->db->order_by('u.name', "ASC");

			$result = $this->db->get();

			return $result->result();

		}

	function editpromocode($promoCode_id)

		{

			$this->db->select('*');

			$this->db->from('user_promoCode');

			$this->db->where('promoCode_id', $promoCode_id);

			$result = $this->db->get();

			return $result->result();

		}

	function updatepromocode($datas, $id)

		{

			$this->db->select('*');

			$this->db->from('user_promoCode');

			$this->db->where('promoCode_id', $id['promoCode_id']);

			$result = $this->db->get();

			if ($result->num_rows())

				{

				$this->db->where('promoCode_id', $id['promoCode_id']);

				$this->db->update('user_promoCode', $datas);

				return true;

				}

			  else

				{

				return false;

				}

		}

	function insert_promo_code($data)

		{

			$whare = array(

				'pc_assignTo' => $data['pc_assignTo'],

				'promoCode' => $data['promoCode']

			);

			$this->db->select('*');

			$this->db->from('user_promoCode');

			$this->db->where($whare);

			$result = $this->db->get();

			if ($result->num_rows())

				{

				return false;

				}

			  else

				{

				$this->db->insert('user_promoCode', $data);

				return true;

				}

		}

	function Order_management()

		{

			$this->db->select('uo.order_id,uo.order_userId,uo.product_id,uo.product_quantity,uo.area,uo.city_name,uo.specialNote,uo.order_pickupTime,uo.address_id,uo.order_pickupDate,uo.order_promoCode,uo.current_date_time,uo.total_amount,uo.user_name,uo.user_adderss,uo.user_mobile,uo.languageType,uo.user_bulding_number,uo.user_floor_number,uo.user_flat_number,ua.address_userId,ua.selected_addressId,ua.street_address,ua.bulding_number,ua.floor_number,ua.flat_number');

			$this->db->from('user_order uo');

			$this->db->join('user_adderss ua', 'ua.userAddress_id = uo.address_id', 'left');

			$this->db->group_by("uo.order_id");

			$this->db->order_by("uo.order_id", "desc");

			$result = $this->db->get();

			return $result->result();

		}

	function fetchOrderByid($id)

	{

		$this->db->select('uo.order_id,uo.order_userId,uo.product_id,uo.product_quantity,uo.area,uo.city_name,uo.specialNote,uo.order_pickupTime,uo.address_id,uo.order_pickupDate,uo.order_promoCode,uo.current_date_time,uo.total_amount,uo.user_name,uo.user_adderss,uo.user_mobile,uo.languageType,uo.user_bulding_number,uo.user_floor_number,uo.user_flat_number,ua.address_userId,ua.selected_addressId,ua.street_address,ua.bulding_number,ua.floor_number,ua.flat_number');

			$this->db->from('user_order uo');

			$this->db->join('user_adderss ua', 'ua.userAddress_id = uo.address_id', 'left');

			$this->db->group_by("uo.order_id");

			$this->db->where('uo.order_id',$id);

			$this->db->order_by("uo.order_id", "desc");

			$result = $this->db->get();

			return $result->result_array();

	}

	function Order_management_detail($datas)

		{

			$this->db->select('*');

			$this->db->from('user_order');

			$this->db->where('order_id', $datas);

			$results = $this->db->get();

			$result = $results->result_array();

			$order_id = $result[0]['order_id'];

			$discount_promoCode = $result[0]['discount_promoCode'];

			$product_sub_Categoryss = $result[0]['product_sub_Category'];

			$base_pricess = $result[0]['base_price'];

			$product_quantitys = $result[0]['product_quantity'];

			$product_ids = $result[0]['product_id'];

			$order_promoCodes = $result[0]['order_promoCode'];

			$total_amount = $result[0]['total_amount'];

			$address_id = $result[0]['address_id'];

			$product_sub_Category = explode(',', $product_sub_Categoryss);

			$base_price = explode(',', $base_pricess);

			$product_quant = explode(',', $product_quantitys);

			$product_i = explode(',', $product_ids);

			$count_product_quant = count($product_i);

			for ($i = 0; $i < $count_product_quant; $i++)

				{

					$product_sub_Categorys = $product_sub_Category[$i];

					$base_pricess = $base_price[$i];

					$product_quant_final = $product_quant[$i];

					$product_i_final = $product_i[$i];

					$this->db->select('sc.sub_Category,d.price');

					$this->db->from('sub_category sc');

					$this->db->join('dsshboard d', "d.category_id = sc.s_Id and d.location_Id = $address_id", 'left');

					$this->db->where('s_Id', $product_i_final);

					$result_sub_category = $this->db->get();

					$finel_sub_category = $result_sub_category->result_array();

					$arrays[] = array(

						'product_quantity' => $product_quant_final,

						'products' => $product_i_final,

						'order_promoCode' => $order_promoCodes,

						'total_amount' => $total_amount,

						'base_price' => $base_pricess,

						'product_sub_Categorys' => $product_sub_Categorys,

						'discount_promoCode' => $discount_promoCode

					);

				}

			return $arrays;

		}

	function Order_management_image($datas)

		{

			$datas_id = $datas;

			$this->db->select('product_image');

			$this->db->from('user_order');

			$this->db->where('order_id', $datas_id);

			$result = $this->db->get();

			$datas = $result->result_array();

			$this->db->select('order_ImageName as product_image');

			$this->db->from('orderImage');

			$this->db->where('image_orderId', $datas_id);

			$result = $this->db->get();

			$datasss = $result->result_array();



			foreach($datasss as $merge_arrays)

				{

					$product_image_id[] = explode(',', $merge_arrays['product_image']);

				}		



			return $product_image_id;

		}

	function user_address_detail($data)

		{

			$this->db->select('*');

			$this->db->from('user_adderss');

			$this->db->where('address_userId', $data);

			$this->db->where('user_adderss_status', '0');

			$result = $this->db->get();

			return $result->result();

		}

	function Feedback()

		{

			$this->db->select('u.user_id,u.name,u.email,u.mobile,r.appRating,r.ratingComment,r.current_date_time');

			$this->db->from('user u');

			$this->db->join('adminRating r', 'r.rarting_byId = u.user_id');

			$this->db->order_by('u.user_id', 'desc');

			$result = $this->db->get();

			return $result->result();

		}

	function Order_management_statusss_user($tracking_orderId)

		{

			$this->db->select('*');

			$this->db->from('user');

			$this->db->where('user_id', $tracking_orderId);

			$result = $this->db->get();

			return $result->result_array();

		}

	function Order_Tracking()

		{

			$this->db->select('ot.tracking_id,ot.tracking_orderId,ot.order_id,ot.orderStatus_text,ot.orderStatus_date,u.name');

			$this->db->from('orderTracking ot');

			$this->db->join('user u', 'u.user_id = ot.tracking_orderId');

			$this->db->order_by("ot.tracking_id", "desc");

			$result = $this->db->get();

			return $result->result_array();

		}

	function slider_Images($array_image)

		{

			$this->db->insert('slider_image', $array_image);

			return true;

		}

	function fetch_locations_area()

		{

			$this->db->select('cl.*,sc.city_name');

			$this->db->from('city_location cl');

			$this->db->join('static_city sc', 'sc.AI_cityId = cl.location_city_id');

			$this->db->order_by('sc.city_name', 'asc');

			$result = $this->db->get();

			return $result->result_array();

		}

	function edit_main_location($city_location_id)

		{

			$this->db->select('*');

			$this->db->from('city_location cl');

			$this->db->join('static_city sc', 'sc.AI_cityId = cl.location_city_id');

			$this->db->where('cl.city_location_id', $city_location_id);

			$result = $this->db->get();

			return $result->result_array();

		}

	function updates_locations($updatData)

		{

		$this->db->select('*');

		$this->db->from('city_location');

		$this->db->where('city_location_id', $updatData['city_location_id']);

		$results = $this->db->get();

		$data = $results->result_array();

		

		$area_location 	  = $data[0]['area_location'];

		$location_city_id = $data[0]['location_city_id'];





		$address_full = array(

			'city' => $location_city_id,

			'area' => $area_location

		);

		$this->db->select('*');

		$this->db->from('admin_adderss');

		$this->db->where($address_full);

		$resultsss = $this->db->get();

		

		if ($resultsss->num_rows())

		{

			$this->db->select('*');

			$this->db->from('admin_adderss');

			$this->db->where($address_full);

			$this->db->update('admin_adderss', array(

							'area' 			=> $updatData['area_location'],

							'areaArabic'	=> $updatData['areaArabic'] ));

		}





		$this->db->select('*');

		$this->db->from('city_location');

		$this->db->where('city_location_id', $updatData['city_location_id']);

		$this->db->update('city_location', array(

			'area_location' => $updatData['area_location'],

			'areaArabic'	=> $updatData['areaArabic'] 

		));

		return true;

		}

	function insert_add_location_area($array)

		{

			$this->db->select('*');

			$this->db->from('city_location');

			$this->db->where($array);

			$result = $this->db->get();

			if ($result->num_rows())

				{

					return false;

				}

			  else

				{

					$this->db->insert('city_location', $array);

					return true;

				}

		}

	function delete_image_file($data)

		{

			$this->db->select('slider_image');

			$this->db->from('slider_image');

			$this->db->where($data);

			$result = $this->db->get();

			return $result->result_array();

		}

	function contact_to_admin()

		{

			$this->db->select('*');

			$this->db->from('contact_to_admin ca');

			$this->db->join('user u', 'u.user_id = ca.c_user_id');

			$this->db->order_by('ca.id', 'desc');

			$result = $this->db->get();

			return $result->result();

		}

	function get_data_Place_Message()

		{

			$this->db->select('*');

			$this->db->from('place_message');

			$result = $this->db->get();

			return $result->result_array();

		}

	function insert_Order_Place_Message($datass)

		{

			$datasss = $this->db->query('select count(*) as total_data from place_message');

			$datasssss = $datasss->result_array();

			$count_total = $datasssss[0]['total_data'];

			if ($count_total >= '1')

				{

					$this->db->select('*');

					$this->db->from('place_message');

					$this->db->where('message_Id', '1');

					$this->db->update('place_message', $datass);

					return true;

				}

			  else

				{

					$this->db->insert('place_message', $datass);

					return true;

				}

		}

	}

