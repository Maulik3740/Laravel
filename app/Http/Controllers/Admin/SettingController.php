<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

    function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index', compact('setting'));
    }
    function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'siteColor' => ['nullable', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})|rgb\(\d{1,3},\s*\d{1,3},\s*\d{1,3}\)|\b(?:red|green|blue|yellow|orange|purple|black|white|gray)\b$/'],
            'Map' => ['nullable', 'regex:/^https:\/\/www\.google\.com\/maps\/embed\?pb=!1m18!1m12!1m3!1d[\d.]+!2d[-\d.]+!3d[-\d.]+!2m3!1f[\d.]+!2f[\d.]+!3f[\d.]+!3m2!1i\d+!2i\d+!4f[\d.]+!3m3!1m2!1s[^\/]+!2s[^\/]+!5e[\d]+!3m2!1s[^\/]+!2s[^\/]+!4v\d+!5m2!1s[^\/]+!2s[^\/]+$/'],
            'logo' => ['nullable'], // Update validation rule for logo
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //this is for checking only first row of db
        $setting = Setting::first();
        $logo = null;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/settings/', $filename);
            $logo = "uploads/settings/" . $filename;
        } elseif ($setting && $setting->logo) {
            // If no new logo is uploaded, use the previous logo
            $logo = $setting->logo;
        }

        if ($setting) {
            //update
            $setting->update([
                'website_name' => $request->website_name,
                'website_url' => $request->website_url,
                'page_title' => $request->page_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'address' => $request->address,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'email1' => $request->email1,
                'email2' => $request->email2,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'siteColor' => $request->siteColor,
                'Map' => $request->Map,

                $setting->update(array_merge($request->except('logo'), ['logo' => $logo])),
            ]);

            return redirect()->back()->with('message', 'Updated Successfully');
        } else {
            //create

            Setting::create([

                'website_name' => $request->website_name,
                'website_url' => $request->website_url,
                'page_title' => $request->page_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'address' => $request->address,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'email1' => $request->email1,
                'email2' => $request->email2,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'siteColor' => $request->siteColor,
                'Map' => $request->Map,

                Setting::create(array_merge($request->except('logo'), ['logo' => $logo])),
            ]);



            return redirect()->back()->with('message', 'Added Successfully');
        }
    }
}