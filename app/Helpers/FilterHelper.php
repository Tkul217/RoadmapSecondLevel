<?php

namespace App\Helpers;

class FilterHelper extends BaseHelper
{
    protected string $type;
    const CLIENT = 'client';
    const PROJECT = 'project';
    const TASK = 'task';
    const USER = 'user';

//    public function __construct(array $data, string $type)
//    {
////        parent::__construct($data);
//        $this->type = $type;
//    }

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function main()
    {
        dd($this->type);
    }
}
