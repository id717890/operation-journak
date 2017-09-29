<?php
namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Interfaces\Services\IIncidentObjectService;
use App\Infrastructure\Repository\IncidentObjectRepository;
use App\Infrastructure\Repository\UsersRepository;
use DB;
use Mockery\CountValidator\Exception;
use Session;
use Hash;
use Auth;
use Illuminate\Support\Facades\Input;

class IncidentObjectService implements IIncidentObjectService
{
    private $context;

    public function __construct(IncidentObjectRepository $context)
    {
        $this->context = $context;
    }


}