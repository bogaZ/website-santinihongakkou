@extends('rgpanel.layout.app')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            <a class="btn btn-primary btn-sm mb-2"
                href="{{ route('rgpanel.banners.create', ['locale' => app()->getLocale()]) }}">@lang('banner.Create Banner')</a>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>@lang('banner.Image Desktop')</th>
                            <th>@lang('banner.Title')</th>
                            <th>@lang('banner.Description')</th>
                            <th>@lang('banner.Button Label')</th>
                            <th>@lang('banner.Button Link')</th>
                            <th>@lang('banner.Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $item)
                            <tr>
                                <td>
                                    <img width="100px" src="{{ asset($item->image_desktop) }}" alt="{{ $item->title }}">
                                </td>
                                <td>
                                    {{ $item->title }}
                                </td>
                                <td>
                                    {{ $item->description }}
                                </td>
                                <td>
                                    {{ $item->button_label }}
                                </td>
                                <td>
                                    {{ $item->button_link }}
                                </td>
                                <td class="d-flex justify-items-center">
                                    @can('update banner')
                                        <a href="{{ route('rgpanel.banners.edit', ['locale' => app()->getLocale(), 'banner' => $item->id]) }}"
                                            class="btn btn-sm btn-warning d-flex align-items-center fs-6 p-1">
                                            <span class="material-icons fs-6">
                                                edit
                                            </span>
                                        </a>
                                    @endcan
                                    @can('delete banner')
                                        <button
                                            data-url="{{ route('rgpanel.banners.destroy', ['locale' => app()->getLocale(), 'banner' => $item->id]) }}"
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
@endsection
@section('js')
    @vite('resources/js/rgpanel/banner/app.js', 'build')
@endsection
