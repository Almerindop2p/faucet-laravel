<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class movimentado extends Model
{
    //
    protected $primaryKey = 'id_movimentado';
    protected $table = 'movimentado';
     public function inserirDados($data_hora, $shatoshi,$id_user){
         $insert = $this->insert([
            'data_hora' => $data_hora,
            'shatoshi_pago'=> $shatoshi,
            'id_usuarios' => $id_user
         ]);
        if($insert){
            return true;
        } else {
            return false;
        }
    }
}
