<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Modules\AppSetting\Entities\AppSetting;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected $appSetting;

    public function __construct()
    {
        $this->appSetting = Cache::get("appSetting");
        if (!Cache::has("appSetting")) {
            $this->appSetting = AppSetting::with([
                'navbarSection',
                'navbarSection.navbarSectionPrograms' => fn($query) => $query->orderByPivot('id', 'ASC')
            ])
                ->first();
            Cache::put("appSetting", $this->appSetting, env("CACHE_LIFETIME"));
        }
    }
}