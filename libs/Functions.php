<?php
   function defaultValue($data, callable $onError)
   { 
       return empty($data) ? $onError() : 
         function($args) { 
             return $args; 
         }; 
   } 

