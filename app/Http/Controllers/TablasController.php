<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTablasRequest;
use App\Http\Requests\UpdateTablasRequest;
use App\Repositories\TablasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TablasController extends AppBaseController
{
    /** @var  TablasRepository */
    private $tablasRepository;

    public function __construct(TablasRepository $tablasRepo)
    {
        $this->tablasRepository = $tablasRepo;
    }

    /**
     * Display a listing of the Tablas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tablasRepository->pushCriteria(new RequestCriteria($request));
        $tablas = $this->tablasRepository->all();

        return view('tablas.index')
            ->with('tablas', $tablas);
    }

    /**
     * Show the form for creating a new Tablas.
     *
     * @return Response
     */
    public function create()
    {
        return view('tablas.create');
    }

    /**
     * Store a newly created Tablas in storage.
     *
     * @param CreateTablasRequest $request
     *
     * @return Response
     */
    public function store(CreateTablasRequest $request)
    {
        $input = $request->all();

        $tablas = $this->tablasRepository->create($input);

        Flash::success('Tablas saved successfully.');

        return redirect(route('tablas.index'));
    }

    /**
     * Display the specified Tablas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tablas = $this->tablasRepository->findWithoutFail($id);

        if (empty($tablas)) {
            Flash::error('Tablas not found');

            return redirect(route('tablas.index'));
        }

        return view('tablas.show')->with('tablas', $tablas);
    }

    /**
     * Show the form for editing the specified Tablas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tablas = $this->tablasRepository->findWithoutFail($id);

        if (empty($tablas)) {
            Flash::error('Tablas not found');

            return redirect(route('tablas.index'));
        }

        return view('tablas.edit')->with('tablas', $tablas);
    }

    /**
     * Update the specified Tablas in storage.
     *
     * @param  int              $id
     * @param UpdateTablasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTablasRequest $request)
    {
        $tablas = $this->tablasRepository->findWithoutFail($id);

        if (empty($tablas)) {
            Flash::error('Tablas not found');

            return redirect(route('tablas.index'));
        }

        $tablas = $this->tablasRepository->update($request->all(), $id);

        Flash::success('Tablas updated successfully.');

        return redirect(route('tablas.index'));
    }

    /**
     * Remove the specified Tablas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tablas = $this->tablasRepository->findWithoutFail($id);

        if (empty($tablas)) {
            Flash::error('Tablas not found');

            return redirect(route('tablas.index'));
        }

        $this->tablasRepository->delete($id);

        Flash::success('Tablas deleted successfully.');

        return redirect(route('tablas.index'));
    }
}
