<?php

class Validation
{
    protected $errors = array();

    public function IsValid($errors)
    {
        foreach ($errors as $key => $value) {
            if (!empty($value)) {
                return false;
            }
        }
        return true;
    }

    /**
     * emailValid
     * @param email $email
     * @return string $error
     */

    public function emailValid($email)
    {
        $error = '';
        if (empty($email) || (filter_var($email, FILTER_VALIDATE_EMAIL)) === false) {
            $error = 'Adresse email invalide.';
        }
        return $error;
    }

    /**
     * textValid
     * @param POST $text string
     * @param title $title string
     * @param min $min int
     * @param max $max int
     * @param empty $empty bool
     * @return string $error
     */

    public function textValid($text, $title, $min = 3, $max = 50, $empty = true)
    {

        $error = '';
        if (!empty($text)) {
            $strtext = strlen($text);
            if ($strtext > $max) {
                $error = 'Votre ' . $title . ' est trop long.';
            } elseif ($strtext < $min) {
                $error = 'Votre ' . $title . ' est trop court.';
            }
        } else {
            if ($empty) {
                $error = 'Veuillez renseigner un ' . $title . '.';
            }
        }
        return $error;

    }

    /**
     * numericValid
     * @param POST $text string
     * @param title $title string
     * @param min $min int
     * @param max $max int
     * @param empty $empty bool
     * @return string $error
     */

    public function numericValid($int, $title, $min = 3, $max = 50, $empty = true)
    {

        $error = '';
        if (!empty($int)) {
            $strint = strlen($int);
            if ($strint > $max) {
                $error = 'Votre ' . $title . ' est trop long.';
            } elseif ($strint < $min) {
                $error = 'Votre ' . $title . ' est trop court';
            }
        } else {
            if ($empty) {
                $error = 'Veuillez renseigner un ' . $title . '.';
            }
        }
        return $error;

    }

    public function passwordValid($password)
    {
        $error = '';
        if (!empty($password)) {
            if (mb_strlen($password) < 6) {
                $error = 'Le mot de passe doit contenir 6 caractères minimums';
            } else {
                $error = 'Veuillez renseigner un mot de passe';
            }
        }
        return $error;
    }

}
