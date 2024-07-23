<div class="d-flex mb-3">
    <a href="{{ route('rgpanel.prospective-students.export-pdf', ['prospective_student' => $prospective_student->id, 'locale' => 'en']) }}"
        target="_blank" class="btn btn-info btn-sm d-flex align-items-center" rel="noopener noreferrer">
        <span class="material-icons-outlined">
            file_download
        </span>
        Download Data Siswa
    </a>
</div>
<div class="row">
    <div class="col-md-4 col-6 mb-3">
        <img width="100%" class="rounded" src="{{ asset($prospective_student->image) }}" alt="gambar student">
    </div>
    <div class="col-md-2 col-6">
        <div class="form-group">
            <label for="title[id]" class="form-label" style="font-weight: 600">Full Name</label>
            <p>{{ $prospective_student->full_name }}</p>
        </div>
    </div>

    <div class="col-md-3 col-6">
        <div class="form-group">
            <label for="title[id]" class="form-label" style="font-weight: 600">Email</label>
            <p>{{ $prospective_student->email }}</p>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="form-group">
            <label for="title[id]" class="form-label" style="font-weight: 600">Program interests</label>
            <p>{{ $prospective_student->program?->title }}</p>
        </div>
    </div>
    <div class="col-md-4 col-6">
        <div class="form-group">
            <label for="title[id]" class="form-label" style="font-weight: 600">Program Type</label>
            <p>{{ $prospective_student->programType?->name }}</p>
        </div>
    </div>
    <div class="col-md-4 col-6">
        <div class="form-group">
            <label for="title[id]" class="form-label" style="font-weight: 600">Identity Number</label>
            <p>{{ $prospective_student->identity_number }}</p>
        </div>
    </div>
    <div class="col-md-4 col-6">
        <div class="form-group">
            <label for="title[id]" class="form-label" style="font-weight: 600">Phone</label>
            <p>{{ $prospective_student->phone }}</p>
        </div>
    </div>
    <div class="col-md-4 col-6">
        <div class="form-group">
            <label for="title[id]" class="form-label" style="font-weight: 600">Birth date</label>
            <p>{{ $prospective_student->birth_date->format('d F Y') }}</p>
        </div>
    </div>
    <div class="col-md-4 col-6">
        <div class="form-group">
            <label for="title[id]" class="form-label" style="font-weight: 600">Place of birth</label>
            <p>{{ $prospective_student->place_of_birth }}</p>
        </div>
    </div>
    <div class="col-md-4 col-6">
        <div class="form-group">
            <label for="title[id]" class="form-label" style="font-weight: 600">Place of birth</label>
            <p>{{ $prospective_student->place_of_birth }}</p>
        </div>
    </div>
    <div class="col-md-4 col-6">
        <div class="form-group">
            <label for="title[id]" class="form-label" style="font-weight: 600"
                style="text-transform:capitalize">Address</label>
            <p>{{ $prospective_student->address }}</p>
        </div>
    </div>
</div>
<h5 class="mt-3">Education Data</h5>

<div class="row">
    <div class="col-md-4 col-6">
        <div class="form-group">
            <label for="title[id]" class="form-label" style="font-weight: 600" style="text-transform:capitalize">Last
                Education</label>
            <p style="text-transform: capitalize">{{ $prospective_student->last_education }}</p>
        </div>
    </div>
    <div class="col-md-4 col-6">
        <div class="form-group">
            <label for="title[id]" class="form-label" style="text-transform:capitalize;font-weight: 600">Japanese
                language proficiency certificate</label>
            <p style="text-transform: capitalize">{{ $prospective_student->japanese_language_proficiency_certificate }}
            </p>
        </div>
    </div>
</div>
<h5 class="mt-3">Family Data</h5>
<div class="row">
    @foreach ($prospective_student->studentFamilies as $item)
        <div class="form-group col-3">
            <label for="title[id]" class="form-label"
                style="font-weight:600;text-transform:capitalize">relationship</label>
            <p style="text-transform:capitalize">{{ $item->relationship }}</p>
        </div>
        <div class="form-group col-3">
            <label for="title[id]" class="form-label" style="font-weight:600;text-transform:capitalize">name</label>
            <p>{{ $item->name }}</p>
        </div>
        <div class="form-group col-3">
            <label for="title[id]" class="form-label" style="font-weight:600;text-transform:capitalize">age</label>
            <p>{{ $item->age }}</p>
        </div>
        <div class="form-group col-3">
            <label for="title[id]" class="form-label"
                style="font-weight:600;text-transform:capitalize">occupation</label>
            <p>{{ $item->occupation }}</p>
        </div>
    @endforeach
</div>
