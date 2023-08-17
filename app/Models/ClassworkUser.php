<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ClassworkUser extends Pivot
{
    use HasFactory;


    public function setUpdatedAt($value)
    {
        // $this->{$this->getUpdatedAtColumn()} = $value;
        return $this;
    }
    public function setCreatedAt($value)
    {
        // $this->{$this->getCratedAtColumn()} = $value;
        return $this;
    }

    public function getUpdatedAtColumn()
    {
    }
}
