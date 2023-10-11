<?php

namespace App\Policies;

use App\Models\post_cours;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class postCoursPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\post_cours  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, post_cours $post)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create()
    {
        //
        return $user->id === $post->user_id||$user->is_admin;
    }
     /**
     * Determine whether the user can create models.
     * @param  \App\Models\User  $user
     * @param  \App\Models\post_cours  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function edit()
    {
       
        return $user->id === $post->user_id||$user->is_admin;
       
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\post_cours  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, post_cours $post)
    {
        //
        return $user->id === $post->user_id||$user->role_id=1;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\post_cours  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, post_cours $post)
    {
        //
        return $user->id === $post->user_id||$user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\post_cours  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, post_cours $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\post_cours  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, post_cours $post)
    {
        //
    }
}
