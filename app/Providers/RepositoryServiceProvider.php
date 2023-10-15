<?php

namespace App\Providers;

use App\Repositories\Auth\Login\LoginRepository;
use App\Repositories\Auth\Login\LoginRepositoryInterface;
use App\Repositories\Auth\Logout\LogoutRepository;
use App\Repositories\Auth\Logout\LogoutRepositoryInterface;
use App\Repositories\Auth\Register\RegisterRepository;
use App\Repositories\Auth\Register\RegisterRepositoryInterface;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Cart\CartRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Media\MediaRepository;
use App\Repositories\Media\MediaRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LoginRepositoryInterface::class, LoginRepository::class);
        $this->app->bind(LogoutRepositoryInterface::class, LogoutRepository::class);
        $this->app->bind(RegisterRepositoryInterface::class, RegisterRepository::class);
        $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(MediaRepositoryInterface::class, MediaRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

}
