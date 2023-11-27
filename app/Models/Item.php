<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function functions()
    {
        return $this->hasMany(Function::class);
    }
    public function components()
    {
        return $this->hasMany(Component::class);
    }
    public function data()
    {
        return $this->hasMany(Data::class);
    }
    public function channel()
    {
        return $this->hasMany(Channel::class);
    }
    public function data_flow()
    {
        return $this->hasMany(Dataflow::class);
    }

}
