<?php

namespace App\Http\Controllers\Rgpanel;

use App\Models\Banner;
use App\Traits\ResponseAjax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    use ResponseAjax;
    public function index()
    {
        $title = __('banner.Banners');
        $banners = Banner::all();
        return view('rgpanel.banner.index', compact('banners', 'title'));
    }
    public function create()
    {
        $title = __('banner.Create Banners');
        $route = route('rgpanel.banners.store', ['locale' => app()->getLocale()]);
        $method = 'post';
        return view('rgpanel.banner.form', compact('title', 'route', 'method'));
    }
    public function edit($locale, Banner $banner)
    {
        $title = __('banner.Update Banners');
        $route = route('rgpanel.banners.update', ['locale' => app()->getLocale(), 'banner' => $banner->id]);
        $method = 'put';
        return view('rgpanel.banner.form', compact('title', 'route', 'method', 'banner'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'image_desktop' => 'image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048',
            'title.id' => 'required|string|max:100',
            'description.id' => 'required|max:500',
            'button_label.id' => 'nullable|max:100',
            'button_link.*' => 'nullable|url|max:255',
        ]);
        $validate['image_desktop'] = 'storage/' . $request->file('image_desktop')->store('banners', 'public');
        if ($request->hasFile('image_mobile')) {
            $validate['image_mobile'] = 'storage/' . $request->file('image_mobile')->store('banners', 'public');
        }
        Banner::create($validate);
        return redirect()->route('rgpanel.banners.index', ['locale' => app()->getLocale()])
            ->with(['message' => __('global.create_success')]);
    }
    public function update(Request $request, $locale, Banner $banner)
    {
        $validate = $request->validate([
            'image_desktop' => 'image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048',
            'title.id' => 'required|string|max:100',
            'description.id' => 'required|max:500',
            'button_label.id' => 'required|max:100',
            'button_link.*' => 'nullable|url|max:255',
        ]);
        if ($request->hasFile('image_desktop')) {
            Storage::disk('public')->delete(str_replace('storage/', '', $banner->image_desktop));
            $validate['image_desktop'] = 'storage/' . $request->file('image_desktop')->store('banners', 'public');
        }
        if ($request->hasFile('image_mobile')) {
            Storage::disk('public')->delete(str_replace('storage/', '', $banner->image_mobile));
            $validate['image_mobile'] = 'storage/' . $request->file('image_mobile')->store('banners', 'public');
        }
        $banner->update($validate);
        return $this->successResponse(message: __('global.update_success'));
    }
    public function destroy($locale, Banner $banner)
    {
        try {
            DB::beginTransaction();
            Storage::disk('public')->delete(str_replace('storage/', '', $banner->image_desktop));
            Storage::disk('public')->delete(str_replace('storage/', '', $banner->image_mobile));
            $banner->deleteOrFail();
            DB::commit();
            return $this->successResponse(message: __('global.delete_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.delete_failed'));
        }
    }
}