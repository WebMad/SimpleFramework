<?php


namespace app\framework\database\queryBuilder;


class InsertQuery extends Query
{
    /**
     * @var string
     */
    protected $values;
    /**
     * @var string
     */
    protected $fields;

    public function values($values) //TODO
    {
//        $values_str = '';
//        foreach($values as $value){
//            if(is_array($value)){
//                $values_str = '(' . implode(',', $value) . ')';
//            }
//            else{
//                $values_str .= $value;
//            }
//
//        }
//        $this->values = $value_str;
    }

    public function fields($fields)
    {
        $fields = implode(',', $fields);
        $this->fields = $fields;
    }
}