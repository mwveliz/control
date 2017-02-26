<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecomandoAPIRequest;
use App\Http\Requests\API\UpdatecomandoAPIRequest;
use App\Models\comando;
use App\Repositories\comandoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class comandoController
 * @package App\Http\Controllers\API
 */

class comandoAPIController extends AppBaseController
{
    /** @var  comandoRepository */
    private $comandoRepository;

    public function __construct(comandoRepository $comandoRepo)
    {
        $this->comandoRepository = $comandoRepo;
    }

    /**
     * Display a listing of the comando.
     * GET|HEAD /comandos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->comandoRepository->pushCriteria(new RequestCriteria($request));
        $this->comandoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $comandos = $this->comandoRepository->all();

        return $this->sendResponse($comandos->toArray(), 'Comandos retrieved successfully');
    }

    /**
     * Store a newly created comando in storage.
     * POST /comandos
     *
     * @param CreatecomandoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatecomandoAPIRequest $request)
    {
        $input = $request->all();

        $comandos = $this->comandoRepository->create($input);

        return $this->sendResponse($comandos->toArray(), 'Comando saved successfully');
    }

    /**
     * Display the specified comando.
     * GET|HEAD /comandos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var comando $comando */
        $comando = $this->comandoRepository->findWithoutFail($id);

        if (empty($comando)) {
            return $this->sendError('Comando not found');
        }

        return $this->sendResponse($comando->toArray(), 'Comando retrieved successfully');
    }

    /**
     * Update the specified comando in storage.
     * PUT/PATCH /comandos/{id}
     *
     * @param  int $id
     * @param UpdatecomandoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecomandoAPIRequest $request)
    {
        $input = $request->all();

        /** @var comando $comando */
        $comando = $this->comandoRepository->findWithoutFail($id);

        if (empty($comando)) {
            return $this->sendError('Comando not found');
        }

        $comando = $this->comandoRepository->update($input, $id);

        return $this->sendResponse($comando->toArray(), 'comando updated successfully');
    }

    /**
     * Remove the specified comando from storage.
     * DELETE /comandos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var comando $comando */
        $comando = $this->comandoRepository->findWithoutFail($id);

        if (empty($comando)) {
            return $this->sendError('Comando not found');
        }

        $comando->delete();

        return $this->sendResponse($id, 'Comando deleted successfully');
    }
}
