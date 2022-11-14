<?php

namespace Core;

class BaseValidator
{
    protected $_validationErrors = [];
    protected $_validates=true;


    public function runValidation($validator)
    {
        $key = $validator->field;
        if (!$validator->success) {
            $this->_validates = false;
            $this->_validationErrors[$key] = $validator->msg;
        }
    }

    public function getErrorMessages()
    {
        return $this->_validationErrors;
    }

    public function validationPassed()
    {
        return $this->_validates;
    }


    public function addErrorMessage($field, $msg)
    {
        $this->_validates = false;
        $this->_validationErrors[$field] = $msg;
    }

    public function validator()
    {
    }
}
