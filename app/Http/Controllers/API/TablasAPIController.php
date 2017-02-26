<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTablasAPIRequest;
use App\Http\Requests\API\UpdateTablasAPIRequest;
use App\Models\Tablas;
use App\Repositories\TablasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TablasController
 * @package App\Http\Controllers\API
 */

class TablasAPIController extends AppBaseController
{
    /** @var  TablasRepository */
    private $tablasRepository;

    public function __construct(TablasRepository $tablasRepo)
    {
        $this->tablasRepository = $tablasRepo;
    }

    /**
     * Display a listing of the Tablas.
     * GET|HEAD /tablas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tablasRepository->pushCriteria(new RequestCriteria($request));
        $this->tablasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tablas = $this->tablasRepository->all();

        return $this->sendResponse($tablas->toArray(), 'Tablas retrieved successfully');
    }

    /**
     * Store a newly created Tablas in storage.
     * POST /tablas
     *
     * @param CreateTablasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTablasAPIRequest $request)
    {
        $input = $request->all();

        $tablas = $this->tablasRepository->create($input);

        return $this->sendResponse($tablas->toArray(), 'Tablas saved successfully');
    }

    /**
     * Display the specified Tablas.
     * GET|HEAD /tablas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tablas $tablas */
        $tablas = $this->tablasRepository->findWithoutFail($id);

        if (empty($tablas)) {
            return $this->sendError('Tablas not found');
        }

        return $this->sendResponse($tablas->toArray(), 'Tablas retrieved successfully');
    }

    /**
     * Update the specified Tablas in storage.
     * PUT/PATCH /tablas/{id}
     *
     * @param  int $id
     * @param UpdateTablasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTablasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tablas $tablas */
        $tablas = $this->tablasRepository->findWithoutFail($id);

        if (empty($tablas)) {
            return $this->sendError('Tablas not found');
        }

        $tablas = $this->tablasRepository->update($input, $id);

        return $this->sendResponse($tablas->toArray(), 'Tablas updated successfully');
    }

    /**
     * Remove the specified Tablas from storage.
     * DELETE /tablas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tablas $tablas */
        $tablas = $this->tablasRepository->findWithoutFail($id);

        if (empty($tablas)) {
            return $this->sendError('Tablas not found');
        }

        $tablas->delete();

        return $this->sendResponse($id, 'Tablas deleted successfully');
    }
}
