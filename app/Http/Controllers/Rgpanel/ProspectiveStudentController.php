<?php

namespace App\Http\Controllers\Rgpanel;

use App\Exports\ProspectiveStudentsExport;
use App\Models\ProgramType;
use App\Traits\ResponseAjax;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ProspectiveStudent;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Program\Entities\Program;
use PhpOffice\PhpWord\TemplateProcessor;

class ProspectiveStudentController extends Controller
{
    use ResponseAjax;
    public function index(Request $request)
    {
        $prospective_student = ProspectiveStudent::latest()
            ->with(['program', 'programType'])
            ->when($request->search, function ($query) use ($request) {
                return $query->where(function ($query) use ($request) {
                    $query->where("full_name", "like", "%" . $request->search . "%")
                        ->orWhere("email", "like", "%" . $request->search . "%")
                        ->orWhere("phone", "like", "%" . $request->search . "%")
                        ->orWhere("address", "like", "%" . $request->search . "%");
                });
            })
            ->when($request->program, function ($query) use ($request) {
                return $query->whereHas('program', function ($subQuery) use ($request) {
                    return $subQuery->where('id', '=', $request->input('program'));
                });
            })
            ->when($request->programtype, function ($query) use ($request) {
                return $query->whereHas('programType', function ($subQuery) use ($request) {
                    return $subQuery->where('id', '=', $request->input('programtype'));
                });
            })
            ->when($request->from && $request->to, function ($query) use ($request) {
                return $query->whereBetween('created_at', [
                    Carbon::parse($request->from),
                    Carbon::parse($request->to)
                ]);
            })
            ->paginate(10)->withQueryString();
        $programTypes = ProgramType::all();
        $programs = Program::all();
        $title = __('Prospective Student');
        return view('rgpanel.prospective-student.index', compact('prospective_student', 'title', 'programs', 'programTypes'));
    }
    public function show($locale, ProspectiveStudent $prospective_student)
    {
        try {
            $html = view('rgpanel.prospective-student.form', ['prospective_student' => $prospective_student->load(['studentFamilies', 'programType', 'program'])])->render();
            return $this->successResponse(data: $html, withSession: false);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }
    public function destroy($locale, ProspectiveStudent $prospective_student)
    {
        try {
            DB::beginTransaction();
            $prospective_student->deleteOrFail();
            DB::commit();
            return $this->successResponse(message: __('global.delete_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.delete_failed'));
        }
    }
    public function exportsExcel(Request $request, $locale)
    {
        return Excel::download(new ProspectiveStudentsExport($request), 'prospective-student-' . Carbon::now() . '.xlsx');
    }
    public function exportPdf($locale, ProspectiveStudent $prospective_student)
    {
        $prospective_student->load(['studentFamilies']);
        $ayah = $prospective_student->studentFamilies->filter(fn($item) => $item->relationship == 'Ayah')->first();
        $ibu = $prospective_student->studentFamilies->filter(fn($item) => $item->relationship == 'Ibu')->first();
        ini_set('max_execution_time', 180);
        $template = new TemplateProcessor(storage_path('form_pendaftaran.docx'));
        $template->setValue('nama', $prospective_student->full_name);
        $template->setValue('tempat_lahir', $prospective_student->place_of_birth);
        $template->setValue('tanggal_lahir', $prospective_student->birth_date->format('d F Y'));
        $template->setValue('no_ktp', $prospective_student->identity_number);
        $template->setValue('gender', $prospective_student->gender);
        $template->setValue('alamat', $prospective_student->address);
        $template->setValue('phone', $prospective_student->phone);
        $template->setValue('email', $prospective_student->email);
        $template->setValue('anak_ke', $prospective_student->order_of_siblings);
        $template->setValue('jumlah_saudara', $prospective_student->number_of_siblings);
        $template->setValue('japanese_language_proficiency_certificate', $prospective_student->japanese_language_proficiency_certificate);
        $template->setValue('last_education', $prospective_student->last_education);
        $template->setValue('date_now', Carbon::now()->format('d F Y'));

        $template->setImageValue('foto', [
            'path' => asset($prospective_student->image),
            // 'path' => "https://rgpanel.santinihongakkou.com/" . $prospective_student->image,
            'width' => 100,
            'height' => 200,
            'ratio' => false
        ]);
        $template->setValue('ayah', $ayah?->name);
        $template->setValue('pekerjaan_ayah', $ayah?->occupation);
        $template->setValue('usia_ayah', $ayah?->age);
        $template->setValue('ibu', $ibu?->name);
        $template->setValue('pekerjaan_ibu', $ibu?->occupation);
        $template->setValue('usia_ibu', $ibu?->age);

        $template->saveAs(storage_path('generated_form.docx'));
        return response()->download(storage_path('generated_form.docx'));
    }
}
