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
        $data = [];
        $groups = $this->context->get_groups_by_type($dir_type_id);
        foreach ($groups as $group) {
            $obj_list = [];
            $objects = $this->context->get_objects_by_type_and_group($dir_type_id, $group->group_name);
            foreach ($objects as $object) {
                $obj_list[$object->id] = $object;
            }
            $data[$group->group_name] = $obj_list;
        }
        return $data;
    }
}