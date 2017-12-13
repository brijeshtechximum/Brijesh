<?php

function pr($val)
{
	echo '<pre>'; 
	print_r($val); 
	echo '</pre>';
}

function current_date()
{
    return date('Y-m-d', time());
}

function current_date_time()
{
    return date('Y-m-d H:i:s', time());
}

function authenticate_client()
{
	 $CI =& get_instance(); //first get instance
     // call the session library
	$client_logged_in = $CI->session->userdata('login_session');    
    
	if (!$client_logged_in) {
		redirect(base_url().'wp-admin/login');
	} else {
		redirect(base_url().'admin/company');
	}
	
    return $data;
}

//Authenticate user is logged or not
function authenticate_user()
{
	 $CI =& get_instance(); //first get instance
     // call the session library
	$user_logged_in = $CI->session->userdata('user');    
    
	if (!$user_logged_in) {
		redirect(base_url().'');
	}
	
}

function sendMail($to, $fromname, $fromemail, $subject, $message) {
    $CI = & get_instance();
    $CI->load->library('email');
    $mail = $CI->email;

    $config['charset'] = 'utf-8';
    $config['wordwrap'] = TRUE;
    $config['mailtype'] = 'html';
    $mail->initialize($config);

    $mail->from($fromemail, $fromname);
    $mail->to($to);
    $mail->reply_to('lokeshtechximum@gmail.com', 'Lokesh');

    $mail->subject($subject);
    $mail->message($message);

    return $mail->send();
}

function getToken()
{
	if(!isset($_SESSION['token']))
	{
		$_SESSION['token'] = MD5(uniqid());
	}
}
function checkToken($token)
{
	if($token != $_SESSION['token'])
	{
		$CI = & get_instance();
		//$CI->session->unset_userdata('login_session');    
		redirect(base_url()."wp-admin/");
		exit;
	}
}
function getTokenField()
{
	return "<input type='hidden' name='token' value='".$_SESSION['token']."'>"; 
}
function distroyToken()
{
	unset($_SESSION['token']);
}