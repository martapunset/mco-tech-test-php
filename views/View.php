

<?php
class View
{
    public $data;

    function render($name)
    {
        require_once VIEWS . '/' . $name . ".php";
    }
}
