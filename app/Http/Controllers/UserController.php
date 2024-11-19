<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;


class UserController extends Controller
{
    public function edit($id)
{
    $user = User::findOrFail($id); // Fetch the user by ID
    $departments = Department::all(); // Fetch all departments for dropdown
    return view('users.edit', compact('user', 'departments'));
}
public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete(); // Delete the user
    return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully');
}
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Validate and update user data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'department_id' => 'required|exists:departments,id',
    ]);

    $user->update($request->only('name', 'email', 'department_id'));

    return redirect()->route('admin.dashboard')->with('success', 'User updated successfully');
}


}
