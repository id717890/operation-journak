<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseBackendController;
use App\Http\Requests\Dashboard\Admin\FormIssueCreate;
use App\Infrastructure\Interfaces\Services\IDirIssuesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class IssueController extends BaseBackendController
{
    public function __construct(
        IDirIssuesService $service)
    {
        $this->setDirectory('dashboard.admin.issue');
        $this->setHeader('index', 'Виды работ / неисправностей');
        $this->setHeader('create', 'Создание нового вида работ / неисправности');
        $this->setHeader('edit', 'Редактирование вида работ / неисправности');
        $this->setIndexRoute('issue.index');
        parent::__construct($service);
    }

    /**
     * @param FormIssueCreate $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormIssueCreate $request)
    {
        $this->contextService->new_object(Input::all());
        return redirect()->route($this->getIndexRoute());
    }

    /**
     * @param FormIssueCreate $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormIssueCreate $request, $id)
    {
        $object = $this->contextService->find_object_by_id($id);
        if ($object == null) {
            Session::flash('error_msg', 'Объект не найден');
            return redirect()->route($this->indexRoute);
        }
        $this->contextService->update_object($id, Input::all());
        return redirect()->route($this->indexRoute);
    }


//    private $dirIssuesService;
//
//    public function __construct(IDirIssuesService $dirIssuesService)
//    {
//        $this->dirIssuesService = $dirIssuesService;
//    }
//
//    public function postIssuesJson()
//    {
//        return Response::json($this->dirIssuesService->get_issues_json(Input::get('query')));
//    }
//
//    public function postIssueDelete($id)
//    {
//        if ($this->dirIssuesService->remove_object($id)) return $id;
//        else return 0;
//    }
//
//    public function postIssueEdit(FormIssueCreate $request, $id)
//    {
//        $object = $this->dirIssuesService->find_object_by_id($id);
//        if ($object == null) {
//            Session::flash('error_msg', 'Объект не найден');
//            return redirect()->route('issues');
//        }
//        $this->dirIssuesService->update_object($id, Input::all());
//        return redirect()->route('issues');
//    }
//
//    public function getIssueEdit($id)
//    {
//        $object = $this->dirIssuesService->find_object_by_id($id);
//        if ($object == null) {
//            Session::flash('error_msg', 'Объект не найден');
//            return redirect()->route('issues');
//        } else
//            return View('dashboard.admin.issue-edit')->with('item', $object);
//    }
//
//    public function postIssueCreate(FormIssueCreate $request)
//    {
//        $this->dirIssuesService->new_object(Input::all());
//        return redirect()->route('issues');
//    }
//
//    public function getIssueCreate()
//    {
//        return View('dashboard.admin.issue-create');
//    }
//
//    public function getIssues()
//    {
//        return View('dashboard.admin.issues')->with('object_list', $this->dirIssuesService->get_objects());
//    }
}
