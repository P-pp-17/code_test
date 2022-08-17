<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserAddress;
use App\User;

class UserAddressController extends Controller
{
    public function destroy($id)
    {
        $userAddress = UserAddress::findOrFail($id);

        $userAddress->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'The user address has been removed.'
        ]);
    }
}
