<?php

namespace App\Http\Controllers\Rgpanel;

use App\Models\Gallery;
use App\Traits\ResponseAjax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    use ResponseAjax;
    public function index()
    {
        $galleries = Gallery::get();
        $title = __('menu.galleries');
        return view('rgpanel.galleries.index', compact('galleries', 'title'));
    }
    public function create(Request $request)
    {
        try {
            $route = route('rgpanel.galleries.store', ['locale' => app()->getLocale()]);
            $method = "POST";
            $html = view('rgpanel.galleries.form', compact('route', 'method'))->render();
            return $this->successResponse(data: $html, withSession: false);
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.create_failed'));
        }

    }
    public function store(Request $request)
    {
        $request->validate([
            'title.id' => 'required|max:100|unique:galleries,title->id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
        ]);
        try {
            DB::beginTransaction();
            $gallery = new Gallery;
            $gallery->title = $request->title;
            $gallery->image = 'storage/' . $request->file('image')->store('gallery', 'public');
            $gallery->slug = [
                'id' => str($request->title['id'])->slug()
            ];
            $gallery->saveOrFail();
            DB::commit();
            return $this->successResponse(message: __('global.create_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(message: __('global.create_failed'));
        }

    }
    public function update(Request $request, $locale, Gallery $gallery)
    {
        $request->validate([
            'title.id' => 'required|max:100|unique:galleries,title->id,' . $gallery->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
        ]);
        try {
            DB::beginTransaction();
            $gallery->title = $request->title;
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete(str_replace('storage/', '', $gallery->image));
                $gallery->image = 'storage/' . $request->file('image')->store('gallery/images', 'public');
            }
            $gallery->slug = [
                'id' => str($request->title['id'])->slug()
            ];
            $gallery->saveOrFail();
            DB::commit();
            return $this->successResponse(message: __('global.update_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(message: __('global.update_failed'));
        }

    }
    public function destroy($locale, Gallery $gallery)
    {
        try {
            DB::beginTransaction();
            Storage::disk('public')->delete(str_replace('storage/', '', $gallery->image));
            $gallery->deleteOrFail();
            DB::commit();
            return $this->successResponse(message: __('global.delete_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.delete_failed'));
        }
    }
    public function edit($locale, Gallery $gallery)
    {
        try {
            $route = route('rgpanel.galleries.update', ['locale' => app()->getLocale(), 'gallery' => $gallery->id]);
            $method = "PUT";
            $html = view('rgpanel.galleries.form', compact('route', 'method', 'gallery'))->render();
            return $this->successResponse(data: $html, withSession: false);
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.create_failed'));
        }
    }
}