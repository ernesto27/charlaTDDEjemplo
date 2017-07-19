<?php 

require_once 'vendor/autoload.php';
require_once 'src/Formulario.php';

class FormularioRegistroTest extends \PHPUnit_Framework_TestCase
{

	/** @test */
	public function it_should_respond_success_message_if_registration_was_successfull()
	{
		$request = array('nombre' => 'ernesto', 'email' => 'ernesto@gmail.com', 'password' => '123456');
		$formulario = new Formulario();
		$formulario->registro($request);
		$response = $formulario->getResponse();
		$this->assertEquals('ok', $response['status']);

	}

	/** @test */
	public function it_should_check_if_email_is_already_registered()
	{
		$request = array('email' => 'emailregistered@gmail.com');
		$formulario = new Formulario();
		$isEmailAlreadyRegistered = $formulario->isMailAlreadyRegistered($request);
		$this->assertTrue($isEmailAlreadyRegistered);
	}

	/** @test */
	public function it_should_respond_error_if_validation_request_failed()
	{
		$formulario = new Formulario();
		$request = array(
			'nombre' => 'ernesto',
			'email' => 'fakeemail',
			'password' => '123456'
		);
		$validRequest = $formulario->isValidRequest($request);
		$this->assertFalse($validRequest);

	}

}