@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<form action="{{ route('project.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-building"></i> Project Name</label>
        <input type="text" name="project_name" class="form-control" placeholder="Enter project name" required>
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-person"></i> Engineer Name</label>
        <input type="text" value="{{ Auth::user()->name }}" class="form-control" disabled>
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-building"></i> Contractor Name</label>
        <input type="text" name="contractor_name" class="form-control" placeholder="Enter contractor name" required>
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-person-gear"></i> Consultant Name</label>
        <input type="text" name="consultant_name" class="form-control" placeholder="Enter consultant name" required>
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-person-badge"></i> Client Name</label>
        <input type="text" name="client_name" class="form-control" placeholder="Enter client name" required>
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-receipt"></i> Bill No.</label>
        <input type="text" name="bill_no" class="form-control" placeholder="BILL-001" required>
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-tools"></i> BBS For</label>
        <input type="text" name="bbs_for" class="form-control" placeholder="Foundation/Column/Beam" required>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label"><i class="bi bi-layers"></i> Floor</label>
            <input type="text" name="floor" class="form-control" placeholder="Ground Floor" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label"><i class="bi bi-file-earmark"></i> Reference Drawing</label>
            <input type="text" name="reference_drawing" class="form-control" placeholder="DWG-001" required>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-person-check"></i> Approved By</label>
        <input type="text" name="approved_by" class="form-control" placeholder="Approver name" required>
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-speedometer2"></i> Total R/F Weight (kg)</label>
        <input type="number" step="0.01" name="total_rf_weight" class="form-control" placeholder="0.00" required>
    </div>

    <div class="mb-4">
        <label class="form-label"><i class="bi bi-gear"></i> Revision ID</label>
        <input type="text" value="Auto-generated after save" class="form-control" disabled>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Save Project
        </button>
    </div>
</form>