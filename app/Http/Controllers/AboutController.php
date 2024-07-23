<?php

namespace App\Http\Controllers;

use App\Models\OrganizationalStructure;
use Illuminate\Http\Request;
use App\Services\MetaService;
use Illuminate\Support\Facades\Cache;

class AboutController extends Controller
{
    public function index()
    {
        $appSetting = $this->appSetting;
        if (!Cache::has('about_index')) {
            $aboutpage = \Modules\AboutPage\Entities\AboutPage::with('banner')->first();
            $metaService = new MetaService(
                title: $aboutpage->banner?->title,
                description: $aboutpage->banner?->description,
                image: asset($aboutpage->banner?->image_desktop)
            );
            $meta = $metaService->render();
            $organization_structures = OrganizationalStructure::get();
            $view = view("public.about.index", compact("appSetting", 'aboutpage', 'meta', 'organization_structures'))->render();
            Cache::put('about_index', $view, env('CACHE_LIFETIME', 300));
            return $view;
        }
        return Cache::get('about_index');
    }
}
