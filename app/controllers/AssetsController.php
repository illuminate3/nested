<?php //namespace controllers;

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
		$rooms = $this->asset->getRooms();
		$rooms = array('' => 'Select a Room') + $rooms;
		$statuses = $this->asset->getStatuses();
		$statuses = array('' => trans('lingos::general.command.select_a') . '&nbsp;' . trans('lingos::general.status')) + $statuses;

//		return View::make('assets.create');
		return View::make('assets.create',
			compact('items', 'users', 'sites', 'statuses', 'rooms')
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
		$input = array_except(Input::all(), ['_method']);

		$validation = Validator::make($input, Asset::$rules);

		if ($validation->passes())
		{
			$this->asset->create($input);



$id = DB::getPdo()->lastInsertId();

$item_id = Input::get('item_id');
$user_id = Input::get('user_id');
$site_id = Input::get('site_id');
$room_id = Input::get('room_id');

$this->asset->attachAsset($id, $item_id);
$this->asset->attachUser($id, $user_id);
$this->asset->attachSite($id, $site_id);
$this->asset->attachRoom($id, $room_id);




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
		$rooms = $this->asset->getRooms();
		$rooms = array('' => 'Select a Room') + $rooms;
		$statuses = $this->asset->getStatuses();
		$statuses = array('' => trans('lingos::general.command.select_a') . '&nbsp;' . trans('lingos::general.status')) + $statuses;

		if (is_null($asset))
		{
			return Redirect::route('asset.index');
		}

//		return View::make('assets.edit', compact('asset'));
		return View::make('assets.edit',
			compact('asset', 'items', 'sites', 'users', 'statuses', 'rooms')
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
		$input = array_except(Input::all(), '_method');
//dd($input);
//		$input = array_except(Input::all(), ['_method', 'item_id', 'user_id', 'site_id', 'room_id']);
//dd($input);

		$validation = Validator::make($input, Asset::$rules);

		if ($validation->passes())
		{

//$category = Input::get('parent_id');
//$this->item->attachItem($id, $category);

//dd(Input::get('user_id'));
/*
			if ( Input::get('item_id') == '' ) {
				$input['item_id'] = Null;
			} else {
				$item_id = Input::get('item_id');
				$this->asset->detachAsset($id, $item_id);
				$this->asset->attachAsset($id, $item_id);
			}
			if ( Input::get('user_id') == '' ) {
				$input['user_id'] = Null;
			} else {
				$user_id = Input::get('user_id');
				$this->asset->detachUser($id, $user_id);
				$this->asset->attachUser($id, $user_id);
			}
			if ( Input::get('site_id') == '' ) {
				$input['site_id'] = Null;
			} else {
				$site_id = Input::get('site_id');
				$this->asset->detachSite($id, $site_id);
				$this->asset->attachSite($id, $site_id);
			}
			if ( Input::get('room_id') == '' ) {
				$input['room_id'] = Null;
			} else {
				$room_id = Input::get('room_id');
				$this->asset->detachRoom($id, $room_id);
				$this->asset->attachRoom($id, $room_id);
			}
/*

			$item_id = Input::get('item_id');
			$this->asset->syncAsset($id, $item_id);
			$user_id = Input::get('user_id');
			$this->asset->syncUser($id, $user_id);
			$site_id = Input::get('site_id');
			$this->asset->syncSite($id, $site_id);
			$room_id = Input::get('room_id');
			$this->asset->syncRoom($id, $room_id);
*/

//dd($input);

$category_id = Input::get('category_id');
$this->item->detachAsset($id, $category_id);
$this->item->attachAsset($id, $category_id);


			$asset = $this->asset->find($id);
			$asset->update($input);

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
