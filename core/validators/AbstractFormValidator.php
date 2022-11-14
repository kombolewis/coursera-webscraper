<?php

namespace Core\Validators;

use Traits\ModelTrait;
use Core\BaseValidator;

abstract class AbstractFormValidator extends BaseValidator
{
    use ModelTrait;

    public function __construct(array $data)
    {
        $this->assign($data);
    }
}
