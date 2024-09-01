@extends('admin.layout')

@section('title', 'Dosen | Admin')

@section('content')

<!-- Main wrapper -->
<div class="body-wrapper">
    <div class="container-fluid mw-100">
        <!-- Dosen Start -->
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Dosen</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Dosen</li>
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
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($lecturers as $lecturer)
                                            <tr>
                                                <td>{{ $lecturer->name }}</td>
                                                <td>
                                                    <div class="dropdown dropstart">
                                                        <a href="#" class="text-muted" id="dropdownMenuButton-{{ $lecturer->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ti ti-dots-vertical fs-6"></i>
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $lecturer->id }}">
                                                            <li>
                                                                <button class="dropdown-item d-flex align-items-center gap-3" data-bs-toggle="modal" data-bs-target="#edit-modal-{{ $lecturer->id }}">
                                                                    <i class="fs-4 ti ti-edit"></i>Edit
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('lecturer.destroy', $lecturer->id) }}" method="POST">
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
                                            <div id="edit-modal-{{ $lecturer->id }}" class="modal fade" tabindex="-1" aria-labelledby="edit-modal-{{ $lecturer->id }}-label" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header d-flex align-items-center">
                                                            <h4 class="modal-title" id="edit-modal-{{ $lecturer->id }}-label">Update Dosen</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('lecturer.update', $lecturer->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="recipient-name-{{ $lecturer->id }}" class="control-label">Nama :</label>
                                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="recipient-name-{{ $lecturer->id }}" value="{{ $lecturer->name }}" />
                                                                    @error('name')
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
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Lecturer Form -->
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="mb-0 fs-5">Tambah Dosen</h5>
                            </div>
                            <form action="{{ route('lecturer.store') }}" method="POST">
                                @csrf
                                <p class="mb-3 card-subtitle">Nama :</p>
                                <div class="form-group mb-3">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" />
                                    @error('name')
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
