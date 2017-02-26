<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateComandosAPIRequest;
use App\Http\Requests\API\UpdateComandosAPIRequest;
use App\Models\Comandos;
use App\Repositories\ComandosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ComandosController
 * @package App\Http\Controllers\API
 */

class ComandosAPIController extends AppBaseController
{
    /** @var  ComandosRepository */
    private $comandosRepository;

    public function __construct(ComandosRepository $comandosRepo)
    {
        $this->comandosRepository = $comandosRepo;
    }

    /**
     * Display a listing of the Comandos.
     * GET|HEAD /comandos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->comandosRepository->pushCriteria(new RequestCriteria($request));
        $this->comandosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $comandos = $this->comandosRepository->all();

        return $this->sendResponse($comandos->toArray(), 'Comandos retrieved successfully');
    }

    /**
     * Store a newly created Comandos in storage.
     * POST /comandos
     *
     * @param CreateComandosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateComandosAPIRequest $request)
    {
        $input = $request->all();

        $comandos = $this->comandosRepository->create($input);

        return $this->sendResponse($comandos->toArray(), 'Comandos saved successfully');
    }

    /**
     * Display the specified Comandos.
     * GET|HEAD /comandos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Comandos $comandos */
        $comandos = $this->comandosRepository->findWithoutFail($id);

        if (empty($comandos)) {
            return $this->sendError('Comandos not found');
        }

        return $this->sendResponse($comandos->toArray(), 'Comandos retrieved successfully');
    }

    /**
     * Update the specified Comandos in storage.
     * PUT/PATCH /comandos/{id}
     *
     * @param  int $id
     * @param UpdateComandosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComandosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Comandos $comandos */
        $comandos = $this->comandosRepository->findWithoutFail($id);

        if (empty($comandos)) {
            return $this->sendError('Comandos not found');
        }

        $comandos = $this->comandosRepository->update($input, $id);

        return $this->sendResponse($comandos->toArray(), 'Comandos updated successfully');
    }

    /**
     * Remove the specified Comandos from storage.
     * DELETE /comandos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Comandos $comandos */
        $comandos = $this->comandosRepository->findWithoutFail($id);

        if (empty($comandos)) {
            return $this->sendError('Comandos not found');
        }

        $comandos->delete();

        return $this->sendResponse($id, 'Comandos deleted successfully');
    }
}
