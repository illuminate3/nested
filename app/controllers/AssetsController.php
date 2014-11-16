<?php

class AssetsController extends \BaseController {

	/**
	 * Asset Repository
	 *
	 * @var Asset
	 */
	protected $asset;

	public function __construct(Asset $asset)
	{
		$this->asset = $asset;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$assets = $this->asset->all();

		return View::make('assets.index', compact('assets'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$items = $this->asset->getItems();
		$items = array('' => 'Select an Item') + $items;
		$users = $this->asset->getUsers();
		$users = array('' => 'Select a User') + $users;
		$sites = $this->asset->getSites();
		$sites = array('' => 'Select a Site') + $sites;
		$statuses = $this->asset->getStatuses();
		$statuses = array('' => trans('lingos::general.command.select_a') . '&nbsp;' . trans('lingos::general.status')) + $statuses;

//		return View::make('assets.create');
		return View::make('assets.create',
			compact('items', 'users', 'sites', 'statuses')
			);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
//		$input = Input::all();
		$input = array_except(Input::all(), ['_method', 'item_id', 'user_id', 'site_id']);

		$validation = Validator::make($input, Asset::$rules);

		if ($validation->passes())
		{
			$this->asset->create($input);

$item = Input::get('item_id');
$this->asset->attachAsset($id, $item);
$user = Input::get('user_id');
$this->asset->attachUser($id, $user);
$site = Input::get('site_id');
$this->asset->attachSite($id, $site);


			return Redirect::route('asset.index');
		}

		return Redirect::route('asset.create')
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
		$asset = $this->asset->findOrFail($id);

		return View::make('assets.show', compact('asset'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$asset = $this->asset->find($id);

		$items = $this->asset->getItems();
		$items = array('' => 'Select an Item') + $items;
		$users = $this->asset->getUsers();
		$users = array('' => 'Select a User') + $users;
		$sites = $this->asset->getSites();
		$sites = array('' => 'Select a Site') + $sites;
		$statuses = $this->asset->getStatuses();
		$statuses = array('' => trans('lingos::general.command.select_a') . '&nbsp;' . trans('lingos::general.status')) + $statuses;

		if (is_null($asset))
		{
			return Redirect::route('asset.index');
		}

//		return View::make('assets.edit', compact('asset'));
		return View::make('assets.edit',
			compact('asset', 'items', 'sites', 'users', 'statuses')
			);
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
//dd($input);
		$input = array_except(Input::all(), ['_method', 'item_id', 'user_id', 'site_id']);
//dd($input);

		$validation = Validator::make($input, Asset::$rules);

		if ($validation->passes())
		{
			$asset = $this->asset->find($id);
			$asset->update($input);

//$category = Input::get('parent_id');
//$this->item->attachItem($id, $category);

			$item_id = Input::get('item_id');
			$this->asset->attachAsset($id, $item_id);
			$user_id = Input::get('user_id');
			$this->asset->attachUser($id, $user_id);
			$site_id = Input::get('site_id');
			$this->asset->attachSite($id, $site_id);


			return Redirect::route('asset.show', $id);
		}

		return Redirect::route('asset.edit', $id)
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
		$this->asset->find($id)->delete();

		return Redirect::route('asset.index');
	}

}
