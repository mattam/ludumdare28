<?php
class DicesController extends BaseController {

	/**
	 * Dice Repository
	 *
	 * @var Dice
	 */
	protected $dice;

	public function __construct(Dice $dice)
	{
		$this->dice = $dice;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$dices = $this->dice->all();

		return View::make('dices.index', compact('dices'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('dices.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Dice::$rules);

		if ($validation->passes())
		{
			$this->dice->create($input);

			return Redirect::route('dices.index');
		}

		return Redirect::route('dices.create')
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
		$dice = $this->dice->findOrFail($id);

		return View::make('dices.show', compact('dice'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$dice = $this->dice->find($id);

		if (is_null($dice))
		{
			return Redirect::route('dices.index');
		}

		return View::make('dices.edit', compact('dice'));
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
		$validation = Validator::make($input, Dice::$rules);

		if ($validation->passes())
		{
			$dice = $this->dice->find($id);
			$dice->update($input);

			return Redirect::route('dices.show', $id);
		}

		return Redirect::route('dices.edit', $id)
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
		$this->dice->find($id)->delete();

		return Redirect::route('dices.index');
	}

	/**
	 * Roll the specified dice, storing a random value betwen 1..6.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function roll($id)
	{

		$input = ['rolled' => rand(1, 6)];

		$dice = $this->dice->find($id);
		$dice->update($input);

		return Redirect::route('dices.show', $id);
	}

	/**
	 * Rolls all the user's dices, storing a random value betwen 1..6.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function rollAll()
	{
		$user = User::find(Sentry::getUser()->id);

		$dices = $user->dices;

		foreach ($dices as $dice)
		{
			$input = ['rolled' => rand(1, 6)];
			$dice = $this->dice->find($dice->id);
			$dice->update($input);
		}
		$total = $user->dices()->sum('rolled');
		return Redirect::route('game', compact('dices', 'total'));
	}

	/**
	 * Return all of the user's dice(s)
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDices()
	{
		$user = User::find(Sentry::getUser()->id);

		$dices = $user->dices;
		$total = $user->dices()->sum('rolled');
		return View::make('game.index', compact('dices', 'total'));
	}

	/**
	 * Add dice for this user
	 *
	 * @return Response
	 */
	public function addDice()
	{
		$user = Sentry::getUser();
		// $input = ['rolled' => 1];
		// $this->dice->create($input);
		$dice = new Dice;
		$dice->rolled = 1;
		$dice->save();

		$diceuser = DiceUser::create(array('dice_id' => $dice->id, 'user_id' => $user->id));


		return Redirect::route('dices.index');

	}

}
