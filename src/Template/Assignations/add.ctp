<?= $this->Html->css('pollView') ?>
<?= $this->Html->script('scripts') ?>

<!-- CENTRAL JUMBOTRON -->
<div class="jumbotron jumbotron-fluid rounded">
    <div class="container">
      <h1 class="display-4">Participar en la encuesta</h1>
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
              <th scope="col"><?= $this->request->getSession()->read('Auth.User.name') ?></th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($gaps as $gap): 
            $gapCount=0;
            ?>
            <tr>
            
              <th scope="row"><?= h($gap->startDate) ?><br><a><?= h($gap->endDate) ?></a></th>
              
              <?php foreach ($users as $user): 
                $isAssigned=false;
                ?>
                      <td>
                    <?php 
                     foreach($assignations as $assign):
                        if($assign['idUser']==$user->idUser && $assign['idGap']==$gap->idGap){
                            $isAssigned=true;
                            $gapCount++;
                        }
                    endforeach;

                    if($isAssigned){
                    ?>
                        <button type="button" class="btn btn-success btn-sm" disabled>
                    <?php
                    }else{
                    ?>
                        <button type="button" class="btn btn-outline-success btn-sm" disabled>
                    <?php
                    }
                    ?>
                     <i class="material-icons">
                    done
                    </i>
                </td>
              <?php endforeach; ?>

                <td>
                <button type="button" class="btn btn-outline-success  btn-sm" onclick="toggleButton.call(this)">
                <i class="material-icons">
                  done
                </i>
                </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        
        <hr class="my-3">
        
        <div class="col-sm-10 accept-button">
          <?= $this->Form->button(__('Enviar'),["class"=>"btn btn-outline-secondary"]); ?>
        </div>
        
      </div>
    </div>
  </div>
  


  <!-- <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignation $assignation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Assignations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="assignations form large-9 medium-8 columns content">
    <?= $this->Form->create($assignation) ?>
    <fieldset>
        <legend><?= __('Add Assignation') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div> -->
