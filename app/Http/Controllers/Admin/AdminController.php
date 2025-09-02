<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ProjectDetail;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        return view('admin.dashboard', compact('totalUsers'));
    }

    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function deleteUser(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('admin.users')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.users')->with('error', 'Failed to delete user. Please try again.');
        }
    }

    public function userProjects(User $user)
    {
        $projects = ProjectDetail::where('user_id', $user->id)->latest()->paginate(10);
        return view('admin.users.projects', compact('user', 'projects'));
    }
}
