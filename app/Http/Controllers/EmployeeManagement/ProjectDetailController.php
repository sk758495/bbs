<?php

namespace App\Http\Controllers\EmployeeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectDetail;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProjectExport;
use App\Exports\SingleProjectExport;
use Barryvdh\DomPDF\Facade\Pdf;

class ProjectDetailController extends Controller
{

    public function dashboard()
    {
        $projects = ProjectDetail::with('user')->latest()->get();
        return view('dashboard', compact('projects')); // Create this Blade view next
    }

    public function index()
    {
        $projects = ProjectDetail::with('user')->latest()->get();
        return view('employee_management.bbs-new-project.index', compact('projects'));
    }
        public function create()
    {
        return view('employee_management.bbs-new-project.create'); // Create this Blade view next
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string',
            'structure_no' => 'required|string',
            'bill_no' => 'required|string',
            'bbs_for' => 'required|string',
            'floor' => 'required|string',
            'reference_drawing' => 'required|string',
            'approved_by' => 'required|string',
            'total_rf_weight' => 'required|numeric',
        ]);

        ProjectDetail::create([
            'project_name' => $request->project_name,
            'user_id' => Auth::id(),
            'structure_no' => $request->structure_no,
            'bill_no' => $request->bill_no,
            'bbs_for' => $request->bbs_for,
            'floor' => $request->floor,
            'reference_drawing' => $request->reference_drawing,
            'approved_by' => $request->approved_by,
            'total_rf_weight' => $request->total_rf_weight,
        ]);

        return redirect()->back()->with('success', 'Project details saved successfully!');
    }

    public function edit(ProjectDetail $project)
    {
        return view('employee_management.bbs-new-project.edit', compact('project'));
    }

    public function update(Request $request, ProjectDetail $project)
    {
        $request->validate([
            'project_name' => 'required|string',
            'structure_no' => 'required|string',
            'bill_no' => 'required|string',
            'bbs_for' => 'required|string',
            'floor' => 'required|string',
            'reference_drawing' => 'required|string',
            'approved_by' => 'required|string',
            'total_rf_weight' => 'required|numeric',
        ]);

        $project->update($request->all());

        return redirect()->route('employee_management.bbs-new-project.index')->with('success', 'Project updated!');
    }

    public function exportExcel()
    {
        $filename = 'BBS_Projects_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new ProjectExport, $filename);
    }

    public function exportSingleProject($id)
    {
        $project = ProjectDetail::findOrFail($id);
        $filename = 'BBS_' . str_replace(' ', '_', $project->project_name) . '_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new SingleProjectExport($id), $filename);
    }

 
}
