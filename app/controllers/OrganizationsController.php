<?php

use SvperCRM\Repositories\OrganizationRepositoryInterface;
use SvperCRM\Repositories\PersonRepositoryInterface;

class OrganizationsController extends \BaseController {

    /**
     * @var OrganizationRepositoryInterface
     */
    protected $org;
    protected $person;

    public function __construct(
        OrganizationRepositoryInterface $org,
        PersonRepositoryInterface $person)
    {
        $this->org = $org;
        $this->person = $person;
    }

	public function index()
	{
        $organizations = $this->org->getAll();

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
        $agencies = $this->org->where('is_agency', '1');
        $sales = $this->person->where('is_sales_person', '1');
        $accounts = $this->person->where('is_account_manager', '1');

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
        $organization = $this->org->find($id);

        return View::make('organizations.show')->with('organization', $organization);
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
        $agencies = $this->org->where('is_agency', '1');
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

    /**
     * Show form to upload CSV
     * @return mixed
     */
    public function upload()
    {
        return View::make('organizations.upload');
    }

    /**
     * Process the uploaded CSV file
     */
    public function import()
    {
        if (Input::hasFile('csv')) {

            $upload = fopen(Input::file('csv')->getRealPath(), 'r');
            $rowCount = 0;

            while (($row = fgetcsv($upload)) !== FALSE) {

                if($rowCount != 0)
                {
                    $org = new Organization;

                    $org->name = $row['0'];
                    $org->address = $row['1'];
                    $org->address2 = $row['2'];
                    $org->city = $row['3'];
                    $org->state = $row['4'];
                    $org->zip = $row['5'];
                    $org->phone = $row['6'];
                    $org->salesperson_id = $row['7'];
                    $org->account_manager_id = $row['8'];
                    $org->is_agency = $row['9'];
                    $org->agency_id = $row['10'];
                    $org->comments = $row['11'];

                    $org->save();
                }

                $rowCount++;
            }
            fclose($upload);

            return Redirect::route('organizations.index')->with('flash', 'Your file has been imported');
        } else {

            Redirect::route('import.people')->with('flash', 'There was no file in your submission');
        }

    }
}