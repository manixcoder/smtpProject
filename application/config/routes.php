<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	
		
	$route['admin'] 					= 'main_admin/Dashboard/test';
	$route['register'] 					= 'admin/Admin/do_upload';
	$route['admin/login'] 				= 'admin/Admin/login';
	$route['forget_password'] 			= 'admin/Admin/forget_password';
	$route['image_get'] 				= 'uploads/userProfile/download.JPEG';
	$route['change_password'] 			= 'admin/Admin/change_password';
	$route['edit_profile'] 				= 'admin/Admin/edit_profile';
	$route['homepage'] 					= 'admin/Admin/homepage';
	$route['contacttoadmin'] 			= 'admin/Admin/contacttoadmin';
	$route['slider_image'] 				= 'admin/Admin/slider_image';
	$route['products_api'] 				= 'admin/Admin/products_api';
	$route['getsubaddres'] 				= 'admin/Admin/getsubaddres';
	$route['getproductdetail'] 			= 'admin/Admin/getproductdetail';
	$route['userareadetail'] 			= 'admin/Admin/userareadetail';
	$route['getaddress'] 				= 'admin/Admin/getaddress';
	$route['editAddress'] 				= 'admin/Admin/editAddress';
	$route['getnotification'] 			= 'admin/Admin/getnotification';
	$route['deletenotification'] 		= 'admin/Admin/deletenotification';
	$route['get_admin_no'] 				= 'admin/Admin/get_admin_no';
	$route['notification_test'] 		= 'Dashboard/notification_test';
	$route['homeSlideImage'] 			= 'webservices/Auth/homeSlideImage'; //sanyam
	$route['FetchProductCategory'] 		= 'webservices/Auth/FetchProductCategory'; //sanyam
	// $route['FetchProductCategory'] 	= 'webservices/Auth/FetchProductCategory'; //sanyam
	$route['addAddress'] 				= 'webservices/Auth/addAddress'; //sanyam
	$route['deleteAddress'] 			= 'webservices/Auth/deleteAddress'; //sanyam
	$route['addRating'] 				= 'webservices/Auth/addRating'; //sanyam
	$route['fetchPromoCode'] 			= 'webservices/Auth/fetchPromoCode'; //sanyam
	$route['apply_promocode'] 			= 'webservices/Auth/apply_promocode'; //sanyam
	$route['getDateTime'] 				= 'webservices/Auth/getDateTime'; //sanyam
	$route['MakeOrder'] 				= 'webservices/Order/MakeOrder'; //sanyam
	$route['FetchOrder'] 				= 'webservices/Order/FetchOrder'; //sanyam
	$route['orderTracking'] 			= 'webservices/Order/orderTracking'; //sanyam

	$route['default_controller'] 		= 'welcome';
	$route['404_override'] 				= '';
	$route['translate_uri_dashes'] 		= FALSE;