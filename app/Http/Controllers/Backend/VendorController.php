<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Vendor;
use App\Http\Requests\Backend\StoreOrUpdateVendorRequest;

class VendorController extends Controller
{
    protected $perPage = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::latest()
                ->paginate($this->perPage);

        return view('backend.vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrUpdateVendorRequest $request)
    {
        //attached files
        $attached_files = $request->file('attached_files');
        $images = array();

        foreach($attached_files as $file){
            $name = Str::random(10).'.'.$file->extension();
            $file->move(public_path().'/images/attached_files/', $name);  
            $images[]=$name;
        }

        //vendor image
        $image = $request->file('image');
        $name = Str::random(10).'.'.$image->extension();
        $image->move(public_path().'/images/vendor_images/', $name);  
        $image=$name;
      
        Vendor::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $image,
            'join_date' => $request->join_date,
            'permanent_date' => $request->permanent_date,
            'attached_files' => json_encode($images),
            'is_active' => $request->is_active,
        ]);

        return redirect()
            ->route('backend.vendors.index')
            ->withSuccess('The vendor has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor = Vendor::findOrFail($id);

        return view('backend.vendors.show', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);

        return view('backend.vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrUpdateVendorRequest $request, $id)
    {
        $vendor = Vendor::findOrFail($id);

        //vendor image
        $image = $request->hidden_image;
        $vendor_image = $request->file('image');
        if($vendor_image !== null){
            $name = Str::random(10).'.'.$vendor_image->extension();
            $vendor_image->move(public_path().'/images/vendor_images/', $name);  
            $image=$name;

            $photo = public_path("images/vendor_images/").$request->hidden_image;

            if(file_exists($photo)){
                @unlink($photo);
            }
        }
        
        //attached files
        $hidden_attached_files = $request->hidden_attached_files;
        $attached_files = $request->file('attached_files');
        if($request->attached_files[0] !== null){
            $images = array();

            foreach($attached_files as $file){
                $name = Str::random(10).'.'.$file->extension();
                $file->move(public_path().'/images/attached_files/', $name);  
                $images[]=$name;
            }

            $hidden_attached_files = json_decode($hidden_attached_files); 

            foreach($hidden_attached_files as $hidden_attached_file){
                $photo = public_path("images/attached_files/").$hidden_attached_file;

                if(file_exists($photo)){
                    @unlink($photo);
                }
            }

            $vendor->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => $image,
                'join_date' => $request->join_date,
                'permanent_date' => $request->permanent_date,
                'attached_files' => json_encode($images),
                'is_active' => $request->is_active
            ]);
        }else{
            $vendor->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => $image,
                'join_date' => $request->join_date,
                'permanent_date' => $request->permanent_date,
                //'attached_file' => json_encode($images),
                'is_active' => $request->is_active
            ]);
        }

        return redirect()
            ->route('backend.vendors.index')
            ->withSuccess('The vendor has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = Vendor::findOrFail($id);

        $image = public_path("images/vendor_images/").$vendor->image;

        if(file_exists($image)){
            @unlink($image);
        }

        $hidden_attached_files = json_decode($vendor->attached_files); 

        foreach($hidden_attached_files as $hidden_attached_file){
            $photo = public_path("images/attached_files/").$hidden_attached_file;

            if(file_exists($photo)){
                @unlink($photo);
            }
        }

        $vendor->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'The vendor has been removed.'
        ]);
    }

    public function updateActiveStatus($id, Request $request)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->update(['is_active' => $request->is_active]);

        return response()->json([
            'status' => 'success',
            'message' => 'The vendor active status has been updated.'
        ]);
    }

    public function search(Request $request)
    {
        $query = Vendor::query();
        if ($request->filled('keywords')) {
            $query->where('name', 'LIKE', '%' . $request->keywords . '%');
        }
        $vendors = $query->orderBy('name')
            ->paginate($this->perPage);

        $vendors->appends(['keywords' => $request->keywords]);

        return view('backend.vendors.index', compact('vendors'));
    }

}
