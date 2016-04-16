<?php

namespace Assistance\ArrayTools;

class ArrayTools
{       
    /**    
    * Array grouping
    *
    * @param array  $array
    * @param array  $groupFields array of groupping fields
    * @param array  $sumFields   array of summing fields
    * @param string $separator   
    * 
    * @return array
    */
    public static function group(array $array, array $groupFields, array $sumFields = array(), $separator = ',') 
    {
        $result = [];        
        
        if (0 === count($array) || 0 === count($groupFields)) {
          return $result;                
        }  
        
        foreach ($array as $element) {
          //calc key  
          $key = '';
          $newElement = [];
          foreach ($groupFields as $groupField) {
            if (array_key_exists($groupField, $element)) {                    
              $key .= is_array($element[$groupField]) ? json_encode($element[$groupField], JSON_UNESCAPED_UNICODE) : $element[$groupField];                   
              $newElement[$groupField] = $element[$groupField]; 
            }
          }          
          $key = md5($key);
          
          //add fields
          if (!array_key_exists($key, $result)) {
           $result[$key] = $newElement;
          }
          
          //add sum
          foreach ($sumFields as $sumFieldKey => $sumField){
            if (array_key_exists($sumField, $element)) {
              
              $isFirst = false;              
              if (!array_key_exists($sumField, $result[$key])) {                                                
                $result[$key][$sumField] = $element[$sumField];                                  
                $isFirst = true;
              }
              
              if (!$isFirst) {
                if (is_numeric($element[$sumField]) && false === strpos($sumFieldKey, 'as_string')) {  
                  $result[$key][$sumField] += $element[$sumField];  
                } else {
                  $result[$key][$sumField] .= $separator . $element[$sumField];  
                }
              }
            }
          }         
        }
        
        return array_values($result);            
    }
    
    /**    
    * Search record (array) in array
    *
    * @param array  $array
    * @param array  $record    
    * @param string $orderBy    
    * 
    * @return array
    */
    public static function search(array $array, array $record, $orderBy = '')
    {        
        if (0 === count($array)) {
          return [];    
        }
                       
        $result =  array_filter($array, function($value) use($record, $array) {
            $flag = true;
            foreach ($record as $key => $rec) {              
              if (!empty($value) && $value[$key] != $rec) {
                $flag = false;
              }
            }
                      
            if ($flag) {
              return $value;
            }
            
        });
        
        if ('' !== $orderBy) && array_key_exists($orderBy, $array[0])) {
            usort($result, function ($a, $b) use($orderBy) {
                if ($a[$orderBy] == $b[$orderBy]) {
                  return 0;
                }
                
                return $a[$orderBy] < $b[$orderBy] ? -1 : 1;
            });
        }
        
        return $result;
    }   
    
   /**              
   * Extract an array of values for a given property
   *
   * @param array  $collection Collection: array(array(), array() ...)
   * @param string $key Proporty name
   * 
   * @return array
   */
  public static function pluck(array $collection, $key)
  {
    $return = [];
    foreach ($collection as $item) {
      foreach ($item as $k => $v) {
        if ($k === $key) {
          $return[] = $v;
        }
      }
    }

    return $return;
  }
}
