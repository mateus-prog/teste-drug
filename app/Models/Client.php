<?php

namespace App\Models;

class Client extends BaseModel
{
    public $table = 'clients';
	public $fillable = ['name', 'cnpj', 'date_founding', 'group_id'];
	public $searchable = ['name', 'cnpj', 'date_founding', 'group_id'];

    public $timestamps = true;

    public function format()
    {
        return (object) [
            "id" => $this->id,
            "name" => $this->name,
            "cnpj" => $this->cnpj,
            "date_founding" => $this->date_founding,
            "group_id" => $this->group_id
        ];
    }
}
