<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }
    public function create()
    {
        return view('admin.slider.create');
    }
    public function store(SliderRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
           $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/sliders/', $filename);
                $validatedData['image'] = "uploads/sliders/$filename";
            }

            if ($request->hasFile('icon')) {
           $file = $request->file('icon');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/sliders/', $filename);
                $validatedData['icon'] = "uploads/sliders/$filename";
            }

            $validatedData['status'] = $request->status == true ? '1' : '0';

            Slider::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'image' => $validatedData['image'] ?? null,
                'icon' => $validatedData['icon'] ?? null,
                'status' => $validatedData['status'],
            ]);

        return redirect('admin/sliders')->with('message','Added Successfully');
    }

    function edit(Slider $slider)
    {
        // return $slider;
        return view('admin.slider.edit',compact('slider'));
    }
    function update(SliderRequest $request,Slider $slider)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {


            $destination = $slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

           $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/sliders/', $filename);
                $validatedData['image'] = "uploads/sliders/$filename";

        }

        if ($request->hasFile('icon')) {


            $destination = $slider->icon;
            if(File::exists($destination)){
                File::delete($destination);
            }

           $file = $request->file('icon');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/sliders/', $filename);
                $validatedData['icon'] = "uploads/sliders/$filename";

        }
            $validatedData['status'] = $request->status == true ? '1' : '0';

            Slider::where('id',$slider->id)->update([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'image' => $validatedData['image'] ?? $slider->image,
                'icon' => $validatedData['icon'] ?? $slider->icon,
                'status' => $validatedData['status'],
            ]);

        return redirect('admin/sliders')->with('message','Updated Successfully');
   }

   public function destroy(Slider $slider)
    {
        // return $slider;

        if($slider->count() > 0){

            $destination = $slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $slider->delete();
            return redirect('admin/sliders')->with('message','Slider Deleted');
        }
        return redirect('admin/sliders')->with('message','Error in Deleting');
    }
}
