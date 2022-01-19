<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class Usertransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'identifier' => (int)$user->id,
            'name' => (string)$user->name,
            'Username' => (string)$user->Username,
            'email' => (string)$user->email,
            'is_admin' => (TINYINT)$user->is_admin,
            'password' => (string)$user->password,
        ];
    }
}

