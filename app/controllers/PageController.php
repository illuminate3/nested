<?php

/**
 * This controller is used to display pages.
 */
class PageController extends BaseController {

	protected $layout = 'layouts.front';

	/**
	 * The page storage.
	 *
	 * @var  Page
	 */
	protected $page;

	public function __construct(Page $page)
	{
		$this->page = $page;
	}

	/**
	 * Display a page with given slug.
	 *
	 * @param   string  $slug
	 *
	 * @return  mixed
	 */
	public function show($slug = '/')
	{
//		$page = $this->page->whereSlug($slug)->first();
		$page = $this->page->whereSlug($slug)->with('sites')->first();
//		$user = $this->user->with('profile')->findOrFail($id);

		if ($page === null)
		{
			App::abort(404, 'Sorry, but requested page doesn\'t exists.');
		}

        $view = $page->isRoot() ? 'home.index' : 'home.page';

        $this->layout->title = $page->title;

$this->layout->exploreNested = $this->exploreNested();
//dd($this->layout->exploreNested);


//dd( View::make($view) );



$items = Menu::all();
$this->layout->itemsHelper = new ItemsHelper($items);
//  return View::make('hello',compact('items','itemsHelper'));



//        $this->layout->content = View::make($view, compact('page', 'items','itemsHelper'));
//        $this->layout->content = View::make($view, with(compact('page', 'sites')) );
        $this->layout->content = View::make($view, compact('page', 'items'));

$this->layout->menu = $this->getMenu($page);
$this->layout->menu2 = $this->getMenu2($page);
//dd($this->layout->menu);

        $this->layout->breadcrumbs = $this->getBreadcrumbs($page);


$this->layout->pullDown = $this->getPullDown();

	}

	/**
	 * Get breadcrumbs to the current page.
	 *
	 * $active is the last crumb (the page title by default).
	 *
	 * @param   Page    $page
	 * @param   string  $active
	 * @param 	string  $route
	 *
	 * @return  array
	 */
	protected function getBreadcrumbs(Page $page, $active = null, $route = 'page')
	{
		if ($page->isRoot()) return array();

		$breadcrumbs['Index'] = url('/');
		$ancestors = $page
			->ancestors()
			->withoutRoot()
			->get(array('id', 'title', 'slug'));

		if ($active !== null) $ancestors->push($page);

		foreach ($ancestors as $item)
		{
			$breadcrumbs[$item->title] = route($route, array($item->slug));
		}

		$breadcrumbs[] = $active !== null ? $active : $page->title;

		return $breadcrumbs;
	}

    /**
     * Get main menu items.
     *
     * @param Page $activePage
     *
     * @return array
     */
	protected function getMenu(Page $activePage)
	{

		$itemTree = $this->page
			->where('parent_id', '=', 1)
			->get([ 'id', 'slug', 'title', '_lft', 'parent_id' ])
			->toTree();

		return make_nav($itemTree, $activePage->getKey());
	}
	protected function getMenu2(Page $activePage)
	{

		$itemTree = $this->page
			->where('parent_id', '!=', 'NULL')
			->get([ 'id', 'slug', 'title', '_lft', 'parent_id' ])
			->toTree();

		return make_nav($itemTree, $activePage->getKey());
	}

	protected function getPullDown()
	{
		$pages = $this->page->withDepth()->defaultOrder()->get();
//dd($pages);
//		return make_nav($pages, $activePage->getKey());
//		return make_nav($pages);
		return $pages;
	}


	protected function exploreNested()
	{

// dump straight list
$result = $this->page->withDepth()->defaultOrder()->get();

// 1,2,4 WTF???
//$result = Page::hasChildren()->get();

// this is returning only 1 value!!! UGH!!!
//$result = Page::hasChildren()->withDepth()->having('depth', '=', 1)->get();

// #1 Using accessor
//$result = $this->page->getAncestors();


// All nodes will now be ordered by lft value,, dump straight list
//$result = Page::defaultOrder()->get();

// remove ID=1
//$result = Page::hasParent()->get();



//dd($result);

		return $result;
	}





}
