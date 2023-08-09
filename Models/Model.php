<?php

interface Model{
    public function save($key, $value);
    public function delete($key, $value);
    //public function setId($key, $id);
}
?>