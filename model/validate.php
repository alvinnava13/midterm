<?php

function validForm()
{
    global $f3;
    $isValid = true;

    if (!validName($f3->get('name'))) {
        $isValid = false;
        $f3->set("errors['name']", "Please enter your name.");
    }

    if (!validSelection($f3->get('midterm'))) {
        $isValid = false;
        $f3->set("errors['midterm']", "Invalid selection");
    }
    return $isValid;
}

function validName($name)
{
    return !empty($name) && ctype_alpha($name);
}

function validSelection($midterm)
{
    global $f3;
    //Condiments are optional
    if (empty($midterm)) {
        return true;
    }
    //But if there are condiments, we need to make sure they're valid
    foreach ($midterm as $select) {
        if (!in_array($select, $f3->get('midterm'))) {
            return false;
        }
    }
    //If we're still here, then we have valid condiments
    return true;
}
