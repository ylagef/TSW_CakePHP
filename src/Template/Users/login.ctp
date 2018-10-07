<?= $this->Html->css('login') ?>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="jumbotron jumbotron-fluid rounded">
            <div class="container">
                <h1 class="display-4">Loguéate!</h1>
                <p class="lead">Solo necesitamos dos cosas</p>
                <hr class="my-4">

                <?= $this->Flash->render('auth') ?>
                <?= $this->Form->create() ?>

                <div class="form-group">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="material-icons">
                                    mail_outline
                                </i>
                            </div>
                        </div>
                        <?= $this->Form->control('username',["class"=>"form-control","placeholder"=>"Usuario","label"=>false]) ?>
                    </div>

                    <div class="input-group passwd">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="material-icons">
                                    lock
                                </i>
                            </div>
                        </div>
                        <?= $this->Form->control('password',["class"=>"form-control","placeholder"=>"Contraseña","label"=>false]) ?>
                    </div>
                </div>

                <small id="help" class="form-text text-muted">- Los campos son obligatorios. -</small>
                <small id="help" class="form-text font-weight-light"><a href="#">Olvidé mi contraseña</a></small>
                <small id="help" class="form-text font-weight-light"><a>
                        <?= $this->Html->link("Registrarme", array('controller' => 'Users','action'=> 'add'))?></a></small>

                <div class="form-group row submit-button">
                    <div class="col-sm-12">
                        <?= $this->Form->button(__('Login'),["class"=>"btn btn-outline-secondary"]); ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>