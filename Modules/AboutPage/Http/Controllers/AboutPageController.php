<?php

namespace Modules\AboutPage\Http\Controllers;

use App\Models\Banner;
use App\Traits\ResponseAjax;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\AboutPage\Entities\AboutPage;
use Illuminate\Contracts\Support\Renderable;

class AboutPageController extends Controller
{
    use ResponseAjax;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $banners = Banner::latest()->get();
        $aboutpage = AboutPage::with([
            'updatedBy',
            'banner'
        ])->firstOrCreate();

        $title = __('About Page');
        return view(
            'aboutpage::index',
            compact(
                'title',
                'aboutpage',
                'banners'
            )
        );
    }

    public function update(Request $request, $locale, AboutPage $about_page)
    {
        $validate = $request->validate([
            'section1_title.id' => 'max:150',
            'section1_description.id' => 'max:1600',
            'section1_image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
            'section2_title.id' => 'max:150',
            'section2_description.id' => 'max:1600',
            'section2_image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
            'banner_id' => 'required'
        ]);
        $validate['banner_id'] = json_decode($validate['banner_id'], true)[0]['id'] ?? null;
        $validate['updated_by'] = auth()->user()->id;
        try {
            DB::beginTransaction();
            if ($request->hasFile('section1_image')) {
                $validate['section1_image'] = 'storage/' . $request->file('section1_image')->store('about-page', 'public');
            }
            if ($request->hasFile('section2_image')) {
                $validate['section2_image'] = 'storage/' . $request->file('section2_image')->store('about-page', 'public');
            }
            $about_page->update($validate);
            DB::commit();
            return $this->successResponse(message: __('global.create_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(message: $th->getMessage());
        }
    }
}
