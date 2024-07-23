<form class="js-form" action="{{ $route }}" method="POST">
    @csrf
    @method($method)
    <div class="row">
        <div class="col-12 mb-2">
            <div class="form-group">
                <label for="image" class="form-label">@lang('global.Image') <small>(max: 2mb, recommendation: 180px X
                        240px)</small></label>
                <input type="file" class="form-control dropify" name="image" id="image" data-show-remove="false"
                    @isset($organization_structure->image)
                data-default-file="{{ asset($organization_structure->image) }}"
                @endisset>
                <div class="invalid-feedback" id="imageError"></div>
            </div>
        </div>
        <div class="col-12 mb-2">
            <div class="form-group">
                <label for="name" class="form-label">@lang('Name')</label>
                <input type="text" class="form-control" name="name" id="name"
                    @isset($organization_structure)
                    value="{{ $organization_structure->name }}"
                @endisset>
                <div class="invalid-feedback" id="title.idError"></div>
            </div>
        </div>
        <div class="col-12 mb-2">
            <div class="form-group">
                <label for="occupation" class="form-label">@lang('Occupation')</label>
                <input type="text" class="form-control" name="occupation" id="occupation"
                    placeholder="Pemilik/Owner, directure"
                    @isset($organization_structure)
                    value="{{ $organization_structure->occupation }}"
                @endisset>
                <div class="invalid-feedback" id="title.idError"></div>
            </div>
        </div>
    </div>
</form>
