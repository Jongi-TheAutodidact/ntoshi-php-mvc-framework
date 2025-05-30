<?php 
defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Main Core Controller Class
 */

Trait Controller
{

	public function view($name, $data = [])
	{
		if(!empty($data))
			extract($data);
		
		$filename = "../app/views/".$name.".ntoshi.php";
		if(file_exists($filename))
		{
			require $filename;
		}else{

			$filename = "../app/views/404.ntoshi.php";
			require $filename;
		}
	}
}