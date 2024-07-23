<?php

namespace Modules\AppSetting\Http\Controllers;

use Illuminate\Support\Arr;
use App\Traits\ResponseAjax;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Program\Entities\Program;
use Modules\AppSetting\Entities\AppSetting;
use Modules\AppSetting\Entities\NavbarSection;

class AppSettingController extends Controller
{
    use ResponseAjax;
    public function index(Request $request)
    {
        $programs = Program::latest()->get();
        $appSetting = AppSetting::with([
            'updatedBy',
            'navbarSection',
            'navbarSection.navbarSectionPrograms' => fn($query) => $query->orderByPivot('id', 'ASC')
        ])->firstOrCreate();
        $selectedPrograms = $appSetting->navbarSection?->navbarSectionPrograms?->pluck('id')->toArray() ?? [];
        $title = __('app_settings');
        return view('appsetting::index', compact('appSetting', 'title', 'programs', 'selectedPrograms'));
    }
    public function update(Request $request, $locale, AppSetting $app_setting)
    {
        $validate = $request->validate([
            'app_name' => 'required|string',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
            'icon_desktop' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
            'app_detail' => 'nullable|string',
            'email' => 'required|email',
            'email2' => 'nullable|email',
            'email3' => 'nullable|email',
            'phone' => 'required|string',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'youtube' => 'nullable|string',
            'whatsapp' => 'required|string',
            'address' => 'nullable|string|max:300',
            'address2' => 'nullable|string|max:300',
        ]);
        $navbarValidation = $request->validate([
            'label_home' => 'required|max:50',
            'label_about_us' => 'required|max:50',
            'label_our_program' => 'required|max:50',
            'label_our_contact' => 'required|max:50',
            'navbar_section_programs' => 'required|array|min:1|max:5',
        ]);
        $navbarSectionPrograms = collect($navbarValidation['navbar_section_programs'])->map(function ($item) {
            return collect(json_decode($item, true))->map(fn($value) => $value['id']);
        })->first();
        try {
            DB::beginTransaction();
            if ($request->hasFile('icon')) {
                $validate['icon'] = 'storage/' . $request->file('icon')->store('app-settings', 'public');
            }
            if ($request->hasFile('icon_desktop')) {
                $validate['linkedln'] = 'storage/' . $request->file('icon_desktop')->store('app-settings', 'public');
            }
            $validate['updated_by'] = auth()->id();
            $app_setting->update($validate);
            $navbarSection = $app_setting->navbarSection;
            $navbarSection->update(Arr::except($navbarValidation, ['navbar_section_programs']));
            $navbarSection->navbarSectionPrograms()->sync($navbarSectionPrograms);
            DB::commit();
            return $this->successResponse(message: __('global.create_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(message: $th->getMessage());
        }
    }

}