<div class="container">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

   <form method="POST" action="{{ route('project.update', $project->id) }}">
    @csrf
    @method('PUT')

        <div class="mb-3">
            <label>Project Name</label>
            <input type="text" name="project_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Engineer Name</label>
            <input type="text" value="{{ Auth::user()->name }}" class="form-control" disabled>
        </div>

        <div class="mb-3">
            <label>Structure No.</label>
            <input type="text" name="structure_no" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Bill No.</label>
            <input type="text" name="bill_no" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>BBS For</label>
            <input type="text" name="bbs_for" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Floor</label>
            <input type="text" name="floor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Reference Drawing</label>
            <input type="text" name="reference_drawing" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Approved By</label>
            <input type="text" name="approved_by" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Total R/F Weight (kg)</label>
            <input type="number" step="0.01" name="total_rf_weight" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Revision ID (Auto-generated)</label>
            <input type="text" value="Auto-generated after save" class="form-control" disabled>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>