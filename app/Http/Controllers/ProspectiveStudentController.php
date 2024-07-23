<?php

namespace App\Http\Controllers;

use App\Models\ProgramType;
use stdClass;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\StudentFamily;
use App\Services\MetaService;
use App\Models\StudentEducation;
use App\Models\ProspectiveStudent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Modules\Program\Entities\Program;

class ProspectiveStudentController extends Controller
{
    public function index($program)
    {
        $appSetting = $this->appSetting;
        if (!Cache::has('program_form-' . $program)) {
            $program = Program::where("slug->" . app()->getLocale(), $program)
                ->firstOrFail();
            $programType = ProgramType::get();
            $banner = new stdClass;
            $banner->title = "Formulir Pendaftaran ($program->title)";
            $banner->description = "Selamat datang! Terima kasih telah memilih untuk mendaftar dengan kami. Silakan lengkapi formulir pendaftaran di bawah ini dengan seksama. Informasi yang Anda berikan akan membantu kami mengenal Anda lebih baik dan memproses pendaftaran Anda dengan lebih efisien.";
            $banner->image_desktop = $program->image;
            $metaService = new MetaService(
                title: $banner?->title,
                description: $banner?->description,
                image: asset($banner?->image_desktop)
            );
            $meta = $metaService->render();
            $view = view('public.prospective-student.index', compact('appSetting', 'program', 'meta', 'banner', 'programType'))->render();
            Cache::put('program_form-' . $program->slug, $view, env('CACHE_LIFETIME', 300));
            return $view;
        }
        return Cache::get('program_form-' . $program);
    }
    public function store(Request $request)
    {
        $prospectiveStudentValidation = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'birth_date' => 'required|date',
            'address' => 'required|string|max:255',
            'image' => 'nullable|file|mimes:png,jpeg,jpg,webp,avif|max:1024',
            'gender' => 'required',
            'program_id' => 'required',
            'program_type_id' => 'required',
            'place_of_birth' => 'required',
            'last_education' => 'required',
            'number_of_siblings' => 'required',
            'identity_number' => 'required',
            'order_of_siblings' => 'required',
            'japanese_language_proficiency_certificate' => 'required',
        ]);
        $datafamilyValidation = $request->validate([
            'family_data.*' => 'required|array',
            'family_data.*.relationship' => 'required',
            'family_data.*.name' => 'required',
            'family_data.*.age' => 'required|integer',
            'family_data.*.occupation' => 'required',
        ]);
        DB::beginTransaction();
        if ($request->hasFile('image')) {
            $prospectiveStudentValidation['image'] = 'storage/' . $request->file('image')->store('prospective-students', 'public');
        }
        $prospectiveStudent = ProspectiveStudent::create($prospectiveStudentValidation);
        $datafamilyValidation['family_data'][0]['prospective_student_id'] = $prospectiveStudent->id;
        $datafamilyValidation['family_data'][1]['prospective_student_id'] = $prospectiveStudent->id;
        StudentFamily::insert($datafamilyValidation['family_data']);
        Cache::forget('program_form-' . $request->program_id);
        DB::commit();
        return redirect()->back()->with('success', 'Pendaftaran anda berhasil silahkan tunggu konfirmasi, pastikan email dan nomor anda aktif.');
    }
}
