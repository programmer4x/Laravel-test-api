<?php

namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    public function getAllCategory();
    public function getParentAll($id);
    public function getChildrenAll($id);
    public function createCategory($request);
    public function updateCategory($category, $request);
    public function deletedCategory($category);
    public function getCategoryById($id);
    public function getUserIdCategory($id);
}
