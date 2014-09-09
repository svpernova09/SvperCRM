<?php

class ContractsController extends \BaseController {

    protected $retainer;

    public function __construct(Contract $contract)
    {
        $this->contract = $contract;
        $this->person = new Person;
    }

	/**
	 * Display a listing of the resource.
	 * GET /contracts
	 *
	 * @return Response
	 */
	public function index()
	{
        $contracts = $this->contract->all();

        return View::make('contracts.index')->with('contracts', $contracts);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /contracts/create
	 *
	 * @return Response
	 */
    public function create()
    {
        $devs = $this->person->where('is_developer', '1')->get();
        $designs = $this->person->where('is_designer', '1')->get();

        $developers[] = '';
        foreach($devs as $dev)
        {
            $developers[$dev->id] = $dev->name . ' ' . $dev->state;
        }

        $designers[] = '';
        foreach($designs as $design)
        {
            $designers[$design->id] = $design->name . ' ' . $design->state;
        }

        return View::make('contracts.create')
            ->with('developers', $developers)
            ->with('designers', $designers);
    }

	/**
	 * Store a newly created resource in storage.
	 * POST /contracts
	 *
	 * @return Response
	 */
    public function store()
    {
        $input = Input::all();

        $rules = [
            'title' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {

            return Redirect::route('contracts.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $contract = $this->contract->create($input);

            return Redirect::route('contracts.index')->with('flash', array(
                'class' => 'success',
                'message' => 'Contract Created.'
            ));
        }
    }

	/**
	 * Display the specified resource.
	 * GET /contracts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $contract = $this->contract->find($id);

        return View::make('contracts.show')->with('contract', $contract);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /contracts/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function edit($id)
    {
        $contract = $this->contract->find($id);
        $devs = $this->person->where('is_developer', '1')->get();
        $designs = $this->person->where('is_designer', '1')->get();

        $developers[] = '';
        foreach($devs as $dev)
        {
            $developers[$dev->id] = $dev->name . ' ' . $dev->state;
        }

        $designers[] = '';
        foreach($designs as $design)
        {
            $designers[$design->id] = $design->name . ' ' . $design->state;
        }

        return View::make('contracts.edit')
            ->with('contract', $contract)
            ->with('designers', $designers)
            ->with('developers', $developers);
    }


	/**
	 * Update the specified resource in storage.
	 * PUT /contracts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = Input::all();

        $rules = [
            'title' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {

            return Redirect::to('contracts/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($input);
        } else {
            // store
            $this->contract = Contract::find($id);

            $this->contract->update($input);

            // redirect
            return Redirect::route('contracts.show', [$id])->with('flash', 'Your Contract has been updated!');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /contracts/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $contract = Contract::find($id);

        $contract->delete();

        return Redirect::route('contracts.index')->with('flash', 'Your Contract has been removed!');
	}

}