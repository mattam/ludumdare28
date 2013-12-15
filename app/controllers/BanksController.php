<?php

class BanksController extends BaseController {

	/**
	 * Bank Repository
	 *
	 * @var Bank
	 */
	protected $bank;

	public function __construct(Bank $bank)
	{
		$this->bank = $bank;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$banks = $this->bank->all();

		return View::make('banks.index', compact('banks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('banks.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Bank::$rules);

		if ($validation->passes())
		{
			$this->bank->create($input);

			return Redirect::route('banks.index');
		}

		return Redirect::route('banks.create')
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
		$bank = $this->bank->findOrFail($id);

		return View::make('banks.show', compact('bank'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bank = $this->bank->find($id);

		if (is_null($bank))
		{
			return Redirect::route('banks.index');
		}

		return View::make('banks.edit', compact('bank'));
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
		$validation = Validator::make($input, Bank::$rules);

		if ($validation->passes())
		{
			$bank = $this->bank->find($id);
			$bank->update($input);

			return Redirect::route('banks.show', $id);
		}

		return Redirect::route('banks.edit', $id)
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
		$this->bank->find($id)->delete();

		return Redirect::route('banks.index');
	}

}
