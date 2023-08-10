<?php

namespace App\Repository;

use App\Models\CustomField;

class CustomFieldsRepository
{
    private CustomField $customField;

    public function __construct()
    {
        $this->customField = app(CustomField::class);
    }

    public function create($data, $rel_id)
    {
        $data['rel_id'] = $rel_id;

        $this->customField->query()->create($data);
    }
    public function delete($productId)
    {
        $this->customField->query()->where('rel_id', $productId)->delete();
    }

    public function remove($id)
    {
        $this->customField->query()->where('id', $id)->delete();
    }
}
