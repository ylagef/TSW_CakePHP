<?= $this->Html->css('pollView') ?>
<?= $participatedOnPoll=false;?>

<?= $this->Form->create($poll) ?>
<!-- CENTRAL JUMBOTRON -->
<div class="jumbotron jumbotron-fluid rounded">
  <div class="container">
    <h1 class="display-4">Editar la encuesta</h1>
    <!-- <p class="lead"><i class="material-icons lead-icon">keyboard_arrow_right</i><?= h($poll->title) ?></p> -->
    <div class="row editRow">
      <p class="lead"><i class="material-icons lead-icon edit-icons">keyboard_arrow_right</i>
        <?=$this->
                Form->control('title', ["class" => "form-control", "value" => h($poll->title), "label" => false, "placeholder"=>"Título"])?>
      </p>
    </div>
    <div class="row editRow">
      <p class="lead"><i class="material-icons lead-icon edit-icons">place</i>
        <?=$this->
                Form->control('place', ["class" => "form-control", "value" => h($poll->place), "label" => false, "placeholder"=>"Ubicación"])?>
      </p>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text link-icon">
          <i class="material-icons">
            link
          </i>
        </span>
      </div>
      <input type="text" class="form-control poll-link" placeholder="<?= h($poll->url) ?>" aria-label="Username"
        aria-describedby="basic-addon1" disabled>
      <div class="input-group-append">
        <button class="btn btn-outline-secondary " type="button">COPIAR</button>
      </div>
    </div>

    <div class="table-responsive">

      <table class="table text-center" id="gapsTable">
        <thead>
          <tr>
            <th scope="col">
              Día
            </th>
            <th scope="col">
              Hora incio
            </th>
            <th scope="col">
              Hora fin
            </th>
            <th scope="col">
            </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($gaps as $gap){?>
          <tr>
            <td>
              <input class="form-control floating-label text-center date edit-disabled" id="date0" placeholder="Fecha" type="text"
                 value="<?= explode(', ', $gap->start_date)[0]?>" disabled>
            </td>
            <td>
              <input class="form-control floating-label text-center startTime edit-disabled" id="startTime0" placeholder="Hora inicio"
                type="text"  value="<?= explode(', ', $gap->start_date)[1]?>" disabled>
            </td>
            <td>
              <input class="form-control floating-label text-center endTime edit-disabled" id="endTime0" placeholder="Hora fin" type="text"
                 value="<?= explode(', ', $gap->end_date)[1]?>" disabled>
            </td>
            <td>
              <button class='btn btn-outline-danger btn-sm' onClick='deleteRow(<?=$gap->gap_id?>)' type='button'><i class='material-icons'>delete</i></button>
          </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
      
      <div class="add-option-button">
        <button class="btn btn-outline-success" onClick="addRow()" type="button">
          Añadir otra opción
        </button>
      </div>
<hr class="my-3">
      <div class="other-option-button text-center">
        <?= $this->Form->button(__('Editar'), ["class"=>"btn btn-outline-info"]) ?>
      </div>
    </div>
  </div>
</div>
<div id="inputs"></div>
<?= $this->Form->end() ?>

<?=$this->Html->script('gaps');?>
<!-- <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Poll $poll
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $poll->poll_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $poll->poll_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Polls'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="polls form large-9 medium-8 columns content">
    <?= $this->Form->create($poll) ?>
    <fieldset>
        <legend><?= __('Edit Poll') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('place');
            echo $this->Form->control('author');
            echo $this->Form->control('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div> -->