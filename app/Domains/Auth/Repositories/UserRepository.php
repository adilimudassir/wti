<?php

namespace Domains\Auth\Repositories;

use Illuminate\Http\Request;
use Domains\Auth\Models\User;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use Domains\Auth\Events\UserCreated;
use Domains\Auth\Events\UserUpdated;
use Illuminate\Support\Facades\Hash;
use Domains\Auth\Exceptions\UserException;
use Domains\General\Exceptions\GeneralException;

class UserRepository extends BaseRepository
{
    /**
     * create an instance of the class.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function create(Request $request): User
    {
        return DB::transaction(function () use ($request) {
            $newUser = $this->model::create($this->serializeData($request));

            if (! $newUser) {
                throw new UserException('Account could not be created at the moment');
            }

            if ($request->has('roles')) {
                $newUser->assignRole($request->roles);
            } else {
                $newUser->assignRole(config('access.default_role'));
            }

            if ($request->hasFile('avatar')) {
                $newUser->avatar = $this->storeFile($request->avatar, 'avatars');
                $newUser->save();
            }

            event(new UserCreated($newUser));

            return $newUser;
        });
    }

    public function update(Request $request, User $user): User
    {
        return DB::transaction(function () use ($request, $user) {
            if (! $user->update($this->serializeData($request))) {
                throw new UserException('User Could not be updated');
            }

            if ($request->has('roles')) {
                $user->syncRoles($request->roles);
            } else {
                $user->syncRoles(config('access.default_role'));
            }

            if ($request->hasFile('avatar')) {
                $this->updateFile($user, 'avatar', $request->avatar, 'avatars');
            }


            event(new UserUpdated($user));

            return $user;
        });
    }

    /**
     * @param  int  $id
     *
     * @return User
     * @throws GeneralException
     */
    public function deleteById($id): User
    {
        $user = $this->getById($id);

        if ($user->id === 1) {
            throw new GeneralException(__('You can not delete the administrator account.'));
        }

        if ($user->id === auth()->id()) {
            throw new GeneralException(__('You can not delete yourself.'));
        }

        if ($user->deleted_at !== null) {
            throw new GeneralException(__('This account is already deleted.'));
        }

        if ($user->delete()) {
            return $user;
        }

        throw new GeneralException('There was a problem deleting this account. Please try again.');
    }

    public function updatePassword(User $user, array $data = []): User
    {
        return DB::transaction(function () use ($user, $data) {
            if (isset($data['current_password'])) {
                throw_if(
                    ! Hash::check($data['current_password'], $user->password),
                    new GeneralException('That is not your old password.')
                );
            }

            $user->update([
                'password' => Hash::make($data['password']),
            ]);

            return $user;
        });
    }

    public function getById($id): User
    {
        $user = $this->model->find($id);

        if (! $user) {
            throw new GeneralException('That record does not exist.');
        }

        return $user;
    }

    public function getByEmail($email): User
    {
        $user = $this->model->where('email', $email)->first();

        if (! $user) {
            throw new GeneralException('That record does not exist.');
        }

        return $user;
    }

    private function serializeData(Request $request): array
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'active' => $request->has('status') ? 1 : 0,
            'email_verified_at' => $request->has('confirmed') ? now() : null,
            'state' => $request->has('state') ? $request->state : null,
            'state_code'  => $request->has('state_code') ? $request->state_code : null,
            'account_type' => $request->has('account_type') ? $request->account_type : 'STAFF',
        ];
    }
}
