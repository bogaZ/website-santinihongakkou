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
            action="{{ route('rgpanel.pages.program-page.update', ['locale' => app()->getLocale(), 'program_page' => $programpage->id]) }}"
            method="POST" class="js-form">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        @can('update program page')
                            <button class="btn btn-primary btn-sm mb-2 js-btn-submit">
                                @lang('Update Program Page')
                            </button>
                            @method('put')
                        @endcan
                        <span class="text-muted"><i>@lang('updated_by') : {{ $programpage->updatedBy?->name }} </i></span>
                    </div>
                    @csrf

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="title" style="transform: uppercase">
                                @lang('Title')
                            </label>
                            <input id="title" placeholder="Pilih 1 banner untuk program page" class="form-control"
                                name="title[id]" data-maxtag="1"
                                @cannot('update program page')
                                disabled
                                @endcannot
                                value="{{ $programpage->getTranslation('title', 'id') }}">
                            <div class="invalid-feedback" id="title.idError"></div>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="description" style="transform: uppercase">
                                @lang('Description')
                            </label>
                            <input id="description" placeholder="Pilih 1 banner untuk program page" class="form-control"
                                name="description[id]" data-maxtag="1"
                                @cannot('update program page')
                                disabled
                                @endcannot
                                value="{{ $programpage->getTranslation('description', 'id') }}">
                            <div class="invalid-feedback" id="description.idError"></div>
                        </div>
                    </div>
                    <legend>Model Required</legend>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="banner_id" style="transform: uppercase">
                                Pilih 1 Banner
                            </label>
                            <input id="banner_id" placeholder="Pilih 1 banner untuk program page"
                                class="form-control js-tags-input" name="banner_id" data-maxtag="1"
                                @cannot('update program page')
                                disabled
                                @endcannot
                                data-programs="{{ json_encode($banners) }}" value="{{ $programpage->banner?->title }}">
                            <div class="invalid-feedback" id="banner_idError"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    {{ module_vite('modules/build/program-pages', 'Resources/assets/js/app.js') }}
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
