<?php
class Controller_News extends Controller_Template{

	public function action_index($pid)
	{
		$data['news'] = Model_News::find('all',array('where' => array('pid' => $pid)));
		foreach ( $data['news'] as $news )
		{
			if ( $news->status == 1 )
			{
				$news->status = "<span class='label label-success'>Active</span>";
			}
			else
			{
				$news->status = "<span class='label label-important'>Unactive</span>";
			}
		}
		$data['pid'] = $pid;
		$this->template->title = "News";
		$this->template->content = View::forge('news/index', $data,false);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('category');

		if ( ! $data['category'] = Model_Category::find($id))
		{
			Session::set_flash('error', 'Could not find category #'.$id);
			Response::redirect('category');
		}

		$this->template->title = "Category";
		$this->template->content = View::forge('category/view', $data);

	}

	public function action_create($pid = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_News::validate('create');
			
			if ($val->run())
			{
				$news = Model_News::forge(array(
					'pid' => $pid,
					'title' => Input::post('title'),
					'alias' => Input::post('alias'),
					'description' => Input::post('description'),
					'status' => Input::post('status') == 1 ? 1:0,
				));

				if ($news and $news->save())
				{
					Session::set_flash('success', 'Added news #'.$news->id.'.');

					Response::redirect('news/index/'.$pid);
				}

				else
				{
					Session::set_flash('error', 'Could not save news.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "News";
		$this->template->content = View::forge('news/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('category');

		if ( ! $category = Model_Category::find($id))
		{
			Session::set_flash('error', 'Could not find category #'.$id);
			Response::redirect('category');
		}

		$val = Model_Category::validate('edit');

		if ($val->run())
		{
			$category->title = Input::post('title');
			$category->alias = Input::post('alias');
			$category->description = Input::post('description');
			$category->status = Input::post('status');

			if ($category->save())
			{
				Session::set_flash('success', 'Updated category #' . $id);

				Response::redirect('category');
			}

			else
			{
				Session::set_flash('error', 'Could not update category #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$category->title = $val->validated('title');
				$category->alias = $val->validated('alias');
				$category->description = $val->validated('description');
				$category->status = $val->validated('status');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('category', $category, false);
		}

		$this->template->title = "Categories";
		$this->template->content = View::forge('category/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('category');

		if ($category = Model_Category::find($id))
		{
			$category->delete();

			Session::set_flash('success', 'Deleted category #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete category #'.$id);
		}

		Response::redirect('category');

	}


}
