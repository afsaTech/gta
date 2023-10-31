<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    public function index($status)
    {
        $packages = Package::latest()->where('status', $status)->paginate(5);

        return view('admin.packages.index', compact(['packages', 'status']));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $isEdit = false;

        $categories = Category::all();

        return view('admin.packages.create-edit', compact(['categories', 'isEdit']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //  dd($request);

        $request->validate([
            'title' => 'required|unique|min:30|max:100',
            'category' => 'required |numeric',
            'description' => 'required|min:150',
            'size' => 'required |numeric',
            'days' => 'required',
            'nights' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'regular_price' => 'required',
            'region' => 'required',
            'destination' => 'required',
            'date' => 'required',
            'discount',
            'sales_price',
            'keywords',
            'popular'
        ]);

        // Retrieve the selected type_id from the form input
        $categoryId = $request->input('category');

        $package = new Package();

        $package->title = $request->title;
        $package->description = $request->description;
        $package->size = $request->size;
        $package->days = $request->days;
        $package->nights = $request->nights;
        $package->regular_price = $request->regular_price;
        $package->region = $request->region;
        $package->destination = $request->destination;
        $package->date = $request->date;

        if ($request->hasFile('image')) {

            // Get the uploaded file
            $image = $request->file('image');

            // Generate a unique name for the image using the current date and time
            $imageName = date('YmdHis') . '.' . $image->getClientOriginalExtension();

            // Store the image in the specified folder
            $package->image = $image->storeAs('package/images', $imageName, 'public');
        }

        $package->category_id = $categoryId;
        $package->discount = $request->discount;
        $package->sales_price = $request->sales_price;
        $package->keyword = $request->keyword;
        $package->is_popular = $request->popular;
        $request->has('pending') ? $package->status = 'pending' : $package->status = 'active';
        $package->save();

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {
                // Generate a unique name for the image using the current date and time
                $image_name = date('YmdHis') . '.' . $image->getClientOriginalName();

                // Store the image in the specified folder
                $url = $image->storeAs('package/gallery', $image_name, 'public');

                $images = new Image([
                    'url' => $url,
                    'package_id' => $package->id
                ]);

                $package->images()->save($images);
            }
        }

        $package->save();

        return redirect(url('admin/packages/' . $package->status));
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $package = Package::find($id);

        $categories = Category::all();

        $isEdit = true;

        return view('admin.packages.create-edit', compact(['package', 'isEdit']))->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        //  dd($request->all());

        // Retrieve the selected type_id from the form input
        $request->validate([
            'title' => 'required|unique|min:30|max:100',
            'category' => 'required |numeric',
            'description' => 'required|min:150',
            'size' => 'required |numeric',
            'days' => 'required',
            'nights' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'regular_price' => 'required',
            'region' => 'required',
            'destination' => 'required',
            'date' => 'required',
            'discount',
            'sales_price',
            'keywords'
        ]);

        // Retrieve the selected type_id from the form input
        $categoryId = $request->input('category');

        $package = Package::find($id);

        $package->title = $request->title;
        $package->description = $request->description;
        $package->size = $request->size;
        $package->days = $request->days;
        $package->nights = $request->nights;
        $package->regular_price = $request->regular_price;
        $package->region = $request->region;
        $package->destination = $request->destination;
        $package->date = $request->date;

        if ($request->hasFile('image')) {

            // Get the uploaded file
            $image = $request->file('image');

            // Generate a unique name for the image using the current date and time
            $imageName = date('YmdHis') . '.' . $image->getClientOriginalExtension();

            // Store the image in the specified folder
            $package->image = $image->storeAs('package/images', $imageName, 'public');
        }

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {
                // Generate a unique name for the image using the current date and time
                $image_name = date('YmdHis') . '.' . $image->getClientOriginalName();

                // Store the image in the specified folder
                $url = $image->storeAs('package/gallery', $image_name, 'public');

                $images = new Image([
                    'url' => $url,
                    'package_id' => $package->id
                ]);

                $package->images()->save($images);
            }
        }

        $package->category_id = $categoryId;
        $package->discount = $request->discount;
        $package->sales_price = $request->sales_price;
        $package->keyword = $request->keyword;
        $request->has('popular') ? $package->is_popular = $request->popular : $package->is_popular = '';

        $request->has('pending') ? $package->status = 'pending' : $package->status = 'active';

        $package->update();

        return redirect(url('admin/packages/' . $package->status));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $package = Package::find($id);

        $package->delete();

        return redirect(url('admin/packages/active'));
    }
}