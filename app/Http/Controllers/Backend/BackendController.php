<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ImageUploadRequest;
use App\Admin;
use App\User;
use App\Vendor;

class BackendController extends Controller
{
    public function index()
    {
        $totalAdmins = Admin::where('role_id','!=',1)->count();
        $totalUsers = User::count();
        $totalVendors = Vendor::count();

        return view('backend.index', compact(
            'totalAdmins',
            'totalUsers',
            'totalVendors'
        ));
    }
}
