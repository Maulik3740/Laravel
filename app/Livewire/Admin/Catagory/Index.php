<?php

namespace App\Livewire\Admin\Catagory;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $category_id;

    public function deleteCategory($category_id){
        $this->category_id = $category_id;
    }

    public function destroyCategory($category_id){

        // $category = Category::where('id',$this->$category_id)->First();
        $category = Category::find($category_id);
        $path = '/uploads/category/'.$category->image;

        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();

        return redirect('admin/category')->with('message',' Filled is deleted');
    }
    public function render()
    {
        // $catagories = Category::all();
        $catagories = Category::orderBy('id','DESC')->paginate(6);
        return view('livewire.admin.catagory.index',['categories'=>$catagories]);
    }
}
