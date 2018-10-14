<?= $this->Html->css('pollView') ?>
<?= $participatedOnPoll=false;?>

<?= $this->Form->create($poll) ?>
<!-- CENTRAL JUMBOTRON -->
<div class="jumbotron jumbotron-fluid rounded">
    <div class="container">
        <h1 class="display-4">Editar la encuesta</h1>
        <!-- <p class="lead"><i class="material-icons lead-icon">keyboard_arrow_right</i><?= h($poll->title) ?></p> -->
        <div class="row editRow">
            <p class="lead"><i class="material-icons lead-icon">keyboard_arrow_right</i><?=$this->
                Form->control('title', ["class" => "form-control", "value" => h($poll->title), "label" => false, "placeholder"=>"Título"])?></p>
        </div>
        <!-- <p class="lead"><i class="material-icons lead-icon">place</i><?= h($poll->place) ?></p> -->
        <div class="row editRow">
            <p class="lead"><i class="material-icons lead-icon">place</i><?=$this->
                Form->control('place', ["class" => "form-control", "value" => h($poll->place), "label" => false, "placeholder"=>"Ubicación"])?></p>
        </div>
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
              <th scope="row"><?= h($gap->start_date) ?><br><a><?= h($gap->end_date) ?></a></th>
              
              <?php foreach ($users as $user): 
                $isAssignated=false;
                ?>
                <td>
                    <?php 
                     foreach($assignations as $assignation):
                        if($assignation['user_id']==$user->user_id && $assignation['gap_id']==$gap->gap_id){
                            $isAssignated=true;
                            $gapCount++;
                        }
                        
                        if($assignation['user_id']==$this->request->getSession()->read('Auth.User.user_id')){
                          $participatedOnPoll=true;
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
            <?= $this->Form->button(__('Editar'), ["class"=>"btn btn-outline-info"]) ?>
        </div>
      </div>
    </div>
  </div>
  <?= $this->Form->end() ?>

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
