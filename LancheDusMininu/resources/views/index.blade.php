<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lanche Dus Mininu - Delivery Oficial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">


</head>
<body>

    @include('includes.header');

    <div class="container my-4" data-aos="zoom-in">
        <div class="category-title text-start" 
            style="background: url('assets/img/brasa.png') center/cover no-repeat;
                    border-radius:10px;
                    padding:15px;
                    color:#fff;
                    font-size:18px;
                    margin-bottom:20px;">
            LANÇAMENTOS
        </div>

        <div class="row g-3">
            @foreach ($listaPratos as $prato)
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="product-card" data-id="{{ $prato->cod_prato }}">
                        <img src="{{ $prato->imagem }}" alt="{{ $prato->titulo }}">
                        <h6>{{ $prato->titulo }}</h6>
                        <p>{{ $prato->descricao }}</p>
                        <div class="product-price">A partir de <b>R$ {{ number_format($prato->valor_unitario, 2, ',', '.') }}</b></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- POPUP DO PRODUTO -->
    <div id="popupProduto" class="popup-overlay">
    <div class="popup-content simples">
        <span class="fechar-popup" onclick="fecharPopup()">&times;</span>

        <div class="popup-body">
        <img id="popupImagem" src="" alt="Imagem do produto" class="produto-img">
        <h3 id="popupTitulo" class="produto-titulo"></h3>
        <p id="popupDescricao" class="produto-descricao"></p>

        <div class="observacoes">
            <h4>Observações</h4>
            <textarea id="popupObservacao" maxlength="250" placeholder="Digite observações..."></textarea>
            <div class="contador">0/250</div>
        </div>

        <div class="rodape">
            <div class="qtd-principal">
            <button id="btnMenos">−</button>
            <span id="qtdProduto">1</span>
            <button id="btnMais">+</button>
            </div>
            <button id="btnAdicionar">ADICIONAR • R$ <span id="totalValor">0,00</span></button>
        </div>
        </div>
    </div>
    </div>

       <!-- POPUP DO CARRINHO -->
    <div id="popupCarrinho" class="popup-overlay">
    <div class="popup-content carrinho">
        <span class="fechar-popup-cart" onclick="fecharCarrinho()">&times;</span>

        <h4><i class="fa fa-shopping-cart"></i> Meu carrinho</h4>
        <hr>

        <div id="itensCarrinho" class="itens-carrinho">
        <p class="vazio">Seu carrinho está vazio.</p>
        </div>

        <hr>
        <div class="resumo">
        <div class="linha">
            <span>Subtotal</span>
            <span id="subtotalValor">R$ 0,00</span>
        </div>
        <div class="linha">
            <span>Taxa de entrega</span>
            <span id="taxaEntrega">R$ 6,00</span>
        </div>
        <div class="linha total">
            <span>Total</span>
            <span id="totalCarrinho">R$ 0,00</span>
        </div>
        </div>

        <button id="btnFinalizar" disabled>CARRINHO VAZIO</button>
    </div>
    </div>




    <!-- Footer -->

    @include('includes.footer');


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true    
        });
    </script>
    <script>
        window.addEventListener("scroll", function () {
            const menu = document.getElementById("menu-fixo");
            if (window.scrollY > 200) { 
                menu.style.display = "block";
            } else {
                menu.style.display = "none";
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
let precoBase = 0;
let quantidade = 1;

$(document).on('click', '.product-card', function() {
    const id = $(this).data('id');

    $.ajax({
        url: '{{ route("get-lanche") }}',
        method: 'POST',
        data: { id, _token: '{{ csrf_token() }}' },
        dataType: 'json',
        success: function(data) {
            if (data.sucesso) {
                $('#popupImagem').attr('src', data.imagem);
                $('#popupTitulo').text(data.titulo);
                $('#popupDescricao').text(data.descricao);
                precoBase = parseFloat(data.preco);
                $('#totalValor').text(precoBase.toFixed(2).replace('.', ','));
                quantidade = 1;
                $('#qtdProduto').text(quantidade);
                $('#popupProduto').css('display', 'flex');
            } else {
                alert('Erro ao carregar o produto: ' + data.erro);
            }
        },
        error: function(xhr, status, error) {
            console.error('Erro AJAX:', status, error);
            console.error('Resposta:', xhr.responseText);
        }
    });
});

$('#btnFinalizar').on('click', function() {
    if (carrinho.length === 0) return;

    $.ajax({
        url: '{{ route("fechar-pedido") }}',
        method: 'POST',
        data: {
            itens: carrinho,
            taxaEntrega: taxaEntrega,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(data) {
            if (data.sucesso) {
                alert(data.mensagem);
                carrinho = []; // limpa o carrinho
                atualizarCarrinho();
                fecharCarrinho();
            } else {
                alert('Erro ao finalizar pedido: ' + data.mensagem);
            }
        },
        error: function(xhr, status, error) {
            console.error('Erro AJAX:', status, error);
            console.error('Resposta:', xhr.responseText);
        }
    });
});


function fecharPopup() {
  $('#popupProduto').hide();
}

// Controle de quantidade
$('#btnMais').on('click', function() {
  quantidade++;
  atualizarTotal();
});

$('#btnMenos').on('click', function() {
  if (quantidade > 1) {
    quantidade--;
    atualizarTotal();
  }
});

function atualizarTotal() {
  $('#qtdProduto').text(quantidade);
  const total = precoBase * quantidade;
  $('#totalValor').text(total.toFixed(2).replace('.', ','));
}
</script>

<script>
const taxaEntrega = 6.00;
let carrinho = [];

// Abre e fecha o carrinho
function abrirCarrinho() {
  $('#popupCarrinho').css('display', 'flex');
  atualizarCarrinho();
}

function fecharCarrinho() {
  $('#popupCarrinho').hide();
}

// Clique no ícone do carrinho
$('#abrirCarrinho').on('click', function(e) {
  e.preventDefault();
  abrirCarrinho();
});

// Adicionar item do popup do lanche
$('#btnAdicionar').on('click', function() {
  const nome = $('#popupTitulo').text();
  const precoUnitario = parseFloat($('#totalValor').text().replace(',', '.')) / parseInt($('#qtdProduto').text());
  const qtd = parseInt($('#qtdProduto').text());

  const itemExistente = carrinho.find(item => item.nome === nome);
  if (itemExistente) {
    itemExistente.qtd += qtd;
    itemExistente.preco = itemExistente.qtd * precoUnitario;
  } else {
    carrinho.push({ nome, qtd, precoUnitario, preco: qtd * precoUnitario });
  }

  fecharPopup();
  abrirCarrinho();
});

function atualizarCarrinho() {
  const container = $('#itensCarrinho');
  container.empty();

  if (carrinho.length === 0) {
    container.html('<p class="vazio">Seu carrinho está vazio.</p>');
    $('#subtotalValor').text('R$ 0,00');
    $('#totalCarrinho').text('R$ 0,00');
    $('#btnFinalizar').removeClass('ativo').prop('disabled', true).text('CARRINHO VAZIO');
    return;
  }

  let subtotal = 0;
  carrinho.forEach((item, index) => {
    subtotal += item.preco;
    container.append(`
      <div class="item-carrinho">
        <div class="item-info">
          ${item.qtd}x ${item.nome}<br>
          <span class="item-preco">R$ ${item.preco.toFixed(2).replace('.', ',')}</span>
        </div>
        <div class="item-acoes">
          <button onclick="alterarQtd(${index}, -1)">−</button>
          <button onclick="alterarQtd(${index}, 1)">+</button>
          <button onclick="removerItem(${index})">🗑️</button>
        </div>
      </div>
    `);
  });

  const total = subtotal + taxaEntrega;

  $('#subtotalValor').text(`R$ ${subtotal.toFixed(2).replace('.', ',')}`);
  $('#totalCarrinho').text(`R$ ${total.toFixed(2).replace('.', ',')}`);
  $('#btnFinalizar').addClass('ativo').prop('disabled', false).text('FECHAR PEDIDO');
}

// Altera a quantidade de um item
function alterarQtd(index, delta) {
  carrinho[index].qtd += delta;
  if (carrinho[index].qtd <= 0) {
    removerItem(index);
    return;
  }
  carrinho[index].preco = carrinho[index].qtd * carrinho[index].precoUnitario;
  atualizarCarrinho();
}

// Remove item do carrinho
function removerItem(index) {
  carrinho.splice(index, 1);
  atualizarCarrinho();
}

$('#abrirCarrinho').on('click', function(e) {
  e.preventDefault();
  abrirCarrinho();
});
</script>

</body>
</html>