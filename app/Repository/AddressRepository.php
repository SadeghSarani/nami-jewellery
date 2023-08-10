<?php

namespace App\Repository;

use App\Models\Address;

class AddressRepository
{
    private Address $address;

    public function __construct()
    {
        $this->address = app()->make(Address::class);
    }

    public function create($data)
    {
        return $this->address->query()->create($data);
    }
}
