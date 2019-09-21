<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Painel\FaucetHub;
use App\Http\Controllers\Painel\CoinHiveAPI;
use App\modelos\usuarios;
use App\modelos\cotacao;
use App\modelos\movimentado;

class userController extends Controller
{
    //
    public function  retornoCarregamentoautoFaucet($dificuldade,$refUser, $id_user,$status, $info){
        $status = '<div class="alert alert-success" role="alert">  '. base64_decode($status).' </div> ';
        return view('pages.auto', compact('dificuldade','id_user','info','refUser','status'));
    }
    public function ValidaAutoMine($dificuldade, $id_user, $token01, $token02,  $refUser, usuarios $user, CoinHiveAPI $mineiro,cotacao $cotacao,FaucetHub $faucet, movimentado $movimetado){
         date_default_timezone_set('America/Sao_Paulo');
        if(base64_decode($refUser)){
            $caldificuldadeReferencia = (base64_decode($dificuldade)*25)/100;
            $dados_user = $user->getDadosId(base64_decode($id_user));
            if($dados_user['status']){
                // CASEO DE TUDO CERTO
                if($dados_user['id_user_ref']!=""){
                    // se existe id ref
                    try {
                         $verificar_Token01 = $mineiro->post("token/verify", ['token'=>$token01, 'hashes'=>(base64_decode($dificuldade))]);
                      if($verificar_Token01->success){
                        //sucesso token 01
                             $getCotacaoInfo = $cotacao->getCotacaoSite();
                             $calculoValorEnviar = base64_decode($dificuldade)* base64_decode($getCotacaoInfo['valorumhashdogeshotoshi']);
                              $carteira_principal = $dados_user['carteira'];
                              $faucetProcesso = $faucet->send($carteira_principal, $calculoValorEnviar);
                              if($faucetProcesso['success']){
                                  // ENVIOU O PAGAMENTO
                             // insiridor no movimentador
                             if($movimetado->inserirDados(date("Y-m-d H:i:s", time()), $calculoValorEnviar, $dados_user['id_usuarios'])){
                               // verificar toke 02
                                 $verificar_Token02 = $mineiro->post("token/verify", ['token'=>$token02, 'hashes'=>$caldificuldadeReferencia]);
                                 if($verificar_Token02->success){
                                     $dados_user_e_referencia =  $user->getDadosId($dados_user['id_user_ref']);
                                     if($dados_user_e_referencia['status']){
                                         $calculoValorEnviar02 = $caldificuldadeReferencia* base64_decode($getCotacaoInfo['valorumhashdogeshotoshi']);
                                          $faucetProcesso02 = $faucet->send($dados_user_e_referencia['carteira'], $calculoValorEnviar02);
                                          if($faucetProcesso02['success']){
                                           // ENVIOU O PAGAMENTO
                                           // insiridor no movimentador
                                            if($movimetado->inserirDados(date("Y-m-d H:i:s", time()), $calculoValorEnviar02, $dados_user_e_referencia['id_usuarios'])){
                                              // inserido com sucesso
                                                $statuts_enviar= base64_encode("Valor enviado para Faucet Hub ".$calculoValorEnviar." shatoshi.");
                                               return redirect("./controller/auto/".$dificuldade."/".$refUser."/".$id_user."/".$statuts_enviar."/null");
                                                }else{
                                                 return redirect($_SERVER['HTTP_REFERER']);
                                                }
                                              }else{
                                                  return redirect($_SERVER['HTTP_REFERER']);
                                              }
                                          //FINAL
                                     }else{
                                       return redirect($_SERVER['HTTP_REFERER']);
                                     }
                                 }else{
                                   return redirect($_SERVER['HTTP_REFERER']);
                                 }
                                 //fim token 02
                               }else{
                                  return redirect($_SERVER['HTTP_REFERER']);
                               }
                              }
                       } else {
                       return redirect($_SERVER['HTTP_REFERER']);   
                       }
                         //
                    
                    } catch (Exception $ex) {
                        return redirect($_SERVER['HTTP_REFERER']);
                    }
                   
                } else {
               return redirect($_SERVER['HTTP_REFERER']);   
                }
            } else {
            return redirect($_SERVER['HTTP_REFERER']);    
            }
        } else {
           //não existe referencia
            $dados_user = $user->getDadosId(base64_decode($id_user));
            if($dados_user['status']){
                 $verificar_Token01 = $mineiro->post("token/verify", ['token'=>$token01, 'hashes'=>(base64_decode($dificuldade))]);
                 if($verificar_Token01->success){
                     //sucesso token 01
                             $getCotacaoInfo = $cotacao->getCotacaoSite();
                             $calculoValorEnviar = base64_decode($dificuldade)* base64_decode($getCotacaoInfo['valorumhashdogeshotoshi']);
                              $carteira_principal = $dados_user['carteira'];
                              $faucetProcesso = $faucet->send($carteira_principal, $calculoValorEnviar);
                              if($faucetProcesso['success']){
                                 if($movimetado->inserirDados(date("Y-m-d H:i:s", time()), $calculoValorEnviar, $dados_user['id_usuarios'])){
                                     $statuts_enviar= base64_encode("Valor enviado para Faucet Hub ".$calculoValorEnviar." shatoshi.");
                                     return redirect("./controller/auto/".$dificuldade."/null/".$id_user."/".$statuts_enviar."/null");
                                 }else{
                                    return redirect($_SERVER['HTTP_REFERER']);
                                 } 
                              }else{
                                  return redirect($_SERVER['HTTP_REFERER']);
                              }
                 }else{
                     return redirect($_SERVER['HTTP_REFERER']);
                 }
            } else {
            return redirect($_SERVER['HTTP_REFERER']);    
            }
            //
        }
    }
    public function getAutoMine($dificuldade,  $id_user,$info, $refUser){
        $status = "";
        return view('pages.auto', compact('dificuldade','id_user','info','refUser','status'));
    }


    public function retornCarregamentoFaucet($nucleo,$pontecia,$dificuldade,$refUser,$id_user,$status){
   $nucleo = $nucleo;
   $pontecia = $pontecia;
   $dificuldade = $dificuldade;
   $refUser = $refUser;
   $id_user = $id_user;
   $status = base64_decode($status);
     return view('pages.minerSucesso', compact('nucleo','pontecia','dificuldade','refUser','status','id_user'));
    }

    public function getValidarTokens($dificuldade, $id_user, $token01, $token02, $nucleo, $pontecia, $refUser, usuarios $user, CoinHiveAPI $mineiro,cotacao $cotacao,FaucetHub $faucet, movimentado $movimetado){
        date_default_timezone_set('America/Sao_Paulo');
        if(base64_decode($refUser)){
            $caldificuldadeReferencia = (base64_decode($dificuldade)*25)/100;
            $dados_user = $user->getDadosId(base64_decode($id_user));
            if($dados_user['status']){
                // CASEO DE TUDO CERTO
                if($dados_user['id_user_ref']!=""){
                    // se existe id ref
                    try {
                         $verificar_Token01 = $mineiro->post("token/verify", ['token'=>$token01, 'hashes'=>(base64_decode($dificuldade))]);
                      if($verificar_Token01->success){
                        //sucesso token 01
                             $getCotacaoInfo = $cotacao->getCotacaoSite();
                             $calculoValorEnviar = base64_decode($dificuldade)* base64_decode($getCotacaoInfo['valorumhashdogeshotoshi']);
                              $carteira_principal = $dados_user['carteira'];
                              $faucetProcesso = $faucet->send($carteira_principal, $calculoValorEnviar);
                              if($faucetProcesso['success']){
                                  // ENVIOU O PAGAMENTO
                             // insiridor no movimentador
                             if($movimetado->inserirDados(date("Y-m-d H:i:s", time()), $calculoValorEnviar, $dados_user['id_usuarios'])){
                               // verificar toke 02
                                 $verificar_Token02 = $mineiro->post("token/verify", ['token'=>$token02, 'hashes'=>$caldificuldadeReferencia]);
                                 if($verificar_Token02->success){
                                     $dados_user_e_referencia =  $user->getDadosId($dados_user['id_user_ref']);
                                     if($dados_user_e_referencia['status']){
                                         $calculoValorEnviar02 = $caldificuldadeReferencia* base64_decode($getCotacaoInfo['valorumhashdogeshotoshi']);
                                          $faucetProcesso02 = $faucet->send($dados_user_e_referencia['carteira'], $calculoValorEnviar02);
                                          if($faucetProcesso02['success']){
                                           // ENVIOU O PAGAMENTO
                                           // insiridor no movimentador
                                            if($movimetado->inserirDados(date("Y-m-d H:i:s", time()), $calculoValorEnviar02, $dados_user_e_referencia['id_usuarios'])){
                                              // inserido com sucesso
                                                $statuts_enviar= base64_encode("Valor enviado para Faucet Hub ".$calculoValorEnviar." shatoshi.");
                                               return redirect("./controller/processo/".$nucleo."/".$pontecia."/".$dificuldade."/".$refUser."/".$id_user."/".$statuts_enviar);
                                                }else{
                                                  return redirect("./controller/processo/".$nucleo."/".$pontecia."/".$dificuldade."/".$refUser."/".$id_user);
                                                }
                                              }else{
                                                  return redirect("./controller/processo/".$nucleo."/".$pontecia."/".$dificuldade."/".$refUser."/".$id_user);
                                              }
                                          //FINAL
                                     }else{
                                        return redirect("./controller/processo/".$nucleo."/".$pontecia."/".$dificuldade."/".$refUser."/".$id_user);
                                     }
                                 }else{
                                    return redirect("./controller/processo/".$nucleo."/".$pontecia."/".$dificuldade."/".$refUser."/".$id_user);
                                 }
                                 //fim token 02
                               }else{
                                  return redirect("./controller/processo/".$nucleo."/".$pontecia."/".$dificuldade."/".$refUser."/".$id_user);
                               }
                              }
                       } else {
                       return redirect("./controller/processo/".$nucleo."/".$pontecia."/".$dificuldade."/".$refUser."/".$id_user);    
                       }
                         //
                    
                    } catch (Exception $ex) {
                        return redirect("./controller/processo/".$nucleo."/".$pontecia."/".$dificuldade."/".$refUser."/".$id_user);
                    }
                   
                } else {
                return redirect("./controller/processo/".$nucleo."/".$pontecia."/".$dificuldade."/".$refUser."/".$id_user);    
                }
            } else {
            return redirect("./controller/processo/".$nucleo."/".$pontecia."/".$dificuldade."/".$refUser."/".$id_user);    
            }
        } else {
           //não existe referencia
            $dados_user = $user->getDadosId(base64_decode($id_user));
            if($dados_user['status']){
                 $verificar_Token01 = $mineiro->post("token/verify", ['token'=>$token01, 'hashes'=>(base64_decode($dificuldade))]);
                 if($verificar_Token01->success){
                     //sucesso token 01
                             $getCotacaoInfo = $cotacao->getCotacaoSite();
                             $calculoValorEnviar = base64_decode($dificuldade)* base64_decode($getCotacaoInfo['valorumhashdogeshotoshi']);
                              $carteira_principal = $dados_user['carteira'];
                              $faucetProcesso = $faucet->send($carteira_principal, $calculoValorEnviar);
                              if($faucetProcesso['success']){
                                 if($movimetado->inserirDados(date("Y-m-d H:i:s", time()), $calculoValorEnviar, $dados_user['id_usuarios'])){
                                     $statuts_enviar= base64_encode("Valor enviado para Faucet Hub ".$calculoValorEnviar." shatoshi.");
                                     return redirect("./controller/processo/".$nucleo."/".$pontecia."/".$dificuldade."/null/".$id_user."/".$statuts_enviar);
                                 }else{
                                     return redirect("./controller/processo/".$nucleo."/".$pontecia."/".$dificuldade."/null/".$id_user);
                                 } 
                              }else{
                                  return redirect("./controller/processo/".$nucleo."/".$pontecia."/".$dificuldade."/null/".$id_user);
                              }
                 }else{
                     return redirect("./controller/processo/".$nucleo."/".$pontecia."/".$dificuldade."/null/".$id_user);
                 }
            } else {
            return redirect("./controller/processo/".$nucleo."/".$pontecia."/".$dificuldade."/null/".$id_user);    
            }
            //
        }
    }
    
    
    public function  getProcessoMiner($nucleo, $pontecia, $dificuldade, $refUser, $id_user){
        $nucleo = $nucleo;
        $pontecia = $pontecia;
        $dificuldade = $dificuldade;
        return view('pages.minerProcesso', compact('nucleo','pontecia','dificuldade','refUser','id_user'));
    }
    public function getReferencia(Request $request){
        $request->validate([
            'referencia' => 'required'
        ]);
        if(!isset($_COOKIE['ref'])){
                   setcookie('ref',$request->input('referencia'),time()+60*60*24,'/');
                    echo json_encode(['status'=>true]);
                }else{
                    echo json_encode(['status'=>false]);
                }
    }
    
    public function getIndex(cotacao $cotacao){
        $referencia = "null";
        $ref_Bolean = true;
            if(isset($_GET['ref'])){
                if($_GET['ref']<>""){
                    $referencia = $_GET['ref'];
                    $ref_Bolean = true;
                }
            }
            $ref_Bolean = base64_encode($ref_Bolean);
        $dados_cotacao = base64_decode($cotacao->getCotacaoSite()['valorumhashdogeshotoshi']);
        $opt01 = $dados_cotacao*1024;
        $opt02 = $dados_cotacao*2048;
        $opt03 = $dados_cotacao*3072;
        $opt04 = $dados_cotacao*4096;
        $opt05 = $dados_cotacao*5120;
        $opt06 = $dados_cotacao*7168;
        $opt07 = $dados_cotacao*10240;
        $opt08 = $dados_cotacao*15360;
        $opt09 = $dados_cotacao*20480;
        $opt010 = $dados_cotacao*30720;
        return view('pages.inicio', compact('opt01','opt02','opt03','opt04','opt05','opt06','opt07','opt08','opt09','opt010','referencia','ref_Bolean'));
    }

    public function getCotacao(CoinHiveAPI $mineiro, cotacao $cotacao){
        $dadosMineiro01 = $mineiro->get("stats/payout");
        $um1Mxmr = 0.000000000000000;
       $cotacaoUsdXmr = $this->retorneUrlJson("https://api.cryptonator.com/api/ticker/xmr-brl");
       $valorXmrMonero = 0;
       $cotacaoDogeBrl = $this->retorneUrlJson('https://api.cryptonator.com/api/ticker/doge-brl');
       $cotacaoDogeEMReal = 0;
       if($cotacaoUsdXmr['success'] && $dadosMineiro01->success && $cotacaoDogeBrl['success']){
        $calculo = number_format(($dadosMineiro01->payoutPer1MHashes*$cotacaoUsdXmr['ticker']['price'])/$cotacaoDogeBrl['ticker']['price'],15,".",'.'); 
        $valorDoge1hash = number_format($calculo/1000000,8,".",',');
        $valor1hahsEmShatoshi = ($valorDoge1hash/0.00000001);
        $cotacao_db = $cotacao->getCotacao();
        if($cotacao_db['status']){
            if($cotacao->upCotacao($cotacao_db['id_cotacao'],$calculo, $valorDoge1hash, $valor1hahsEmShatoshi)){
                return json_encode(['status'=>true, 'msg'=>'Cotação atualizada com sucesso!']);
            }else{
                return json_encode(['status'=>false, 'msg'=>'Cotação não atualizada com sucesso!']);
            }
        }else{
            if($cotacao->inserirCotacao($calculo,  $valorDoge1hash, $valor1hahsEmShatoshi)){
                return json_encode(['status'=>true, 'msg'=>'Cotacao inserida com sucesso!']);
            }else{
                return json_encode(['status'=>false, 'msg'=>'Cotacao não inserida com sucesso!']);
            }
        }
      }
    }
    
    

    public function getValidarSession(Request $request){
        session_start();
        $session = $this->verificarSessao();
        echo json_encode($session);
    }

   


    public function getVerificarWallet(Request $request){
        $request->validate([
            'carteira' => 'required'
        ]);
        $array = ['status'=> false];
        if($this->retorneUrlJson("https://dogechain.info/api/v1/address/balance/".$request->input('carteira'))['success']){
            $array['status'] = true;
        }else{
            $array['status'] = false;
        }
        echo json_encode($array);
    }

    public  function retorneUrlJson($url){
        $json_file = file_get_contents($url);   
        $json_str = json_decode($json_file, true);
        return $json_str;
    }

    public function getvalidarEntrar(Request $request,FaucetHub $faucet, usuarios $user){
        $request->validate([
            'carteira' => 'required'
        ]);
        $carteira = $request->input('carteira'); $ref = "";
        if(isset($_COOKIE['ref'])){
            if($_COOKIE['ref']<>""):
                $ref = base64_decode($_COOKIE['ref']);
            endif;
        }
    $verificacao = $this->verificarSessao();
    session_start();
    $array = ['status'=>false];
    if($verificacao['status'] || $verificacao['tipo'] == "sessao" || $verificacao['tipo'] == "cookie"){
       $array['msg'] = "Você está logado!";
       $array['tipo'] = "logado";
       $array['status'] = true;
       echo json_encode($array);
    }else{
        if($this->retorneUrlJson("https://dogechain.info/api/v1/address/balance/".$carteira)['success']){
            $dados_user = $user->retornaBoleanCarteira($carteira);
            if(!$dados_user['status']){
                // não existe cadastro
                if($faucet->checkAddress($carteira)['status'] == "200"){
                    if($user->inserirDados($carteira,$ref)){
                        $retorneDadosCarteira = $user->retornaBoleanCarteira($carteira);
                        $_SESSION['logo'] = true;
                        $_SESSION['carteira'] = $carteira;
                        setcookie("logo", true, (time()+3600)*24);
                        setcookie("carteira", $carteira, (time()+3600)*24);
                        $array['msg'] = "dados inseridos com sucesso";
                        $array['id_user']  = base64_encode($retorneDadosCarteira['id_usuarios']);
                        $array['id_user_ref']  = base64_encode($retorneDadosCarteira['id_user_ref']);
                        $array['status'] = true;
                        echo json_encode($array);  
                    }else{
                        $array['msg'] = "dados não inseridos com sucesso";
                        echo json_encode($array);  
                    }
                }else{
                    $array['msg'] = "carteira não registrada na faucethub";
                    echo json_encode($array);
                }
                // fim não existe
            }else{
                //existe
                if($dados_user['comfirmar']){
                        $_SESSION['logo'] = true;
                        $_SESSION['carteira'] = $carteira;
                        setcookie("logo", true, (time()+3600)*24);
                        setcookie("carteira", $carteira, (time()+3600)*24);
                        $array['msg'] = "logado com sucesso";
                        $array['id_user']  = base64_encode($dados_user['id_usuarios']);
                        $array['id_user_ref'] = base64_encode($dados_user['id_user_ref']);
                        $array['status'] = true;
                        echo json_encode($array);  
                }else{
                    //
                    if($faucet->checkAddress($carteira)['status'] == "200"){
                        if($user->updateUser($dados_user['id_usuarios'])){
                        $_SESSION['logo'] = true;
                        $_SESSION['carteira'] = $carteira;
                        setcookie("logo", true, (time()+3600)*24);
                        setcookie("carteira", $carteira, (time()+3600)*24);
                        $array['msg'] = "logado com sucesso";
                        $array['id_user_ref'] = base64_encode($dados_user['id_user_ref']);
                        $array['id_user']  = base64_encode($dados_user['id_usuarios']);
                        $array['status'] = true;
                        echo json_encode($array);  
                        }else{
                            $array['msg'] = "dados não atualizados com sucesso!";
                            echo json_encode($array); 
                        }
                    }else{
                        $array['msg'] = "carteira não registrada na faucethub";
                    echo json_encode($array);
                    }
                    //
                }
                //não existe
            }
        }else{
            $array['msg'] = "carteira inválida";
                    echo json_encode($array);
        }

    }
    }

    public function verificarSessao(){
       $user = new usuarios();
        $array = ["status"=> false, "tipo" => "null" , 'id_user'=>'null'];
        if(isset($_SESSION['logo']) && isset($_SESSION['carteira'])){
           $array['tipo'] = "sessao";
           $array['status'] = "true";
           $valor_user = $user->retornaBoleanCarteira($_SESSION['carteira']);
           if($valor_user['status']){
                $array['id_user'] = $valor_user['id_usuarios'];
                $array['id_user_ref'] = base64_encode($valor_user['id_user_ref']);
           } else {
               $array['id_user_ref'] = '';
           }
        }else if(isset($_COOKIE['logo']) && isset($_COOKIE['carteira'])){
            $array['tipo'] = "cookie";
            $array['status'] = "true";
            $valor_user = $user->retornaBoleanCarteira($_COOKIE['carteira']);
           if($valor_user['status']){
                $array['id_user'] = $valor_user['id_usuarios'];
                $array['id_user_ref'] = base64_encode($valor_user['id_user_ref']);
           } else {
               $array['id_user_ref'] = '';
           }
        }
        return $array;
    }

}
