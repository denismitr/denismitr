<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateBusinessDetailsRequest;
use App\Models\Business;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class BusinessDetailsController extends Controller
{
    /**
     * @var Business
     */
    protected $business;

    /**
     * BusinessDetailsController constructor.
     */
    public function __construct()
    {
        $this->business = Business::firstOrFail();
    }

    /**
     * @param UpdateBusinessDetailsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBusinessDetailsRequest $request)
    {
        Cache::forget('business');

        $this->business->update([
            'first_name_en' => $request->first_name_en,
            'last_name_en' => $request->last_name_en,
            'first_name_ru' => $request->first_name_ru,
            'last_name_ru' => $request->last_name_ru,
            'about_en' => $request->about_en,
            'about_ru' => $request->about_ru,
            'email' => $request->email,
        ]);

        session()->flash('business.updated.success', 'Business details updated!');

        return back();
    }
}
