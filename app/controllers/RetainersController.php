<?php

class RetainersController extends \BaseController {

    protected $retainer;

    public function __construct(Retainer $retainer)
    {
        $this->retainer = $retainer;
        $this->person = new Person;
//        $this->org = new Organization;
    }

	/**
	 * Display a listing of the resource.
	 * GET /retainers
	 *
	 * @return Response
	 */
    public function index()
    {
        $retainers = $this->retainer->all();

        return View::make('retainers.index')->with('retainers', $retainers);
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /retainers/create
	 *
	 * @return Response
	 */
    public function create()
    {
        $accounts = $this->person->where('is_account_manager', '1')->get();
        $strats = $this->person->where('is_marketing_strategiest', '1')->get();

        $accountManagers[] = '';
        foreach($accounts as $account)
        {
            $accountManagers[$account->id] = $account->name . ' ' . $account->state;
        }

        $marketers[] = '';
        foreach($strats as $strat)
        {
            $marketers[$strat->id] = $strat->name . ' ' . $strat->state;
        }

        return View::make('retainers.create')
            ->with('marketers', $marketers)
            ->with('accountManagers', $accountManagers);
    }

	/**
	 * Store a newly created resource in storage.
	 * POST /retainers
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /retainers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /retainers/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /retainers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /retainers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}