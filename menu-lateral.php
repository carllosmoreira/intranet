<?php
session_start();
include 'direciona-para-unset.php';
?>
<div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Rede</li>
                                <li>
                                    <a href="index.php" onclick="redireciona('unset-sessions.php');" class="mm-active">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Principais Dashboards
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-car"></i>
                                        Cadastros
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                        <a href="cadastro-loja.php" onclick="redireciona('unset-sessions.php');">
                                            <i class="metismenu-icon pe-7s-mouse">
                                            </i>Lojas
                                        </a>
                                        </li>
                                        <li>
                                            <a href="cadastro-regionais.php" onclick="redireciona('unset-sessions.php');">
                                                <i class="metismenu-icon pe-7s-mouse">
                                                </i>Regionais
                                            </a>
                                        </li>
                                        <li>
                                            <a href="cadastro-loja-regional.php" onclick="redireciona('unset-sessions.php');">
                                                <i class="metismenu-icon pe-7s-mouse">
                                                </i>Lojas e regionais
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="app-sidebar__heading">Financeiras</li>
                                
                                <li  >
                                    <a href="tables-regular.html" onclick="redireciona('unset-sessions.php');">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Lojas
                                    </a>
                                </li>

                                <li  >
                                    <a href="tables-regular.html" onclick="redireciona('unset-sessions.php');">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Gestão BKO
                                    </a>
                                </li>

                                <li class="app-sidebar__heading">Não Conformidades</li>
                                <li>
                                    <a href="nao-conformidades.php" onclick="redireciona('unset-sessions.php');">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Não Conformidades
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Ponto de Controle</li>
                                <li>
                                    <a href="forms-controls.html" onclick="redireciona('unset-sessions.php');">
                                        <i class="metismenu-icon pe-7s-mouse">
                                        </i>Lojas
                                    </a>
                                </li>
                                <li>
                                    <a href="forms-layouts.html" onclick="redireciona('unset-sessions.php');">
                                        <i class="metismenu-icon pe-7s-eyedropper">
                                        </i>Regionais
                                    </a>
                                </li>
                                <li>
                                    <a href="metas-consultores.php" onclick="redireciona('unset-sessions.php');">
                                        <i class="metismenu-icon pe-7s-eyedropper">
                                        </i>Metas
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Check-lists</li>
                                <li>
                                    <a href="check-lists.php" onclick="redireciona('unset-sessions.php');">
                                        <i class="metismenu-icon pe-7s-mouse">
                                        </i>Check-lists
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>