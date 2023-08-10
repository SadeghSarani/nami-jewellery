<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAddressRequest;
use App\Repository\AddressRepository;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    private AddressRepository $addressRepository;

    public function __construct()
    {
        $this->addressRepository = app()->make(AddressRepository::class);
    }

    public function addAddressUser(CreateAddressRequest $request)
    {
        $user = checkUserLogin();

        $data = [
            'user_id' => $user->id,
            'address' => $request->input('address'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
        ];

        $this->addressRepository->create($data);

        return redirect()->route('userEditProfilePage')->with('user', checkUserLogin());
    }
}
