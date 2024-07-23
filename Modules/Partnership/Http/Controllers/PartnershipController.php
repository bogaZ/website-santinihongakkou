<?php

namespace Modules\Partnership\Http\Controllers;

use App\Traits\ResponseAjax;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;
use Modules\Partnership\Entities\Partnership;

class PartnershipController extends Controller
{
    use ResponseAjax;
    public function index(Request $request)
    {
        $partnerships = Partnership::latest()->get();
        $title = __('partnership::wording.partnerships');
        return view('partnership::index', compact('partnerships', 'title'));
    }
    public function create(Request $request)
    {
        try {
            $route = route('rgpanel.partnerships.store', ['locale' => app()->getLocale()]);
            $method = "POST";
            $html = view('partnership::form', compact('route', 'method'))->render();
            return $this->successResponse(data: $html, withSession: false);
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.create_failed'));
        }

    }
    public function store(Request $request)
    {
        $request->validate([
            'title.id' => 'required|max:50|unique:partnerships,title->id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
            'link' => 'nullable|url',
        ]);
        try {
            \DB::beginTransaction();
            $partnership = new Partnership;
            $partnership->title = $request->title;
            $partnership->link = $request->link;
            $partnership->image = 'storage/' . $request->file('image')->store('partnership/images', 'public');
            $partnership->slug = [
                'id' => str($request->title['id'])->slug()
            ];
            $partnership->saveOrFail();
            \DB::commit();
            return $this->successResponse(message: __('global.create_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(message: $th->getMessage());
        }

    }
    public function update(Request $request, $locale, Partnership $partnership)
    {
        $request->validate([
            'title.id' => 'required|max:50|unique:partnerships,title->id,' . $partnership->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
            'link' => 'nullable|url',
        ]);
        try {
            DB::beginTransaction();
            $partnership->title = $request->title;
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete(str_replace('storage/', '', $partnership->image));
                $partnership->image = 'storage/' . $request->file('image')->store('partnership/images', 'public');
            }
            $partnership->link = $request->link;
            $partnership->saveOrFail();
            DB::commit();
            return $this->successResponse(message: __('global.update_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(message: __('global.update_failed'));
        }

    }
    public function destroy($locale, Partnership $partnership)
    {
        try {
            DB::beginTransaction();
            Storage::disk('public')->delete(str_replace('storage/', '', $partnership->image));
            $partnership->deleteOrFail();
            DB::commit();
            return $this->successResponse(message: __('global.delete_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.delete_failed'));
        }
    }
    public function edit($locale, Partnership $partnership)
    {
        try {
            $route = route('rgpanel.partnerships.update', ['locale' => app()->getLocale(), 'partnership' => $partnership->id]);
            $method = "PUT";
            $html = view('partnership::form', compact('route', 'method', 'partnership'))->render();
            return $this->successResponse(data: $html, withSession: false);
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.create_failed'));
        }
    }
}
