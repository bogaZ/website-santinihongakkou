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
            action="{{ route('rgpanel.pages.home-page.update', ['locale' => app()->getLocale(), 'home_page' => $homepage->id]) }}"
            method="POST" class="js-form">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        @can('update home page')
                            <button class="btn btn-primary btn-sm mb-2 js-btn-submit">
                                @lang('Update Home Page')
                            </button>
                            @method('put')
                        @endcan
                        <span class="text-muted"><i>@lang('updated_by') : {{ $homepage->updatedBy?->name }} </i></span>
                    </div>
                    @csrf

                    <div class="row">
                        @foreach ($fieldSections as $key => $value)
                            <div class="form-group mb-4 col-6">
                                <label for="{{ $key }}" style="transform: uppercase">
                                    {{ ucwords(implode(' ', explode('_', $key))) }}
                                </label>
                                @if (substr(strrchr($key, '_'), 1) == 'description')
                                    <textarea name="{{ $key }}[id]" id="{{ $key }}" class="form-control" rows="2">{{ json_decode($value, true)['id'] }}</textarea>
                                @else
                                    <input type="{{ $key }}"
                                        @cannot('update home page')
                                    disabled
                                    @endcannot
                                        value="{{ json_decode($value, true)['id'] }}" class="form-control"
                                        id="{{ $key }}" name="{{ $key }}[id]">
                                @endif

                                <div class="invalid-feedback" id="{{ $key }}.idError"></div>
                            </div>
                            @if (substr(strrchr($key, '_'), 1) == 'description')
                                <div class="col-12"></div>
                            @endif
                        @endforeach

                    </div>
                    <legend>Model Required</legend>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="home_page_program" style="transform: uppercase">
                                Pilih 4 Program
                            </label>
                            <input id="home_page_program" placeholder="Pilih 4 program untuk home page"
                                class="form-control js-tags-input" name="home_page_program[]"
                                @cannot('update home page')
                                disabled
                                @endcannot
                                data-maxtag="4" data-programs="{{ json_encode($programs) }}"
                                value="{{ json_encode($homepage->programs?->map(fn($item) => ['value' => $item->title, 'id' => $item->id])) }}">
                            <div class="invalid-feedback" id="home_page_programError"></div>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="banner_id" style="transform: uppercase">
                                Pilih 1 Banner
                            </label>
                            <input id="banner_id" placeholder="Pilih 1 banner untuk home page"
                                class="form-control js-tags-input" name="banner_id" data-maxtag="1"
                                @cannot('update home page')
                                disabled
                                @endcannot
                                data-programs="{{ json_encode($banners) }}" value="{{ $homepage->banner?->title }}">
                            <div class="invalid-feedback" id="banner_idError"></div>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="features" style="transform: uppercase">
                                Pilih 3 Feature
                            </label>
                            <input id="features" placeholder="Pilih 3 feature untuk home page"
                                class="form-control js-tags-input" name="features[]" data-maxtag="3"
                                @cannot('update home page')
                                disabled
                                @endcannot
                                data-programs="{{ json_encode($features) }}"
                                value="{{ json_encode($homepage->features?->map(fn($item) => ['value' => $item->title, 'id' => $item->id])) }}">
                            <div class="invalid-feedback" id="featuresError"></div>
                        </div>
                    </div>
                    <legend>@lang('Work Process')</legend>
                    <div class="row">
                        @for ($i = 1; $i < 4; $i++)
                            <div class="col-6 mb-2">
                                <label for="step{{ $i }}_title" style="transform: uppercase">
                                    Step {{ $i }} Title
                                </label>
                                <input id="step{{ $i }}_title" class="form-control"
                                    name="step{{ $i }}_title[id]"
                                    value="{{ $homepage->workProcess->getTranslation('step' . $i . '_title', 'id') }}"
                                    @cannot('update home page')
                                disabled
                                @endcannot>
                                <div class="invalid-feedback" id="step{{ $i }}_title.idError"></div>
                            </div>
                            <div class="col-6 mb-2">
                                <label for="step{{ $i }}_icon" style="transform: uppercase">
                                    Step {{ $i }} @lang('global.Icon') <a
                                        href="https://themes-pixeden.com/font-demos/7-stroke/" target="_blank"
                                        rel="noopener noreferrer"><small>(Lihat Icon?)</small></a>
                                </label>
                                <input id="step{{ $i }}_icon" class="form-control"
                                    name="step{{ $i }}_icon"
                                    value="{{ $homepage->workProcess['step' . $i . '_icon'] }}"
                                    @cannot('update home page')
                                disabled
                                @endcannot>
                                <div class="invalid-feedback" id="step{{ $i }}_iconError"></div>
                            </div>
                            <div class="col-6 mb-2">
                                <label for="step{{ $i }}_description[id]" style="transform: uppercase">
                                    Step {{ $i }} Description
                                </label>
                                <textarea
                                    @cannot('update home page')
                                disabled
                                @endcannot
                                    class="form-control" name="step{{ $i }}_description[id]" id="step{{ $i }}_description"
                                    rows="1">{{ $homepage->workProcess->getTranslation('step' . $i . '_description', 'id') }}</textarea>
                                <div class="invalid-feedback" id="step{{ $i }}_description.idError"></div>
                            </div>
                            <div class="col-12"></div>
                        @endfor

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    {{ module_vite('modules/build/home-pages', 'Resources/assets/js/app.js') }}
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
