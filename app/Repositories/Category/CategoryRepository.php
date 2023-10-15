<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CategoryRepository implements CategoryRepositoryInterface
{
   public function getAllCategory()
   {
       return Category::with('parent', 'children')->get();
   }

   public function getParentAll($id)
   {
       return Category::find($id)->load('parent');
   }

    public function getChildrenAll($id)
    {
        return Category::find()->load('children');
   }

   public function createCategory($request)
   {
       return Category::create([
           'name'      => $request->name,
           'user_id'   => Auth::user()->id,
           'parent_id' => $request->parent_id,
       ])->load('parent');
   }

   public function updateCategory($category, $request)
   {
       $category->update([
           'name'      => $request->name,
           'user_id'   => Auth::user()->id,
           'parent_id' => $request->parent_id,
       ]);
   }

   public function deletedCategory($category)
   {
       $category->delete();
   }

    public function getCategoryById($id)
    {
      return Category::find($id);
    }

    public function getUserIdCategory($id)
    {
        return User::find($id);
    }
}
