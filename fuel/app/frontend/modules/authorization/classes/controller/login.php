<?php

namespace Authorization;

class Controller_Login extends \Controller_Template{

	public function action_index()
	{
		echo "<pre>";
		print_r(PKGPATH);
		echo "</pre>";

		$data = array();

		// If so, you pressed the submit button. Let's go over the steps.
		if ( \Input::post() )
		{
			// Check the credentials. This assumes that you have the previous table created and
			// you have used the table definition and configuration as mentioned above.
			if ( \Auth::login() )
			{
				// Credentials ok, go right in.
				\Response::redirect( 'success_page' );
			}
			else
			{
				// Oops, no soup for you. Try to login again. Set some values to
				// repopulate the username field and give some error text back to the view.
				$data['username']    = \Input::post( 'username' );
				$data['login_error'] = 'Wrong username/password combo. Try again';
			}
		}


		$this->template->title = "Authorization";
		$this->template->content = \View::forge( 'authorization/login', $data, false );

	}

	public function action_foo()
	{
		$this->template->title = "Foo";
		$this->template->content =  \View::forge( 'myview/foo' );;
	}
}
