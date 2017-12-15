<?php

namespace App\Models;

class Category extends AbstractModel
{
    /**
     * get for menu
     * @return Array
     */
    public function getForMenu()
    {
        $categories = $this->select('id', 'name', 'slug')
            ->where('parent_id', 0)
            ->get()
            ->toArray();
        for ($i = 0; $i < count($categories); $i++) {
            $categories[$i]['sub'] = $this->select('name', 'slug')->where('parent_id', $categories[$i]['id'])->get()->toArray();
        }
        return $categories;
    }

    /**
     * get all
     * @return Array
     */
    public function getALl()
    {
        return $this->select('id', 'parent_id', 'name')->get();
    }

    /**
     * get sub category
     * @param  integer $categoryId
     * @return array
     */
    public function getSub($categoryId)
    {
        return $this->select('id', 'slug', 'name')->where('parent_id', $categoryId)->get()->toArray();
    }

    /**
     * get by post
     * @param  integer $categoryId
     * @return array
     */
    public function getById($categoryId)
    {
        return $this->select('parent_id', 'slug', 'name')->where('id', $categoryId)->first();
    }
}
