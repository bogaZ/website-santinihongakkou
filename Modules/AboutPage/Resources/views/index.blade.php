@extends('rgpanel.layout.app')
@section('styles')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div>
        <form
            action="{{ route('rgpanel.pages.about-page.update', ['locale' => app()->getLocale(), 'about_page' => $aboutpage->id]) }}"
            method="POST" class="js-form">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        @can('update about page')
                            <button class="btn btn-primary btn-sm mb-2 js-btn-submit">
                                @lang('Update About Page')
                            </button>
                            @method('put')
                        @endcan
                        <span class="text-muted"><i>@lang('updated_by') : {{ $aboutpage->updatedBy?->name }} </i></span>
                    </div>
                    @csrf

                    <div class="row">
                        <div class="form-group mb-2 col-6">
                            <label for="section1_image" class="form-label">Section 1 Image</label>
                            <input type="file" class="dropify" name="section1_image" id="section1_image"
                                data-show-remove="false"
                                @cannot('update about page')
                        disabled="disabled"
                        @endcannot
                                @isset($aboutpage->section1_image)
                         data-default-file="{{ asset($aboutpage->section1_image) }}"
                         @endisset>
                            <div class="invalid-feedback" id="section1_imageError"></div>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="section1_title" style="transform: uppercase">
                                Section 1 @lang('Title')
                            </label>
                            <input id="section1_title" placeholder="Pilih 1 banner untuk about page" class="form-control"
                                name="section1_title[id]" data-maxtag="1"
                                @cannot('update about page')
                                disabled
                                @endcannot
                                value="{{ $aboutpage->getTranslation('section1_title', 'id') }}">
                            <div class="invalid-feedback" id="section1_title.idError"></div>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="section1_description" style="transform: uppercase">
                                Section 1 Description
                            </label>
                            <textarea name="section1_description[id]" class="form-control"
                                @cannot('update about page')
                            disabled
                            @endcannot
                                id="section1_description" rows="1">{{ $aboutpage->getTranslation('section1_description', 'id') }}</textarea>
                            <div class="invalid-feedback" id="section1_description.idError"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-2 col-6">
                            <label for="section2_image" class="form-label"> Section 2 Image </label>
                            <input type="file" class="dropify" name="section2_image" id="section2_image"
                                data-show-remove="false"
                                @cannot('update about page')
                        disabled="disabled"
                        @endcannot
                                @isset($aboutpage->section2_image)
                         data-default-file="{{ asset($aboutpage->section2_image) }}"
                         @endisset>
                            <div class="invalid-feedback" id="section2_imageError"></div>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="section2_title" style="transform: uppercase">
                                Section 2 @lang('Title')
                            </label>
                            <input id="section2_title" placeholder="Pilih 1 banner untuk about page" class="form-control"
                                name="section2_title[id]" data-maxtag="1"
                                @cannot('update about page')
                                disabled
                                @endcannot
                                value="{{ $aboutpage->getTranslation('section2_title', 'id') }}">
                            <div class="invalid-feedback" id="section2_title.idError"></div>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="section2_description" style="transform: uppercase">
                                Section 1 Description
                            </label>
                            <textarea name="section2_description[id]" class="form-control"
                                @cannot('update about page')
                                    disabled
                                    @endcannot
                                id="section2_description" rows="1">{{ $aboutpage->getTranslation('section2_description', 'id') }}</textarea>
                            <div class="invalid-feedback" id="section2_description.idError"></div>
                        </div>
                    </div>
                    <legend>Model Required</legend>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="banner_id" style="transform: uppercase">
                                Pilih 1 Banner
                            </label>
                            <input id="banner_id" placeholder="Pilih 1 banner untuk about page"
                                class="form-control js-tags-input" name="banner_id" data-maxtag="1"
                                @cannot('update about page')
                                disabled
                                @endcannot
                                data-programs="{{ json_encode($banners) }}" value="{{ $aboutpage->banner?->title }}">
                            <div class="invalid-feedback" id="banner_idError"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    {{ module_vite('modules/build/about-pages', 'Resources/assets/js/app.js') }}
    <script>
        $(document).ready(function() {
            initTags()
        });
        const initTags = () => {
            if ($('.js-tags-input').length <= 0) return

            $('.js-tags-input').each(function() {
                const programs = $(this).data('programs').map(item => ({
                    value: item.title.id,
                    id: item.id
                }))

                const tagify = new Tagify($(this)[0], {
                    delimiters: null,
                    enforceWhitelist: true,
                    whitelist: programs,
                    maxTags: $(this).data('maxtag') ? $(this).data('maxtag') : 4,
                    dropdown: {
                        enabled: 0
                    }
                })
            })

        }
    </script>
@endsection
