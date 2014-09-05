<?php

class PeopleController extends \BaseController {

    protected $person;

    public function __construct(Person $person)
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
        $people = $this->person->all();

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
            'name' => 'required'
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
            'name' => 'required'
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
		//
	}

}