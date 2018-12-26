<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreateContactRequest;
use App\Models\Contact;
use App\Services\ContactHash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ContactsController extends Controller
{
    /**
     * @param CreateContactRequest $request
     * @param ContactHash $contactHash
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateContactRequest $request, ContactHash $contactHash)
    {
        try {
            Contact::create([
                'ip' => $request->ip(),
                'hash' => $contactHash->fromRequest($request),
                'name' => $request->name,
                'email' => $request->email,
                'body' => $request->body,
                'sent' => false,
            ]);
        } catch (\Throwable $t) {
            Log::error($t->getMessage().' : '.$t->getFile().' : '.$t->getLine());
            return response()->json(['message' => 'Bad request.'], 400);
        }

        return response()->json(['message' => 'success'], 201);
    }
}
