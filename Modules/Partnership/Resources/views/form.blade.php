<form class="js-form" action="{{ $route }}" method="POST">
    @csrf
    @method($method)
    <div class="row">
        <div class="col-12 mb-2">
            <div class="form-group">
                <label for="image" class="form-label">@lang('global.Image') </label>
                <input type="file" class="form-control dropify" name="image" id="image" data-show-remove="false"
                    @isset($partnership->image)
                data-default-file="{{ asset($partnership->image) }}"
                @endisset>
                <small>@lang('global.recommendation'): 300px X 300px (3:3)</small>
                <div class="invalid-feedback" id="imageError"></div>
            </div>
        </div>
        <div class="col-12 mb-2">
            <div class="form-group">
                <label for="title[id]" class="form-label">@lang('global.Title')</label>
                <input type="text" class="form-control" name="title[id]" id="title[id]"
                    @isset($partnership)
                    value="{{ $partnership->getTranslation('title', 'id') }}"
                @endisset>
                <div class="invalid-feedback" id="title.idError"></div>
            </div>
        </div>
        <div class="col-12 mb-2">
            <div class="form-group">
                <label for="link" class="form-label">@lang('global.Link') <small>(gunakan: https://)</small></label>
                <input type="text" placeholder="example: https://www.google.com" class="form-control" name="link"
                    id="link"
                    @isset($partnership)
                    value="{{ $partnership->link }}"
                @endisset>
                <div class="invalid-feedback" id="title.idError"></div>
            </div>
        </div>
    </div>
</form>
