<?php

class CredentialsController extends \BaseController {

    protected $credential;
    protected $org;

    public function __construct(Credential $credential, Organization $org)
    {
        $this->credential = $credential;
        $this->org = $org;
    }

	/**
	 * Display a listing of the resource.
	 * GET /credentials
	 *
	 * @return Response
	 */
	public function index($organization_id)
	{
        $credentials = $this->credential->where('organization_id', $organization_id)->get();

        return View::make('credentials.index')->with('credentials', $credentials);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /credentials/create
	 *
	 * @return Response
	 */
	public function create($organization_id)
	{

        return View::make('credentials.create')->with('organization_id', $organization_id);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /credentials
	 *
	 * @return Response
	 */
	public function store($organization_id)
	{
        $input = Input::all();
        $input['organization_id'] = $organization_id;

        $rules = [
            'service_name' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {

            Redirect::route('organizations.credentials.create', array('id', $organization_id))
                ->withInput()
                ->withErrors($validator);
        } else {

            $credential = $this->credential->create($input);

            return Redirect::route('organizations.show', array($organization_id))->with('flash', array(
                'class' => 'success',
                'message' => 'Credential Created.'
            ));
        }
	}

	/**
	 * Display the specified resource.
	 * GET /credentials/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($organization_id, $id)
	{
        $org = $this->org->find($organization_id);
        $credential = $this->credential->find($id);

        return View::make('credentials.show')
            ->with('credential', $credential)
            ->with('org', $org);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /credentials/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($organization_id, $id)
	{
        $org = $this->org->find($organization_id);
        $credential = $this->credential->find($id);

        return View::make('credentials.edit')
            ->with('credential', $credential)
            ->with('org', $org);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /credentials/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($organization_id, $id)
	{
        $input = Input::all();

        $rules = [
            'service_name' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {

            return Redirect::to('organizataions/' . $organization_id . '/credentials/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($input);
        } else {
            // store
            $this->credential = Credential::find($id);

            $this->credential->update($input);

            // redirect
            return Redirect::route('organizations.credentials.show', [$organization_id, $id])->with('flash', 'Your Credential has been updated!');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /credentials/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($organization_id, $id)
	{
        $this->credential = Credential::find($id);

        $this->credential->delete();

        return Redirect::route('organizations.show', [$organization_id])->with('flash', 'Your Credential has been removed!');
	}

}