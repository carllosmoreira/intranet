<?php
session_start();
include 'bootstrap-confirm.php';
include 'direciona-para-unset.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Controle Financeiro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Controle Financeiro GMT">
    <meta name="msapplication-tap-highlight" content="no">
    
    <link href="./main.css" rel="stylesheet">

    <script>
        function setEdit_RelacaoLojasRegionais(regional) {
            $(document).ready(function()
            {
                $("#regionalEdit").val(regional);
            });
        }
    </script>

    <script>
        function aposMsg() {
            document.getElementById('modalConfirmacao').style.display='none'
            window.location.href = "cadastro-loja-regional.php";
        }
    </script>
    
</head>
<body>
     <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <?php require 'menu-superior.php';?>
		</div>
        <div class="ui-theme-settings">
            <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
                <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
            </button>
            <div class="theme-settings__inner">
                <div class="scrollbar-container">
                    <div class="theme-settings__options-wrapper">
                        <h3 class="themeoptions-heading">Layout Options
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-header">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Header
                                                </div>
                                                <div class="widget-subheading">Makes the header top fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-sidebar">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Sidebar
                                                </div>
                                                <div class="widget-subheading">Makes the sidebar left fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-footer">
                                                    <div class="switch-animate switch-off">
                                                        <input type="checkbox" data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Footer
                                                </div>
                                                <div class="widget-subheading">Makes the app footer bottom fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>
                                Header Options
                            </div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class" data-class="">
                                Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Choose Color Scheme
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div class="swatch-holder bg-primary switch-header-cs-class" data-class="bg-primary header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-secondary switch-header-cs-class" data-class="bg-secondary header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-success switch-header-cs-class" data-class="bg-success header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-info switch-header-cs-class" data-class="bg-info header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-warning switch-header-cs-class" data-class="bg-warning header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-danger switch-header-cs-class" data-class="bg-danger header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-light switch-header-cs-class" data-class="bg-light header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-dark switch-header-cs-class" data-class="bg-dark header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-focus switch-header-cs-class" data-class="bg-focus header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-alternate switch-header-cs-class" data-class="bg-alternate header-text-light">
                                        </div>
                                        <div class="divider">
                                        </div>
                                        <div class="swatch-holder bg-vicious-stance switch-header-cs-class" data-class="bg-vicious-stance header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-midnight-bloom switch-header-cs-class" data-class="bg-midnight-bloom header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-night-sky switch-header-cs-class" data-class="bg-night-sky header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-slick-carbon switch-header-cs-class" data-class="bg-slick-carbon header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-asteroid switch-header-cs-class" data-class="bg-asteroid header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-royal switch-header-cs-class" data-class="bg-royal header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-warm-flame switch-header-cs-class" data-class="bg-warm-flame header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-night-fade switch-header-cs-class" data-class="bg-night-fade header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-sunny-morning switch-header-cs-class" data-class="bg-sunny-morning header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-tempting-azure switch-header-cs-class" data-class="bg-tempting-azure header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-amy-crisp switch-header-cs-class" data-class="bg-amy-crisp header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-heavy-rain switch-header-cs-class" data-class="bg-heavy-rain header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-mean-fruit switch-header-cs-class" data-class="bg-mean-fruit header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-malibu-beach switch-header-cs-class" data-class="bg-malibu-beach header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-deep-blue switch-header-cs-class" data-class="bg-deep-blue header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-ripe-malin switch-header-cs-class" data-class="bg-ripe-malin header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-arielle-smile switch-header-cs-class" data-class="bg-arielle-smile header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-plum-plate switch-header-cs-class" data-class="bg-plum-plate header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-fisher switch-header-cs-class" data-class="bg-happy-fisher header-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-happy-itmeo switch-header-cs-class" data-class="bg-happy-itmeo header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-mixed-hopes switch-header-cs-class" data-class="bg-mixed-hopes header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-strong-bliss switch-header-cs-class" data-class="bg-strong-bliss header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-grow-early switch-header-cs-class" data-class="bg-grow-early header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-love-kiss switch-header-cs-class" data-class="bg-love-kiss header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-premium-dark switch-header-cs-class" data-class="bg-premium-dark header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-green switch-header-cs-class" data-class="bg-happy-green header-text-light">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>Sidebar Options</div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class" data-class="">
                                Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Choose Color Scheme
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div class="swatch-holder bg-primary switch-sidebar-cs-class" data-class="bg-primary sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-secondary switch-sidebar-cs-class" data-class="bg-secondary sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-success switch-sidebar-cs-class" data-class="bg-success sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-info switch-sidebar-cs-class" data-class="bg-info sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-warning switch-sidebar-cs-class" data-class="bg-warning sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-danger switch-sidebar-cs-class" data-class="bg-danger sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-light switch-sidebar-cs-class" data-class="bg-light sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-dark switch-sidebar-cs-class" data-class="bg-dark sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-focus switch-sidebar-cs-class" data-class="bg-focus sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-alternate switch-sidebar-cs-class" data-class="bg-alternate sidebar-text-light">
                                        </div>
                                        <div class="divider">
                                        </div>
                                        <div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class" data-class="bg-vicious-stance sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class" data-class="bg-midnight-bloom sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-night-sky switch-sidebar-cs-class" data-class="bg-night-sky sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class" data-class="bg-slick-carbon sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-asteroid switch-sidebar-cs-class" data-class="bg-asteroid sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-royal switch-sidebar-cs-class" data-class="bg-royal sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-warm-flame switch-sidebar-cs-class" data-class="bg-warm-flame sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-night-fade switch-sidebar-cs-class" data-class="bg-night-fade sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class" data-class="bg-sunny-morning sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class" data-class="bg-tempting-azure sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class" data-class="bg-amy-crisp sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class" data-class="bg-heavy-rain sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class" data-class="bg-mean-fruit sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class" data-class="bg-malibu-beach sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-deep-blue switch-sidebar-cs-class" data-class="bg-deep-blue sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class" data-class="bg-ripe-malin sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class" data-class="bg-arielle-smile sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-plum-plate switch-sidebar-cs-class" data-class="bg-plum-plate sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class" data-class="bg-happy-fisher sidebar-text-dark">
                                        </div>
                                        <div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class" data-class="bg-happy-itmeo sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class" data-class="bg-mixed-hopes sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class" data-class="bg-strong-bliss sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-grow-early switch-sidebar-cs-class" data-class="bg-grow-early sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-love-kiss switch-sidebar-cs-class" data-class="bg-love-kiss sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-premium-dark switch-sidebar-cs-class" data-class="bg-premium-dark sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-green switch-sidebar-cs-class" data-class="bg-happy-green sidebar-text-light">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>Main Content Options</div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Page Section Tabs
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div role="group" class="mt-2 btn-group">
                                            <button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="body-tabs-line">
                                                Line
                                            </button>
                                            <button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="body-tabs-shadow">
                                                Shadow
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    
					
					
					<div class="scrollbar-sidebar">
						<?php require 'menu-lateral.php';?>
                    </div>
					
                </div>    <div class="app-main__outer">
                    <div class="app-main__inner">
                        
						<div class="app-page-title">
                            <?php require 'menu-paginas.php';?>
                        </div>
                        
                        <div class="tab-content">
                        
                        <!-- Modal -->
                        <div class="modal" id="modalConfirmacao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <?php
                            if (isset($_GET['edit'])) {
                                $_SESSION['idEdit']=$_GET['id'];
                            }
                            
                            if (isset($_POST['totalLojas'])) {
                                
                                    salvaRelacaoLojasRegionais();
                                    if (isset($_SESSION['msg'])) { 
                                        echo "<script type= 'text/javascript'>modalConfirm();</script>";
                                    }
                                
                            }

                            if (isset($_POST['lojaEdit'])) {
                                if (isset($_SESSION['idEdit'])) {
                                    editaRelacaoLojasRegionais();
                                    if (isset($_SESSION['msg'])) { 
                                        echo "<script type= 'text/javascript'>modalConfirm();</script>";
                                        unset($_SESSION['idEdit']);
                                    }
                                }
                            }

                            function salvaRelacaoLojasRegionais(){
                                require_once 'classe-relacao-lojas-regionaisDAO.php';
                                
                                $i = 1;
                                while($i <= $_POST['totalLojas']){
                                    $obj_relacoes = new Classe_Relacao_lojas_regionais_DAO();    
                                    $obj_relacoes->regional = $_POST['regional'.$i];
                                    $obj_relacoes->loja = $_POST['loja'.$i];
                                    $obj_relacoes->data = $_POST['periodo'];
                                    $obj_relacoes->inserir($obj_relacoes);

                                    $i++;
                                }
                            }

                            if (isset($_GET['edit'])) {
                                require_once 'classe-relacao-lojas-regionaisDAO.php';
                                require_once 'classe-regionalDAO.php';
                                require_once 'classe-regional.php';

                                $obj_relacoes = new Classe_Relacao_lojas_regionais_DAO();
                                $recebeRelacaoLojasRegionais = new Relacao_lojas_regionais();
                                $recebeRelacaoLojasRegionais = $obj_relacoes->buscaPorId($_SESSION['idEdit']);
                                
                                $obj_Regional = new Classe_Regional_DAO();

                                $recebeRegional = $obj_Regional->buscaPorId($recebeRelacaoLojasRegionais->regional);
                                
                                echo '<script type="text/javascript">',
                                'setEdit_RelacaoLojasRegionais('.$recebeRegional->idRegional.');',
                                '</script>';
                            }
                            
                            if (isset($_POST['delete'])) { 
                                deletaRelacaoLojasRegionais();
                                if (isset($_SESSION['msg'])) { 
                                    echo "<script type= 'text/javascript'>modalConfirm();</script>";
                                }
                            }
                            
                            function deletaRelacaoLojasRegionais(){
                                
                            }
                            
                            function editaRelacaoLojasRegionais(){
                                require_once 'classe-relacao-lojas-regionaisDAO.php';
                                
                                $obj_relacoes = new Classe_Relacao_lojas_regionais_DAO();
                                $obj_relacoes->idLojasRegionais = $_SESSION['idEdit'];
                                $obj_relacoes->regional = $_POST['regionalEdit'];
                                $obj_relacoes->loja = $_POST['lojaEdit'];
                                $obj_relacoes->data = $_POST['periodoEdit'];
                                $obj_relacoes->atualizar($obj_relacoes);
                            }
                        ?>
                            <div class="modal-dialog-personalizado" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Mensagem</h4>
                                    </div>
                                    
                                        <?php
                                            if (strpos($_SESSION['msg'], 'Erro') !== false) {
                                                echo '<div class="alerta error">';
                                                echo $_SESSION['msg'];
                                                unset($_SESSION['msg']);
                                                echo '</div>';
                                            }
                                            elseif (strpos($_SESSION['msg'], 'sucesso') !== false) {
                                                echo '<div class="alerta sucesso">';
                                                echo $_SESSION['msg'];
                                                unset($_SESSION['msg']);
                                                echo '</div>';
                                            }
                                            elseif (strpos($_SESSION['msg'], 'Nenhum') !== false) {
                                                echo '<div class="alerta atencao">';
                                                echo $_SESSION['msg'];
                                                unset($_SESSION['msg']);
                                                echo '</div>';
                                            }
                                        ?>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="aposMsg();">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        <div id="id01" class="modal">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">x</span>
                            <form class="modal-content-personalizado" action="" method="post" id="deletar-relacao-lojas-regionais">
                                <div class="container">
                                <h1>Deletar Relação</h1>
                                <p>Tem certeza que deseja excluir a relação entre loja e regional?</p>
                                <input type="hidden" id="result" name="result">
                                <div class="clearfix">
                                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
                                    <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn" id="delete" name="delete">Deletar</button>
                                </div>
                                </div>
                            </form>
                        </div>
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <?php
                                            if (isset($_GET['definicoes'])) {
                                                require_once 'classe-relacao-lojas-regionaisDAO.php';
                                                $obj_lojasregionais = new Classe_Relacao_lojas_regionais_DAO();
                                                $listaLojasRegionais = $obj_lojasregionais->listarPorMes($_POST['mes'], $_POST['ano']);
                                                if(sizeof($listaLojasRegionais) > 0){
                                                    $_SESSION['msg'] = "Nenhum novo lançamento pode ser definido para esse período novamente.
                                                      Localize-os abaixo caso deseje editá-los.";
                                                    if (isset($_SESSION['msg'])) { 
                                                        echo "<script type= 'text/javascript'>modalConfirm();</script>";
                                                    }
                                                }
                                            }

                                                $definindoMes = null;
                                                $definindoMesEdit = null;
                                            ?>
                                            <?php
                                            if (isset($_GET['definicoes'])) {
                                                switch ($_POST[mes]) {
                                                    case 1:
                                                        $definindoMes = "Janeiro";
                                                      break;
                                                    case 2:
                                                        $definindoMes = "Fevereiro";
                                                      break;
                                                    case 3:
                                                        $definindoMes = "Março";
                                                      break;
                                                    case 4:
                                                        $definindoMes = "Abril";
                                                    break;
                                                    case 5:
                                                        $definindoMes = "Maio";
                                                    break;
                                                    case 6:
                                                        $definindoMes = "Junho";
                                                    break;
                                                    case 7:
                                                        $definindoMes = "Julho";
                                                    break;
                                                    case 8:
                                                        $definindoMes = "Agosto";
                                                    break;
                                                    case 9:
                                                        $definindoMes = "Setembro";
                                                    break;
                                                    case 10:
                                                        $definindoMes = "Outubro";
                                                    break;
                                                    case 11:
                                                        $definindoMes = "Novembro";
                                                    break;
                                                    default:
                                                    $definindoMes = "Dezembro";
                                                  }
                                            }elseif (isset($_GET['edit'])) { 
                                                switch ($_GET[mes]) {
                                                    case 1:
                                                        $definindoMesEdit = "Janeiro";
                                                      break;
                                                    case 2:
                                                        $definindoMesEdit = "Fevereiro";
                                                      break;
                                                    case 3:
                                                        $definindoMesEdit = "Março";
                                                      break;
                                                    case 4:
                                                        $definindoMesEdit = "Abril";
                                                    break;
                                                    case 5:
                                                        $definindoMesEdit = "Maio";
                                                    break;
                                                    case 6:
                                                        $definindoMesEdit = "Junho";
                                                    break;
                                                    case 7:
                                                        $definindoMesEdit = "Julho";
                                                    break;
                                                    case 8:
                                                        $definindoMesEdit = "Agosto";
                                                    break;
                                                    case 9:
                                                        $definindoMesEdit = "Setembro";
                                                    break;
                                                    case 10:
                                                        $definindoMesEdit = "Outubro";
                                                    break;
                                                    case 11:
                                                        $definindoMesEdit = "Novembro";
                                                    break;
                                                    default:
                                                    $definindoMesEdit = "Dezembro";
                                                  }
                                            }
                                            ?>
                                            <div class="card-body"><h5 class="card-title">Cadastro - Lojas e Regionais</h5> 
                                            <h5>
                                            <?php
                                                if (isset($_GET['definicoes'])) { 
                                                    echo '<br>Período a ser definido: '.$definindoMes.'-'.$_POST[ano];
                                                }elseif (isset($_GET['edit'])) {
                                                    echo '<br>Período a ser definido: '.$definindoMesEdit.'-'.$_GET[ano];
                                                }
                                            ?></h5>
                                            <?php
                                                if (isset($_GET['definicoes'])) {
                                                    
                                                    require_once 'classe-lojaDAO.php';
                                                    require_once 'classe-regionalDAO.php';
                                                    
                                                    $obj_lojas = new Classe_Loja_DAO();
                                                    $lista_lojas = $obj_lojas->listar();

                                                    $obj_regionais = new Classe_Regional_DAO();
                                                    $lista_regionais = $obj_regionais->listar();

                                                    

                                                    echo '<form class="" action="cadastro-relacao-lojas-regionais.php" method="post" id="cadastrar-relacao-lojas-regionais">';
                                                    
                                                    $i = 1;
                                                    $j = 0;
                                                    while($i <= sizeof($lista_lojas)){
                                                            echo '
                                                            <div class="form-row">
                                                                <div class="col-md-5">
                                                                    <div class="position-relative form-group"><label for="loja" class="">Loja</label>
                                                                        <select class="form-control" id="loja'.$i.'" name="loja'.$i.'">';
                                                                            echo "<option selected='' id=".$lista_lojas[$j]->idLoja." value=".$lista_lojas[$j]->idLoja.">".$lista_lojas[$j]->nomeLoja."</option>";
                                                                        echo '</select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group"><label for="regional" class="">Regional</label>
                                                                        <select class="form-control" id="regional'.$i.'" name="regional'.$i.'">';
                                                                        foreach ($lista_regionais as $indice => $each) {
                                                                            echo "<option id=".$each->idRegional." value=".$each->idRegional.">".$each->regional."</option>";
                                                                        }
                                                                        echo '</select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            ';
                                                            $i++;
                                                            $j++;
                                                    }
                                                    $ano = $_POST['ano'];
                                                    $mes = $_POST['mes'];
                                                    $periodo = "'$ano-$mes-01'";
                                                    echo '<input type="hidden" id="totalLojas" name="totalLojas" value="'.sizeof($lista_lojas).'">';
                                                    echo '<input type="hidden" id="periodo" name="periodo" value="'.$periodo.'">';
                                                    echo '<input type="submit" name="submit" />
                                                    </form>
                                                    ';
                                                } elseif (isset($_GET['edit'])) {
                                                    require_once 'classe-regionalDAO.php';
                                                    require_once 'classe-relacao-lojas-regionaisDAO.php';
                                                    require_once 'classe-lojaDAO.php';
                                                    
                                                    $obj_regionais = new Classe_Regional_DAO();
                                                    $lista_regionais = $obj_regionais->listar();


                                                    $obj_lojasregionais = new Classe_Relacao_lojas_regionais_DAO();
                                                    $recebeLojasRegionais = $obj_lojasregionais->buscaPorId($_GET['id']);

                                                    $obj_lojas = new Classe_Loja_DAO();
                                                    $recebeLojas = new Loja();
                                                    $recebeLojas = $obj_lojas->buscaPorId($recebeLojasRegionais->loja);

                                                    echo '<form class="" action="cadastro-relacao-lojas-regionais.php" method="post" id="editar-relacao-lojas-regionais">';
                                                    
                                                    
                                                            echo '
                                                            <div class="form-row">
                                                                <div class="col-md-5">
                                                                    <div class="position-relative form-group"><label for="loja" class="">Loja</label>
                                                                        <select class="form-control" id="lojaEdit" name="lojaEdit">';
                                                                            echo "<option selected='' id='".$recebeLojas->idLoja."' value='".$recebeLojas->idLoja."'>".$recebeLojas->nomeLoja."</option>";
                                                                        echo '</select>
                                                                    </div>
                                                                </div>';

                                                            
                                                                echo'
                                                                <div class="col-md-4">
                                                                    <div class="position-relative form-group"><label for="regional" class="">Regional</label>
                                                                        <select class="form-control" id="regionalEdit" name="regionalEdit">';
                                                                        foreach ($lista_regionais as $indice => $each) {
                                                                            echo "<option id=".$each->idRegional." value=".$each->idRegional.">".$each->regional."</option>";
                                                                        }
                                                                        echo '</select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            ';
                                                            $anoEdit = $_GET['ano'];
                                                            $mesEdit = $_GET['mes'];
                                                            $periodoEdit = "'$anoEdit-$mesEdit-01'";
                                                            echo '<input type="hidden" id="periodoEdit" name="periodoEdit" value="'.$periodoEdit.'">';
                                                    echo '<input type="submit" name="submit" />
                                                    </form>
                                                    ';
                                                }
                                                ?>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <div class="app-wrapper-footer">
                        <?php require 'footer.php';?>
                    </div>    
				</div>
                
        </div>
    </div>

<script type="text/javascript" src="./assets/scripts/main.js"></script>




</body>
</html>
