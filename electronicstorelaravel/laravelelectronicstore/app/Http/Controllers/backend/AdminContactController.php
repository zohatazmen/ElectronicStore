<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\frontend\ContactModel;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    // Display a list of contacts
    public function index()
    {
        $contacts = ContactModel::all();

        return view('backend.contacts', compact('contacts'));
    }

    // Show a form to create a new contact
    public function create()
    {
        return view('backend.contact-add');
    }

    // Store a new contact
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        ContactModel::create($request->all());

        return redirect()->route('admin.contacts.index')->with('success', 'Contact added successfully.');
    }

    // Show a single contact's details
    public function show($id)
    {
        $contact = ContactModel::findOrFail($id);

        return view('backend.contact-show', compact('contact'));
    }

    // Show a form to edit a contact
    public function edit($id)
    {
        $contact = ContactModel::findOrFail($id);

        return view('backend.contact-edit', compact('contact'));
    }

    // Update a contact
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        $contact = ContactModel::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('admin.contacts.index')->with('success', 'Contact updated successfully.');
    }

    // Delete a contact
    public function destroy($id)
    {
        $contact = ContactModel::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully.');
    }
}