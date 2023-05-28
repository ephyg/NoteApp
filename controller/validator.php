
<?php
class Validator
{
    public $errors = [];


    public function setEmpty()
    {
        unset($this->errors);
        var_dump($this->errors);
    }
    public function getErrors()
    {
        return $this->errors;
    }
    // Email Validation
    public function validateEmail($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "enter valid email";
            return true;
        }
    }
    public function emailExist($value)
    {
        $db = new DBconnection();
        $searchedEmail = $db->SearchEmail($value);
        if (count($searchedEmail) > 0) {
            $this->errors['email'] = 'email exists';
        }
    }
    public function emailNotExist($value)
    {
        $db = new DBconnection();
        $searchedEmail = $db->SearchEmail($value);
        if (count($searchedEmail) <= 0) {
            $this->errors['email'] = 'email not exist';
        }
    }


    // Password Validation
    public function validatePassword($value)
    {
        if (strlen($value) < 6) {
            $this->errors['password'] = 'enter minimum 6 digit password';
            return true;
        }
    }
    // for matching with database
    public function matchPassword($userPassword, $value)
    {
        $db = new DBconnection();
        $items = $db->SearchEmail($value);
        $hashed_password = $items[0]['password'];
        echo $value;

        if (password_verify($userPassword, $hashed_password)) {
            return true;
        } else {
            $this->errors['password'] = "incorrect password";
            return false;
        }
    }
    // for matching with interface
    public function matchAnotherPassword($password, $confirm)
    {
        if ($password == $confirm) {
            return true;
        } else {
            $this->errors['password'] = "password not match";
            return false;
        }
    }
    // userName validation
    public function validateUsername($value)
    {
        if (trim(strlen($value)) < 6) {
            $this->errors['username'] = 'enter atleast 6 alphabets';
        } elseif (trim(strlen($value)) > 50) {
            $this->errors['username'] = 'enter maximum 50 alphabets';
        } else {
            $this->errors['username'] = 'username must contains only alphabets';
        }
    }

    public function validateName($value, $nameType)
    {
        if (trim(strlen($value)) < 3) {
            $this->errors[$nameType] = "$nameType must be at least 3 characters";
        } elseif (trim(strlen($value)) > 26) {
            $this->errors[$nameType] = "$nameType must be at most 25 characters";
        } elseif (!ctype_alpha($value)) {
            $this->errors[$nameType] = "$nameType must contains only alphabets";
        }
    }
    public function validateLastName($value)
    {
        if (trim(strlen($value)) < 3) {
            $this->errors['lastName'] = 'enter atleast 3 alphabets';
        } elseif (trim(strlen($value)) > 26) {
            $this->errors['lastName'] = 'enter maximum 25 alphabets';
        } else {
            $this->errors['lastName'] = 'lastName must contains only alphabets';
        }
    }
    public function validateTitle($value)
    {
        if (strlen(trim($value)) <= 0) {
            $this->errors['title'] = 'provide a title for your content';
            return true;
        } elseif (trim(strlen($value)) > 100) {
            $this->errors['title'] = 'the text must have maximum length 100';
            return true;
        }
    }
    public function validateContent($value)
    {
        if (strlen(trim($value)) <= 0) {
            $this->errors['content'] = 'provide a body minimum 1 character';
            return true;
        }
        if (trim(strlen($value)) > 1000) {
            $this->errors['content'] = 'the text must have maximum length 1000';
        }
    }
}
