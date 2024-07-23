<form class="js-form" action="{{ $route }}" method="POST">
    @csrf
    @method($method)
    <div class="row">
        <div class="col-6 mb-2">
            <div class="form-group">
                <label for="image" class="form-label">@lang('global.Image') </label>
                <input type="file" class="form-control dropify" name="image" id="image" data-show-remove="false"
                    @isset($service->image)
                data-default-file="{{ asset($service->image) }}"
                @endisset>
                <div class="invalid-feedback" id="imageError"></div>
            </div>
        </div>
        <div class="col-6 mb-2">
            <div class="form-group">
                <label for="icon" class="form-label">@lang('global.Icon') </label>
                <input type="file" class="form-control dropify" name="icon" id="icon"
                    data-show-remove="false"
                    @isset($service->icon)
                    data-default-file="{{ asset($service->icon) }}"
                    @endisset>
                <div class="invalid-feedback" id="iconError"></div>
            </div>
        </div>
        <div class="col-6 mb-2">
            <div class="form-group">
                <label for="title[id]" class="form-label">@lang('global.Title') [id]</label>
                <input type="text" class="form-control" name="title[id]" id="title[id]"
                    @isset($service)
                    value="{{ $service->getTranslation('title', 'id') }}"
                @endisset>
                <div class="invalid-feedback" id="title.idError"></div>
            </div>
        </div>
        <div class="col-6 mb-2">
            <div class="form-group">
                <label for="title[en]" class="form-label">@lang('global.Title') [en]</label>
                <input type="text" class="form-control" id="title[en]" name="title[en]"
                    @isset($service)
                value="{{ $service->getTranslation('title', 'en') }}"
            @endisset>
                <div class="invalid-feedback" id="title.enError"></div>
            </div>
        </div>
        <div class="col-6 mb-2">
            <div class="form-group">
                <label for="short_content[id]" class="form-label">@lang('global.Short Content') [id]</label>
                <input type="text" class="form-control" id="short_content[id]" name="short_content[id]"
                    @isset($service)
                value="{{ $service->getTranslation('short_content', 'id') }}"
            @endisset>
                <div class="invalid-feedback" id="short_content.idError"></div>
            </div>
        </div>
        <div class="col-6 mb-2">
            <div class="form-group">
                <label for="short_content[en]" class="form-label">@lang('global.Short Content') [en]</label>
                <input type="text" class="form-control" id="short_content[en]" name="short_content[en]"
                    @isset($service)
                value="{{ $service->getTranslation('short_content', 'en') }}"
            @endisset>
                <div class="invalid-feedback" id="short_content.enError"></div>
            </div>
        </div>
        <div class="col-6 mb-2">
            <div class="form-group">
                <label for="content[id]" class="form-label">@lang('global.Content') [id]</label>
                <input type="text" class="form-control" id="content[id]" name="content[id]"
                    @isset($service)
                value="{{ $service->getTranslation('content', 'id') }}"
            @endisset>
                <div class="invalid-feedback" id="content.idError"></div>
            </div>
        </div>
        <div class="col-6 mb-2">
            <div class="form-group">
                <label for="content[en]" class="form-label">@lang('global.Content') [en]</label>
                <input type="text" class="form-control" id="content[en]" name="content[en]"
                    @isset($service)
                value="{{ $service->getTranslation('content', 'id') }}"
            @endisset>
                <div class="invalid-feedback" id="content.enError"></div>
            </div>
        </div>
    </div>
</form>