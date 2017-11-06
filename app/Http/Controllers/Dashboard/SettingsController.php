<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseBackendController;
use App\Infrastructure\Interfaces\Services\ISettingsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SettingsController extends BaseBackendController
{
    public function __construct(ISettingsService $service)
    {
        $this->setDirectory('dashboard.admin.settings');
        $this->setHeader('index', 'Настройки');
        $this->setHeader('create', '');
        $this->setHeader('edit', '');
        $this->setIndexRoute('settings.index');
        parent::__construct($service);
    }

    /**
     * Обновляет данные по объекту
     *
     * @param  int $key
     * @return \Illuminate\Http\Response
     */
    protected function update($key)
    {
        $this->contextService->update_object($key, Input::all());
        return redirect()->route($this->indexRoute);
    }
}
