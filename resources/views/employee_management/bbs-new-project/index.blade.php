@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="table-responsive small">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th><i class="bi bi-hash"></i> ID</th>
                <th><i class="bi bi-building"></i> Project</th>
                <th class="d-none d-md-table-cell"><i class="bi bi-person"></i> Engineer</th>
                <th class="d-none d-lg-table-cell"><i class="bi bi-building"></i> Contractor</th>
                <th class="d-none d-xl-table-cell"><i class="bi bi-person-gear"></i> Consultant</th>
                <th class="d-none d-lg-table-cell"><i class="bi bi-person-badge"></i> Client</th>
                <th class="d-none d-xl-table-cell"><i class="bi bi-receipt"></i> Bill No.</th>
                <th class="d-none d-xl-table-cell"><i class="bi bi-tools"></i> BBS For</th>
                <th class="d-none d-xl-table-cell"><i class="bi bi-layers"></i> Floor</th>
                <th class="d-none d-xl-table-cell"><i class="bi bi-file-earmark"></i> Drawing</th>
                <th class="d-none d-lg-table-cell"><i class="bi bi-person-check"></i> Approved</th>
                <th class="d-none d-md-table-cell"><i class="bi bi-speedometer2"></i> Weight</th>
                <th class="d-none d-lg-table-cell"><i class="bi bi-calendar"></i> Date</th>
                <th><i class="bi bi-gear"></i> Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
                <tr>
                    <td><span class="badge bg-primary">{{ $project->id }}</span></td>
                    <td>
                        <div class="fw-bold">{{ $project->project_name }}</div>
                        <small class="text-muted d-md-none">{{ $project->user->name ?? 'N/A' }}</small>
                    </td>
                    <td class="d-none d-md-table-cell">{{ $project->user->name ?? 'N/A' }}</td>
                    <td class="d-none d-lg-table-cell">{{ $project->contractor_name }}</td>
                    <td class="d-none d-xl-table-cell">{{ $project->consultant_name }}</td>
                    <td class="d-none d-lg-table-cell">{{ $project->client_name }}</td>
                    <td class="d-none d-xl-table-cell">{{ $project->bill_no }}</td>
                    <td class="d-none d-xl-table-cell">{{ $project->bbs_for }}</td>
                    <td class="d-none d-xl-table-cell">{{ $project->floor }}</td>
                    <td class="d-none d-xl-table-cell">{{ $project->reference_drawing }}</td>
                    <td class="d-none d-lg-table-cell">{{ $project->approved_by }}</td>
                    <td class="d-none d-md-table-cell">
                        <span class="badge bg-info">{{ $project->total_rf_weight }} kg</span>
                    </td>
                    <td class="d-none d-lg-table-cell">
                        <small>{{ $project->created_at->format('d M Y') }}</small>
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('project.edit', $project->id) }}" 
                               class="btn btn-sm btn-outline-warning" 
                               title="Edit Project">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="{{ route('project.export.single', $project->id) }}" 
                               class="btn btn-sm btn-outline-success" 
                               title="Export Excel">
                                <i class="bi bi-download"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="14" class="text-center py-5">
                        <div class="text-muted">
                            <i class="bi bi-inbox display-1"></i>
                            <h5 class="mt-3">No projects found</h5>
                            <p>Create your first project to get started</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>