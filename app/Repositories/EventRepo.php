<?php

namespace App\Repositories;

use App\Models\Event;

class EventRepo
{

    public function create($data)
    {
        return Event::create($data);
    }
    public function getAll()
    {
        return Event::all();
    }

    public function update($id, $data)
    {
        return Event::find($id)->update($data);
    }

    public function delete($id)
    {
        return Event::destroy($id);
    }

}
