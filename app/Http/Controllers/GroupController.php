<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Http\HttpStatus;
use App\Traits\ApiResponser;
use App\Traits\Pagination;

use Exception;

use App\Services\Group\GroupService;

class GroupController extends Controller
{
    use ApiResponser;
    use Pagination;

    protected $groupService;

    public function __construct(
        GroupService $groupService
    )
    {
        $this->groupService = $groupService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $groups = $this->groupService->all();

            return $this->success($groups, HttpStatus::SUCCESS);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupRequest $request)
    {
        try {
            $input = $request->only(["name"]);
            $group = $this->groupService->store($input);

            return $this->success($group, HttpStatus::CREATED);
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
            $group = $this->groupService->findById($id);

            return $this->success($group, HttpStatus::SUCCESS);
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
            $group = $this->groupService->findById($id);

            return $this->success($group, HttpStatus::SUCCESS);
        } catch (Exception $e) {
            return $this->error('Registro não encontrado ou sem permissão', HttpStatus::NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupRequest $request, string $id)
    {
        try {
            $input = $request->only(["name"]);
            $this->groupService->update($id, $input);

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
            $this->groupService->destroy($id);

            return $this->noContent();
        } catch (Exception $e) {
            return $this->error('Registro não encontrado ou sem permissão', HttpStatus::NOT_FOUND);
        }
    }
}
