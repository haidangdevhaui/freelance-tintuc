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

    /**
     * get for right content
     * @return Array
     */
    public function getForRightContent($limit = 6)
    {
        return $this
            ->select('slug', 'title', 'image')
            ->where(['is_right' => static::IS_HIGH])
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get()
            ->toArray();
    }

    /**
     * get high
     * @return Array
     */
    public function getHot($limit = 6)
    {
        return $this
            ->select('slug', 'title', 'image')
            ->where(['is_hot' => static::IS_HIGH])
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get()
            ->toArray();
    }

    /**
     * get content index
     * @return Array
     */
    public function getContent()
    {
        $categories = Category::select('id', 'name', 'slug')
            ->where('parent_id', 0)
            ->where('in_home', 1)
            ->get()
            ->toArray();
        for ($i = 0; $i < count($categories); $i++) {
            $categories[$i]['sub'] = Category::select('id', 'name', 'slug')
                ->where('parent_id', $categories[$i]['id'])
                ->get()
                ->toArray();
            $categoryId = [$categories[$i]['id']];
            foreach ($categories[$i]['sub'] as $sub) {
                $categoryId[] = $sub['id'];
            }
            $categories[$i]['posts'] = $this
                ->select('id', 'title', 'slug', 'image', 'description')
                ->whereIn('category_id', $categoryId)
                ->where('is_hot', static::IS_HOT)
                ->orderBy('id', 'desc')
                ->limit(5)
                ->get()
                ->toArray();
        }
        return $categories;
    }

    /**
     * get post by category
     * @param  integer $categoryId
     * @return array
     */
    public function getPostByCategory($categoryId)
    {
        $category        = Category::select('id', 'parent_id')->first();
        $categoryIdArray = [$categoryId];
        if (!$category->parent_id) {
            $categoryIdArray = array_merge($categoryIdArray, Category::select('id')->where('parent_id', $categoryId)->get()->pluck('id')->toArray());
        }
        return $this
            ->select('title', 'slug', 'description', 'image', 'created_at')
            ->whereIn('category_id', $categoryIdArray)
            ->orderBy('id', 'desc')
            ->paginate(12);
    }

    /**
     * get post by category
     * @param  integer $categoryId
     * @return array
     */
    public function getPostForSideBar($categoryId = null)
    {
        $newest = $this->select('title', 'slug', 'image');
        $views  = clone $newest;

        if ($categoryId) {
            $category        = Category::select('id', 'parent_id')->first();
            $categoryIdArray = [$categoryId];
            if (!$category->parent_id) {
                $categoryIdArray = array_merge($categoryIdArray, Category::select('id')->where('parent_id', $categoryId)->get()->pluck('id')->toArray());
            }
            $newest->whereIn('category_id', $categoryIdArray);
            $views->whereIn('category_id', $categoryIdArray);
        }
        return [
            'newest' => $newest->orderBy('id', 'desc')->limit(5)->get()->toArray(),
            'views'  => $views->orderBy('views', 'desc')->limit(5)->get()->toArray(),
        ];
    }

    /**
     * get high
     * @param  integer $categoryId
     * @return array
     */
    public function getHigh($categoryId = null)
    {
        $category        = Category::select('id', 'parent_id')->first();
        $categoryIdArray = [$categoryId];
        if (!$category->parent_id) {
            $categoryIdArray = array_merge($categoryIdArray, Category::select('id')->where('parent_id', $categoryId)->get()->pluck('id')->toArray());
        }

        return $this
            ->select('slug', 'title', 'image')
            ->where(['is_high' => static::IS_HIGH])
            ->whereIn('category_id', $categoryIdArray)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get()
            ->toArray();
    }
}
