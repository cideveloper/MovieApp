<?php namespace MovieApp\Forms;

use Laracasts\Validation\FormValidator;

class PostForm extends FormValidator {

    /**
     * Validation rules for the post form.
     *
     * @var array
     */
    protected $rules = [
        'post' => 'required'
    ];

}