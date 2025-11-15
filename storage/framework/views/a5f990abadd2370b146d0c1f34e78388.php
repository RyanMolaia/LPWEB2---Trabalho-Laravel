<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Painel Administrativo - MLCAR</title>

    <!-- Fontes e ícones -->
    <link href="/menuadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <!-- Estilo principal do SB Admin -->
    <link href="/menuadmin/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        :root {
            --mlcar-gold: #d4af37;
            --mlcar-dark: #343a40;
            --mlcar-light: #f5f5f5;
            --mlcar-hover: #4b4b4b;
        }

        .btn:focus, .btn:active,
        .dropdown-item:active, .dropdown-item:focus,
        .form-control:focus,
        .page-link:focus, .page-link:active {
            box-shadow: none !important;
            outline: none !important;
            background-color: var(--mlcar-gold) !important;
            color: var(--mlcar-dark) !important;
        }

        .dropdown-item:hover {
            background-color: var(--mlcar-hover) !important;
            color: white !important;
        }

        .btn:focus-visible {
            outline: none !important;
            box-shadow: none !important;
        }

        .sidebar {
            background-color: var(--mlcar-dark) !important;
        }

        .sidebar .nav-item .nav-link {
            color: var(--mlcar-gold);
            transition: 0.3s;
        }

        .sidebar .nav-item .nav-link:hover {
            background-color: var(--mlcar-hover);
            color: white !important;
        }

        .sidebar .sidebar-brand {
            color: var(--mlcar-gold) !important;
        }

        .topbar {
            background-color: var(--mlcar-light) !important;
        }

        .topbar .nav-link, .topbar .navbar-brand {
            color: var(--mlcar-dark) !important;
        }

        .btn-primary {
            background-color: var(--mlcar-gold);
            border: none;
            color: var(--mlcar-dark);
        }

        .btn-primary:hover {
            background-color: #c5a32f;
            color: white;
        }

        footer.sticky-footer {
            background-color: var(--mlcar-light) !important;
            color: var(--mlcar-dark);
        }
        
        .sidebar-brand-icon img {
            width: 60px;
            height: 60px;
        }
    </style>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand-icon text-center mb-2 mt-2">
                <i class="fa-solid fa-building fa-2x" style="color: var(--mlcar-gold);"></i>
            </div>

            <hr class="sidebar-divider my-0">

             <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(route('site.index')); ?>">
                    <i class="fa-solid fa-bars "></i>
                    <span>Voltar ao site</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(route('menuadmin.index')); ?>">
                    <i class="fa-solid fa-bars "></i>
                    <span>Menu Principal</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Páginas
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('carros.index')); ?>">
                    <i class="fa-solid fa-car"></i>
                    <span>Veículos</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('marcas.index')); ?>">
                    <i class="fa-solid fa-tags"></i>
                    <span>Marcas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('modelos.index')); ?>">
                    <i class="fa-solid fa-layer-group"></i>
                    <span>Modelos</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('cores.index')); ?>">
                    <i class="fa-solid fa-palette"></i>
                    <span>Cores</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('usuarios.index')); ?>">
                    <i class="fa-solid fa-palette"></i>
                    <span>Usuarios</span>
                </a>
            </li>


            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light mb-4 shadow" style="background-color: #343a40; height: 70px;">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 text-light">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- User -->
                        <li class="nav-item dropdown no-arrow w-100">
                            <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-end px-3"
                            href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            style="background-color: #343a40; height: 60px;">
                            
                                <span class="mr-3 fw-bold" style="font-size: 1rem; color: #c9a227;"><?php echo e(Auth::user()->name); ?></span>
                                <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center"
                                    style="width: 40px; height: 40px; border: 2px solid #c9a227;">
                                    <i class="fas fa-user" style="color: #c9a227; font-size: 1.2rem;"></i>
                                </div>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in mt-2"
                                aria-labelledby="userDropdown"
                                style="background-color: #343a40; border: 1px solid #c9a227;">
                                
                                <a class="dropdown-item text-light" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2" style="color: #c9a227;"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item text-light" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2" style="color: #c9a227;"></i>
                                    Sair
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <?php echo $__env->yieldContent("conteudo"); ?>
                </div>
            </div>

            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto">
                        <span>© MLCAR 2025 - Todos os direitos reservados</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scroll to Top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h5 class="modal-title">Deseja sair?</h5>
                    <button class="close" type="button" data-dismiss="modal">
                        <span>×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione sair para desconectar sua conta</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="<?php echo e(route('logout')); ?>">Sair</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="/menuadmin/vendor/jquery/jquery.min.js"></script>
    <script src="/menuadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/menuadmin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/menuadmin/js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\Workspace_local\Laravel\vendaCarros\resources\views/template_menus/index.blade.php ENDPATH**/ ?>