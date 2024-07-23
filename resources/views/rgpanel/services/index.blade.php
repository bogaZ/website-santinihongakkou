@extends('rgpanel.layout.app')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            @can('create service')
                <button data-bs-toggle="modal" data-bs-target="#modalForm" class="btn btn-primary btn-sm mb-2 js-btn-modal-open"
                    data-action="{{ route('rgpanel.services.create', ['locale' => app()->getLocale()]) }}">
                    @lang('global.Create Service')
                </button>
            @endcan
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>@lang('global.Image')</th>
                            <th>@lang('global.Icon')</th>
                            <th>@lang('global.Title')</th>
                            <th>@lang('global.Short Content')</th>
                            <th>@lang('global.Created At')</th>
                            <th>@lang('global.Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $item)
                            <tr>
                                <td><img src="{{ asset($item->image) }}" width="150" alt="image"></td>
                                <td><img src="{{ asset($item->icon) }}" width="100" alt="icon"></td>
                                <td>{{ $item->title }} </td>
                                <td>{{ $item->short_content }}</td>
                                <td>{{ $item->created_at->format('F d Y, H:i') }}</td>
                                <td class="d-flex justify-items-center">
                                    @can('update service')
                                        <button data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#modalForm"
                                            data-url="{{ route('rgpanel.services.edit', ['locale' => app()->getLocale(), 'service' => $item->id]) }}"
                                            class="btn btn-sm btn-warning d-flex align-items-center fs-6 p-1 js-btn-edit">
                                            <span class="material-icons fs-6">
                                                edit
                                            </span>
                                        </button>
                                    @endcan
                                    @can('delete service')
                                        <button
                                            data-url="{{ route('rgpanel.services.destroy', ['locale' => app()->getLocale(), 'service' => $item->id]) }}"
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
                    <h5 class="modal-title" id="modalFormLabel">@lang('global.services') @lang('global.Form')</h5>
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
    @vite('resources/js/rgpanel/service/app.js', 'build')
@endsection
