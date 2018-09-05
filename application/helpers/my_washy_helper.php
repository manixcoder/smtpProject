<?php 

if(!function_exists('SendEmails'))
	{	
		function SendEmails($sendto , $subject, $msg )
		{
			$CI =& get_instance();
			$CI->load->library('email'); 
			$config['protocol'] = 'sendmail';
			$config['charset'] 	= 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$config = 	array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'eweba1test@gmail.com',
			'smtp_pass' => 'plokijuh12345',
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1'
			);
			$CI->email->set_mailtype("html");
			$CI->load->library('email', $config);			
			$CI->email->from('amantyagi608@gmail.com', 'Pegele');
			$CI->email->to($sendto);		
			$CI->email->subject($subject);
			$CI->email->message($msg);
			if($CI->email->send())
			{
				return  true;
			}
			else
			{
				return  false;
			}
		}
	}
	