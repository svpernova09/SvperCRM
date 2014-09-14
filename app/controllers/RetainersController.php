<?php

use SvperCRM\Repositories\RetainerRepositoryInterface;
use SvperCRM\Repositories\PersonRepositoryInterface;

class RetainersController extends \BaseController {

    protected $retainer;
    protected $person;

    public function __construct(
        RetainerRepositoryInterface $retainer,
        PersonRepositoryInterface $person)
    {
        $this->retainer = $retainer;
        $this->person = $person;
    }

	/**
	 * Display a listing of the resource.
	 * GET /retainers
	 *
	 * @return Response
	 */
    public function index()
    {
        $retainers = $this->retainer->getAll();

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
        $accounts = $this->person->where('is_account_manager', '1');
        $strats = $this->person->where('is_marketing_strategiest', '1');

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
        $input = Input::all();

        $rules = [
            'title' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {

            return Redirect::route('retainers.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $retainer = $this->retainer->create($input);

            return Redirect::route('retainers.index')->with('flash', array(
                'class' => 'success',
                'message' => 'Retainer Created.'
            ));
        }
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
        $retainer = $this->retainer->find($id);

        return View::make('retainers.show')->with('retainer', $retainer);
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
        $retainer = $this->retainer->find($id);
        $accounts = $this->person->where('is_account_manager', '1');
        $strats = $this->person->where('is_marketing_strategiest', '1');

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

        return View::make('retainers.edit')
            ->with('retainer', $retainer)
            ->with('accountManagers', $accountManagers)
            ->with('marketers', $marketers);
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
        $input = Input::all();

        $rules = [
            'title' => 'required'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {

            return Redirect::to('retainers/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($input);
        } else {
            // store
            $this->retainer = Retainer::find($id);

            $this->retainer->update($input);

            // redirect
            return Redirect::route('retainers.show', [$id])->with('flash', 'Your Retainer has been updated!');
        }
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
        $retainer = Retainer::find($id);

        $retainer->delete();

        return Redirect::route('retainers.index')->with('flash', 'Your Retainer has been removed!');
	}

    /**
     * Show form to upload CSV
     * @return mixed
     */
    public function upload()
    {
        return View::make('retainers.upload');
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
                    $retainer = new Retainer;

                    $retainer->title = $row['0'];
                    $retainer->hours = $row['1'];
                    $retainer->strategiest_id = $row['2'];
                    $retainer->account_manager_id = $row['3'];
                    $retainer->domain = $row['4'];
                    $retainer->comments = $row['5'];

                    $retainer->save();
                }

                $rowCount++;
            }
            fclose($upload);

            return Redirect::route('retainers.index')->with('flash', 'Your file has been imported');
        } else {

            Redirect::route('import.retainers')->with('flash', 'There was no file in your submission');
        }

    }
}