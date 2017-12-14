<?php

namespace App\Models;

class Post extends AbstractModel
{
    /**
     * defined fillable
     */
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'content',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'is_hot',
        'is_high',
        'is_right',
        'created_by',
        'updated_by',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * defined type
     */
    const TYPE_POST   = 1;
    const TYPE_SLIDER = 2;
    const TYPE_RIGHT  = 3;

    /**
     * define is hot
     */
    const IS_HOT     = 1;
    const IS_NOT_HOT = 0;

    /**
     * define is high
     */
    const IS_HIGH     = 1;
    const IS_NOT_HIGH = 0;

    /**
     * get for slider
     * @return Array
     */
    public function getForSlider($limit = 6)
    {
        return $this
            ->select('id', 'slug', 'title', 'description', 'image')
            ->where([
                'type' => static::TYPE_SLIDER,
            ])
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get()
            ->toArray();
    }

    /**
     * get for datatable
     * @return [type] [description]
     */
    public function getForDataTable()
    {
        return $this->join('categories', 'posts.category_id', '=', 'categories.id')
            ->leftJoin('admins', 'posts.created_by', '=', 'admins.id')
            ->select(
                'posts.id', 'posts.title', 'posts.image', 'posts.created_at', 'admins.name as creator_name', 'categories.name as category_name', 'posts.deleted_at'
            );
    }
}
