<?php

namespace App\Core\Users\Repositories;

use App\Core\Tools\FileUploadTrait;
use App\Core\Users\Repositories\Interfaces\UserRepositoryInterface;
use App\Core\Users\User;

class UserRepository implements UserRepositoryInterface
{
    use FileUploadTrait;

    /**
     *
     * @param User $model
     */
    public function __construct(protected User $model)
    {
    }
}
