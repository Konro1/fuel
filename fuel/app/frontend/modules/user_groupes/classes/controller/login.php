<?php

namespace Authorization;

class Controller_Login extends \Controller_Template{

	public function action_index()
	{
		
		if (\Input::method() == 'POST')
		{
			$data['login'] = \Input::post('login');
		}

		$data = array();

		$this->template->title = "Authorization";
		$this->template->content = \View::forge( 'authorization/login', $data, false );

	}

	public function action_foo()
	{
		$this->template->title = "Foo";
		$this->template->content =  \View::forge( 'myview/foo' );;
	}
}
