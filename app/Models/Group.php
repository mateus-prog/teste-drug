<?php

namespace App\Models;

class Group extends BaseModel
{
    public $table = 'groups';
	public $fillable = ['name'];
	public $searchable = ['name'];

    public $timestamps = true;

    public function format()
    {
        return (object) [
            "id" => $this->id,
            "name" => $this->name,
        ];
    }
}
