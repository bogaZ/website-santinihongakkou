<?php

namespace Modules\ProgramPage\Http\Controllers;

use App\Models\Banner;
use App\Traits\ResponseAjax;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;
use Modules\ProgramPage\Entities\ProgramPage;

class ProgramPageController extends Controller
{
    use ResponseAjax;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $banners = Banner::latest()->get();
        $programpage = ProgramPage::with([
            'updatedBy',
            'banner'
        ])->firstOrCreate();

        $title = __('Program Page');
        return view(
            'programpage::index',
            compact(
                'title',
                'programpage',
                'banners'
            )
        );
    }

    public function update(Request $request, $locale, ProgramPage $program_page)
    {
        $validate = $request->validate([
            'title.id' => 'max:150',
            'description.id' => 'max:300',
            'banner_id' => 'required'
        ]);
        $validate['banner_id'] = json_decode($validate['banner_id'], true)[0]['id'] ?? null;
        $validate['updated_by'] = auth()->user()->id;
        try {
            DB::beginTransaction();
            $program_page->update($validate);
            DB::commit();
            return $this->successResponse(message: __('global.create_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(message: $th->getMessage());
        }
    }
}
