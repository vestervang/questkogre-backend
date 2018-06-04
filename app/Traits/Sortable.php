<?php
/**
 * Created by PhpStorm.
 * User: frederikthomsen
 * Date: 6/4/18
 * Time: 8:50 PM
 */

namespace App\Traits;

trait Sortable
{
    /**
     * @param       $query
     * @param array $args
     *
     * @return mixed
     * @throws \Exception
     */
    public function scopeFilter($query, array $args)
    {

        $orderColumn = isset($args['order_by']) ? $args['order_by'] : 'id';
        $orderDir    = isset($args['order_dir']) ? $args['order_dir'] : 'DESC';

        if (!in_array($orderColumn, $this->sortable)) {
            throw new \Exception('You can\'t order on column ' . $orderColumn);
        }

        return $query->orderBy($orderColumn, $orderDir)
                     ->get();
    }
}
