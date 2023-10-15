<?php

namespace App\Services;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CategoryService
{

    private object $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = app()->make(CategoryRepositoryInterface::class);
    }

    public function create($request)
    {
        return $this->categoryRepository->createCategory();
    }

    public function update($category,$request)
    {
        if (Auth::user()->id == $category->user_id){
        return $this->categoryRepository->updateCategory($category,$request);
        }
        return response([
            'massage' => 'شما نمیتونید این دسته بندی را بروزرسانی کنید!',
            'status'  => 'error',
        ]);
    }

    public function destroy($category)
    {
        if (Auth::user()->id == $category->user_id) {
        if ($category->children->isEmpty() && $category->products->isEmpty()) {
            $this->categoryRepository->deleteCategory();
            return response([
                'massage' => 'دسته بندی با موفقیت پاک شد',
                'status'  => 'success' ]);
        } else {
            return response([
                'massage' => 'این دسته بندی دارای زیردسته و محصول است',
                'status'  => 'error',
            ]);
        }
        }
            return response([
                'massage' => 'شما اجازه حذف این دسته بندی را ندارید!',
                'status'  => 'error',
            ]);
    }
}
