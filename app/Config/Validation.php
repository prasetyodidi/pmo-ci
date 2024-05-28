<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $register = [
        'username' => [
            'rules' => 'required|min_length[5]|is_unique[users.username]',
        ],
        'password' => [
            'rules' => 'required',
        ],
        'firstname' => [
            'rules' => 'required',
        ],
        'lastname' => [
            'rules' => 'required',
        ],
        'address' => [
            'rules' => 'required',
        ],
        'age' => [
            'rules' => 'required|is_natural',
        ]
    ];

    public $update_user = [
        'username' => [
            'rules' => 'required|min_length[5]|is_unique[users.username,id,{id}]',
        ],
        'password' => [
            'rules' => 'required',
        ],
        'firstname' => [
            'rules' => 'required',
        ],
        'lastname' => [
            'rules' => 'required',
        ],
        'address' => [
            'rules' => 'required',
        ],
        'age' => [
            'rules' => 'required|is_natural',
        ]
    ];
}
