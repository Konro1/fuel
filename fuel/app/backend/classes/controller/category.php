<?php
class Controller_Category extends Controller_Template{

	public function action_index()
	{
		echo "<pre>";
		print_r(APPPATH.'modules'.DS);
		echo "</pre>";
		$data['categories'] = Model_Category::find( 'all' );
		foreach ( $data['categories'] as $category )
		{
			if ( $category->status == 1 )
			{
				$category->status = "<span class='label label-success'>Active</span>";
			}
			else
			{
				$category->status = "<span class='label label-important'>Unactive</span>";
			}
		}

		$this->template->title = "Categories";
		$this->template->content = View::forge( 'category/index', $data, false );

	}

	public function action_view( $id = null )
	{
		is_null( $id ) and Response::redirect( 'category' );

		if ( ! $data['category'] = Model_Category::find( $id ) )
		{
			Session::set_flash( 'error', 'Could not find category #'.$id );
			Response::redirect( 'category' );
		}

		$this->template->title = "Category";
		$this->template->content = View::forge( 'category/view', $data );

	}

	public function action_create()
	{
		if ( Input::method() == 'POST' )
		{
			$val = Model_Category::validate( 'create' );

			if ( $val->run() )
			{
				$category = Model_Category::forge( array(
						'title' => Input::post( 'title' ),
						'alias' => Input::post( 'alias' ),
						'description' => Input::post( 'description' ),
						'status' => Input::post( 'status' ) == 1 ? 1:0,
					) );

				if ( $category and $category->save() )
				{
					Session::set_flash( 'success', 'Added category #'.$category->id.'.' );

					Response::redirect( 'category' );
				}

				else
				{
					Session::set_flash( 'error', 'Could not save category.' );
				}
			}
			else
			{
				Session::set_flash( 'error', $val->error() );
			}
		}

		$this->template->title = "Categories";
		$this->template->content = View::forge( 'category/create' );

	}

	public function action_edit( $id = null )
	{
		is_null( $id ) and Response::redirect( 'category' );

		if ( ! $category = Model_Category::find( $id ) )
		{
			Session::set_flash( 'error', 'Could not find category #'.$id );
			Response::redirect( 'category' );
		}

		$val = Model_Category::validate( 'edit' );

		if ( $val->run() )
		{
			$category->title = Input::post( 'title' );
			$category->alias = Input::post( 'alias' );
			$category->description = Input::post( 'description' );
			$category->status = Input::post( 'status' );

			if ( $category->save() )
			{
				Session::set_flash( 'success', 'Updated category #' . $id );

				Response::redirect( 'category' );
			}

			else
			{
				Session::set_flash( 'error', 'Could not update category #' . $id );
			}
		}

		else
		{
			if ( Input::method() == 'POST' )
			{
				$category->title = $val->validated( 'title' );
				$category->alias = $val->validated( 'alias' );
				$category->description = $val->validated( 'description' );
				$category->status = $val->validated( 'status' );

				Session::set_flash( 'error', $val->error() );
			}

			$this->template->set_global( 'category', $category, false );
		}

		$this->template->title = "Categories";
		$this->template->content = View::forge( 'category/edit' );

	}

	public function action_delete( $id = null )
	{
		is_null( $id ) and Response::redirect( 'category' );

		if ( $category = Model_Category::find( $id ) )
		{
			$category->delete();

			Session::set_flash( 'success', 'Deleted category #'.$id );
		}

		else
		{
			Session::set_flash( 'error', 'Could not delete category #'.$id );
		}

		Response::redirect( 'category' );

	}


}
