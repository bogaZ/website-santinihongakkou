<?php

namespace Modules\Feature\Http\Controllers;

use App\Traits\ResponseAjax;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Feature\Entities\Feature;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    use ResponseAjax;
    public function index(Request $request)
    {
        $features = Feature::latest()->get();
        $title = __('feature::wording.features');
        return view('feature::index', compact('features', 'title'));
    }
    public function create(Request $request)
    {
        try {
            $route = route('rgpanel.features.store', ['locale' => app()->getLocale()]);
            $method = "POST";
            $html = view('feature::form', compact('route', 'method'))->render();
            return $this->successResponse(data: $html, withSession: false);
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.create_failed'));
        }

    }
    public function store(Request $request)
    {
        $request->validate([
            'title.id' => 'required|unique:features,title->id',
            'icon' => 'required',
            'short_content.id' => 'required|max:150',
        ]);
        try {
            \DB::beginTransaction();
            $feature = new Feature;
            $feature->title = $request->title;
            $feature->icon = $request->icon;
            $feature->short_content = $request->short_content;
            $feature->slug = [
                'id' => str($request->title['id'])->slug()
            ];
            $feature->saveOrFail();
            \DB::commit();
            return $this->successResponse(message: __('global.create_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(message: $th->getMessage());
        }

    }
    public function update(Request $request, $locale, Feature $feature)
    {
        $request->validate([
            'title.id' => 'required|unique:features,title->id,' . $feature->id,
            'icon' => 'required',
            'short_content.id' => 'required|max:150',
        ]);
        try {
            DB::beginTransaction();
            $feature->title = $request->title;
            $feature->icon = $request->icon;
            $feature->short_content = $request->short_content;
            $feature->slug = [
                'id' => str($request->title['id'])->slug()
            ];
            $feature->saveOrFail();
            DB::commit();
            return $this->successResponse(message: __('global.update_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(message: __('global.update_failed'));
        }

    }
    public function destroy($locale, Feature $feature)
    {
        try {
            DB::beginTransaction();
            $feature->deleteOrFail();
            DB::commit();
            return $this->successResponse(message: __('global.delete_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.delete_failed'));
        }
    }
    public function edit($locale, Feature $feature)
    {
        try {
            $route = route('rgpanel.features.update', ['locale' => app()->getLocale(), 'feature' => $feature->id]);
            $method = "PUT";
            $html = view('feature::form', compact('route', 'method', 'feature'))->render();
            return $this->successResponse(data: $html, withSession: false);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }
}
