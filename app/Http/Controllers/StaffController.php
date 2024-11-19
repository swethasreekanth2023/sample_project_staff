<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Department;

class StaffController extends Controller
{
    public function index()
{
    // Retrieve all staff members (where role = 'staff')
    $staff = User::where('role', 'staff')->get();

    return view('admin.staff.index', compact('staff'));
}

    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();
    
        return view('admin.staff.create', compact('roles', 'departments'));
        // return view('admin.staff.create');
    }

//     public function store(Request $request)
// {
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|email|unique:users,email',
//         'password' => 'required|min:8|confirmed',
//     ]);

//     User::create([
//         'name' => $request->name,
//         'email' => $request->email,
//         'password' => Hash::make($request->password),
//         'role' => 'staff', // Assign the 'staff' role
//     ]);

//     return redirect()->route('admin.dashboard')->with('success', 'Staff member added successfully!');
// }

public function store(Request $request)
{
    \Log::info('Store method hit with data:', $request->all());

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'role_id' => 'required|exists:roles,id',
        'department_id' => 'required|exists:departments,id',
    ]);

    \Log::info('Validation passed');

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => $request->role_id,
        'department_id' => $request->department_id,
    ]);

    \Log::info('Staff member created successfully');

    // return redirect()->route('admin.dashboard')->with('success', 'Staff member added successfully!');
 return redirect()->route('admin.dashboard')->with('success', 'Staff member added successfully!');

}



}
