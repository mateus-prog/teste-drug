<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\HttpStatus;
use App\Traits\ApiResponser;
use App\Traits\Pagination;

use Exception;

use App\Services\User\UserService;

class UserController extends Controller
{
    use ApiResponser;
    use Pagination;

    protected $userService;

    public function __construct(
        UserService $userService
    )
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $users = $this->userService->all();

            return $this->success($users, HttpStatus::SUCCESS);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            $input = $request->only(["name", "email", "password", "level"]);
            $user = $this->userService->store($input);

            return $this->success($user, HttpStatus::CREATED);
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
            $user = $this->userService->findById($id);

            return $this->success($user, HttpStatus::SUCCESS);
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
            $user = $this->userService->findById($id);

            return $this->success($user, HttpStatus::SUCCESS);
        } catch (Exception $e) {
            return $this->error('Registro não encontrado ou sem permissão', HttpStatus::NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        try {
            $input = $request->only(["name", "email", "password", "level"]);
            $this->userService->update($id, $input);

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
            $this->userService->destroy($id);

            return $this->noContent();
        } catch (Exception $e) {
            return $this->error('Registro não encontrado ou sem permissão', HttpStatus::NOT_FOUND);
        }
    }
}
