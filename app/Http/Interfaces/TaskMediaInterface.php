<?php

namespace App\Http\Interfaces;

interface TaskMediaInterface
{
    public function getMedia();

    public function storeMedia();

    public function editMedia();

    public function deleteMedia();
}
