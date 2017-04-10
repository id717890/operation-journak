<?php
namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Interfaces\Services\IIncidentService;
use App\Infrastructure\Interfaces\Services\IUserService;
use App\Infrastructure\Repository\IncidentRepository;
use App\Infrastructure\Repository\UsersRepository;
use DB;
use Mockery\CountValidator\Exception;
use Session;
use Hash;
use Illuminate\Support\Facades\Input;

class IncidentService implements IIncidentService
{
    private $context;

    public function __construct(IncidentRepository $context)
    {
        $this->context = $context;
    }

    /**
     * Все записи из таблицы
     * @return mixed
     */
    public function get_all()
    {
        return $this->context->all();
    }
}