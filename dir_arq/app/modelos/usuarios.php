<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    //
    protected $primaryKey = 'id_usuarios';
    protected $table = 'usuarios';
    
    public function getDadosId($id){
        $valor = $this->where("id_usuarios",$id)->get();
        $a = 0; $array = [];
        foreach ($valor as $ps) {
           $a++;
           $array['id_usuarios'] =  $ps->id_usuarios;
           $array['carteira'] = $ps->carteira;
           $array['comfirmar']  = $ps->comfirmar;
           $array['id_user_ref'] = $ps->id_user_ref ;
             }
            if($a>0){
              $array['status'] =  true;
            }else{
                # code...
               $array['status'] =  false;
            }
            $array['cont'] = $a;
            return $array;
    }

    public function retornaBoleanCarteira($carteira){
        $valor = $this->where("carteira",$carteira)->get();
        $a = 0; $array = [];
        foreach ($valor as $ps) {
           $a++;
           $array['id_usuarios'] =  $ps->id_usuarios;
           $array['carteira'] = $ps->carteira;
           $array['comfirmar']  = $ps->comfirmar;
           $array['id_user_ref'] = $ps->id_user_ref ;
             }
            if($a>0){
              $array['status'] =  true;
            }else{
                # code...
               $array['status'] =  false;
            }
            $array['cont'] = $a;
            return $array;
    }


    public function inserirDados($carteira ,$id_referencia){
        $insert = $this->insert([
            'carteira' => $carteira,
            'comfirmar'=>'true',
            'id_user_ref' => $id_referencia
         ]);
        if($insert){
            return true;
        } else {
            return false;
        }
    }

    public function updateUser($id){
        $valor = $this->find($id);
        $valor->comfirmar = "true";
        $valor->save();
        if($valor){
            return TRUE;  
        }else{
            return false;   
        }
    }

}
