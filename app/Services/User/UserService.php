<?php

namespace App\Services\User;

use App\Repositories\Elouquent\UserRepository;
use App\Traits\ApiResponser;
use App\Traits\Pagination;
use Exception;

class UserService
{
    use ApiResponser;
    use Pagination;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    /**
     * Selecione todos os usuarios
     * @return array
    */
    public function all()
    {
        return $this->userRepository->all();
    }

    public function store(array $request)
    {
        return $this->userRepository->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function findById(int $id)
    {
        return $this->userRepository->findById($id);
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
        return $this->userRepository->update($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->userRepository->delete($id);
    }

}
