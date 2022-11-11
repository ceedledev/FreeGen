            <div class="content-page">
                <div class="content">
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-right-menu float-right mb-0">
                            <li class="notification-list">
                                <a class="nav-link right-bar-toggle" href="javascript: void(0);">
                                    <i class="dripicons-gear noti-icon"></i>
                                </a>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-bell noti-icon"></i>
                                    <span class="noti-icon-badge"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0">Nos 4 derniers restocks</h5>
                                    </div>
                                    <div style="max-height: 230px;" data-simplebar>
                                        <?php 
                                        $getInfos = get_infos();
                                        $i2 = 0;
                                        while ($infos = $getInfos->fetch()) {
                                            if ($i2 <= 4) {
                                                if ($infos['type'] == 'restock') {
                                                    $i2++;
                                                    $date_time = new DateTime($infos['date_time']);
                                                    ?>
                                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                        <div class="notify-icon">
                                                            <img src="<?=$infos['icon_gen'] ?>" class="img-fluid rounded-circle"/> 
                                                        </div>
                                                        <p class="notify-details">Rajout de <?=$infos['stock_ajoute'] ?> <?=$infos['generateur'] ?>
                                                            <small class="text-muted">Effectué par <?=$infos['faitpar'] ?> le <?= $date_time->format('m/d') ?> à <?=$date_time->format('H:i') ?></small>
                                                        </p>
                                                    </a>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if ($i2 == 0) { ?>
                                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="notify-icon">
                                                    <img src="https://freeiconshop.com/wp-content/uploads/edd/error-flat.png" class="img-fluid rounded-circle"/> 
                                                </div>
                                                <p class="notify-details">Aucun restock récent.
                                                    <small class="text-muted">Ça arrive ne vous inquietez pas !</small>
                                                </p>
                                            </a>
                                        <?php } ?>
                                    </div>
                                    <a href="/infos" class="dropdown-item text-center text-primary notify-item notify-all">Voir plus</a>
                                </div>
                            </li>
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <?php if (!empty($utilisateur['avatar'])) { ?>
                                        <img src="<?=$utilisateur['avatar'] ?>" class="rounded-circle"/>
                                        <?php } else { ?>
                                        <img src="/assets/images/avatar.jpg" class="rounded-circle"/>
                                        <?php } ?>
                                    </span>
                                    <span>
                                        <span class="account-user-name"><?=$_SESSION['pseudo'] ?></span>
                                        <span class="account-position"><?=get_grade($utilisateur['id'], 'lettres') ?></span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <div class=" dropdown-header noti-title">
                                    <?php if (date('G') >= 21) { ?>
                                        <h6 class="text-overflow m-0">Bonsoir</h6>
                                    <?php } else if (date('G') <= 1) { ?>
                                        <h6 class="text-overflow m-0">Une petite insomnie ?</h6>
                                    <?php } else { ?>
                                        <h6 class="text-overflow m-0">Bonne journée</h6>
                                    <?php } ?>
                                    </div>
                                    <a href="/mon-compte" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle mr-1"></i>
                                        <span>Mon compte</span>
                                    </a>
                                    <a href="/historique" class="dropdown-item notify-item">
                                        <i class="mdi mdi-history mr-1"></i>
                                        <span>Historique</span>
                                    </a>
                                    <a href="/deconnexion" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout mr-1"></i>
                                        <span>Deconnexion</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <button class="button-menu-mobile open-left disable-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <div class="app-search" style="max-width:320px">
                            <div class="input-group">
                                <?php if (date('G') >= 21) { ?>
                                <input type="text" class="form-control" placeholder="Bonsoir, <?=$utilisateur['pseudo'] ?>" disabled/>
                                <?php } else if (date('G') <= 5) { ?> 
                                <input type="text" class="form-control" placeholder="Une petite insomnie <?=$utilisateur['pseudo'] ?> ?" disabled/>
                                <?php } else { ?>
                                <input type="text" class="form-control" placeholder="Salut <?=$utilisateur['pseudo'] ?> !" disabled/>
                                <?php } ?>
                                <span class="mdi mdi-message-outline"></span>
                            </div>
                        </div>
                    </div>