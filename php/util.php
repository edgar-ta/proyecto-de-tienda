<?php

function relative_path(string $path) {
    $path       = preg_replace("/^\.(\\|\/)/", "", $path);
    $components = preg_split("/(\\\\\\\\?)|\//", $path);
    $dot_components = array_filter($components, function($component) {
        return preg_match("/\.\./", $component);
    });
    $components     = array_slice($components, count($dot_components));
    $dir_components =  array_slice(preg_split("/\\\\\\\\?|\//", __DIR__), 0, -count($dot_components));
    return join("/", $dir_components) . "/" . join("/", $components);
}