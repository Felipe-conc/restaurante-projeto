<!-- Header -->
    <div class="header" data-aos="fade-down">
        <div class="header-overlay d-flex justify-content-between w-100">
            <div class="store-info d-flex align-items-center">
                <img src="assets/img/logo.png">
                <div class="ms-2">
                    <h3>Lanche Dus Mininu</h3>
                    <p>RUA DOS BOBOS, 0 - Adamantina, SP</p>
                    <span class="badge" style="background:#24d556;">Aberto até 23:59</span>
                </div>
            </div>
            <div class="text-end">
                @if(session()->has('usuario'))
                @php
                    $usuario = session('usuario');  
                    $nome = $usuario['nome_usuario'];
                @endphp
                    <a href="" class="text-white me-2" style="text-decoration:none;">
                        <i class="fa fa-user" style="font-size:22px; margin-right: 10px;"></i> Olá, {{ $nome }}
                    </a>
                    <a href="{{ route('sair') }}" class="text-white" style="text-decoration:none;">                    
                        <i class="bi bi-door-open-fill" style="font-size:22px; margin-right: 10px;"></i> Sair
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-white me-2" style="text-decoration:none;">
                        <i class="fa fa-user" style="font-size:22px; margin-right: 10px;"></i> Entre ou Cadastre-se
                    </a>
                @endif
                    <span class="text-white mx-2">|</span>
                    <a href="#" id="abrirCarrinho" class="text-white" style="text-decoration:none;">                    
                        <i class="fa fa-shopping-cart" style="font-size:22px;"></i>
                    </a>                    
            </div>
        </div>
    </div>

    <!-- Barra de info -->
    <div class="container">
        <div class="info-bar d-flex justify-content-between flex-wrap" data-aos="fade-up">
            <div>🚴 <b>ENTREGA</b> <span class="ms-2">até 1h • R$ 6,00</span></div>
            <div>Ganhe <span style="color:#190c00;">15% de desconto</span> no primeiro pedido</div>
        </div>
    </div>

    <!-- Busca -->
    <!-- Campo de busca otimizado -->
    <!-- Campo de busca otimizado -->
    <div class="container my-3" style="max-width:500px;">
        <div class="input-group">
            <span class="input-group-text bg-white border-end-0"
                style="border-radius:30px 0 0 30px; box-shadow:0 2px 5px rgba(0,0,0,0.15);">
                <i class="fa fa-search" style="font-size:22px; color:#888;"></i>
            </span>
            <input type="text" class="form-control border-start-0" placeholder="Busque por um item na loja"
                style="height:42px; border-radius:0 30px 30px 0; box-shadow:0 2px 5px rgba(0,0,0,0.15);">
        </div>
    </div>

    <!-- MENU FIXO QUE SURGE AO ROLAR -->
    <nav id="menu-fixo" class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top"
        style="display:none; padding:6px 200px;">
        <div class="container-fluid">
            <!-- Logo esquerda -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="assets/img/logo.png" alt="Logo" style="height: 60px; border-radius:6px;">
                <span class="ms-2 fw-bold"></span>
            </a>

            <!-- Barra de pesquisa central -->
            <form class="d-flex mx-auto" style="max-width:500px; flex-grow:1;">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"
                        style="border-radius:30px 0 0 30px; box-shadow:0 2px 5px rgba(0,0,0,0.15);">
                        <i class="fa fa-search" style="font-size:20px; color:#888;"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" placeholder="Busque por um item"
                        style="height:38px; border-radius:0 30px 30px 0; box-shadow:0 2px 5px rgba(0,0,0,0.15);">
                </div>
            </form>

            <!-- Links direita -->
            <div class="d-flex align-items-center">

            
                @if(session()->has('usuario'))
                    @php
                        $usuario = session('usuario');
                        $nome = $usuario['nome_usuario'];
                    @endphp

                    <a href="#" class="text-dark me-3" style="text-decoration:none;">
                        <i class="fa fa-user" style="font-size:20px; margin-right:6px;"></i> Olá, {{ $nome }}
                    </a>
                    <a href="{{ route('sair') }}" class="text-dark me-3" style="text-decoration:none;">
                        <i class="bi bi-door-open-fill" style="font-size:20px; margin-right:6px;"></i> Sair
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-dark me-2" style="text-decoration:none;">
                        <i class="fa fa-user" style="font-size:20px; margin-right:6px;"></i> Entrar
                    </a>
                    <span class="text-muted mx-2">|</span>
                    <a href="{{ route('cadUsuario') }}" class="text-dark me-3" style="text-decoration:none;">
                        <i class="fa fa-user-plus" style="font-size:20px; margin-right:6px;"></i> Cadastrar
                    </a>
                @endif

                <span class="text-muted mx-2">|</span>
                <a href="#" id="abrirCarrinho" class="text-dark" style="text-decoration:none;">
                    <i class="fa fa-shopping-cart" style="font-size:22px;"></i>
                </a>


                <!-- <a href="{{ route('login') }}" class="text-dark me-2" style="text-decoration:none;">
                    <i class="fa fa-user" style="font-size:20px;"></i> Entrar
                </a>
                <span class="text-muted mx-2">|</span>
                <a href="{{ route('cadUsuario') }}" class="text-dark me-3" style="text-decoration:none;">
                    <i class="fa fa-user-plus" style="font-size:20px;"></i> Cadastrar
                </a>
               <a href="#" id="abrirCarrinho" class="text-dark" style="text-decoration:none;">
                <i class="fa fa-shopping-cart" style="font-size:22px;"></i>
                </a> -->

            </div>
        </div>
    </nav>