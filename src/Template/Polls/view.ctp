<?= $this->Html->css('pollView') ?>

<!-- CENTRAL JUMBOTRON -->
<div class="jumbotron jumbotron-fluid rounded">
    <div class="container">
      <h1 class="display-4">Ver la encuesta</h1>
      <p class="lead"><i class="material-icons lead-icon">keyboard_arrow_right</i><?= h($poll->title) ?></p>
      <p class="lead"><i class="material-icons lead-icon">place</i><?= h($poll->place) ?></p>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text link-icon">
            <i class="material-icons ">
              link
            </i>
          </span>
        </div>
        <input type="text" class="form-control poll-link" placeholder="<?= h($poll->url) ?>"
          aria-label="Username" aria-describedby="basic-addon1" disabled>
        <div class="input-group-append">
          <button class="btn btn-outline-secondary " type="button">COPIAR</button>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table text-center">
          <thead>
            <tr>
              <th scope="col"></th>
              <?php foreach ($users as $user): ?>
                <th scope="col"><?= h($user->name) ?></th>
              <?php endforeach; ?>
              <th scope="col" class="font-weight-light">Total</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($gaps as $gap): 
            $gapCount=0;
            ?>
            
            <tr>
              <th scope="row"><?= h($gap->startDate) ?><br><a><?= h($gap->endDate) ?></a></th>
              
              <?php foreach ($users as $user): 
                $isAssignated=false;
                ?>
                <td>
                    <?php 
                     foreach($assignations as $assignation):
                        if($assignation['idUser']==$user->idUser && $assignation['idGap']==$gap->idGap){
                            $isAssignated=true;
                            $gapCount++;
                        }
                    endforeach;

                    if($isAssignated){
                    ?>
                        <button type="button" class="btn btn-success btn-sm btn-disabled" disabled>
                    <?php
                    }else{
                    ?>
                        <button type="button" class="btn btn-outline-success btn-sm btn-disabled" disabled>
                    <?php
                    }
                    ?>
                     <i class="material-icons">
                    done
                    </i>
                </td>
              <?php endforeach; ?>

              <td>
                <a class="font-weight-light"><?php echo $gapCount ?></a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <hr class="my-3">
        <div class="other-option-button text-center">
          <a ><?= $this->Html->link(__('Participar'), ['controller'=>'assignations','action' => 'add', $poll->idPoll],["class"=>"btn btn-outline-info"]) ?></a>
          <a class="btn btn-outline-info" href="#" role="button">Modificar participación</a>
          <a class="btn btn-outline-info" href="#" role="button">Editar encuesta</a>
        </div>
      </div>
    </div>
  </div>
  




<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Poll'), ['action' => 'edit', $poll->idPoll]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Poll'), ['action' => 'delete', $poll->idPoll], ['confirm' => __('Are you sure you want to delete # {0}?', $poll->idPoll)]) ?> </li>
        <li><?= $this->Html->link(__('List Polls'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Poll'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="polls view large-9 medium-8 columns content">
    <h3><?= h($poll->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($poll->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Place') ?></th>
            <td><?= h($poll->place) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($poll->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdPoll') ?></th>
            <td><?= $this->Number->format($poll->idPoll) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= $this->Number->format($poll->author) ?></td>
        </tr>
    </table>
</div> -->
