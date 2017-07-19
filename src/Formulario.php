<?php 

class Formulario
{

	public function registro($request)
	{
		if($this->saveOnDatabase($request)){
			return array('status' => 'error');
		}

		return array('status' => 'error');
	}

	public function isMailAlreadyRegistered($request)
	{
		if($request['email'] == 'emailregistered@gmail.com'){
			return true;
		}
		return false;
	}

	public function isValidRequest($request)
	{
		if(!filter_var($request['email'], FILTER_VALIDATE_EMAIL)){
			return false;
		}
		return true;
	}

	public function getResponse()
	{
		return array('status' => 'ok');
	}

	private function saveOnDatabase($request)
	{
		// Save request on DB
		return true;
	}
}