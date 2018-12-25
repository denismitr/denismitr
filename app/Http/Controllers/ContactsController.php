<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function store(CreateContactRequest $request)
    {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->body,
            'sent' => false,
        ]);

        return response()->json(['message' => 'success'], 201);
    }
}
