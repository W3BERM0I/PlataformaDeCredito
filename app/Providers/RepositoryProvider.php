<?php

namespace App\Providers;

use App\Repositories\ClienteRepository;
use App\Repositories\EloquentClienteRepository;
use App\Repositories\EloquentEmprestimoRepository;
use App\Repositories\EloquentParcelaRepository;
use App\Repositories\EmprestimoRepository;
use App\Repositories\ParcelaRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        ClienteRepository::class => EloquentClienteRepository::class,
        EmprestimoRepository::class => EloquentEmprestimoRepository::class,
        ParcelaRepository::class => EloquentParcelaRepository::class
    ];
}
