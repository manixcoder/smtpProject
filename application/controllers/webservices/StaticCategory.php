<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaticCategory extends CI_Controller
{
	function __construct()
		{

			parent::__construct();		
			$this->load->model('webservice/StaticCategoryModel');
			error_reporting(0);
		}

	public function index()
	{
		echo "Category ";
	}
	function getAllCategory()
	{
		$query = $this->StaticCategoryModel->getAllCategory();
		if ($query)
			{
				if ($query)
					{
						$result = array(
							'code' 		=> '201',
							'status' 	=> 'success',
							'message' 	=> "Category found Successfully.",
							'arabicMessage' => 	'تم العثور على المجموعات بنجاح',
							'data' 		=> $query
						);
						print_r(json_encode($result));
					}
				  else
					{
						$result = array(
							'code' 		=> '200',
							'status' 	=> 'failure',
							'arabicMessage' => 	'المجموعات غير موجودة',
							'message' 	=> "Category  not found."
						);
						print_r(json_encode($result));
					}
			}
	}

	public function FunctionName()
	{
		 $Image_name = array();
			 if(!empty($_FILES["vital_image"]))
			 {
				 foreach($_FILES["vital_image"]["tmp_name"] as $key=>$tmp_name)
				 {
					$file_name    = $_FILES["vital_image"]["name"][$key];
					$file_tmp     = $_FILES["vital_image"]["tmp_name"][$key];
					$newFileName  = time().$file_name;
					move_uploaded_file($file_tmp=$_FILES["vital_image"]["tmp_name"][$key],"uploads/maynas/".$newFileName);
					$Image_name[] = 'uploads/vitalImages/'.$newFileName;
				 }
			 }

			 $data = array(
			 				'code' =>  '201'
			 		);
			 print_r(json_encode($data));
	}

	function updateBUzz()
	{
		$data = array(
		'user_id'	 		=> $this->input->post('user_id')
		); 
		$query = $this->StaticCategoryModel->updateBUzz($data);
	
		if($query == "not")
		{
			$result = array(
				'code' 			=> '200',
				'status' 		=> 'failure',
				'message' 		=> "user not found."
			);
			print_r(json_encode($result));
		}
		else
		{
				$result = array(
				'code' 			=> '201',
				'status' 		=> 'success',
				'message' 		=> "Updated Buzz."
			);
			print_r(json_encode($result));
		}
	}

}