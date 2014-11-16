<?php

//use Item as Item;

/**
 * This controller is used to display categorys.
 */
class CategoryController extends BaseController {

	protected $layout = 'layouts.front';

	/**
	 * The category storage.
	 *
	 * @var  Category
	 */
	protected $category;
/*
	public function __construct(Category $category, Item $item)
	{
		$this->category = $category;
		$this->item = $item;
	}
*/
	public function __construct(Category $category)
	{
		$this->category = $category;
	}

	/**
	 * Display a category with given slug.
	 *
	 * @param   string  $slug
	 *
	 * @return  mixed
	 */
	public function show($slug = '/')
	{
//dd('loaded');
//		$category = $this->category->whereSlug($slug)->first();
//		$category = $this->category->whereSlug($slug)->with('sites')->first();
//		$user = $this->user->with('profile')->findOrFail($id);
//		$profile = $this->profile->with('grades', 'sites', 'departments')->findOrFail($id);

//		$site = $this->site->with('profiles')->findOrFail($id);
//		$profiles = Site::findOrFail($id)->profiles;
/*
		return View::make(
			'sites.show',
			compact(
				'site', 'profiles', 'logo', 'contact'
//				'site', 'logo'
			)
*/


$category = $this->category->with('items')->whereSlug($slug)->first();
//dd($category->id);
$items = Category::findOrFail($category->id)->items;
//$assets = Item::findOrFail($item->id)->assets;
//dd($assets);

//dd('loaded');

		if ($category === null)
		{
			App::abort(404, 'Sorry, but requested category doesn\'t exists.');
		}
//dd('loaded');

        $view = $category->isRoot() ? 'home.categories_index' : 'home.category';

        $this->layout->title = $category->title;

$this->layout->exploreNested = $this->exploreNested();
//dd($this->layout->exploreNested);


//dd( View::make($view) );



//$items = Menu::all();
//$this->layout->itemsHelper = new ItemsHelper($items);
//  return View::make('hello',compact('items','itemsHelper'));

//dd('loaded');


//        $this->layout->content = View::make($view, compact('category', 'items','itemsHelper'));
//        $this->layout->content = View::make($view, with(compact('category', 'sites')) );
        $this->layout->content = View::make($view, compact('category', 'items'));

$this->layout->menu = $this->getMenu($category);
$this->layout->menu2 = $this->getMenu2($category);
//dd($this->layout->menu);

        $this->layout->breadcrumbs = $this->getBreadcrumbs($category);


$this->layout->pullDown = $this->getPullDown();

	}

	/**
	 * Get breadcrumbs to the current category.
	 *
	 * $active is the last crumb (the category title by default).
	 *
	 * @param   Category    $category
	 * @param   string  $active
	 * @param 	string  $route
	 *
	 * @return  array
	 */
	protected function getBreadcrumbs(Category $category, $active = null, $route = 'category')
	{
		if ($category->isRoot()) return array();

		$breadcrumbs['Index'] = url('/');
		$ancestors = $category
			->ancestors()
			->withoutRoot()
			->get(array('id', 'title', 'slug'));

		if ($active !== null) $ancestors->push($category);

		foreach ($ancestors as $item)
		{
			$breadcrumbs[$item->title] = route($route, array($item->slug));
		}

		$breadcrumbs[] = $active !== null ? $active : $category->title;

		return $breadcrumbs;
	}

    /**
     * Get main menu items.
     *
     * @param Category $activeCategory
     *
     * @return array
     */
	protected function getMenu(Category $activeCategory)
	{

		$itemTree = $this->category
			->where('parent_id', '=', 1)
			->get([ 'id', 'slug', 'title', '_lft', 'parent_id' ])
			->toTree();

		return make_nav($itemTree, $activeCategory->getKey());
	}
	protected function getMenu2(Category $activeCategory)
	{

		$itemTree = $this->category
			->where('parent_id', '!=', 'NULL')
			->get([ 'id', 'slug', 'title', '_lft', 'parent_id' ])
			->toTree();

		return make_nav($itemTree, $activeCategory->getKey());
	}

	protected function getPullDown()
	{
		$categorys = $this->category->withDepth()->defaultOrder()->get();
//dd($categorys);
//		return make_nav($categorys, $activeCategory->getKey());
//		return make_nav($categorys);
		return $categorys;
	}


	protected function exploreNested()
	{

// dump straight list
$result = $this->category->withDepth()->defaultOrder()->get();

// 1,2,4 WTF???
//$result = Category::hasChildren()->get();

// this is returning only 1 value!!! UGH!!!
//$result = Category::hasChildren()->withDepth()->having('depth', '=', 1)->get();

// #1 Using accessor
//$result = $this->category->getAncestors();


// All nodes will now be ordered by lft value,, dump straight list
//$result = Category::defaultOrder()->get();

// remove ID=1
//$result = Category::hasParent()->get();



//dd($result);

		return $result;
	}





}
