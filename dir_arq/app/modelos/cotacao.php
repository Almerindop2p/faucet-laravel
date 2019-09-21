<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class cotacao extends Model
{
    protected $primaryKey = 'id_cotacao';
    protected $table = 'cotacao';
    public function getCotacao(){
        $valor = $this->get();
        $a = 0; $array = [];
        foreach ($valor as $ps) {
           $a++;
           $array['id_cotacao'] =  $ps->id_cotacao;
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

    public function inserirCotacao($umMhash, $valordogeUmhash, $valorumhashdogeshotoshi){
        $umMhash = number_format($umMhash/5,8,".",'.');
        $valordogeUmhash = number_format($valordogeUmhash/5,8,".",'.');
        $valorumhashdogeshotoshi = intval(number_format($valorumhashdogeshotoshi/5,8,".",'.'));
        $insert = $this->insert([
            'ummhash' => base64_encode($umMhash),
            'valordogeumhash'  => base64_encode($valordogeUmhash),
            'valorumhashdogeshotoshi' => base64_encode($valorumhashdogeshotoshi)
         ]);
        if($insert){
            return true;
        } else {
            return false;
        }
    }


    public function upCotacao($id,$umMhash, $valordogeUmhash, $valorumhashdogeshotoshi){
         $umMhash = number_format($umMhash/5,8,".",'.');
         $valordogeUmhash = number_format($valordogeUmhash/5,8,".",'.');
         $valorumhashdogeshotoshi = intval(number_format($valorumhashdogeshotoshi/5,8,".",'.'));
         $valor = $this->find($id);
         $valor->ummhash = base64_encode($umMhash);
         $valor->valordogeumhash = base64_encode($valordogeUmhash);
         $valor->valorumhashdogeshotoshi = base64_encode($valorumhashdogeshotoshi);
         $valor->save();
         if($valor){
             return TRUE;  
         } else {
             return false;   
         }
    }

    public function getCotacaoSite(){
        $valor = $this->get();
        $a = 0; $array = [];
        foreach ($valor as $ps) {
           $a++;
           $array['id_cotacao'] =  $ps->id_cotacao;
           $array['ummhash'] = $ps->ummhash;
           $array['valordogeumhash'] = $ps->valordogeumhash;
           $array['valorumhashdogeshotoshi'] = $ps->valorumhashdogeshotoshi;
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

}
