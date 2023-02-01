<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::all();

    	return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
    	return view('admin.category.add');
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'name'        =>   ['required', 'string', 'max:255'],
                'slug'         =>  ['required', 'string', 'max:255'],
                'description'  =>  ['required', 'string', 'max:255'],
                'image'        =>  'required|mimes:jpeg,png,jpg,gif',
            ]
        );

        $dataArray = array(
            "name" => $request->name,
            "slug"  => $request->slug,
            "description"  => $request->description,
            "status"   => $request->status
        );

        if ($request->file('image')!=null)
        //if($request->hasFile('image'));
        {
        	$file=$request->file('image');
        	$ext=$file->getClientOriginalExtension();
        	$filename=time().'.'.$ext;
        	$file->move('assets/uploads/category/',$filename);
        	$dataArray["image"]=$filename;
        }

        $dataArray["status"] = $request->input('status') == TRUE ?'1':'0';

        $category = Category::create($dataArray);
        if(!is_null($category))
        {
            return redirect('/categories')->with('status',"Category created successfully");
        }

        else
        {
            return back()->with("error", "Alert! Failed to register");
        }

    }

    public function edit($id)
    {
    	$category = Category::find($id);
    	return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request ,$id)
    {
        
        $category = Category::find($id);

        if($category)
        {
            $request->validate(
                [
                    'name'        =>   ['required', 'string', 'max:255'],
                    'slug'         =>  ['required', 'string', 'max:255'],
                    'description'  =>  ['required', 'string', 'max:255'],
                    'image'        =>  'nullable|mimes:jpeg,png,jpg,gif',
                ]
            );

            $category->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'status' => $request->input('status') == TRUE?'1':'0',

            ]);

            if ($request->file('image')!=null)
            //if($request->hasFile('image'));
            {
                $file=$request->file('image');
                $ext=$file->getClientOriginalExtension();
                $filename=time().'.'.$ext;
                $file->move('assets/uploads/category/',$filename);

                $category->update([
                    'image' => $filename
                ]);

            }


            return redirect('/categories')->with('status',"Category updated successfully");

        }
        else
        {
            return redirect()->back()->with('error', "The link you followed was broken ");
        }


    }

    public function destroy($id)
    {
    	$category = Category::find($id);
    	if($category->image);
        {
        	$path='assets/uploads/category/'.$category->image;
        	if(File::exists($path))
        	{
        	  File::delete($path);
        	}

        }

    	$category->delete();
    	return redirect('/categories')->with('status',"Category deleted successfully");
    }

}
