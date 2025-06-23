<?php
namespace App\Services;

use App\Models\Center;

class CenterService
{
    public function getAll()
    {
        return Center::all();
    }

    public function create(array $data)
    {
        return Center::create($data);
    }

    public function update(Center $center, array $data)
    {
        return $center->update($data);
    }

    public function delete(Center $center)
    {
        return $center->delete();
    }
}

