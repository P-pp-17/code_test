<?php

namespace App\Http\Controllers\Backend;

use App\Role;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\StoreOrUpdateAdminRequest;

class AdminController extends Controller
{
    protected $perPage = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::admin()
            ->latest()
            ->paginate($this->perPage);

        return view('backend.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('id','!=', 1)
            ->orderBy('name')
            ->pluck('name', 'id');

        return view('backend.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrUpdateAdminRequest $request)
    {
        Admin::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => $request->is_active
        ]);

        return redirect()
            ->route('backend.admins.index')
            ->withSuccess('The admin has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::with('role')->findOrFail($id);

        return view('backend.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::orderBy('name')->where('id','!=', 1)->pluck('name', 'id');
        $admin = Admin::findOrFail($id);

        return view('backend.admins.edit', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrUpdateAdminRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $admin->password,
            'is_active' => $request->is_active
        ]);

        return redirect()
            ->route('backend.admins.index')
            ->withSuccess('The admin has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);

        return response()->json([
            'status' => 'success',
            'message' => 'The admin has been removed.'
        ]);
    }

    public function search(Request $request)
    {
        $query = Admin::query();
        if ($request->filled('keywords')) {
            $query->where('name', 'LIKE', '%' . $request->keywords . '%')
                ->orWhere('email', 'LIKE', '%' . $request->keywords . '%');
        }
        $admins = $query->admin()
            ->orderBy('name')
            ->paginate($this->perPage);

        $admins->appends(['keywords' => $request->keywords]);

        return view('backend.admins.index', compact('admins'));
    }

    public function updateActiveStatus($id, Request $request)
    {
        $admin = Admin::findOrFail($id);
        $admin->update(['is_active' => $request->is_active]);

        return response()->json([
            'status' => 'success',
            'message' => 'The admin active status has been updated.'
        ]);
    }
}
