<?php

class OrganizationsController extends \BaseController {

    protected $org;

    public function __construct(Organization $org)
    {
        $this->org = $org;
        $this->person = new Person;
    }

	public function index()
	{
        $organizations = $this->org->all();

        return View::make('organizations.index')->with('organizations', $organizations);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /organizations/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $agencies = $this->org->where('is_agency', '1')->get();
        $sales = $this->person->where('is_sales_person', '1')->get();
        $accounts = $this->person->where('is_account_manager', '1')->get();

        $salesPeople[] = '';
        foreach($sales as $sale)
        {
            $salesPeople[$sale->id] = $sale->name . ' ' . $sale->state;
        }

        $accountManagers[] = '';
        foreach($accounts as $account)
        {
            $accountManagers[$account->id] = $account->name . ' ' . $account->state;
        }

        $possibleAgencies[] = '';
        foreach($agencies as $agency)
        {
            $possibleAgencies[$agency->id] = $agency->name . ' ' . $agency->state;
        }

        return View::make('organizations.create')
            ->with('possibleAgencies', $possibleAgencies)
            ->with('salesPeople', $salesPeople)
            ->with('accountManagers', $accountManagers);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /organizations
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

        $rules = [
            'name' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {

            return Redirect::route('organizations.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $org = $this->org->create($input);

            return Redirect::route('organizations.index')->with('flash', array(
                'class' => 'success',
                'message' => 'Organization Created.'
            ));
        }
	}

	/**
	 * Display the specified resource.
	 * GET /organizations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $org = $this->org->find($id);

        return View::make('organizations.show')->with('org', $org);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /organizations/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $org = $this->org->find($id);
        $agencies = $this->org->where('is_agency', '1')->get();
        $sales = $this->person->where('is_sales_person', '1')->get();
        $accounts = $this->person->where('is_account_manager', '1')->get();

        $salesPeople[] = '';
        foreach($sales as $sale)
        {
            $salesPeople[$sale->id] = $sale->name . ' ' . $sale->state;
        }

        $accountManagers[] = '';
        foreach($accounts as $account)
        {
            $accountManagers[$account->id] = $account->name . ' ' . $account->state;
        }

        $possibleAgencies[] = '';
        foreach($agencies as $agency)
        {
            $possibleAgencies[$agency->id] = $agency->name . ' ' . $agency->state;
        }

        return View::make('organizations.edit')
            ->with('org', $org)
            ->with('possibleAgencies', $possibleAgencies)
            ->with('salesPeople', $salesPeople)
            ->with('accountManagers', $accountManagers);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /organizations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = Input::all();

        $rules = [
            'name' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {

            return Redirect::to('organizations/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($input);
        } else {
            // store
            $this->org = Organization::find($id);

            $this->org->update($input);

            // redirect
            return Redirect::route('organizations.show', [$id])->with('flash', 'Your organization has been updated!');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /organizations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$org = $this->org->find($id);

        $org->delete();

        return Redirect::route('organizations.index')->with('flash', 'Your organization has been removed!');
	}

}