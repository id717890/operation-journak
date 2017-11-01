<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseBackendController;
use App\Http\Requests\Dashboard\Admin\FormIssueCreate;
use App\Infrastructure\Interfaces\Services\IDirIssuesService;
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
}
