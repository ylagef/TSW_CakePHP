<?= $this->Html->css('userAdd') ?>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="jumbotron jumbotron-fluid rounded">
            <div class="container">
            <h1 class="display-4"><?php echo h($user->username)?></h1>
                <p class="lead">Modifica tus datos</p>
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
                        <?= $this->Form->control('password',["class"=>"form-control","placeholder"=>"Contraseña","label"=>false,"value"=>""]) ?>
                    </div>

                    <div class="input-group passwd">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="material-icons">
                                    refresh
                                </i>
                            </div>
                        </div>
                        <?= $this->Form->control('password_confirm',["class"=>"form-control","placeholder"=>"Repite la contraseña","label"=>false,"type"=>"password","value"=>""]) ?>
                    </div>
                </div>

                <!-- <small id="help" class="form-text text-muted">- Los campos son obligatorios. -</small> -->

                <div class="form-group row submit-button">
                    <div class="col-sm-12">
                    <?= $this->Form->button(__('Editar'), ['controller'=>'users','action' => 'edit',"class"=>"btn btn-outline-info"]) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<!-- <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('user_id') ?></th>
            <td><?= $this->Number->format($user->user_id) ?></td>
        </tr>
    </table>
</div> -->
