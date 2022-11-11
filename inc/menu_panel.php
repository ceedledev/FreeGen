            <div class="left-side-menu">
                <a href="/" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="/assets/images/logo.png" alt="Logo" height="55">
                    </span>
                    <span class="logo-sm">
                        <img src="/assets/images/logo_sm.png" alt="Logo" height="45">
                    </span>
                </a>

                <a href="/" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="/assets/images/logo.png" alt="Logo" height="55">
                    </span>
                    <span class="logo-sm">
                        <img src="/assets/images/logo_sm_dark.png" alt="Logo" height="45">
                    </span>
                </a>
    
                <div class="h-100" id="left-side-menu-container" data-simplebar>
                    <ul class="metismenu side-nav">
                        <li class="side-nav-title side-nav-item">👨‍💻 Menu</li>

                        <li class="side-nav-item">
                            <a href="/dashboard" class="side-nav-link">
                                <i class="uil-home-alt text-primary"></i>
								 <span class="badge badge-danger float-right ">Nouveaux</span>
                                <span>Dashboard </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="/" class="side-nav-link">
                                <i class="uil-cloud-computing text-primary"></i>
                                <span class="badge badge-primary float-right"><?=get_generateurs() ?></span>
                                <span>Générateurs</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="/indexvip" class="side-nav-link">
                                <i class="uil-suitcase  text-primary "></i>
								 <span class="badge badge-primary float-right"><?=get_generateursvip() ?></span>
                                <span>Générateurs VIP</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="/infos" class="side-nav-link">
                                <i class="uil-comment-info text-primary"></i>
                                <span>Informations</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="/classement" class="side-nav-link">
                                <i class="uil-chart  text-primary"></i>
                                <span>Classement</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="/faq" class="side-nav-link">
                                <i class="uil-clipboard-alt text-primary"></i>
                                <span>Faq</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="/timeline" class="side-nav-link">
                                <i class="uil-history-alt text-primary"></i>
                                <span>Timeline</span>
                            </a>
                        </li>
                        <li class="side-nav-title side-nav-item">🏆 VIP</li>
                        <li class="side-nav-item">
                            <a href="/vip" class="side-nav-link">
                                <i class="uil-bill text-primary"></i>
                                <span>Acheter</span>
                            </a>
						

                            <?php if (permissions($utilisateur['grade'], 'index')) { ?>
                        <li class="side-nav-title side-nav-item mt-1">💼 Espace Admin <span class="badge badge-danger float-right ">Nouveaux</span></li>
                        
                        <li class="side-nav-item">
                            <a href="javascript: void(0);" class="side-nav-link">
                                <i class="uil-cog"></i>
                                <span>Panel</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="side-nav-second-level" aria-expanded="false">
                                <?php if (permissions($utilisateur['grade'], 'index')) { ?>
                                <li><a href="/admin/index">Tableau de bord</a></li>
                                <?php } ?>
                                <?php if (permissions($utilisateur['grade'], 'alerts')) { ?>
                                <li><a href="/admin/alerts">Alerts</a></li>
                                <?php } ?>
                                <?php if (permissions($utilisateur['grade'], 'generateurs')) { ?>
                                <li><a href="/admin/generateurs">Générateurs</a></li>
                                <?php } ?>
                                <?php if (permissions($utilisateur['grade'], 'generateurs')) { ?>
                                <li><a href="/admin/generateursvip">Générateurs VIP</a></li>
                                <?php } ?>
                                <?php if (permissions($utilisateur['grade'], 'utilisateurs')) { ?>
                                <li><a href="/admin/utilisateurs">Utilisateurs</a></li>
                                <?php } ?>
                                <?php if (permissions($utilisateur['grade'], 'configuration')) { ?>
                                <li><a href="/admin/configuration">Configuration Générale</a></li>
                                <?php } ?>
                                <?php if (permissions($utilisateur['grade'], 'paiements')) { ?>
                                <li><a href="/admin/paiements">Historique des paiements</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                        <?php if (permissions($utilisateur['grade'], 'lounge')) { ?>
                        <?php } ?>
                        
                     <?php if ($utilisateur['grade'] == 1) { ?>
                    <div class="help-box text-white text-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/3557/3557655.png" height="90" alt="VIP icon"/>
                        <h5 class="mt-3">Pas encore VIP ?</h5>
                        <p class="mb-3">Achetez le dès maintenant pour accéder à des générateurs exclusifs, les fins de stocks, et bien plus encore !</p>
                        <a href="/vip" class="btn btn-outline-warning btn-sm">Acheter</a>
                    </div>
                    <?php } else { ?>
                    <?php } ?>
                    <div class="clearfix"></div>
                </div>
            </div>