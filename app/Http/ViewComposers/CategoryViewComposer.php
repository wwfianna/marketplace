<?php


namespace App\Http\ViewComposers;


use App\Category;

class CategoryViewComposer
{
    private $category;

    public function __construct(Category $category)
    {

        $this->category = $category;

    }

    public function compose ($view)
    {

        return $view->with('list_categories', $this->category->all(['name', 'slug']));

    }
}
