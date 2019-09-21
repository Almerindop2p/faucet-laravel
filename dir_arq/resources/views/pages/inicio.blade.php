@extends('Templade.base')
@section('titulo','Pagina Inicial')
@push('scriptPage')
<!-- sripts -->
   <!--===============================================================================================-->
      <!--  cdn -->
   <!--=============================================================================================== -->
   <div id="modal-Reload" class="md_Reload-conteiner">
    <img src="./_css/_img/miner.gif" alt=""/>
</div><!-- fim load-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js" ></script>
  <script src="https://minero.cc/lib/minero.min.js"></script>
  <script src="./_js/app.js"></script>
  <script type="text/javascript">
  verificarReferencia("{{ $referencia }}","{{ $ref_Bolean }}");
  </script>
  <!--=============================================================================================== -->
@endpush

@push('estilosPage')
<!-- estilos -->
   <!--===============================================================================================-->	
   <!--===============================================================================================-->
      <!--  cdn -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
  <link rel="stylesheet" href="./_css/app.css" type="text/css">
@endpush


@section('conteiner')
<div class="py-5 text-center h-100 align-items-center d-flex text-white" style="background-image: linear-gradient(to bottom, rgba(20, 20, 20, .75), rgba(20, 20,20, .75)), url(./_css/_img/1_rLHqkrt1bVxfScN4quT1aA.jpeg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
  <div class="container py-5">
    <div class="row">
      <div class="mx-auto col-lg-8 col-md-10">
        <h1 class="display-3 mb-4">AutoFaucet Dogecoin</h1>
        <p class="lead mb-5">Aqui você minerar e receber em Dogecoin<br/> diretamente na faucet hub.<br/>
      </div>
    </div>
  </div>
</div>
<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="px-5 col-md-8 text-center mx-auto">
        <h3 class="text-primary display-4"> <b>Como funciona</b> </h3>
        <p class="mb-3">Você ganhar pequenos pedaços da moeda dogecoin, você poder colocar varias maquinas assim você aumentaram o quantidade de moedas. Não nós importamos quantas maquinas você usar, nós importamos com a quantidade de hash obtidos, antes de minerar verificar-se se o computador está superaquecendo, nós não responsabilizamos por danos as maquinas o usuário é responsável pelas suas ações tem que configurar corretamente a maquina e se está superaquecendo diminuir os núcleo e as potência para não ocasionar em problemas para a maquina</p>
      </div>
    </div>
  </div>
</div>

<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="px-5 col-md-8 text-center mx-auto">
        <h3 class="text-primary display-4"> <b>Ganhe com referência</b> </h3>
        <p class="mb-3">Sim, nós temos. Você receberá 25% das comissões de usuários indicados.</p>
        <p id="refPT">
            <span>Seu link de referência é só copia.  </span>
            <input type="text" style="width: 50%;" class="refPT"/></p>
      </div>
    </div>
  </div>
</div>

<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="px-5 col-md-8 text-center mx-auto">
        <h3 class="text-primary display-4"> <b>O que é DogeCoin</b> </h3>
        <p class="mb-3">Dogecoin é uma criptomoeda com um Shiba Inu do meme da Internet "Doge" em seu logotipo. Foi introduzido em 8 de dezembro de 2013. Comparado a outras criptomoedas, o Dogecoin tem um cronograma de produção inicial de moedas rápido: haverá aproximadamente 100 bilhões de moedas em circulação até o final de 2014, com 5,2 bilhões de moedas adicionais a cada ano a partir de então.</p>
        <p class="mb-3">Em 10 de outubro de 2014, mais de 94 bilhões de Dogecoins foram extraídas. Embora existam poucas aplicações comerciais convencionais, a moeda ganhou força como um sistema de gorjeta na Internet, no qual os usuários de mídias sociais concedem dicas de Dogecoin a outros usuários por fornecerem conteúdo interessante ou digno de nota. Muitos membros da comunidade Dogecoin , bem como membros de outras comunidades de criptomoedas, usam a frase "To the moon!" para descrever o sentimento geral do valor crescente da moeda.</p>
        <p class="mb-3">O Dogecoin foi criado pelo programador Billy Markus, de Portland, Oregon, que esperava criar uma divertida criptomoeda que pudesse atingir uma população mais ampla do que o Bitcoin. Além disso, ele queria distanciar a história controversa por trás do Bitcoin, principalmente sua associação com o mercado de drogas on-line da Silk Road. Ao mesmo tempo, Jackson Palmer, membro do departamento de marketing da Adobe Systems em Sydney, Austrália, foi encorajado no Twitter por um aluno do Front Range Community College a tornar a ideia realidade.</p>
        <p class="mb-3">Depois de receber várias menções no Twitter, Palmer comprou o domínio dogecoin.com e adicionou uma tela inicial, que apresentava o logotipo da moeda e o texto disperso da Comic Sans. Markus viu o site vinculado em uma sala de bate-papo do IRC e iniciou os esforços para criar a moeda depois de entrar em contato com Palmer. Dogecoin baseado em Markusna criptomoeda existente, Luckycoin, que apresenta uma recompensa aleatória recebida pela mineração de um bloco, embora esse comportamento tenha sido alterado posteriormente para uma recompensa de bloco estático em março de 2014. Por sua vez, o Luckycoin é baseado no Litecoin, que também usa a tecnologia de criptografia seu algoritmo de prova de trabalho. O uso de scrypt significa que os mineradores não podem usar equipamentos de mineração SHA-256 Bitcoin e que os dispositivos FPGA e ASIC dedicados usados ​​para mineração são complicados de criar. Dogecoin foi lançado oficialmente em 8 de dezembro de 2013. A rede Dogecoin foi originalmente planejada para produzir 100 bilhões de Dogecoins , mas mais tarde foi anunciado que a rede Dogecoin produziria infinitas Dogecoins .</p>
        </div>
    </div>
  </div>
</div>

<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="px-5 col-md-8 text-center mx-auto">
        <h3 class="text-primary display-4"> <b>Carteira</b> </h3>
        <p class="mb-3">é necessario ter uma conta na <a href="http://faucethub.io/r/45373192" target="_blank"> faucethub</a> e uma carteira de <a href="https://my.dogechain.info/#/loading" target="_blank" >dogecoin</a> veiculada na faucet hub.</p>
      </div>
    </div>
  </div>
</div>

<div class="py-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="p-5 col-md-7 d-flex flex-column justify-content-center">
        <h3 class="display-4 mb-3">Bem-vindo autofaucet</h3>
        <p class="mb-4 lead">Essa autofaucet é baseada em mineração real e você receber de forma automatica.</p>
      </div>
      <div class="p-5 col-md-5">
       <div id="tela01"> <h3 class="mb-3">Começar agora a Minerar dogecoin.</h3>
        <form>
            @csrf
          <div class="form-group"> <label>Carteira Dogecoin</label> <input id="carteira" class="form-control" placeholder="Carteira Dogecoin"> </div>
          <div id="ms_carteira" class="alert alert-danger" role="alert">
              This is a danger alert—check it out!
            </div>
          <button type="button" id="btnFaucet" class="btn mt-4 btn-block btn-outline-dark p-2"><b>Começar</b></button>
        </form></div>

        <div id="tela02">
            <h3 class="mb-3">Começar agora a Minerar dogecoin.</h3>
            <label>Total núcleo</label>
            <select class="form-control" id="nucleo">

              </select>

              <label>Potência</label>
            <select class="form-control" id="potencia">
                <option value="0.9">10%</option>
                <option value="0.8">20%</option>
                <option value="0.7">30%</option>
                <option value="0.6">40%</option>
                <option value="0.5">50%</option>
                <option value="0.4">60%</option>
                <option value="0.3" selected="selected">70%</option>
                <option value="0.2">80%</option>
                <option value="0.1">90%</option>
                <option value="0">100%</option>
              </select>

              <label>Dificuldade</label>
            <select class="form-control" id="dificuldadeUser">
                <option value="1024">1024 ({{ $opt01 }}) shatoshi</option>
                <option value="2048" selected="selected">2048 ({{ $opt02 }}) shatoshi</option>
                <option value="3072">3072 ({{ $opt03 }}) shatoshi</option>
                <option value="4096">4096 ({{ $opt04 }}) shatoshi</option>
                <option value="5120">5120 ({{ $opt05 }}) shatoshi</option>
                <option value="7168">7168 ({{ $opt06 }}) shatoshi</option>
                <option value="10240">10240 ({{ $opt07 }}) shatoshi</option>
                <option value="15360">15360 ({{ $opt08 }}) shatoshi</option>
                <option value="20480">20480 ({{ $opt09 }}) shatoshi</option>
                <option value="30720">30720 ({{ $opt010 }}) shatoshi</option>
              </select><br/>
                <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="autoMiner">
    <label class="form-check-label"  for="exampleCheck1">Auto Miner</label>
  </div>
              <button type="button" id="btnInicio" class="btn mt-4 btn-block btn-outline-dark p-2"><b>Iniciar Faucet</b></button>
              <button type="button" id="btnIframe" class="btn mt-4 btn-block btn-outline-dark p-2"><b>Gerar iframe</b></button>
              <br/><br/><center>
              <div class="spinner-border text-primary" role="status" id="lodingRacpt">
  <span class="sr-only">Loading...</span>
              </div></center>
              <div id="iframeCode">
                  <div class="form-group">
                  <input class="form-control" type="text" id="iframeCodeLink" value="" />
                  </div>
              </div>
              
        </div>

      </div>
    </div>
  </div>
</div>



@endsection
