@extends('rgpanel.layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ $route }}" enctype="multipart/form-data" class="js-form-banner">
                @csrf
                @method($method)
                <div class="form-group mt-2">
                    <label for="image_desktop">@lang('banner.Image Desktop') <small>(Max 2mb, @lang('global.recommendation'): 1200px X
                            600)</small></label>
                    <input type="file" class="dropify" id="image_desktop" name="image_desktop"
                        @isset($banner->image_desktop)
                    data-default-file="{{ asset($banner->image_desktop) }}"
                    @endisset />
                    <div class="invalid-feedback" id="image_desktopError"></div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mt-2">
                            <label for="title[id]">@lang('banner.Title') [id] </label>
                            <input type="text" class="form-control" id="title[id]" name="title[id]"
                                @isset($banner->title)
                            value="{{ $banner->getTranslation('title', 'id') }}"
                            @endisset />
                            <div class="invalid-feedback" id="title.idError"></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-2">
                            <label for="button_label[id]">@lang('banner.Button Label')[id]</label>
                            <input type="text" class="form-control" id="button_label[id]" name="button_label[id]"
                                @isset($banner->title)
                            value="{{ $banner->getTranslation('button_label', 'id') }}"
                            @endisset>
                            <div class="invalid-feedback" id="button_label.idError"></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-2">
                            <label for="button_link[id]">@lang('banner.Button Link') [id] </label>
                            <input type="text" class="form-control" id="button_link[id]" name="button_link[id]"
                                @isset($banner->title)
                            value="{{ $banner->getTranslation('button_link', 'id') }}"
                            @endisset>
                            <div class="invalid-feedback" id="button_link[id]Error"></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-2">
                            <label for="description[id]">@lang('banner.Description') [id] </label>
                            <textarea class="form-control" rows="1" id="description[id]" name="description[id]">
@isset($banner->description)
{{ $banner->getTranslation('description', 'id') }}
@endisset
</textarea>
                            <div class="invalid-feedback" id="description.idError"></div>
                        </div>
                    </div>
                    {{-- <div class="col-6">
                        <div class="form-group mt-2">
                            <label for="title[en]">@lang('banner.Title') [en] </label>
                            <input type="text" class="form-control" id="title[en]" name="title[en]"
                                @isset($banner->title)
                            value="{{ $banner->getTranslation('title', 'en') }}"
                            @endisset>
                            <div class="invalid-feedback" id="title.enError"></div>
                        </div>
                    </div> --}}
                </div>
                <div class="row">

                    {{-- <div class="col-6">
                        <div class="form-group mt-2">
                            <label for="button_label[en]">@lang('banner.Button Label')[en]</label>
                            <input type="text" class="form-control" id="button_label[en]" name="button_label[en]"
                                @isset($banner->title)
                            value="{{ $banner->getTranslation('button_label', 'en') }}"
                            @endisset>
                            <div class="invalid-feedback" id="button_label.Error"></div>
                        </div>
                    </div> --}}

                    {{-- <div class="col-6">
                        <div class="form-group mt-2">
                            <label for="button_link[en]">@lang('banner.Button Link') [en]</label>
                            <input type="text" class="form-control" id="button_link[en]" name="button_link[en]"
                                @isset($banner->title)
                            value="{{ $banner->getTranslation('button_link', 'en') }}"
                            @endisset>
                            <div class="invalid-feedback" id="button_link.enError"></div>
                        </div>
                    </div> --}}

                    {{-- <div class="col-6">
                        <div class="form-group mt-2">
                            <label for="description[en]">@lang('banner.Description') [en] </label>
                            <textarea class="form-control" id="description[en]" name="description[en]"
                                @isset($banner->description)
                            value="{{ $banner->getTranslation('description', 'en') }}"
                            @endisset></textarea>
                            <div class="invalid-feedback" id="description.enError"></div>
                        </div>
                    </div> --}}
                </div>
                <a href="{{ route('rgpanel.banners.index', ['locale' => app()->getLocale()]) }}"
                    class="btn btn-danger mt-3 btn-sm js-btn-back">@lang('global.Back')</a>
                <button type="submit" class="btn btn-primary mt-3 btn-sm">@lang('global.Submit')</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
    @vite('resources/js/rgpanel/banner/form.js', 'build')
@endsection
