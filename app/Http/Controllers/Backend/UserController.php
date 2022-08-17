<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\User;
use App\UserAddress;
use App\Http\Requests\Backend\StoreOrUpdateUserRequest;

class UserController extends Controller
{
    protected $perPage = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()
            ->paginate($this->perPage);
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrUpdateUserRequest $request)
    {
        //vendor image
        $image = $request->file('image');
        $name = Str::random(10).'.'.$image->extension();
        $image->move(public_path().'/images/user_images/', $name);  
        $image=$name;

        $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'image' => $image,
                'activation_code' => "",
                'register_source' => "panel",
                'testing_status' => $request->testing_status,
                'is_active' => $request->is_active,
                'token' => "",
                'last_login' => now(),
            ]);

        $totalAddress = count($request->address);

        for($i=0; $i < $totalAddress; $i++){
            UserAddress::create([
                'user_id' => $user->id,
                'address' => $request->input('address.' . $i),
                'phone' => $request->input('address_phone.' . $i),
                'type'  => $request->input('type.' . $i),
                'lat'   => $request->input('lat.' . $i),
                'lng'   => $request->input('lng.' . $i),
                'loc_name' => $request->input('loc_name.' . $i)
            ]);
        }
       
        return redirect()
            ->route('backend.users.index')
            ->withSuccess('The user has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $userAddresses = UserAddress::where('user_id',$id)->get();

        return view('backend.users.show', compact('user','userAddresses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $userAddresses = UserAddress::where('user_id',$id)->get();

        return view('backend.users.edit', compact('user','userAddresses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrUpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        //vendor image
        $image = $request->hidden_image;
        $user_image = $request->file('image');
        if($user_image !== null){
            $name = Str::random(10).'.'.$user_image->extension();
            $user_image->move(public_path().'/images/user_images/', $name);  
            $image=$name;

            $photo = public_path("images/user_images/").$request->hidden_image;

            if(file_exists($photo)){
                @unlink($photo);
            }
        }

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'image' => $image,
            'activation_code' => "",
            'register_source' => "panel",
            'testing_status' => $request->testing_status,
            'is_active' => $request->is_active,
            'token' => "",
            'last_login' => now(),
        ]);

        $totalAddress = count($request->address);

        for($i=0; $i < $totalAddress; $i++){

            $user_address = UserAddress::find($request->input('id.' . $i));
            if($user_address){
                $user_address->update([
                    'user_id' => $user->id,
                    'address' => $request->input('address.' . $i),
                    'phone' => $request->input('address_phone.' . $i),
                    'type'  => $request->input('type.' . $i),
                    'lat'   => $request->input('lat.' . $i),
                    'lng'   => $request->input('lng.' . $i),
                    'loc_name' => $request->input('loc_name.' . $i)
                ]);
            }else{
                UserAddress::create([
                    'user_id' => $user->id,
                    'address' => $request->input('address.' . $i),
                    'phone' => $request->input('address_phone.' . $i),
                    'type'  => $request->input('type.' . $i),
                    'lat'   => $request->input('lat.' . $i),
                    'lng'   => $request->input('lng.' . $i),
                    'loc_name' => $request->input('loc_name.' . $i)
                ]);
            }
        }
       
        return redirect()
            ->route('backend.users.index')
            ->withSuccess('The user has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $image = public_path("images/user_images/").$user->image;

        if(file_exists($image)){
            @unlink($image);
        }

        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'The user has been removed.'
        ]);
    }

    public function search(Request $request)
    {
        $query = User::query();
        if ($request->filled('keywords')) {
            $query->where('name', 'LIKE', '%' . $request->keywords . '%');
        }
        $users = $query->orderBy('name')
            ->paginate($this->perPage);

        $users->appends(['keywords' => $request->keywords]);

        return view('backend.users.index', compact('users'));
    }

    public function updateActiveStatus($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->update(['is_active' => $request->is_active]);

        return response()->json([
            'status' => 'success',
            'message' => 'The user active status has been updated.'
        ]);
    }
}
