<?php

public function classes_in_namespace($namespace)
{
  $namespace .= '\\';
  $myClasses  = array_filter(get_declared_classes(), function($item) use ($namespace) { return substr($item, 0, strlen($namespace)) === $namespace; });
  $theClasses = [];
  foreach ($myClasses AS $class):
        $theParts = explode('\\', $class);
        $theClasses[] = end($theParts);
  endforeach;
  return $theClasses;
}