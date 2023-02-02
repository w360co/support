<?php

namespace W360\Support\Traits;

trait HasFilter
{

    protected function whereFilter(&$query, $keys, $values){
        $query->where(function($q) use ($keys, $values) {
            if(is_array($keys)) {
                foreach ($keys as $k => $v) {
                    if (in_array($v, self::$filterColumns)) {
                        echo $v;
                        echo $values[$k];
                        $q->where($v, 'LIKE', '%' . $values[$k] . '%');
                    }
                }
            }else{
                if (in_array($keys, self::$filterColumns))
                    $q->where($keys, 'LIKE', '%' . $values . '%');
            }
        });
    }

    protected function whereGlobalFilter(&$query, $value){
        $query->where(function($q) use ($value){
            foreach (self::$filterColumns as $k){
                $q->orWhere($k, 'LIKE', '%'.$value.'%');
            }
        });
    }

    protected function sortingFilter(&$query, $key, $sortType){
        if(in_array($key, self::$filterColumns))
            $query->orderBy($key, $sortType ? 'desc' : 'asc');
    }

}
