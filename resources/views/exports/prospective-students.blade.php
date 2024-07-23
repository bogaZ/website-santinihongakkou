<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>KTP</th>
            <th>Email</th>
            <th>No. Phone</th>
            <th>Tanggal Lahir</th>
            <th>Tempat Lahir</th>
            <th>Alamat</th>
            <th>Gender</th>
            <th>Nama Ibu</th>
            <th>Usia Ibu</th>
            <th>Pekerjaan Ibu</th>
            <th>Nama Ayah</th>
            <th>Usia Ayah</th>
            <th>Pekerjaan Ayah</th>
            <th>Pendidikan Terahir</th>
            <th>Sertifikat Kemampuan Bahasa Jepang</th>
            <th>Program</th>
            <th>Tipe Program</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $item)
            @php
                $ayah = $item->studentFamilies?->filter(fn($item) => $item->relationship == 'Ayah')->first();
                $ibu = $item->studentFamilies?->filter(fn($item) => $item->relationship == 'Ibu')->first();
            @endphp
            <tr>
                <td>{{ $item->full_name }}</td>
                <td>{{ $item->identity_number }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->birth_date }}</td>
                <td>{{ $item->place_of_birth }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->gender }}</td>
                <td>{{ $ibu?->name }}</td>
                <td>{{ $ibu?->age }}</td>
                <td>{{ $ibu?->occupation }}</td>
                <td>{{ $ayah?->name }}</td>
                <td>{{ $ayah?->age }}</td>
                <td>{{ $ayah?->occupation }}</td>
                <td>{{ $item->last_education }}</td>
                <td>{{ $item->japanese_language_proficiency_certificate }}</td>
                <td>{{ $item->program?->title }}</td>
                <td>{{ $item->programType?->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
