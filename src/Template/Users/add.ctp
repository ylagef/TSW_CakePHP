<?= $this->Html->css('userAdd') ?>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="jumbotron jumbotron-fluid rounded">
            <div class="container">
                <h1 class="display-4">Regístrate!</h1>
                <p class="lead">Dime tus datos</p>
                <hr class="my-4">

                <?= $this->Flash->render('auth') ?>
                <?= $this->Form->create($user) ?>

                <div class="form-group">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="material-icons">
                                    mail_outline
                                </i>
                            </div>
                        </div>
                        <?= $this->Form->control('email',["class"=>"form-control","placeholder"=>"Email","label"=>false,"type"=>"email"]) ?>
                    </div>

                    <div class="input-group passwd">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="material-icons">
                                    mail_outline
                                </i>
                            </div>
                        </div>
                        <?= $this->Form->control('username',["class"=>"form-control","placeholder"=>"Username","label"=>false]) ?>
                    </div>

                    <div class="input-group passwd">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="material-icons">
                                    person
                                </i>
                            </div>
                        </div>
                        <?= $this->Form->control('name',["class"=>"form-control","placeholder"=>"Nombre","label"=>false]) ?>
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

                    <div class="input-group passwd">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="material-icons">
                                    refresh
                                </i>
                            </div>
                        </div>
                        <?= $this->Form->control('password_confirm',["class"=>"form-control","placeholder"=>"Repite la contraseña","label"=>false,"type"=>"password"]) ?>
                    </div>
                </div>

                <small id="help" class="form-text text-muted">- Los campos son obligatorios. -</small>
                <small id="help" class="form-text font-weight-light">
                    <?= $this->Html->link("Volver al login", array('controller' => 'Users','action'=> 'login'))?></a></small>

                <div class="form-group row submit-button">
                    <div class="col-sm-12">
                        <?= $this->Form->button(__('Registrarme'),["class"=>"btn btn-outline-secondary"]); ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>