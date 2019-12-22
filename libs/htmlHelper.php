<?php

/**@function: defaultValue
 * @params:$data a value 
 * 
 */
  
    function defaultValue($data, callable $onError): int 
    { 
        return empty($data) ? $onError() : 
          function($args) { 
              return $args; 
          }; 
    } 
     
   
    



