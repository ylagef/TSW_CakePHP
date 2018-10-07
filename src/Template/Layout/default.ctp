<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$description = 'Areufree';
?>
<!DOCTYPE html>
<html>
    <head>
        <?=$this->
        Html->charset()?>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <title>
                <?=$description?>
                -
                <?=$this->
                fetch('title')?>
            </title>
            <?=$this->
            Html->meta('icon')?>
            <?=$this->
            Html->css('base')?>
            <?=$this->
            Html->css('style')?>
            <?=$this->
            Html->css('navbar')?>
            <?=$this->
            fetch('meta')?>
            <?=$this->
            fetch('css')?>
            <?=$this->
            fetch('script')?>
            <!-- Scripts -->
            <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
            </script>
            <script crossorigin="anonymous" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
            </script>
            <script crossorigin="anonymous" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
            </script>
            <!-- Material icons -->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            </link>

            <link href="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/css/bootstrap/zebra_datepicker.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/zebra_datepicker@latest/dist/zebra_datepicker.min.js"></script>
        </meta>
    </head>
    <body>
        <!-- <nav class="top-bar expanded" data-topbar role="navigation">
            <ul class="title-area large-3 medium-4 columns">
                <li class="name">
                    <h1><a href=""><?=$this->fetch('title')?></a></h1>
                </li>
            </ul>
            <div class="top-bar-section">
                <ul class="right">
                    <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>
                    <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>
                </ul>
            </div>
        </nav> -->
        
        <!-- NAVBAR -->
        <?php if ($this->
        request->getSession()->read('Auth.User')) {?>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary nav">
            <a class="navbar-brand nav-title" href="#">
                Are u free?
            </a>
            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler " data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
                <span class="navbar-toggler-icon">
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto center">
                    <?php if ($this->
                    request->getParam('controller') == 'Polls' && $this->request->getParam('action') == 'add') {?>
                    <li class="nav-item active">
                        <?php } else {?>
                        <li class="nav-item">
                            <?php }?>
                            <?=$this->
                            Html->link('Crear encuesta', ['controller' => 'Polls', 'action' => 'add'], ['class' => 'nav-link']);?>
                        </li>
                        <?php if ($this->
                        request->getParam('controller') == 'Polls' && $this->request->getParam('action') == 'index') {?>
                        <li class="nav-item active">
                            <?php } else {?>
                            <li class="nav-item">
                                <?php }?>
                                <?=$this->
                                Html->link('Mis encuestas', ['controller' => 'Polls', 'action' => 'index'], ['class' => 'nav-link']);?>
                            </li>
                        </li>
                    </li>
                </ul>
                <div class="btn-group " role="group">
                    <button aria-expanded="false" aria-haspopup="true" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-toggle="dropdown" id="btnGroupDrop1" type="button">
                        <?php echo $this->
                        request->getSession()->read('Auth.User.name') ?>
                    </button>
                    <div aria-labelledby="btnGroupDrop1" class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">
                            Config
                        </a>
                        <?=$this->
                        Html->link('Logout', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'dropdown-item']);?>
                    </div>
                </div>
            </div>
        </nav>
        <?php }?>
        <?=$this->
        Flash->render()?>
        <!-- <div class="container clearfix"> -->
        <?=$this->
        fetch('content')?>
        <!-- Here is the content injected -->
        <!-- </div> -->
        <!-- <footer>
        </footer> -->
    </body>
</html>
