                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                © <?=date('Y') ?> - FreeGen. Tous droits réservés.
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-md-block">
                                    Conditions Générales d'Utilisation
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Paramètres de l'interface</h5>
            </div>
            <div class="rightbar-content h-100" data-simplebar>
                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customisez </strong> les couleurs, le menu etc... !
                    </div>
                    <h5 class="mt-3">Thème</h5>
                    <hr class="mt-1"/>
                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="color-scheme-mode" value="light" id="light-mode-check" checked/>
                        <label class="custom-control-label" for="light-mode-check">Thème clair</label>
                    </div>

                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="color-scheme-mode" value="dark" id="dark-mode-check"/>
                        <label class="custom-control-label" for="dark-mode-check">Thème sombre</label>
                    </div>

                    <h5 class="mt-4">Taille de l'interface</h5>
                    <hr class="mt-1"/>
                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="width" value="fluid" id="fluid-check" checked/>
                        <label class="custom-control-label" for="fluid-check">Pleine page</label>
                    </div>
                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="width" value="boxed" id="boxed-check"/>
                        <label class="custom-control-label" for="boxed-check">Encadré</label>
                    </div>

                    <h5 class="mt-4">Menu</h5>
                    <hr class="mt-1"/>
                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="theme" value="default" id="default-check" checked/>
                        <label class="custom-control-label" for="default-check">Colorisé</label>
                    </div>

                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="theme" value="light" id="light-check"/>
                        <label class="custom-control-label" for="light-check">Clair</label>
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input type="radio" class="custom-control-input" name="theme" value="dark" id="dark-check"/>
                        <label class="custom-control-label" for="dark-check">Sombre (par defaut)</label>
                    </div>

                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="compact" value="fixed" id="fixed-check" checked/>
                        <label class="custom-control-label" for="fixed-check">Fixe</label>
                    </div>

                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="compact" value="condensed" id="condensed-check"/>
                        <label class="custom-control-label" for="condensed-check">Minimisé</label>
                    </div>

                    <div class="custom-control custom-switch mb-1">
                        <input type="radio" class="custom-control-input" name="compact" value="scrollable" id="scrollable-check"/>
                        <label class="custom-control-label" for="scrollable-check">Scrollable</label>
                    </div>

                    <button class="btn btn-primary btn-block mt-4" id="resetBtn">Remettre par defaut</button>

                    <a href="/mon-compte" class="btn btn-danger btn-block mt-3"><i class="mdi mdi-account-cog mr-1"></i> Votre compte</a>
                </div>
            </div>
        </div>

        <div class="rightbar-overlay"></div>
        
        <script src="/assets/js/vendor.min.js"></script>
        <script src="/assets/js/app.min.js"></script>
        <script src="/assets/js/script.js"></script>

        <script src="/assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="/assets/js/vendor/dataTables.bootstrap4.js"></script>
        <script src="/assets/js/vendor/dataTables.responsive.min.js"></script>
        <script src="/assets/js/pages/demo.datatable-init.js"></script>
        <?php if($utilisateur['grade'] == 1) { ?>  
        <script type="text/javascript">
        (function() {
            var configuration = {
            "token": "ff6ae24b966673ed184f9f153193d3d",
            "capping": {
                "limit": 15,
                "timeout": 24
            },
            "entryScript": {
                "type": "click",
                "capping": {
                    "limit": 15,
                    "timeout": 24
                }
            },
            "exitScript": {
                "enabled": true
            },
            "popUnder": {
                "enabled": true
            }
        };
            var script = document.createElement('script');
            script.async = true;
            script.src = '//cdn.shorte.st/link-converter.min.js';
            script.onload = script.onreadystatechange = function () {var rs = this.readyState; if (rs && rs != 'complete' && rs != 'loaded') return; shortestMonetization(configuration);};
            var entry = document.getElementsByTagName('script')[0];
            entry.parentNode.insertBefore(script, entry);
        })();
        </script>
        <?php } ?>
    </body>
</html>