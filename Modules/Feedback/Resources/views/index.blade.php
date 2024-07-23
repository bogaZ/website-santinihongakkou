@extends('rgpanel.layout.app')
@section('styles')
    @vite(['resources/css/public/icons.scss'])
@endsection
@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            @can('create feedback')
                <button data-bs-toggle="modal" data-bs-target="#modalForm" class="btn btn-primary btn-sm mb-2 js-btn-modal-open"
                    data-action="{{ route('rgpanel.feedbacks.create', ['locale' => app()->getLocale()]) }}">
                    @lang('feedback::wording.create_feedback')
                </button>
            @endcan
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>@lang('global.Name')</th>
                            <th>@lang('global.Email')</th>
                            <th>@lang('global.Subject')</th>
                            <th>@lang('global.Message')</th>
                            <th>@lang('global.Created At')</th>
                            <th>@lang('global.Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $item)
                            <tr>
                                <td>{{ $item->name }} </td>
                                <td>{{ $item->email }} </td>
                                <td>{{ $item->subject }} </td>
                                <td>{{ $item->body }} </td>
                                <td>{{ $item->created_at->format('F d Y, H:i') }}</td>
                                <td class="d-flex justify-items-center">
                                    @can('delete feedback')
                                        <button
                                            data-url="{{ route('rgpanel.feedbacks.destroy', ['locale' => app()->getLocale(), 'feedback' => $item->id]) }}"
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
                    <h5 class="modal-title" id="modalFormLabel">@lang('global.feedbacks') @lang('global.Form')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm js-btn-close"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm js-btn-submit">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{ module_vite('modules/build/feedback', 'Resources/assets/js/app.js') }}
@endsection
