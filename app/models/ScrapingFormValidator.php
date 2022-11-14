<?php

namespace App\Models;

use Core\Validators\AbstractFormValidator;
use Core\Validators\RequiredValidator;

class ScrapingFormValidator extends AbstractFormValidator
{
    public $category;

    public function validator()
    {
        $this->runValidation(new RequiredValidator($this, ['field' => 'category', 'msg' => "category is required"]));
    }
}
