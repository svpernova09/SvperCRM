<?php

use SvperCRM\Repositories\PersonRepositoryInterface;

class PeopleController extends \BaseController {

    protected $person;

    public function __construct(PersonRepositoryInterface $person)
    {
        $this->person = $person;
    }
	/**
	 * Display a listing of the resource.
	 * GET /people
	 *
	 * @return Response
	 */
	public function index()
	{
        $people = $this->person->getAll();

        return View::make('people.index')->with('people', $people);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /people/create
	 *
	 * @return Response
	 */
    public function create()
    {
        $allOrgs = Organization::all();

        $orgs[] = '';
        foreach($allOrgs as $org)
        {
            $orgs[$org->id] = $org->name . ' ' . $org->state;
        }

        return View::make('people.create')->with('orgs', $orgs);
    }

	/**
	 * Store a newly created resource in storage.
	 * POST /people
	 *
	 * @return Response
	 */
    public function store()
    {
        $input = Input::all();

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {

            return Redirect::route('people.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $person = $this->person->create($input);

            return Redirect::route('people.index')->with('flash', array(
                'class' => 'success',
                'message' => 'Person Created.'
            ));
        }
    }

	/**
	 * Display the specified resource.
	 * GET /people/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $person = $this->person->find($id);

        return View::make('people.show')->with('person', $person);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /people/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function edit($id)
    {
        $person = $this->person->find($id);
        $allOrgs = Organization::all();

        $orgs[] = '';
        foreach($allOrgs as $org)
        {
            $orgs[$org->id] = $org->name . ' ' . $org->state;
        }

        return View::make('people.edit')
            ->with('person', $person)
            ->with('orgs', $orgs);
    }

	/**
	 * Update the specified resource in storage.
	 * PUT /people/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = Input::all();

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {

            return Redirect::to('people/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($input);
        } else {
            // store
            $this->person = Person::find($id);

            $this->person->update($input);

            // redirect
            return Redirect::route('people.show', [$id])->with('flash', 'Your person has been updated!');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /people/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $person = $this->person->find($id);

        $person->delete();

        return Redirect::route('people.index')->with('flash', 'Your person has been removed!');
	}

    /**
     * Show form to upload CSV
     * @return mixed
     */
    public function upload()
    {
        return View::make('people.upload');
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
                    $person = new Person;

                    $person->first_name = $row['0'];
                    $person->last_name = $row['1'];
                    $person->organization_id = $row['2'];
                    $person->address = $row['3'];
                    $person->address2 = $row['4'];
                    $person->city = $row['5'];
                    $person->state = $row['6'];
                    $person->zip = $row['7'];
                    $person->office_phone = $row['8'];
                    $person->mobile_phone = $row['9'];
                    $person->email = $row['10'];
                    $person->comments = $row['11'];
                    $person->is_sales_person = $row['12'];
                    $person->is_account_manager = $row['13'];
                    $person->is_designer = $row['14'];
                    $person->is_developer = $row['15'];
                    $person->is_marketing_strategiest = $row['16'];

                    $person->save();
                }

                $rowCount++;
            }
            fclose($upload);

            return Redirect::route('people.index')->with('flash', 'Your file has been imported');
        } else {

            Redirect::route('import.people')->with('flash', 'There was no file in your submission');
        }

    }
}