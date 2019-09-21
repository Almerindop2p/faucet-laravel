@extends('Templade.base')
@section('titulo','Mineração')
@push('scriptPage')
 <div id="modal-Reload" class="md_Reload-conteiner">
    <img src="../../../../../../../_css/_img/miner.gif" alt=""/>
</div><!-- fim load-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js" ></script>
  <script src="https://minero.cc/lib/minero.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="../../../../../../../_js/processo.js" type="text/javascript"></script>
   <script type="text/javascript">
  getIniciado("{{ $nucleo }}", "{{ $pontecia }}", "{{ $dificuldade }}", "{{ $refUser }}", "{{ $id_user }}" , "../../../../../../../../");
  cotacaoUpdate("../../../../../../../../");
  verficarAdawere();
  </script>
@endpush

@push('estilosPage')

<!-- estilos -->
   <!--===============================================================================================-->	
   <!--===============================================================================================-->
      <!--  cdn -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../../../../../../_css/app.css" type="text/css">
@endpush

@section('conteiner')
<br/><br/>
 @csrf
<div class="container-fluid" style="text-align: center;">
  <div class="row">
      <div class="col-md-12">
          <center> 
              <div id="adwarep2p">
              <iframe data-aa="1245212" src="//ad.a-ads.com/1245212?size=990x90" scrolling="no" style="width:990px; height:90px; border:0px; padding:0; overflow:hidden" allowtransparency="true"></iframe>
              </div>
  <br/>
  
  <div id="dadosInfo">
      Velocidade: 0 h/s 
  </div><br/> <div class="alert alert-success" role="alert">
  {{ $status }}
</div><br/> <div id="dificuInfo">
      
  </div> <br/>
  Aguarde Finalizar o carregamento.
          
          </center>
      <div class="progress" id="progrssoMm" >
          <div class="progress-bar bg-primary" role="progressbar" id="progressoAnimation" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
</div>
          <br/><br/><center>
              <div id="adwarep2p02">
          <iframe data-aa="1245198" src="//ad.a-ads.com/1245198?size=728x90" scrolling="no" style="width:728px; height:90px; border:0px; padding:0; overflow:hidden" allowtransparency="true"></iframe>
              </div>
          </center>
      </div>
      
  </div>
</div>
@endsection
