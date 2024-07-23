<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Gallery;
use App\Services\MetaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Modules\AppSetting\Entities\AppSetting;
use Modules\HomePage\Entities\HomePage;
use Modules\Partnership\Entities\Partnership;

class HomeController extends Controller
{
    public function index()
    {
        $appSetting = $this->appSetting;
        if (!Cache::has("homePage") || !Cache::has("galleries") || !Cache::has("partnerships") || !Cache::has("home_index")) {
            $homePage = HomePage::with(['banner', 'features', 'programs', 'workProcess'])->first();
            $galleries = Gallery::latest()->limit(5)->get();
            $partnerships = Partnership::latest()->get();
            $metaService = new MetaService(
                description: $homePage->banner?->description,
                image: asset($homePage->banner?->image_desktop)
            );
            $meta = $metaService->render();
            $view = view('welcome', compact('appSetting', 'homePage', 'galleries', 'partnerships', 'meta'))->render();
            Cache::put('homePage', $homePage, env('CACHE_LIFETIME', 300));
            Cache::put('galleries', $galleries, env('CACHE_LIFETIME', 300));
            Cache::put('partnerships', $partnerships, env('CACHE_LIFETIME', 300));
            Cache::put('home_index', $view, env('CACHE_LIFETIME', 300));
        } else {
            $homePage = Cache::get("homePage");
            $galleries = Cache::get("galleries");
            $partnerships = Cache::get("partnerships");
            $view = Cache::get("home_index");
        }
        return $view;
    }
}