<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter
{
    /*protected $allowedParms=[
      'postCode'=>['eq','gt','lt']
    ];*/
    protected $safeParms=[];
    protected $columnMap=[];
    protected $operatorMap=[
        'eq'=>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>=',
        'ne'=>'!=',
        'lk'=>'like',
        'nlk'=>'not like',
    ];

    public function transform(Request $request){
        $eloQuery=[];
        foreach ($this->safeParms as  $parm=>$operators){
            $query=$request->query($parm);
            if(!isset($query)){
                continue;
            }
            $column= $this->columnMap[$parm] ?? $parm;
            foreach ($operators as $operator){
                if (isset($query[$operator])){
                    $query[$operator]=($this->operatorMap[$operator]=='like' || $this->operatorMap[$operator]=='not like' )?"%{$query[$operator]}%":$query[$operator];
                    $eloQuery[]=[$column,$this->operatorMap[$operator],$query[$operator]];
                }
            }
        }
        return $eloQuery;
    }

}
