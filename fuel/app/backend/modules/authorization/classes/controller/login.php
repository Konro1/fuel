<?php

namespace Authorization;

class Controller_Login extends \Controller_Template{

	public function action_index()
	{

		$data = array();

		$this->template->title = "Login";
		$this->template->content = \View::forge( 'authorization/login', $data, false );

	}

	public function action_foo()
	{
		$this->template->title = "Foo";
		$this->template->content =  \View::forge( 'myview/foo' );;
	}
}
