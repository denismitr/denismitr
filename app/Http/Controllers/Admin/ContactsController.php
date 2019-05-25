<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::active()->latest()->paginate(20);

        return view('admin.contacts.index', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * @param Contact $contact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * @param Contact $contact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirm(Contact $contact)
    {
        return view('admin.contacts.confirm', compact('contact'));
    }

    /**
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted.');
    }

    /**
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function archive(Contact $contact)
    {
        $contact->markAsArchived();

        return back()->with('success', 'Contact archived.');
    }

    /**
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function spam(Contact $contact)
    {
        $contact->markAsSpam();

        return back()->with('success', 'Contact marked as spam.');
    }
}
