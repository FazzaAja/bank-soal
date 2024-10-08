@extends('admin.layout')

@section('title', 'Mata Kuliah | Admin')

@section('content')

<!-- Main wrapper -->
<div class="body-wrapper">
    <div class="container-fluid mw-100">
        <!-- Mata Kuliah Start -->
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Mata Kuliah</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Mata Kuliah</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="datatables">
            <div class="row">
                <!-- Data Table -->
                <div class="col-md-8 col-lg-8 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-0">Data</h5>
                                @if(session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                            <div class="table-responsive">
                                <table id="scroll_ver_hor" class="table border table-striped table-bordered display nowrap" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Matkul</th>
                                            <th>SKS</th>
                                            <th>Semester</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($subjects as $subject)
                                            <tr>
                                                <td>{{ $subject->subject }}</td>
                                                <td>{{ $subject->sks }}</td>
                                                <td>{{ $subject->semester }}</td>
                                                <td>
                                                    <div class="dropdown dropstart">
                                                        <a href="#" class="text-muted" id="dropdownMenuButton-{{ $subject->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ti ti-dots-vertical fs-6"></i>
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $subject->id }}">
                                                            <li>
                                                                <button class="dropdown-item d-flex align-items-center gap-3" data-bs-toggle="modal" data-bs-target="#edit-modal-{{ $subject->id }}">
                                                                    <i class="fs-4 ti ti-edit"></i>Edit
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('subject.destroy', $subject->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item d-flex align-items-center gap-3" onclick="return confirm('Are you sure?')">
                                                                        <i class="fs-4 ti ti-trash"></i>Delete
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div id="edit-modal-{{ $subject->id }}" class="modal fade" tabindex="-1" aria-labelledby="edit-modal-{{ $subject->id }}-label" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header d-flex align-items-center">
                                                            <h4 class="modal-title" id="edit-modal-{{ $subject->id }}-label">Update Mata Kuliah</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('subject.update', $subject->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="recipient-name-{{ $subject->id }}" class="control-label">Mata Kuliah :</label>
                                                                    <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" id="recipient-name-{{ $subject->id }}" value="{{ $subject->subject }}" />
                                                                    @error('subject')
                                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                    <label for="recipient-name-{{ $subject->id }}" class="control-label">sks :</label>
                                                                    <input type="text" name="sks" class="form-control @error('sks') is-invalid @enderror" id="recipient-name-{{ $subject->id }}" value="{{ $subject->sks }}" />
                                                                    @error('sks')
                                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                    <label for="recipient-name-{{ $subject->id }}" class="control-label">Semester :</label>
                                                                    <input type="text" name="semester" class="form-control @error('semester') is-invalid @enderror" id="recipient-name-{{ $subject->id }}" value="{{ $subject->semester }}" />
                                                                    @error('semester')
                                                                        <div class="form-text text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-danger text-danger font-medium" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="2">There are no data.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Matkul</th>
                                            <th>SKS</th>
                                            <th>Semester</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add subject Form -->
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="mb-0 fs-5">Tambah Mata Kuliah</h5>
                            </div>
                            <form action="{{ route('subject.store') }}" method="POST">
                                @csrf
                                <p class="mb-3 card-subtitle">Mata Kuliah :</p>
                                <div class="form-group mb-3">
                                    <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" />
                                    @error('subject')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <p class="mb-3 card-subtitle">SKS :</p>
                                <div class="form-group mb-3">
                                    <input type="number" name="sks" class="form-control @error('sks') is-invalid @enderror" />
                                    @error('sks')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <p class="mb-3 card-subtitle">Semester :</p>
                                <div class="form-group mb-3">
                                    <input type="number" name="semester" class="form-control @error('semester') is-invalid @enderror" />
                                    @error('semester')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn btn-info">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
