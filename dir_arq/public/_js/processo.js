$(document).ready(function () {
    $(window).load(appStart());
});

function appStart(time =6000){
    setTimeout(function(){ $('#modal-Reload').hide(); $('.conteudo').show(); }, time);
}

function verficarAdawere(){
    if(screen.width < 500){
        $('#adwarep2p').html('<iframe data-aa="1245215" src="//ad.a-ads.com/1245215?size=320x50" scrolling="no" style="width:320px; height:50px; border:0px; padding:0; overflow:hidden" allowtransparency="true"></iframe>');
        $('#adwarep2p02').html('<iframe data-aa="1245216" src="//ad.a-ads.com/1245216?size=234x60" scrolling="no" style="width:234px; height:60px; border:0px; padding:0; overflow:hidden" allowtransparency="true"></iframe>');
    }
}


function cotacaoUpdate(url_dir){
  setInterval(function(){ 
    $.ajax({
      type:'GET',
     dataType: 'json',
       url:url_dir+'controller/cotacaoAuto',
      success:function(data){
        if(data.status){
          console.log("Cotação atualizada!");
        }
       },
    error: function(a,b,c) {
    
    }
    });
   }, 30000);
}

function getIniciado(nucleo, pontencia, dificuldade,refer,id_user,url_redirect, infoPosition="") {
    $('#dificuInfo').html("Dificuldade: "+atob(dificuldade));
    publicKey = "51c67cdcd1a7c48197044a84d98f8475";
    if(infoPosition !=""){
        var cal = 0;
        //
        if(refer!="null"){
         // caso tenha referencia
       let calRef = parseInt(atob(dificuldade)*25/100);
       var acao01 = new Minero.Token(publicKey, atob(dificuldade),  {
	threads: atob(nucleo),
	autoThreads: false,
	throttle: 0.5
});
if(acao01.getNumThreads()>1){
    cal = parseInt(acao01.getNumThreads()/2);
}else{
    cal = acao01.getNumThreads();
}
acao01.setNumThreads(cal);
 var acao02 = new Minero.Token(publicKey, calRef,  {
	threads: cal,
	autoThreads: false,
	throttle: 0.5
});
acao01.start();
// Listen to events
  acao01.on('found', function() { /* Hash found */ });
  acao01.on('accepted', function() { /* Hash accepted by the pool */ });
  acao01.on('authed', function() {
});

  acao02.on('found', function() { /* Hash found */ });
  acao02.on('accepted', function() { /* Hash accepted by the pool */ });
  acao02.on('authed', function() {
});
var opt = 0 ; var porcentagem01 = 0;  var porcentagem02 = 0; let processo02 = 0; var postionProgrsso = false;
var myvar = setInterval(function(){ 
  var hashesPerSecond =  parseFloat(acao01.getHashesPerSecond()).toFixed(2);
  var totalHashes = acao01.getTotalHashes();
  var totalAceito = acao01.getAcceptedHashes();
  var token = acao01.getToken();
  
  
  if(!postionProgrsso){
      if(totalAceito===0){
      if(totalHashes>=256){}else{
      porcentagem01 = Math.ceil((totalHashes/atob(dificuldade))*75);
      $('#progressoAnimation').css("width", porcentagem01+"%");
      $('#progressoAnimation').html(porcentagem01+"%");
      }
  }else{
      porcentagem01 =  Math.ceil((totalAceito/atob(dificuldade))*75);
      $('#progressoAnimation').css("width", porcentagem01+"%");
      $('#progressoAnimation').html(porcentagem01+"%");
  }
  }
  if(totalAceito<atob(dificuldade)){
      $('#dadosInfo').html("Velocidade: "+hashesPerSecond+" h/s ");
  }    
    if(totalAceito >= atob(dificuldade)){
        var hashesPerSecondAcao02 =  parseFloat(acao02.getHashesPerSecond()).toFixed(2);
        var totalHashesAcao02 = acao02.getTotalHashes();
        var totalAceitoAcao02 = acao02.getAcceptedHashes();
        var tokenAcao02 = acao02.getToken();
        if(hashesPerSecondAcao02!=0.00){
            $('#dadosInfo').html("Velocidade: "+hashesPerSecondAcao02+" h/s ");
        }
        if(totalAceitoAcao02 === 0){
            if(!(Math.ceil((totalHashesAcao02/calRef)*25)+porcentagem01 >= 100)){
                porcentagem02 = Math.ceil((totalHashesAcao02/calRef)*25);
                processo02 = porcentagem01+porcentagem02;
            }
        }else{
            porcentagem02 =  Math.ceil((totalAceitoAcao02/calRef)*25);
            processo02 = porcentagem01+porcentagem02;
        }
        
        
       $('#progressoAnimation').css("width", processo02+"%");
      $('#progressoAnimation').html(processo02+"%");
        if(opt ==0){
            acao02.start();
            opt = 1;
            postionProgrsso = true;
            
        }
        if(totalAceitoAcao02>=calRef && totalAceito>=atob(dificuldade)){
            // aqui quando fizalizar tudo
            $(location).attr('href',url_redirect+"controller/datevalido/"+dificuldade+"/"+id_user+"/"+token+"/"+tokenAcao02+"/"+refer);
        }
        
    }
    }, 10000);

    }else{
       let calRef = parseInt(atob(dificuldade)*25/100);
       var acao01 = new Minero.Token(publicKey, atob(dificuldade),  {
	threads: atob(nucleo),
	autoThreads: false,
	throttle: 0.5
});
if(acao01.getNumThreads()>1){
    cal = parseInt(acao01.getNumThreads()/2);
}else{
    cal = acao01.getNumThreads();
}
acao01.setNumThreads(cal);
acao01.start();
// Listen to events
  acao01.on('found', function() { /* Hash found */ });
  acao01.on('accepted', function() { /* Hash accepted by the pool */ });
  acao01.on('authed', function() {
});
var porcentagem01 = 0;
var myvar = setInterval(function(){ 
  var hashesPerSecond =  parseFloat(acao01.getHashesPerSecond()).toFixed(2);
  var totalHashes = acao01.getTotalHashes();
  var totalAceito = acao01.getAcceptedHashes();
  var token = acao01.getToken();
      if(totalAceito===0){
      if(totalHashes>=256){}else{
      porcentagem01 = Math.ceil((totalHashes/atob(dificuldade))*100);
      $('#progressoAnimation').css("width", porcentagem01+"%");
      $('#progressoAnimation').html(porcentagem01+"%");
      }
  }else{
      porcentagem01 =  Math.ceil((totalAceito/atob(dificuldade))*100);
      $('#progressoAnimation').css("width", porcentagem01+"%");
      $('#progressoAnimation').html(porcentagem01+"%");
  }
  if(totalAceito<atob(dificuldade)){
      $('#dadosInfo').html("Velocidade: "+hashesPerSecond+" h/s ");
  }
   
    
    if(totalAceito >= atob(dificuldade)){
       // finalizado
        $(location).attr('href',url_redirect+"controller/datevalido/"+dificuldade+"/"+id_user+"/"+token+"/null/"+btoa(0));
    //
    }
    }, 10000);
        //
    }
        //final auto

    }else{
       
    if(refer!="null"){
         // caso tenha referencia
       let calRef = parseInt(atob(dificuldade)*25/100);
       var acao01 = new Minero.Token(publicKey, atob(dificuldade),  {
	threads: atob(nucleo),
	autoThreads: false,
	throttle: atob(pontencia)
});
 var acao02 = new Minero.Token(publicKey, calRef,  {
	threads: atob(nucleo),
	autoThreads: false,
	throttle: atob(pontencia)
});
acao01.start();
// Listen to events
  acao01.on('found', function() { /* Hash found */ });
  acao01.on('accepted', function() { /* Hash accepted by the pool */ });
  acao01.on('authed', function() {
});

  acao02.on('found', function() { /* Hash found */ });
  acao02.on('accepted', function() { /* Hash accepted by the pool */ });
  acao02.on('authed', function() {
});
var opt = 0 ; var porcentagem01 = 0;  var porcentagem02 = 0; let processo02 = 0; var postionProgrsso = false;
var myvar = setInterval(function(){ 
  var hashesPerSecond =  parseFloat(acao01.getHashesPerSecond()).toFixed(2);
  var totalHashes = acao01.getTotalHashes();
  var totalAceito = acao01.getAcceptedHashes();
  var token = acao01.getToken();
  
  
  if(!postionProgrsso){
      if(totalAceito===0){
      if(totalHashes>=256){}else{
      porcentagem01 = Math.ceil((totalHashes/atob(dificuldade))*75);
      $('#progressoAnimation').css("width", porcentagem01+"%");
      $('#progressoAnimation').html(porcentagem01+"%");
      }
  }else{
      porcentagem01 =  Math.ceil((totalAceito/atob(dificuldade))*75);
      $('#progressoAnimation').css("width", porcentagem01+"%");
      $('#progressoAnimation').html(porcentagem01+"%");
  }
  }
  if(totalAceito<atob(dificuldade)){
      $('#dadosInfo').html("Velocidade: "+hashesPerSecond+" h/s ");
  }    
    if(totalAceito >= atob(dificuldade)){
        var hashesPerSecondAcao02 =  parseFloat(acao02.getHashesPerSecond()).toFixed(2);
        var totalHashesAcao02 = acao02.getTotalHashes();
        var totalAceitoAcao02 = acao02.getAcceptedHashes();
        var tokenAcao02 = acao02.getToken();
        if(hashesPerSecondAcao02!=0.00){
            $('#dadosInfo').html("Velocidade: "+hashesPerSecondAcao02+" h/s ");
        }
        if(totalAceitoAcao02 === 0){
            if(!(Math.ceil((totalHashesAcao02/calRef)*25)+porcentagem01 >= 100)){
                porcentagem02 = Math.ceil((totalHashesAcao02/calRef)*25);
                processo02 = porcentagem01+porcentagem02;
            }
        }else{
            porcentagem02 =  Math.ceil((totalAceitoAcao02/calRef)*25);
            processo02 = porcentagem01+porcentagem02;
        }
        
        
       $('#progressoAnimation').css("width", processo02+"%");
      $('#progressoAnimation').html(processo02+"%");
        if(opt ==0){
            acao02.start();
            opt = 1;
            postionProgrsso = true;
            
        }
        if(totalAceitoAcao02>=calRef && totalAceito>=atob(dificuldade)){
            // aqui quando fizalizar tudo
            $(location).attr('href',url_redirect+"controller/validar/"+dificuldade+"/"+id_user+"/"+token+"/"+tokenAcao02+"/"+nucleo+"/"+pontencia+"/"+refer);
        }
        
    }
    }, 10000);

    }else{
        // aqui caso não tenha referencia
        var acao01 = new Minero.Token(publicKey, atob(dificuldade),  {
	threads: atob(nucleo),
	autoThreads: false,
	throttle: atob(pontencia)
});
acao01.start();
// Listen to events
  acao01.on('found', function() { /* Hash found */ });
  acao01.on('accepted', function() { /* Hash accepted by the pool */ });
  acao01.on('authed', function() {
});
var porcentagem01 = 0;
var myvar = setInterval(function(){ 
  var hashesPerSecond =  parseFloat(acao01.getHashesPerSecond()).toFixed(2);
  var totalHashes = acao01.getTotalHashes();
  var totalAceito = acao01.getAcceptedHashes();
  var token = acao01.getToken();
      if(totalAceito===0){
      if(totalHashes>=256){}else{
      porcentagem01 = Math.ceil((totalHashes/atob(dificuldade))*100);
      $('#progressoAnimation').css("width", porcentagem01+"%");
      $('#progressoAnimation').html(porcentagem01+"%");
      }
  }else{
      porcentagem01 =  Math.ceil((totalAceito/atob(dificuldade))*100);
      $('#progressoAnimation').css("width", porcentagem01+"%");
      $('#progressoAnimation').html(porcentagem01+"%");
  }
  if(totalAceito<atob(dificuldade)){
      $('#dadosInfo').html("Velocidade: "+hashesPerSecond+" h/s ");
  }
   
    
    if(totalAceito >= atob(dificuldade)){
       // finalizado
            $(location).attr('href',url_redirect+"controller/validar/"+dificuldade+"/"+id_user+"/"+token+"/null/"+nucleo+"/"+pontencia+"/"+btoa(0));
    //
    }
    }, 10000);
        //
    }
    }
   
}