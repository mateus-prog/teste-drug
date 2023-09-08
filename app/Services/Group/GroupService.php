<?php

namespace App\Services\Group;

use App\Repositories\Elouquent\GroupRepository;
use App\Traits\ApiResponser;
use App\Traits\Pagination;
use Exception;

class GroupService
{
    use ApiResponser;
    use Pagination;

    public function __construct()
    {
        $this->groupRepository = new GroupRepository();
    }

    /**
     * Selecione todos os usuarios
     * @return array
    */
    public function all()
    {
        return $this->groupRepository->all();
    }

    public function store(array $request)
    {
        return $this->groupRepository->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function findById(int $id)
    {
        return $this->groupRepository->findById($id);
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
        return $this->groupRepository->update($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->groupRepository->delete($id);
    }

}
