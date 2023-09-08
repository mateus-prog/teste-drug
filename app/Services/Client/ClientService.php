<?php

namespace App\Services\Client;

use App\Repositories\Elouquent\ClientRepository;
use App\Traits\ApiResponser;
use App\Traits\Pagination;
use Exception;

class ClientService
{
    use ApiResponser;
    use Pagination;

    public function __construct()
    {
        $this->clientRepository = new ClientRepository();
    }

    /**
     * Selecione todos os usuarios
     * @return array
    */
    public function all()
    {
        return $this->clientRepository->all();
    }

    public function store(array $request)
    {
        return $this->clientRepository->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function findById(int $id)
    {
        return $this->clientRepository->findById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $request)
    {
        return $this->clientRepository->update($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->clientRepository->delete($id);
    }

}
