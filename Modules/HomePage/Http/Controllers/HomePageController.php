<?php

namespace Modules\HomePage\Http\Controllers;

use App\Models\Banner;
use App\Traits\ResponseAjax;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Feature\Entities\Feature;
use Modules\Program\Entities\Program;
use Modules\HomePage\Entities\HomePage;
use Modules\HomePage\Entities\WorkProcess;
use Illuminate\Contracts\Support\Renderable;

class HomePageController extends Controller
{
    use ResponseAjax;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $programs = Program::latest()->get();
        $banners = Banner::latest()->get();
        $features = Feature::latest()->get();
        $homepage = HomePage::with([
            'updatedBy',
            'features',
            'programs',
            'workProcess',
            'banner'
        ])->firstOrCreate();

        $title = __('Home Page');
        $fieldSections = collect($homepage->getAttributes())
            ->filter(function ($value, $key) {
                return strpos($key, 'section') === 0;
            });
        return view(
            'homepage::index',
            compact(
                'features',
                'programs',
                'title',
                'homepage',
                'fieldSections',
                'banners'
            )
        );
    }

    public function update(Request $request, $locale, HomePage $home_page)
    {
        $validate = $request->validate([
            'section1_title' => 'max:50',
            'section1_btn_label' => 'max:50',
            'section1_description.id' => 'max:300|string',
            'section2_title' => 'max:50',
            'section2_btn_label' => 'max:50',
            'section2_description.id' => 'max:300|string',
            'section3_title' => 'max:50',
            'section3_btn_label' => 'max:50',
            'section3_description.id' => 'max:300|string',
            'section4_title' => 'max:50',
            'section4_description.id' => 'max:300|string',
            'section5_title' => 'max:50',
            'section5_description.id' => 'max:300|string',
            'section6_title' => 'max:50',
            'section6_description.id' => 'max:300|string',
            'section7_title' => 'max:50',
            'section7_description.id' => 'max:300|string',
            'banner_id' => 'required'
        ]);
        $validate['banner_id'] = json_decode($validate['banner_id'], true)[0]['id'] ?? null;
        $programsValidate = $request->validate([
            'home_page_program' => 'required',
        ]);
        $programsValidate = collect($programsValidate['home_page_program'])->map(function ($item) {
            return collect(json_decode($item, true))->map(fn($value) => $value['id']);
        })->first();

        $featureValidate = $request->validate([
            'features' => 'required|max:3|array',
        ]);
        $featureValidate = collect($featureValidate['features'])->map(function ($item) {
            return collect(json_decode($item, true))->map(fn($value) => $value['id']);
        })->first();

        $workProcess = $request->validate([
            'step1_title.id' => 'required|string|max:150',
            'step1_description.id' => 'required|string|max:150',
            'step1_icon' => 'required|string|max:150',
            'step2_title.id' => 'required|string|max:150',
            'step2_description.id' => 'required|string|max:150',
            'step2_icon' => 'required|string|max:150',
            'step3_title.id' => 'required|string|max:150',
            'step3_description.id' => 'required|string|max:150',
            'step3_icon' => 'required|string|max:150',
        ]);
        $validate['updated_by'] = auth()->user()->id;
        try {
            DB::beginTransaction();
            $home_page->update($validate);
            WorkProcess::find($home_page->load('workProcess')->workProcess->id)->update($workProcess);
            $home_page->features()->sync($featureValidate);
            $home_page->programs()->sync($programsValidate);
            DB::commit();
            return $this->successResponse(message: __('global.create_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(message: $th->getMessage());
        }
    }
}
