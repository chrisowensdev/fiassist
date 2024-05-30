<?php

function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}

/**
 * Load a view
 * 
 * @param string $name
 * @return void
 */
function loadView($name, $data = [])
{
    $viewPath = basePath("App/views/{$name}.view.php");

    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View {$name} not found!";
    }
}

/**
 * Load a partial
 * 
 * @param string $name
 * @return void
 */
function loadPartial($name, $data = [])
{
    $partialPath = basePath("App/views/partials/{$name}.php");

    if (file_exists($partialPath)) {
        extract($data);
        require $partialPath;
    } else {
        echo "Partial not found!";
    }
}

function inspect($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function inspectAndDie($value)
{
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}
