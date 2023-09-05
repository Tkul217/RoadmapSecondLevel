<?php

namespace App\Http\Abstracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class FilterGenerator
{
    protected Builder $builder;

    protected Request $request;

    protected array $filters = [];

    public function __construct(
        Builder $builder,
        Request $request,
    )
    {
        $this->builder = $builder;
        $this->request = $request;
        $this->filters = $request->keys();
    }

    public function apply(): Builder
    {
        foreach ($this->filters as $filter) {
            if (method_exists($this, $filter) && $this->getRequest()->has($filter)) {
                $this->$filter($this->request->$filter);
            }
        }

        return $this->getBuilder();
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return Builder
     */
    public function getBuilder(): Builder
    {
        return $this->builder;
    }
}
