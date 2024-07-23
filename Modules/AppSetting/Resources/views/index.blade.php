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
            action="{{ route('rgpanel.app-settings.update', ['locale' => app()->getLocale(), 'app_setting' => $appSetting->id]) }}"
            method="POST" class="js-form">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        @can('update app settings')
                            <button class="btn btn-primary btn-sm mb-2 js-btn-submit">
                                @lang('update_app_settings')
                            </button>
                            @method('put')
                        @endcan
                        <span class="text-muted"><i>@lang('updated_by') : {{ $appSetting->updatedBy?->name }}</i></span>
                    </div>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="icon" class="form-label">@lang('icon') Mobile </label>
                                <input type="file" class="dropify" name="icon" id="icon" data-show-remove="false"
                                    @cannot('update app settings')
                                    disabled="disabled"
                                    @endcannot
                                    @isset($appSetting->icon)
                                    data-default-file="{{ asset($appSetting->icon) }}"
                                    @endisset>
                                <div class="invalid-feedback" id="iconError"></div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="icon_desktop" class="form-label">@lang('icon') Desktop </label>
                                <input type="file" class="dropify" name="icon_desktop" id="icon_desktop"
                                    data-show-remove="false"
                                    @cannot('update app settings')
                                    disabled="disabled"
                                    @endcannot
                                    @isset($appSetting->linkedln)
                                    data-default-file="{{ asset($appSetting->linkedln) }}"
                                    @endisset>
                                <div class="invalid-feedback" id="icon_desktopError"></div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="app_name">@lang('app_name')</label>
                                <input type="text" class="form-control" id="app_name" name="app_name"
                                    @cannot('update app settings')
                    disabled
                        @endcannot
                                    value="{{ $appSetting->app_name }}">
                            </div>

                            <div class="form-group mb-2">
                                <label for="app_detail">@lang('app_detail')</label>
                                <textarea @cannot('update app settings')
                        disabled
                            @endcannot
                                    class="form-control" id="app_detail" name="app_detail" rows="3">{{ $appSetting->app_detail }}</textarea>
                            </div>

                            <div class="form-group mb-2">
                                <label for="email">Email</label>
                                <input type="email"
                                    @cannot('update app settings')
                        disabled
                            @endcannot
                                    value="{{ $appSetting->email }}" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group mb-2">
                                <label for="email2">Email 2 <small>(Optional)</small></label>
                                <input type="email"
                                    @cannot('update app settings')
                        disabled
                            @endcannot
                                    value="{{ $appSetting->email2 }}" class="form-control" id="email2" name="email2">
                            </div>
                            <div class="form-group mb-2">
                                <label for="email3">Email 3 <small>(Optional)</small></label>
                                <input type="email"
                                    @cannot('update app settings')
                        disabled
                            @endcannot
                                    value="{{ $appSetting->email3 }}" class="form-control" id="email3" name="email3">
                            </div>

                            <div class="form-group mb-2">
                                <label for="phone">@lang('phone')</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    @cannot('update app settings')
                        disabled
                            @endcannot
                                    value="{{ $appSetting->phone }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="facebook">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                    @cannot('update app settings')
                        disabled
                            @endcannot
                                    value="{{ $appSetting->facebook }}">
                            </div>

                            <div class="form-group mb-2">
                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram"
                                    @cannot('update app settings')
                        disabled
                            @endcannot
                                    value="{{ $appSetting->instagram }}">
                            </div>

                            <div class="form-group mb-2">
                                <label for="tiktok">TikTok</label>
                                <input type="text" class="form-control" id="tiktok" name="tiktok"
                                    @cannot('update app settings')
                        disabled
                            @endcannot
                                    value="{{ $appSetting->tiktok }}">
                            </div>

                            <div class="form-group mb-2">
                                <label for="youtube">YouTube</label>
                                <input type="text" class="form-control" id="youtube" name="youtube"
                                    @cannot('update app settings')
                        disabled
                            @endcannot
                                    value="{{ $appSetting->youtube }}">
                            </div>

                            <div class="form-group mb-2">
                                <label for="whatsapp">WhatsApp</label>
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                    @cannot('update app settings')
                        disabled
                            @endcannot
                                    value="{{ $appSetting->whatsapp }}">
                            </div>

                            <div class="form-group mb-2">
                                <label for="address">@lang('address')</label>
                                <textarea class="form-control" id="address" name="address" rows="1"
                                    @cannot('update app settings')
                        disabled
                            @endcannot>{{ $appSetting->address }}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="address2">@lang('address') 2</label>
                                <textarea class="form-control" id="address2" name="address2" rows="1"
                                    @cannot('update app settings')
                        disabled
                            @endcannot>{{ $appSetting->address2 }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Navbar Section</div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label for="label_home">Label {{ $appSetting->navbarSection?->label_home }}</label>
                                <input type="text" class="form-control" id="label_home" name="label_home"
                                    @cannot('update app settings')
                    disabled
                        @endcannot
                                    value="{{ $appSetting->navbarSection?->label_home }}">
                                <div class="invalid-feedback" id="label_homeError"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label for="label_about_us">Label
                                    {{ $appSetting->navbarSection?->label_about_us }}</label>
                                <input type="text" class="form-control" id="label_about_us" name="label_about_us"
                                    @cannot('update app settings')
                                    disabled
                                        @endcannot
                                    value="{{ $appSetting->navbarSection?->label_about_us }}">
                                <div class="invalid-feedback" id="label_about_usError"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label for="label_our_program">Label
                                    {{ $appSetting->navbarSection?->label_our_program }}</label>
                                <input type="text" class="form-control" id="label_our_program"
                                    name="label_our_program"
                                    @cannot('update app settings')
                                    disabled
                                        @endcannot
                                    value="{{ $appSetting->navbarSection?->label_our_program }}">
                                <div class="invalid-feedback" id="label_our_programError"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label for="label_our_contact">Label
                                    {{ $appSetting->navbarSection?->label_our_contact }}</label>
                                <input type="text" class="form-control" id="label_our_contact"
                                    name="label_our_contact"
                                    @cannot('update app settings')
                                        disabled
                                            @endcannot
                                    value="{{ $appSetting->navbarSection?->label_our_contact }}">
                                <div class="invalid-feedback" id="label_our_contactError"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-2">
                                <label for="navbar_section_programs">Pilih
                                    {{ $appSetting->navbarSection?->label_our_program }}
                                    <small>(Max 5
                                        program)</small></label>
                                <input id="tag-input" class="form-control js-tags-input" name="navbar_section_programs[]"
                                    data-programs="{{ json_encode($programs) }}"
                                    value="{{ json_encode($appSetting->navbarSection?->navbarSectionPrograms->map(fn($item) => ['value' => $item->title, 'id' => $item->id])) }}">
                                <div class="invalid-feedback" id="navbar_section_programsError"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    {{ module_vite('modules/build/app-settings', 'Resources/assets/js/app.js') }}
    <script>
        $(document).ready(function() {

            var input = document.querySelector(".js-tags-input");
            const programs = $('.js-tags-input').data('programs').map(item => ({
                value: item.title.id,
                id: item.id
            }))
            var tagify = new Tagify(input, {
                delimiters: null,
                enforceWhitelist: true,
                whitelist: programs,
                maxTags: 5,
                dropdown: {
                    enabled: 0
                }
            })
        });
    </script>
@endsection
