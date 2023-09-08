<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\HttpStatus;
use App\Traits\ApiResponser;
use App\Traits\Pagination;

use Exception;

use App\Services\Client\ClientService;

class ClientController extends Controller
{
    use ApiResponser;
    use Pagination;

    protected $clientService;

    public function __construct(
        ClientService $clientService
    )
    {
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $clients = $this->clientService->all();

            return $this->success($clients, HttpStatus::SUCCESS);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        try {
            $input = $request->only(["name", "cnpj", "date_founding", "group_id"]);
            $client = $this->clientService->store($input);

            return $this->success($client, HttpStatus::CREATED);
        } catch (Exception $e) {
            return $this->error('Registro não cadastrado ou sem permissão', HttpStatus::BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $client = $this->clientService->findById($id);

            return $this->success($client, HttpStatus::SUCCESS);
        } catch (Exception $e) {
            return $this->error('Registro não encontrado ou sem permissão', HttpStatus::NOT_FOUND);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $client = $this->clientService->findById($id);

            return $this->success($client, HttpStatus::SUCCESS);
        } catch (Exception $e) {
            return $this->error('Registro não encontrado ou sem permissão', HttpStatus::NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, string $id)
    {
        try {
            $input = $request->only(["name", "cnpj", "date_founding", "group_id"]);
            $this->clientService->update($id, $input);

            return $this->noContent();
        } catch (Exception $e) {
            return $this->error('Registro não encontrado ou sem permissão', HttpStatus::NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->clientService->destroy($id);

            return $this->noContent();
        } catch (Exception $e) {
            return $this->error('Registro não encontrado ou sem permissão', HttpStatus::NOT_FOUND);
        }
    }
}
