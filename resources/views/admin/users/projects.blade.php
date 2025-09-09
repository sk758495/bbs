@extends('admin.layouts.app')

@section('title', 'User Projects - ' . $user->name)

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Projects by {{ $user->name }}</h2>
            <p class="text-muted mb-0">{{ $user->email }} | Total Projects: {{ $projects->total() }}</p>
        </div>
        <a href="{{ route('admin.users') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to Users
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Project Name</th>
                            <th>Contractor</th>
                            <th>Consultant</th>
                            <th>Client</th>
                            <th>Bill No.</th>
                            <th>BBS For</th>
                            <th>Floor</th>
                            <th>Weight (kg)</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projects as $project)
                            <tr>
                                <td><span class="badge bg-primary">{{ $project->id }}</span></td>
                                <td>
                                    <div class="fw-bold">{{ $project->project_name }}</div>
                                    <small class="text-muted">{{ $project->reference_drawing }}</small>
                                </td>
                                <td>{{ $project->contractor_name }}</td>
                                <td>{{ $project->consultant_name }}</td>
                                <td>{{ $project->client_name }}</td>
                                <td>{{ $project->bill_no }}</td>
                                <td>{{ $project->bbs_for }}</td>
                                <td>{{ $project->floor }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $project->total_rf_weight }} kg</span>
                                </td>
                                <td>{{ $project->created_at->format('M d, Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="bi bi-inbox display-1"></i>
                                        <h5 class="mt-3">No projects found</h5>
                                        <p>This user hasn't created any projects yet</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
@endsection