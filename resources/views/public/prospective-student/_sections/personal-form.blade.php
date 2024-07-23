<h2 class="text-2xl text-gray-800 uppercase tracking-widest dark:text-white" data-aos="fade-up">
    @lang('message.personal_data')
</h2>
<input type="hidden" name="program_id" value="{{ $program->id }}" readonly>
<div class="grid grid-cols-2 gap-4 mt-10">
    <div class="col-span-2">
        <input type="file" class="dropify" id="image" name="image"
            data-placeholder="Upload gambar diri ukuran 3 x 4" />
        @error('image')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input class="form-control" id="full_name" name="full_name" type="text" placeholder="@lang('message.full_name')"
            value="{{ old('full_name') }}">
        @error('full_name')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input class="form-control" id="identity_number" type="number" name="identity_number"
            placeholder="@lang('message.identity_number')" value="{{ old('identity_number') }}" min="0">
        @error('identity_number')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <input class="form-control" id="email" name="email" type="email" placeholder="@lang('message.email')"
            value="{{ old('email') }}">
        @error('email')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input class="form-control" id="phone" name="phone" type="text" placeholder="@lang('message.phone_number')"
            value="{{ old('phone') }}">
        @error('phone')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <select name="program_type_id" id="program_type_id" class="form-control">
            @foreach ($programType as $item)
                <option value="{{ $item->id }}" @selected($item->id == old('program_type_id'))>{{ $item->name }}</option>
            @endforeach
        </select>
        @error('program_type_id')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>


    <div>
        <input class="form-control" id="birth_date" name="birth_date" type="text" placeholder="@lang('message.birth_date')"
            value="{{ old('birth_date') }}" onfocus="(this.type='date')" onblur="(this.type='text')">
        @error('birth_date')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <input class="form-control" id="place_of_birth" name="place_of_birth" type="text"
            placeholder="@lang('message.place_of_birth')" value="{{ old('place_of_birth') }}">
        @error('place_of_birth')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input class="form-control" id="address" name="address" type="text" placeholder="@lang('message.address')"
            value="{{ old('address') }}">
        @error('address')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="form-label">Gender :</label>
        <div class="flex flex-col mt-3 pl-3">
            <div class="flex items-center space-x-5">
                <input type="radio" name="gender" id="pria" value="pria" class="form-radio mr-2"
                    @checked(old('gender') == 'pria')>
                <label for="pria">Pria</label>
            </div>
            <div class="flex items-center space-x-5">
                <input type="radio" name="gender" id="wanita" value="wanita" class="form-radio mr-2"
                    @checked(old('gender') == 'wanita')>
                <label for="wanita">Wanita</label>
            </div>
        </div>
        @error('gender')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>
</div>
