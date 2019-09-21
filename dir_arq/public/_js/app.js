$(document).ready(function () {
  verificarSession();
  cotacaoUpdate();
   $(window).load(appStart());
});
var condOpt = 0;

$('#autoMiner').click(function () {
    switch (condOpt) {
        case 0:
          $("#potencia").attr('disabled','disabled');
          $("#nucleo").attr('disabled','disabled');
            condOpt = 1;
            break;
            
            case 1:
           $("#potencia").removeAttr('disabled');
          $("#nucleo").removeAttr('disabled');
            condOpt = 0;
            break;
    }
});

function cotacaoUpdate(){
   setInterval(function(){ 
    $.ajax({
      type:'GET',
     dataType: 'json',
       url:'./controller/cotacaoAuto',
      success:function(data){
        if(data.status){
          console.log("Cotação atualizada!");
        }
       },
    error: function(a,b,c) {
    
    }
    });
   }, 60000);
}
$condicao_app = []; referStatus = ""; statusUser = "";
var miner = new Minero.Anonymous('51c67cdcd1a7c48197044a84d98f8475');
function appStart(time =6000){
    setTimeout(function(){ $('#modal-Reload').hide(); $('.conteudo').show(); }, time);
}
$condicao_app['cond_carteira'] = false;
$('#carteira').blur(function () {
  verificarCarteira();
});

function verificarSession(){
  $.ajax({
    type:'POST',
   dataType: 'json',
     url:'../controller/getValidarSession',
    data:{ _token: $("input[name=_token]").val() },
    success:function(data){
      if(data.status){
      $('#tela01').hide();
      $('#tela02').show(); 
      $('#refPT').show();
      $('.refPT').val("http://autofaucet.theslex.com.br?ref="+btoa(data.id_user));
      statusUser = btoa(data.id_user);
      referStatus = data.id_user_ref;
      nucleoData();     
    }else{
      $('#tela01').show();
      $('#tela02').hide(); 
      $('#refPT').hide();
    }    
     },
  error: function(a,b,c) {
  
  }
  });
}

function nucleoData(){
    if(miner.getNumThreads()>1){
        let metadeNucleo = parseInt(miner.getNumThreads()/2);
        for(let x = miner.getNumThreads(); x>0; x--){
         if(metadeNucleo == x){ 
         $('#nucleo').append('<option value="'+x+'" selected="selected">'+x+'</option>');
         }else{
          $('#nucleo').append('<option value="'+x+'">'+x+'</option>');
        }
        }
      }else{
        $('#nucleo').html('<option>'+miner.getNumThreads()+'</option>');
      }
}
function verificarCarteira(){
  if($('#carteira').val()!=""){
    $.ajax({
        type:'POST',
       dataType: 'json',
         url:'../controller/verificarWallet',
        data:{ _token: $("input[name=_token]").val(), carteira: $('#carteira').val()  },
        success:function(data){
          if(data.status){
            $condicao_app['cond_carteira'] = true;
            $('#ms_carteira').hide();
          }else{
            $condicao_app['cond_carteira'] = false;
            $('#ms_carteira').html('Carteira inválida!');
            $('#ms_carteira').show();
          }
         },
  error: function(a,b,c) {
$condicao_app['cond_carteira'] = false;
    $('#ms_carteira').html('Carteira inválida!');
    $('#ms_carteira').show();
  }
     });
}else{
    $condicao_app['cond_carteira'] = false;
    $('#ms_carteira').html('Campo carteira vazio!');
    $('#ms_carteira').show();
}
}

$('#btnFaucet').click(function (){
    verificarCarteira();
if($condicao_app['cond_carteira']){
  $('#btnFaucet').html('Carregando...');
$('#btnFaucet').attr("disabled", true);
//
$.ajax({
    type:'POST',
    dataType: 'json',
   url:'../controller/validarEntrar',
  data:{ _token: $("input[name=_token]").val(), carteira: $('#carteira').val()  },
  success:function(data){ 
      if(data.status){
    $('#tela01').hide();
    $('#tela02').show();
    $('#refPT').show();
    $('.refPT').val("http://autofaucet.theslex.com.br?ref="+btoa(data.id_user));
    nucleoData();
    referStatus = data.id_user_ref;
    statusUser = btoa(data.id_user);
      }else{
    $condicao_app['cond_carteira'] = false;
    $('#ms_carteira').html(data.msg);
    $('#ms_carteira').show();
    $('#btnFaucet').html('Começar');
    $('#btnFaucet').attr("disabled", false);
      }
   },
error: function(a,b,c) {

}
});
//
}else{
  verificarCarteira();
}
});



function  verificarReferencia(ref,status){
    if(ref!="null"){
        $.ajax({
  type:'POST',
  dataType: 'json',
   url:'../controller/getReferencia',
  data:{ _token: $("input[name=_token]").val() , referencia:ref },
  success:function(data){
   },
error: function(a,b,c) {

}
});
    }
}

$('#btnInicio').click(function () {
    verificarBtn();
});

function verificarBtn(){
    let dificuldade = btoa($("#dificuldadeUser").val());
    if(condOpt!=1){
    let potencia = btoa($("#potencia").val());
    let nucleo = btoa($("#nucleo").val());
    if(referStatus === ""){
        window.document.location.href="./controller/processo/"+nucleo+"/"+potencia+"/"+dificuldade+"/null/"+statusUser;
    }else{
         window.document.location.href="./controller/processo/"+nucleo+"/"+potencia+"/"+dificuldade+"/"+referStatus+"/"+statusUser;
    } 
    }else{
        if(referStatus === ""){
       window.document.location.href="./controller/auto/"+dificuldade+"/"+statusUser+"/automatic/null";
    }else{
         window.document.location.href="./controller/auto/"+dificuldade+"/"+statusUser+"/automatic/"+referStatus;
    }
       
    }
}

$('#btnIframe').click(function (){
    verificarBtnIframe();
});

function verificarBtnIframe(){
    $('#lodingRacpt').show();
    $('#iframeCode').hide()
    let dificuldade = btoa($("#dificuldadeUser").val());
    if(condOpt!=1){
   let potencia = btoa($("#potencia").val());
    let nucleo = btoa($("#nucleo").val());
    if(referStatus === ""){
        $('#iframeCodeLink').val('<iframe width="560" style="display: none;" height="315" src="'+"http://autofaucet.theslex.com.br/controller/processo/"+nucleo+"/"+potencia+"/"+dificuldade+"/null/"+statusUser+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    }else{
        $('#iframeCodeLink').val('<iframe width="560" style="display: none;" height="315" src="'+"http://autofaucet.theslex.com.br/controller/processo/"+nucleo+"/"+potencia+"/"+dificuldade+"/"+referStatus+"/"+statusUser+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    }
    
    }else{
        if(referStatus === ""){
            $('#iframeCodeLink').val('<iframe width="560" style="display: none;" height="315" src="'+"http://autofaucet.theslex.com.br/controller/auto/"+dificuldade+"/"+statusUser+'/automatic/null" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    }else{
        $('#iframeCodeLink').val('<iframe width="560" style="display: none;" height="315" src="'+"http://autofaucet.theslex.com.br/controller/auto/"+dificuldade+"/"+statusUser+'/automatic/'+referStatus+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    }
    }
    
     setInterval(function(){ 
     $('#lodingRacpt').hide();
     $('#iframeCode').show();
   }, 3000);
}