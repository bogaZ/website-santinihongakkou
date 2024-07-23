<h2 class="text-2xl text-gray-800 uppercase tracking-widest dark:text-white my-10" data-aos="fade-up">
    @lang('message.family_data')
</h2>
<div class="grid grid-cols-2 gap-4">
    <div class="">
        <input class="form-control " type="number" id="relationship" name="order_of_siblings" min="0"
            placeholder="Anak Keberapa" value="{{ old('order_of_siblings') }}">
        @error('order_of_siblings')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div class="">
        <input class="form-control " type="number" id="relationship" name="number_of_siblings" min="0"
            placeholder="Jumlah saudara" value="{{ old('number_of_siblings') }}">
        @error('number_of_siblings')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <input class="form-control" value="Ayah" readonly id="relationship" name="family_data[0][relationship]"
            type="text" placeholder="Hubungan" value="{{ old('family_data.0.relationship') }}">
        @error('family_data.0.relationship')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input class="form-control" id="name" name="family_data[0][name]" type="text" placeholder="Nama"
            value="{{ old('family_data.0.name') }}">
        @error('family_data.0.name')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input class="form-control" id="age" name="family_data[0][age]" type="text" placeholder="Usia"
            value="{{ old('family_data.0.age') }}">
        @error('family_data.0.age')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input class="form-control" id="occupation" name="family_data[0][occupation]" type="text"
            placeholder="Pekerjaan" value="{{ old('family_data.0.occupation') }}">
        @error('family_data.0.occupation')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="grid grid-cols-2 gap-4 mt-4">
    <div>
        <input class="form-control" value="Ibu" readonly id="relationship" name="family_data[1][relationship]"
            type="text" placeholder="Hubungan" value="{{ old('family_data.1.relationship') }}">
        @error('family_data.1.relationship]')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input class="form-control" id="name" name="family_data[1][name]" type="text"
            placeholder="Nama"value="{{ old('family_data.1.name') }}">
        @error('family_data.1.name')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input class="form-control" id="age" name="family_data[1][age]" type="text" placeholder="Usia"
            value="{{ old('family_data.1.age') }}">
        @error('family_data.1.age')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input class="form-control" id="occupation" name="family_data[1][occupation]" type="text"
            placeholder="Pekerjaan" value="{{ old('family_data.1.occupation') }}">
        @error('family_data.1.occupation')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>
</div>
