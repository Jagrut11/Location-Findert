<?php

namespace App\Models\Branchcompany;

use App\Models\BaseModel;


class Branchcompany extends BaseModel
{

    protected $table = 'branchcompanies';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
