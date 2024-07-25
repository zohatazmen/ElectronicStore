<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRegistrationController extends Controller
{
    /**
     * Show the form for adding a new admin.
     */
    public function registerAdmin()
    {
        $url = url('/admin/register');

        return view('backend.add-new-user', compact('url'));
    }

    /**
     * Store a newly created admin record in storage.
     */
    public function submitAdminRecord(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:auth_users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'contact' => 'required',
        ]);

        $admin = new AuthUser();
        $admin->first_name = $request->input('first_name');
        $admin->last_name = $request->input('last_name');
        $admin->email = $request->input('email');
        $admin->password = bcrypt($request->input('password')); // Ensure to hash the password
        $admin->contact = $request->input('contact');
        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Admin added successfully');
    }

    /**
     * Display a listing of the admins.
     */
    public function showAdminRecord()
    {
        $admins = AuthUser::all();

        return view('backend.all-user', compact('admins'));
    }

    /**
     * Show the form for editing the specified admin.
     */
    public function editAdminRecord($id)
    {
        $admin = AuthUser::find($id);
        if ($admin) {
            $url = url('/admin/update').'/'.$id;

            return view('backend.add-new-user', compact('admin', 'url'));
        }

        return redirect()->route('admin.index')->with('error', 'Admin not found');
    }

    /**
     * Update the specified admin in storage.
     */
    public function updateAdminRecord(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:auth_users,email,'.$id,
            'contact' => 'required',
            'password' => 'nullable|min:6',
            'password_confirmation' => 'nullable|same:password',
        ]);

        $admin = AuthUser::find($id);
        if ($admin) {
            $admin->first_name = $request->input('first_name');
            $admin->last_name = $request->input('last_name');
            $admin->email = $request->input('email');
            $admin->contact = $request->input('contact');

            // Update password if provided
            if ($request->filled('password')) {
                $admin->password = bcrypt($request->input('password'));
            }

            $admin->save();

            return redirect()->route('admin.index')->with('success', 'Admin updated successfully');
        }

        return redirect()->route('admin.index')->with('error', 'Admin not found');
    }

    /**
     * Remove the specified admin from storage.
     */
    public function deleteAdminRecord($id)
    {
        $admin = AuthUser::find($id);
        if ($admin) {
            $admin->delete();

            return redirect()->route('admin.index')->with('success', 'Admin deleted successfully');
        }

        return redirect()->route('admin.index')->with('error', 'Admin not found');
    }
}
