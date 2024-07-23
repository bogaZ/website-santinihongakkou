<?php

namespace App\Http\Controllers;

use App\Traits\ResponseAjax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\OrganizationalStructure;

class OrganizationStructureController extends Controller
{
    use ResponseAjax;
    public function index()
    {
        $organization_structure = OrganizationalStructure::get();
        $title = "Organization Structure";
        return view('rgpanel.organization_structure.index', compact('organization_structure', 'title'));
    }
    public function create(Request $request)
    {
        try {
            $route = route('rgpanel.organization-structures.store', ['locale' => app()->getLocale()]);
            $method = "POST";
            $html = view('rgpanel.organization_structure.form', compact('route', 'method'))->render();
            return $this->successResponse(data: $html, withSession: false);
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.create_failed'));
        }

    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'occupation' => 'required|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
        ]);
        try {
            DB::beginTransaction();
            $organization_structure = new OrganizationalStructure;
            $organization_structure->name = $request->name;
            $organization_structure->occupation = $request->occupation;
            $organization_structure->image = 'storage/' . $request->file('image')->store('organization_structure', 'public');
            $organization_structure->saveOrFail();
            DB::commit();
            return $this->successResponse(message: __('global.create_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(message: __('global.create_failed'));
        }

    }
    public function update(Request $request, $locale, OrganizationalStructure $organization_structure)
    {
        $request->validate([
            'name' => 'required|max:100',
            'occupation' => 'required|max:100',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
        ]);
        try {
            DB::beginTransaction();
            if ($request->hasFile('image')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete(str_replace('storage/', '', $organization_structure->image));
                $organization_structure->image = 'storage/' . $request->file('image')->store('organization_structure/images', 'public');
            }
            $organization_structure->name = $request->name;
            $organization_structure->occupation = $request->occupation;
            $organization_structure->saveOrFail();
            DB::commit();
            return $this->successResponse(message: __('global.update_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(message: __('global.update_failed'));
        }

    }
    public function destroy($locale, OrganizationalStructure $organization_structure)
    {
        try {
            DB::beginTransaction();
            \Illuminate\Support\Facades\Storage::disk('public')->delete(str_replace('storage/', '', $organization_structure->image));
            $organization_structure->deleteOrFail();
            DB::commit();
            return $this->successResponse(message: __('global.delete_success'));
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.delete_failed'));
        }
    }
    public function edit($locale, OrganizationalStructure $organization_structure)
    {
        try {
            $route = route('rgpanel.organization-structures.update', ['locale' => app()->getLocale(), 'organization_structure' => $organization_structure->id]);
            $method = "PUT";
            $html = view('rgpanel.organization_structure.form', compact('route', 'method', 'organization_structure'))->render();
            return $this->successResponse(data: $html, withSession: false);
        } catch (\Throwable $th) {
            return $this->errorResponse(__('global.create_failed'));
        }
    }
}
