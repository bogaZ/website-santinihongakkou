<?php

namespace App\Exports;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ProspectiveStudent;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProspectiveStudentsExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function view(): View
    {
        $prospective_student = ProspectiveStudent::latest()
            ->with(['program', 'programType'])
            ->when($this->request->search, function ($query) {
                return $query->where(function ($query) {
                    $query->where("full_name", "like", "%" . $this->request->search . "%")
                        ->orWhere("email", "like", "%" . $this->request->search . "%")
                        ->orWhere("phone", "like", "%" . $this->request->search . "%")
                        ->orWhere("address", "like", "%" . $this->request->search . "%");
                });
            })
            ->when($this->request->program, function ($query) {
                return $query->whereHas('program', function ($subQuery) {
                    return $subQuery->where('id', '=', $this->request->input('program'));
                });
            })
            ->when($this->request->programtype, function ($query) {
                return $query->whereHas('programType', function ($subQuery) {
                    return $subQuery->where('id', '=', $this->request->input('programtype'));
                });
            })
            ->when($this->request->from && $this->request->to, function ($query) {
                return $query->whereBetween('created_at', [
                    Carbon::parse($this->request->from),
                    Carbon::parse($this->request->to)
                ]);
            })->get();

        return view("exports.prospective-students", [
            "students" => $prospective_student
        ]);
    }
}
