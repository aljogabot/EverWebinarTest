<?php

namespace Company\Repositories;

use Contact;

class ContactRepository extends EloquentRepository
{
    protected $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    public function getByEmail($email)
    {
        $userObject = $this->model->where('email', '=', $email)
                            ->first();

        if ($userObject) {
            $this->model = $userObject;
        }

        return $userObject;
    }

    public function getAllBySearch($text, $user_id)
    {
        return $this->model->where( 'user_id', '=', $user_id )
                        ->where(
                            function( $query ) use( $text ) {
                                $query
                                ->orWhere('first_name', 'LIKE', "%$text%")
                                ->orWhere('last_name', 'LIKE', "%$text%")
                                ->orWhere('phone', 'LIKE', "%$text%")
                                ->orWhere('email', 'LIKE', "%$text%");
                            }
                        )
                        ->get();
    }
}
