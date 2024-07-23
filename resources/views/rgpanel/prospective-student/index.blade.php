@extends('rgpanel.layout.app')
@section('styles')
@endsection
@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-3 mb-2">
                        <input type="search" value="{{ request('search') }}" class="form-control" name="search"
                            placeholder="Search">
                    </div>
                    <div class="col-2 mb-2">
                        <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="From"
                            @if (request('from') != null) value="{{ date('Y-m-d', strtotime(request('from'))) }}" @endif
                            name="from" id="from" class="form-control">
                    </div>
                    <div class="col-2 mb-2">
                        <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="To"
                            @if (request('to') != null) value="{{ date('Y-m-d', strtotime(request('to'))) }}" @endif
                            name="to" id="to" class="form-control">
                    </div>
                    <div class="col-2 mb-2">
                        <select name="program" id="program" class="form-control">
                            <option disabled selected>Program</option>
                            @foreach ($programs as $item)
                                <option value="{{ $item->id }}" @selected($item->id == request('program'))>
                                    {{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2 mb-2">
                        <select name="programtype" id="programtype" class="form-control">
                            <option disabled selected>Program Type</option>
                            @foreach ($programTypes as $item)
                                <option value="{{ $item->id }}" @selected($item->id == request('programtype'))>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-2 d-flex align-items-center gap-3">
                        <button type="submit" class="btn btn-info btn-sm d-flex align-items-center justify-content-center "
                            rel="noopener noreferrer">
                            <span class="material-icons-outlined">
                                search
                            </span>
                            Search & Filter
                        </button>
                        <a href="{{ route('rgpanel.prospective-students.index', array_merge(['locale' => 'en'])) }}"
                            class="btn btn-danger btn-sm d-flex align-items-center justify-content-center"
                            rel="noopener noreferrer">
                            <span class="material-icons-outlined">
                                close
                            </span>
                            Clear
                        </a>
                        <a href="{{ route('rgpanel.prospective-students.export-excel', array_merge(['locale' => 'en'], request()->query())) }}"
                            target="_blank" class="btn btn-info btn-sm d-flex align-items-center justify-content-center"
                            rel="noopener noreferrer">
                            <span class="material-icons-outlined">
                                file_download
                            </span>
                            Export
                        </a>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Registration Number</th>
                            <th>@lang('global.Name')</th>
                            <th>@lang('global.Email')</th>
                            <th>@lang('global.Handphone')</th>
                            <th>@lang('global.Address')</th>
                            <th>@lang('global.Program')</th>
                            <th>@lang('global.Type')</th>
                            <th>@lang('global.Created At')</th>
                            <th>@lang('global.Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prospective_student as $item)
                            <tr>
                                <td>{{ str_pad($item->id, 5, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item->full_name }} </td>
                                <td>{{ $item->email }} </td>
                                <td>{{ $item->phone }} </td>
                                <td>{{ $item->address }} </td>
                                <td>{{ $item->program?->title }} </td>
                                <td>{{ $item->programType?->name }} </td>
                                <td>{{ $item->created_at->format('F d Y, H:i') }}</td>
                                <td class="d-flex justify-items-center">
                                    <button data-id="{{ $item->id }}" data-bs-toggle="modal"
                                        data-bs-target="#modalForm"
                                        data-url="{{ route('rgpanel.prospective-students.show', ['locale' => app()->getLocale(), 'prospective_student' => $item->id]) }}"
                                        class="btn btn-sm btn-info d-flex align-items-center fs-6 p-1 js-btn-edit">
                                        <span class="material-icons fs-6">
                                            preview
                                        </span>
                                    </button>
                                    @can('delete feedback')
                                        <button
                                            data-url="{{ route('rgpanel.prospective-students.destroy', ['locale' => app()->getLocale(), 'prospective_student' => $item->id]) }}"
                                            data-id="{{ $item->id }}" data-btn-label="@lang('global.delete')"
                                            data-title="@lang('global.delete_confirmation')" data-btn-cancel-label="@lang('global.cancel')"
                                            class="btn btn-sm btn-danger d-flex align-items-center fs-6 p-1 js-btn-delete">
                                            <span class="material-icons fs-6">
                                                delete
                                            </span>
                                        </button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $prospective_student->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">Detail Prospective Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm js-btn-close"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @vite('resources/js/rgpanel/prospective-student/app.js', 'build')
@endsection
