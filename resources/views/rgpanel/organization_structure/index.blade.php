@extends('rgpanel.layout.app')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            @can('create organization structure')
                <button data-bs-toggle="modal" data-bs-target="#modalForm" class="btn btn-primary btn-sm mb-2 js-btn-modal-open"
                    data-action="{{ route('rgpanel.organization-structures.create', ['locale' => app()->getLocale()]) }}">
                    @lang('Create Organization Structure')
                </button>
            @endcan
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>@lang('global.Image')</th>
                            <th>@lang('global.Name')</th>
                            <th>@lang('Occupation')</th>
                            <th>@lang('global.Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($organization_structure as $item)
                            <tr>
                                <td><img src="{{ asset($item->image) }}" width="150" alt="image"></td>
                                <td>{{ $item->name }} </td>
                                <td>{{ $item->occupation }} </td>
                                <td class="d-flex justify-items-center">
                                    @can('update organization structure')
                                        <button data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#modalForm"
                                            data-url="{{ route('rgpanel.organization-structures.edit', ['locale' => app()->getLocale(), 'organization_structure' => $item->id]) }}"
                                            class="btn btn-sm btn-warning d-flex align-items-center fs-6 p-1 js-btn-edit">
                                            <span class="material-icons fs-6">
                                                edit
                                            </span>
                                        </button>
                                    @endcan
                                    @can('delete organization structure')
                                        <button
                                            data-url="{{ route('rgpanel.organization-structures.destroy', [
                                                'locale' => app()->getLocale(),
                                                'organization_structure' => $item->id,
                                            ]) }}"
                                            data-id="{{ $item->id }}" data-btn-label="@lang('global.delete')"
                                            data-title="@lang('global.delete_confirmation')" data-btn-cancel-label="@lang('global.cancel')"
                                            class="btn btn-sm btn-danger d-flex align-items-center fs-6 p-1 js-btn-delete">
                                            <span class="material-icons fs-6">
                                                delete
                                            </span>
                                        </button>
                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">@lang('global.Galleries') @lang('global.Form')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm js-btn-submit">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @vite('resources/js/rgpanel/organization-structure/app.js', 'build')
@endsection
