<?php

use SvperCRM\Repositories\ContractRepositoryInterface;
use SvperCRM\Repositories\PersonRepositoryInterface;

class ContractsController extends \BaseController {

    /**
     * @var ContractRepositoryInterface
     */
    protected $contract;
    protected $person;

    public function __construct(
        ContractRepositoryInterface $contract,
        PersonRepositoryInterface $person)
    {
        $this->contract = $contract;
        $this->person = $person;
    }

	public function index()
	{
        $contracts = $this->contract->getAll();

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
        $devs = $this->person->where('is_developer', '1');
        $designs = $this->person->where('is_designer', '1');

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
        $devs = $this->person->where('is_developer', '1');
        $designs = $this->person->where('is_designer', '1');

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
            return Redirect::route('contracts.show', [$id])
                ->with('flash', 'Your Contract has been updated!');
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

        return Redirect::route('contracts.index')
            ->with('flash', 'Your Contract has been removed!');
	}

    /**
     * Show form to upload CSV
     * @return mixed
     */
    public function upload()
    {
        return View::make('contracts.upload');
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
                    $contract = new Contract;

                    $contract->title = $row['0'];
                    $contract->hours = $row['1'];
                    $contract->start_date = $row['2'];
                    $contract->end_date = $row['3'];
                    $contract->designer_id = $row['4'];
                    $contract->developer_id = $row['5'];
                    $contract->platform = $row['6'];
                    $contract->domain = $row['7'];

                    $contract->save();
                }

                $rowCount++;
            }
            fclose($upload);

            return Redirect::route('contracts.index')
                ->with('flash', 'Your file has been imported');
        } else {

            Redirect::route('import.contracts')
                ->with('flash', 'There was no file in your submission');
        }

    }
}