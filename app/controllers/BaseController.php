<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}


$category = $this->category->with('items')->whereSlug('/')->first();
$itemTree = $this->category->where('parent_id', '!=', 'NULL')
	->get([ 'id', 'slug', 'title', '_lft', 'parent_id' ])
	->toTree();
$menu2 = make_nav($itemTree, $category->getKey());
//dd($menu2);
	}

}
