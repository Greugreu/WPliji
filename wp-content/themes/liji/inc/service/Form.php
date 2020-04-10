<?php
class Form
{
    protected $post;
    protected $error;

    function __construct($error = array(), $method = 'post')
    {
        if ($method == 'post') {
            $this->post = $_POST;
        } else {
            $this->post = $_GET;
        }
        $this->error = $error;
    }

    /**
     * @param $name string
     * @return string
     */
    private function getValue($name)
    {
        if (!empty($_POST[$name])) {
            return $_POST[$name];
        } else {
            return '';
        }
    }

    /**
     * @param $name string
     * @return string
     */
    public function input($type, $name, $placeholder)
    {
        return '<input type="' . $type . '" name="' . $name . '" id="' . $name . '"placeholder="' . $placeholder . '" value="' . $this->getValue($name) . '">';
    }

    /**
     * @param $name
     * @return string
     */
    public function textarea($name)
    {
        return '<textarea name="' . $name . '" id="' . $name . '">' . $this->getValue($name) . '</textarea>';
    }

    /**
     * @param $name string
     * @param $value string
     * @return string
     */
    public function submit($name, $value)
    {
        return '<input type="submit" name="' . $name . '" id="' . $name . '" value="' . $value . '">';
    }

    /**
     * @param $name
     * @return string|null
     */
    public function error($name)
    {
        if (!empty($this->error[$name])) {
            return '<span class="error">' . $this->error[$name] . '</span>';
        }
        return null;
    }

    /**
     * @param $name
     * @param $label
     * @return string
     */
    public function label($label, $name)
    {
        return '<label for="' . $name . '">' . ucfirst($label) . '</label>';
    }

}