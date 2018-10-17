<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateSecurityRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecurityController extends Controller
{
    public function edit(Request $request)
    {
        /** @var User $user */
        $user = $request->user();

        $authGroups = $user->authGroups;

        return view('admin.security', [
            'user' => $user,
            'groups' => $authGroups
        ]);
    }

    public function update(UpdateSecurityRequest $request)
    {
        /** @var User $user */
        $user = $request->user();

        $message = 'Security details updated!';

        if ($request->hasNewPassword()) {
            $user->setNewPassword($request->new_password);
            $message = 'Security details updated - password changed!';
        }

        $user->update([
            'email' => $request->email,
        ]);

        session()->flash('security.updated.success', $message);

        return back();
    }
}
