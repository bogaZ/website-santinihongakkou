<?php

namespace App\Http\Controllers;

use stdClass;
use App\Services\MetaService;
use Illuminate\Support\Facades\Cache;
use Modules\Program\Entities\Program;
use Modules\ProgramPage\Entities\ProgramPage;

class ProgramController extends Controller
{
    public function index()
    {
        $appSetting = $this->appSetting;
        if (!Cache::has('program_index')) {
            $programs = Program::latest()->paginate(8)->withQueryString();
            $programpage = ProgramPage::with('banner')->first();
            $metaService = new MetaService(
                title: $programpage->banner?->title,
                description: $programpage->banner?->description,
                image: asset($programpage->banner?->image_desktop)
            );
            $meta = $metaService->render();
            $view = view("public.program.index", compact("programs", "appSetting", "programpage", 'meta'))->render();
            Cache::put('program_index', $view, env('CACHE_LIFETIME', 300));
            return $view;
        }
        return Cache::get('program_index');
    }
    public function show($slug)
    {
        $appSetting = $this->appSetting;
        if (!Cache::has('program_detail-' . $slug)) {
            $program = Program::where("slug->" . app()->getLocale(), $slug)
                ->firstOrFail();
            $banner = new stdClass;
            $banner->title = $program->title;
            $banner->description = $program->short_content;
            $banner->image_desktop = $program->image;
            $metaService = new MetaService(
                title: $banner?->title,
                description: $banner?->description,
                image: asset($banner?->image_desktop)
            );
            $meta = $metaService->render();
            $programs = Program::latest()->whereNot('id', $program->id)->limit(2)->get();
            $view = view("public.program.show", compact("programs", "appSetting", "meta", "banner", "program"))->render();
            Cache::put("program_detail-" . $slug, $view, env("CACHE_LIFETIME", 300));
            return $view;
        }
        return Cache::get('program_detail-' . $slug);
    }
}
