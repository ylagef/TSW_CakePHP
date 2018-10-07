<?=$this->
Html->css('pollAdd')?>
<!-- CENTRAL JUMBOTRON -->
<div class="jumbotron jumbotron-fluid rounded">
    <div class="container">
        <h1 class="display-4">
            Crea tu encuesta
        </h1>
        <p class="lead">
            Primero, necesitamos algunos datos...
        </p>
        <?=$this->
        Form->create($poll)?>
        <div class="input-group mb-3">
            <div class="form-group row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label>
                        ¿Por qué?
                    </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="material-icons">
                                    keyboard_arrow_right
                                </i>
                            </div>
                        </div>
                        <?=$this->
                        Form->control('title', ["class" => "form-control", "placeholder" => "Motivo", "label" => false])?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label>
                        ¿Dónde?
                    </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="material-icons">
                                    place
                                </i>
                            </div>
                        </div>
                        <?=$this->
                        Form->control('location', ["class" => "form-control", "placeholder" => "Ubicación", "label" => false])?>
                    </div>
                </div>
            </div>
        </div>
        <small class="form-text text-muted" id="help">
            - El motivo es obligatorio. -
        </small>
        <div class="form-group row submit-button">
            <div class="col-sm-10">
                <?=$this->
                Form->button(__('Continuar'), ["class" => "btn btn-outline-secondary"]);?>
            </div>
        </div>
        <?=$this->
        Form->end()?>
    </div>
</div>

<!-- <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Poll $poll
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?=__('Actions')?></li>
        <li><?=$this->Html->link(__('List Polls'), ['action' => 'index'])?></li>
    </ul>
</nav>
<div class="polls form large-9 medium-8 columns content">
    <?=$this->Form->create($poll)?>
    <fieldset>
        <legend><?=__('Add Poll')?></legend>
        <?php
echo $this->Form->control('title');
echo $this->Form->control('place');
echo $this->Form->control('author');
echo $this->Form->control('url');
?>
    </fieldset>
    <?=$this->Form->button(__('Submit'))?>
    <?=$this->Form->end()?>
</div> -->
