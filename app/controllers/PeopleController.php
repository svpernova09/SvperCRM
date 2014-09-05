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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /people
	 *
	 * @return Response
	 */
	public function store()
	{
        //
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
		//
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
		//
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