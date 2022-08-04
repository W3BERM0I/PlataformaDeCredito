<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\ClienteRepository;

class UserController extends Controller
{
    public function __construct(private ClienteRepository $repository)
    {
    }

    public function all()
    {
        return $this->repository->all();
    }
}
