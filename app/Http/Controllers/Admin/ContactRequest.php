<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\ContactRequest as ModelsContactRequest;

class ContactRequest extends Controller
{
    public function contactRequest(Request $request)
    {

        $todayData = Carbon::now()->format('Y-m-d');

        $contacts = ModelsContactRequest::when($request->date != null, function($q) use ($request){
                        $q->whereDate('created_at', $request->date);
                    }, function($q) use ($todayData){
                        $q->whereDate('created_at', $todayData);
                    })->get();

        // $contacts = ModelsContactRequest::all();
        return view('admin.Contact.index',compact('contacts'));
    }
}
