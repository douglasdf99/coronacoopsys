<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserAPIRequest;
use App\Http\Requests\API\UpdateUserAPIRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Response;

/**
 * Class UserController
 * @package App\Http\Controllers\API
 */

class UserAPIController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;
  private $path = 'users';


  public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     * GET|HEAD /users
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $users = $this->userRepository->paginate($limit = 5, $columns = ['*']);

        return $this->sendResponse($users->toArray(), 'Users retrieved successfully');
    }

    /**
     * Store a newly created User in storage.
     * POST /users
     *
     * @param CreateUserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserAPIRequest $request)
    {
      $input = $request->all();
      if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
        $name = time() .''.Str::kebab($request->name);
        $extension = $request->avatar->extension();

        $nameFile = "{$name}.{$extension}";
        $input['avatar'] = 'storage/'.$this->path.'/'.$nameFile;

        $upload = $request->avatar->storeAs($this->path, $nameFile);

        if (!$upload)
          return response()->json(['error' => 'Fail_Upload'], 500);
      }
        $user = $this->userRepository->create($input);

        return $this->sendResponse($user->toArray(), 'User saved successfully');
    }

    /**
     * Display the specified User.
     * GET|HEAD /users/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        return $this->sendResponse($user->toArray(), 'User retrieved successfully');
    }

    /**
     * Update the specified User in storage.
     * PUT/PATCH /users/{id}
     *
     * @param int $id
     * @param UpdateUserAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserAPIRequest $request)
    {
        $input = $request->all();

        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

      if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
        if ($user->avatar) {
          if (Storage::exists("{$user->avatar}"))
            Storage::delete("{$user->avatar}");
        }

        $name = time() .''.Str::kebab($request->name);
        $extension = $request->avatar->extension();

        $nameFile = "{$name}.{$extension}";
        $input['avatar'] = 'storage/'.$this->path.'/'.$nameFile;

        $upload = $request->avatar->storeAs($this->path, $nameFile);

        if (!$upload)
          return response()->json(['error' => 'Fail_Upload'], 500);
      }

        $user = $this->userRepository->update($input, $id);

        return $this->sendResponse($user->toArray(), 'User updated successfully');
    }

    /**
     * Remove the specified User from storage.
     * DELETE /users/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $user->delete();

        return $this->sendSuccess('User deleted successfully');
    }
}
