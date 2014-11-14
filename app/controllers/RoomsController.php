<?php

class RoomsController extends BaseController {

	/**
	 * Room Repository
	 *
	 * @var Room
	 */
	protected $room;

	public function __construct(Room $room)
	{
		$this->room = $room;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$rooms = $this->room->all();

		return View::make('rooms.index', compact('rooms'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('rooms.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Room::$rules);

		if ($validation->passes())
		{
			$this->room->create($input);

			return Redirect::route('rooms.index');
		}

		return Redirect::route('rooms.create')
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
		$room = $this->room->findOrFail($id);

		return View::make('rooms.show', compact('room'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$room = $this->room->find($id);

		if (is_null($room))
		{
			return Redirect::route('rooms.index');
		}

		return View::make('rooms.edit', compact('room'));
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
		$validation = Validator::make($input, Room::$rules);

		if ($validation->passes())
		{
			$room = $this->room->find($id);
			$room->update($input);

			return Redirect::route('rooms.show', $id);
		}

		return Redirect::route('rooms.edit', $id)
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
		$this->room->find($id)->delete();

		return Redirect::route('rooms.index');
	}

}
