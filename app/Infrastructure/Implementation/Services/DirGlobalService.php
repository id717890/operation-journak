<?php
namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Interfaces\Services\IDirGlobalService;
use App\Infrastructure\Repository\DirGlobalRepository;
use App\Infrastructure\Repository\DirTypeRepository;
use DB;
use Mockery\CountValidator\Exception;
use Session;
use Hash;
use Illuminate\Support\Facades\Input;

class DirGlobalService implements IDirGlobalService
{
    private $context;

    public function __construct(DirGlobalRepository $context)
    {
        $this->context = $context;
    }

    /**
     * Выгружает список объектов по фильтру dir_type_id
     * @param $dir_type_id
     * @return mixed
     */
    public function get_objects_by_type($dir_type_id)
    {
        return $this->context->get_objects_by_type($dir_type_id);
    }
}