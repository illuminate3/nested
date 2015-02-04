<?php //namespace Third\models;

use lib\presenters\PresentableTrait;

//use Eloquent;
//use DB;

class Scan extends Eloquent {

	use PresentableTrait;

	/**
	 * The model presenter.
	 *
	 * @var string
	 */
	protected $presenter = 'lib\presenters\presenter\Pallet';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pallets';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	protected $guarded = array();

// DEFINE Rules --------------------------------------------------
	public static $rules = array(
		'barcode' => 'required'
	);
	public static $rulesRack = array(
		'barcode' => 'required'
	);

// DEFINE Fillable --------------------------------------------------
	protected $fillable = array(
/*
		'order_id' => 'required',
		'message' => 'required'
*/
	);

// DEFINE Relationships --------------------------------------------------

// Functions --------------------------------------------------
	public function getPallet($barcode)
	{
		$pallet = DB::table('pallets')
			->where('barcode', '=', $barcode)
			->get();

		return $pallet;
	}

	public function getRack($barcode)
	{
		$rack = DB::table('racks')
			->where('barcode', '=', $barcode)
			->get();
//dd($rack);
		return $rack;
	}
/*
	public function checkMove($rack_barcode)
	{
		$status = DB::table('racks')
			->where('barcode', '=', $rack_barcode)
			->pluck('status');

		return $status;
	}

	public function movePallet($pallet_id, $rack_barcode)
	{
//dd($rack_barcode);

		$zone = DB::table('racks')
			->where('barcode', '=', $rack_barcode)
			->pluck('zone');
		$rack_id = DB::table('racks')
			->where('barcode', '=', $rack_barcode)
			->pluck('id');
		$zone_id = DB::table('zones')
			->where('name', '=', $zone)
			->pluck('id');
//dd($rack_id);

		$pallet = Pallet::find($pallet_id);
		$pallet->rack_id = $rack_id;
		$pallet->zone_id = $zone_id;
		$pallet->update();

		$rack = Rack::find($rack_id);
		$rack->status = 0;
		$rack->update();
	}
*/

}
