<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class StaticCategoryModel extends CI_Model 
{
	function getAllCategory()
	{
		$this->db->select('*');
		$this->db->from('Static_Category');
		$result  = $this->db->get();
		return $result->result_array();
	}
function updateBUzz($data)
     {
     
     		$query = $this->db->query("UPDATE user SET badge = '0' WHERE user_id = '".$data['user_id']."'");
     		return "yes";
     	
     }
}