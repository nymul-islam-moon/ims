<?php

namespace App\Service;

use App\Interface\CodeGenerationServiceInterface;

class CodeGenerationService implements CodeGenerationServiceInterface
{
    public function generate($objectName): string
    {
        // code generation start

        $code_name = '';

        if ($objectName::where('id', 1)->first()) {
            $latest_id = $objectName->latest()->first()->id;
            $latest_id = $latest_id + 1;
        } else {
            $latest_id = 1;
        }

        $table_name = $objectName->getTable();
        $name = explode('_', $table_name);


        if(count($name) > 1){

            foreach($name as $key=> $value){
                $code_name.= substr($value, 0, 3) . '-';

            }
            $code_name.= $latest_id;

        }else{
            $code_name = substr($name[0], 0, 3) . '-' . $latest_id;
        }

       $code = strtoupper($code_name);

        return $code;
        // Code generation End
    }
}
