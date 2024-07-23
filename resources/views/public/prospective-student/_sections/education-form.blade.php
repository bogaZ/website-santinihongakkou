<h2 class="text-2xl text-gray-800 uppercase tracking-widest dark:text-white my-10" data-aos="fade-up">
    Data Pendidikan
</h2>
<!-- Pendidikan Sekolah Dasar -->

<div class="grid grid-cols-2 gap-4 my-4">
    <div>
        <label for="form-label">Pendidikan Terahir :</label>
        <div class="flex flex-col mt-3 pl-3">
            <div class="flex items-center space-x-5">
                <input type="radio" name="last_education" id="smp" value="smp" class="form-radio mr-2"
                    @checked(old('last_education') == 'smp')>
                <label for="smp">SMP</label>
            </div>
            <div class="flex items-center space-x-5">
                <input type="radio" name="last_education" id="sma" value="sma" class="form-radio mr-2"
                    @checked(old('last_education') == 'sma')>
                <label for="sma">SMA</label>
            </div>
            <div class="flex items-center space-x-5">
                <input type="radio" name="last_education" id="s1" value="s1" class="form-radio mr-2"
                    @checked(old('last_education') == 's1')>
                <label for="s1">S1</label>
            </div>
            <div class="flex items-center space-x-5">
                <input type="radio" name="last_education" id="s2" value="s2" class="form-radio mr-2"
                    @checked(old('last_education') == 's2')>
                <label for="s2">S2</label>
            </div>
        </div>
        @error('last_education')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="form-label">Sertifikat Kemampuan Bahasa Jepang :</label>
        <div class="flex flex-col mt-3 pl-3">
            <div class="flex items-center space-x-5">
                <input type="radio" name="japanese_language_proficiency_certificate" id="n5" value="n5"
                    class="form-radio mr-2" @checked(old('japanese_language_proficiency_certificate') == 'n5')>
                <label for="n5" class="capitalize">n5</label>
            </div>
            <div class="flex items-center space-x-5">
                <input type="radio" name="japanese_language_proficiency_certificate" id="n4" value="n4"
                    class="form-radio mr-2" @checked(old('japanese_language_proficiency_certificate') == 'n4')>
                <label for="n4" class="capitalize">n4</label>
            </div>
            <div class="flex items-center space-x-5">
                <input type="radio" name="japanese_language_proficiency_certificate" id="n3" value="n3"
                    class="form-radio mr-2" @checked(old('japanese_language_proficiency_certificate') == 'n3')>
                <label for="n3" class="capitalize">n3</label>
            </div>
            <div class="flex items-center space-x-5">
                <input type="radio" name="japanese_language_proficiency_certificate" id="n2" value="n2"
                    class="form-radio mr-2" @checked(old('japanese_language_proficiency_certificate') == 'n2')>
                <label for="n2" class="capitalize">n2</label>
            </div>
            <div class="flex items-center space-x-5">
                <input type="radio" name="japanese_language_proficiency_certificate" id="none" value="none"
                    class="form-radio mr-2" @checked(old('japanese_language_proficiency_certificate') == 'none')>
                <label for="none" class="capitalize">Tidak Memiliki</label>
            </div>
        </div>
        @error('japanese_language_proficiency_certificate')
            <span class="text-xs italic text-red-600">{{ $message }}</span>
        @enderror
    </div>

</div>
