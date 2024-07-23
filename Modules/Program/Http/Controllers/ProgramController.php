<?php

namespace Modules\Program\Http\Controllers;

use App\Traits\ResponseAjax;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Program\Entities\Program;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;

class ProgramController extends Controller
{
    use ResponseAjax;
    public function index(Request $request)
    {
        $programs = Program::with(['userCreatedBy', 'userUpdatedBy'])->get();
        $title = __('program::wording.programs');
        return view('program::index', compact('programs', 'title'));
    }
    public function create(Request $request)
    {
        try {
            $route = route('rgpanel.programs.store', ['locale' => app()->getLocale()]);
            $method = "POST";
            $html = view('program::form', compact('route', 'method'))->render();
            return $this->successResponse(data: $html, withSession: false);
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.create_failed'));
        }

    }
    public function store(Request $request)
    {
        $request->validate([
            'title.id' => 'required|unique:programs,title->id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
            'short_content.id' => 'required|max:150',
            'content.id' => 'required',
        ]);
        try {
            \DB::beginTransaction();
            $program = new Program;
            $program->title = $request->title;
            $program->image = 'storage/' . $request->file('image')->store('program/images', 'public');
            $program->short_content = $request->short_content;
            $program->slug = [
                'id' => str($request->title['id'])->slug()
            ];
            $program->content = $request->content;
            $program->created_by = Auth()->id();
            $program->updated_by = Auth()->id();
            $program->saveOrFail();
            \DB::commit();
            return $this->successResponse(message: __('global.create_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(message: $th->getMessage());
        }

    }
    public function update(Request $request, $locale, Program $program)
    {
        $request->validate([
            'title.id' => 'required|unique:programs,title->id,' . $program->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
            'short_content.id' => 'required|max:150',
            'content.id' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $program->title = $request->title;
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete(str_replace('storage/', '', $program->image));
                $program->image = 'storage/' . $request->file('image')->store('program/images', 'public');
            }
            $program->short_content = $request->short_content;
            $program->slug = [
                'id' => str($request->title['id'])->slug(),
            ];
            $program->content = $request->content;
            $program->saveOrFail();
            DB::commit();
            return $this->successResponse(message: __('global.update_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(message: __('global.update_failed'));
        }

    }
    public function destroy($locale, Program $program)
    {
        try {
            DB::beginTransaction();
            Storage::disk('public')->delete(str_replace('storage/', '', $program->image));
            $program->deleteOrFail();
            DB::commit();
            return $this->successResponse(message: __('global.delete_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.delete_failed'));
        }
    }
    public function edit($locale, Program $program)
    {
        try {
            $route = route('rgpanel.programs.update', ['locale' => app()->getLocale(), 'program' => $program->id]);
            $method = "PUT";
            $html = view('program::form', compact('route', 'method', 'program'))->render();
            return $this->successResponse(data: $html, withSession: false);
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.create_failed'));
        }
    }
}
