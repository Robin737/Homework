<?php

class Template
{
    private $fileName;
    private $data;
    private $fileText;

    function __constract()
    {
        $filename = "";
        $data = array();
        $filetext = "";
    }

    function setData($data)
    {
        $this->data = $data;
    }

    function setFileName($filename)
    {
        $this->fileText = $this->load_file($filename);
    }
  
    function render()
    {
        foreach ($this->data as $key => $values) {
            $this->fileText = str_replace("{" . $key . "}", $values, $this->fileText);
        }
        $this->fileText = preg_replace("/{.*}/", "", $this->fileText);
        echo $this->fileText;
    }

    function load_file($filename, $mode = "r")
    {

        $handle = fopen($filename, $mode);
        $text = "";
        while (($line = fgets($handle)) !== false) {
            $text = $text . $line;
        }
        return $text;
    }
}