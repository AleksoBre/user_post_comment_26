<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Post
        Gate::define('edit-post', function(User $user, Post $post) {
            return $post->user->is($user);
        });
        Gate::define('delete-post', function(User $user, Post $post) {
            return $post->user->is($user);
        });

        //Comment
        Gate::define('edit-comment', function(User $user, Comment $comment) {
            return $comment->user->is($user);
        });
        Gate::define('delete-comment', function(User $user, Comment $comment) {
            return $comment->user->is($user);
        });

        //User
        Gate::define('edit-user', function(User $authenticatedUser, User $profileUser) {
            return $authenticatedUser->is($profileUser);
        });
        Gate::define('delete-user', function(User $authenticatedUser, User $profileUser) {
            return $authenticatedUser->is($profileUser);
        });
        
    }
}
