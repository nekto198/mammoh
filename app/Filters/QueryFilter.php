<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QueryFilter
{
    public $request;
    protected $builder;
    protected $delimiter = ',';

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filters()
    {
        return $this->request->query();
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;
        foreach ($this->filters() as $id => $value) {
            if(!is_numeric($id)){
                if (method_exists($this, $id)) {
                    call_user_func_array([$this, $id], array_filter([$value]));
                }
            }else{
                $arrayForFilter = [
                    'id'=>$id,
                    'value'=>$value
                ];
                if (method_exists($this, 'filterByNumerical')) {
                    call_user_func_array([$this, 'filterByNumerical'], array($arrayForFilter));
                }
            }

        }

        return $this->builder;
    }

    protected function paramToArray($param)
    {
        return explode($this->delimiter, $param);
    }
}
