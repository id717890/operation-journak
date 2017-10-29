<?php

namespace App\Http\Controllers;

use App\Infrastructure\Interfaces\ICrud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BaseBackendController extends Controller
{
    protected $contextService;
    protected $header;
    protected $directory;
    protected $indexRoute;

    public function __construct(ICrud $service)
    {
        $this->contextService = $service;

        View::share('header_text', $this->getHeader());
    }

    //region Ссылка на общую таблицу объектов
    public function setIndexRoute($route)
    {
        $this->indexRoute = $route;
        return $this;
    }

    public function getIndexRoute()
    {
        return $this->indexRoute;
    }
    //endregion

    //region Каталог модели
    public function setDirectory($directory)
    {
        $this->directory = $directory;
        return $this;
    }

    public function getDirectory()
    {
        return $this->directory;
    }
    //endregion


    //region Заголовок представления
    public function setHeader($type, $value)
    {
        if (is_null($this->header)) $this->header = [
            'index' => '',
            'create' => '',
            'edit' => ''
        ];
        $this->header[$type] = $value;
        return $this;
    }

    public function getHeader()
    {
        return $this->header;
    }
    //endregion


    /**
     * Выводит главную страницу со списком объектов
     *
     * @return \Illuminate\Http\Response
     */
    protected function index()
    {
        return View($this->getDirectory() . '.index')->with('object_items', $this->contextService->get_objects());
    }

    /**
     * Выводит страницу для создания объекта
     *
     * @return \Illuminate\Http\Response
     */
    protected function create()
    {
        return View($this->getDirectory() . '.create');
    }

    /**
     * Выводит страницу для редактирования объекта
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    protected function edit($id)
    {
        $object = $this->contextService->find_object_by_id($id);
        if ($object == null) {
            Session::flash('error_msg', 'Указанный объект не найден');
            return redirect()->route($this->indexRoute);
        } else
            return View($this->getDirectory() . '.edit')->with('object_item', $object);
    }

    /**
     * Удаляет объект
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->contextService->remove_object($id)) return $id;
        else return 0;
    }
}
