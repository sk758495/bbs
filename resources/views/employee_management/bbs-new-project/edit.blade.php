<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="bi bi-pencil"></i> Edit Project</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('project.update', $project->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-building"></i> Project Name</label>
                            <input type="text" name="project_name" class="form-control" value="{{ old('project_name', $project->project_name) }}" required>
                            @error('project_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-person"></i> Engineer Name</label>
                            <input type="text" value="{{ Auth::user()->name }}" class="form-control" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-building"></i> Contractor Name</label>
                            <input type="text" name="contractor_name" class="form-control" value="{{ old('contractor_name', $project->contractor_name) }}" required>
                            @error('contractor_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-person-gear"></i> Consultant Name</label>
                            <input type="text" name="consultant_name" class="form-control" value="{{ old('consultant_name', $project->consultant_name) }}" required>
                            @error('consultant_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-person-badge"></i> Client Name</label>
                            <input type="text" name="client_name" class="form-control" value="{{ old('client_name', $project->client_name) }}" required>
                            @error('client_name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-receipt"></i> Bill No.</label>
                            <input type="text" name="bill_no" class="form-control" value="{{ old('bill_no', $project->bill_no) }}" required>
                            @error('bill_no')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-tools"></i> BBS For</label>
                            <input type="text" name="bbs_for" class="form-control" value="{{ old('bbs_for', $project->bbs_for) }}" required>
                            @error('bbs_for')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><i class="bi bi-layers"></i> Floor</label>
                                <input type="text" name="floor" class="form-control" value="{{ old('floor', $project->floor) }}" required>
                                @error('floor')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><i class="bi bi-file-earmark"></i> Reference Drawing</label>
                                <input type="text" name="reference_drawing" class="form-control" value="{{ old('reference_drawing', $project->reference_drawing) }}" required>
                                @error('reference_drawing')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><i class="bi bi-person-check"></i> Approved By</label>
                                <input type="text" name="approved_by" class="form-control" value="{{ old('approved_by', $project->approved_by) }}" required>
                                @error('approved_by')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><i class="bi bi-speedometer2"></i> Total R/F Weight (kg)</label>
                                <input type="number" step="0.01" name="total_rf_weight" class="form-control" value="{{ old('total_rf_weight', $project->total_rf_weight) }}" required>
                                @error('total_rf_weight')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label"><i class="bi bi-gear"></i> Revision ID</label>
                            <input type="text" value="{{ $project->id }}" class="form-control" disabled>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Back to Dashboard
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Update Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>