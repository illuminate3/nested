<?php //namespace controllers;

class ItemsController extends BaseController {

	/**
	 * Item Repository
	 *
	 * @var Item
	 */
	protected $item;

	public function __construct(Item $item, Category $category)
	{
		$this->item = $item;
		$this->category = $category;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = $this->item->all();
//		$items = $items->with('categories');
//dd($items);

		return View::make('items.index', compact('items'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$parents = $this->getParents();

//		return View::make('items.create');
		return View::make('items.create', compact('parents'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
//		$input = Input::all();
		$input = array_except(Input::all(), '_method');
//dd($input);

		$validation = Validator::make($input, Item::$rules);

		if ($validation->passes())
		{
			$this->item->create($input);


$id = DB::getPdo()->lastInsertId();
$category_id = Input::get('category_id');
$this->item->attachItem($id, $category_id);


			return Redirect::route('items.index');
		}

		return Redirect::route('items.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$item = $this->item->findOrFail($id);

$assets = Item::findOrFail($item->id)->assets;
//dd($assets);

		return View::make('items.show', compact('item', 'assets'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$item = $this->item->find($id);

$category = $this->category->findOrFail($id);
$parents = $this->category->getParents();

/*
$this->layout
->withTitle('Update '.$category->title)
->nest('content', 'categories.edit', compact('category', 'parents'));
*/

		if (is_null($item))
		{
			return Redirect::route('items.index');
		}

		return View::make('items.edit',
			compact('item', 'category', 'parents'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
//		$input = array_except(Input::all(), '_method');
		$input = array_except(Input::all(), ['_method']);
//dd($input);


		$validation = Validator::make($input, Item::$rules);

//dd($input);

		if ($validation->passes())
		{
			$item = $this->item->find($id);
			$item->update($input);

//$product = $id;
//$product->categories()->attach(Input::get('parent_id'));

//Item::find($id)->categories()->attach( Input::get('parent_id') );

//$customer = Item::find($id);
//$customer->categories()->attach(Input::get('parent_id'));

$category_id = Input::get('category_id');
$this->item->detachItem($id, $category_id);
$this->item->attachItem($id, $category_id);


/*
			$bill = Bill::find($bill_id);

			$charges = Charge::where('bill_id', '=', $bill_id)->get();
			foreach($charges as $key => $value)
			{
				$charges[$key]['status_pick_id'] = 1;
			}
			foreach($charges as $charge)
			{
				$bill->charges()->attach($charge); //this executes the insert-query
			}
*/

			return Redirect::route('items.show', $id);
		}

		return Redirect::route('items.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->item->find($id)->delete();

		return Redirect::route('items.index');
	}


	/**
	 * Get all available nodes as a list for HTML::select.
	 *
	 * @return array
	 */
	protected function getParents()
	{
		$all = $this->category->select('id', 'title')->withDepth()->defaultOrder()->get();
		$result = array();

		foreach ($all as $item)
		{
			$title = $item->title;

			if ($item->depth > 0) $title = str_repeat('—', $item->depth).' '.$title;

			$result[$item->id] = $title;
		}

		return $result;
	}

}
