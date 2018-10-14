<?= $this->Html->css('pollView') ?>
<?= $participatedOnPoll=false;?>
<!-- CENTRAL JUMBOTRON -->
<div class="jumbotron jumbotron-fluid rounded">
    <div class="container">
      <h1 class="display-4">Ver la encuesta</h1>
      <p class="lead"><i class="material-icons lead-icon">keyboard_arrow_right</i><?= h($poll->title) ?></p>
      <p class="lead"><i class="material-icons lead-icon">place</i><?= h($poll->place) ?></p>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text link-icon">
            <i class="material-icons">
              link
            </i>
          </span>
        </div>
        <input type="text" class="form-control poll-link" placeholder="<?= h($poll->url) ?>"
          aria-label="Username" aria-describedby="basic-addon1" disabled>
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button">COPIAR</button>
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
          <?php 
            $maxGapCount=0;
            foreach ($gaps as $gap):
              $gapCount=0;
            ?>
            
            <tr id="TR<?php echo $gap['gap_id'] ?>">

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
              <?php endforeach; 
              if($gapCount>$maxGapCount) {
                $maxGapCount=$gapCount;
              }
              ?>
              <td>
                <a class="font-weight-light" id="count<?php echo $gap['gap_id'] ?>"><?php echo $gapCount?></a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <script>
        <?php foreach ($gaps as $gap):?>
          if(document.getElementById("count<?php echo $gap['gap_id'] ?>").innerHTML=="<?php echo $maxGapCount?>"
          &&document.getElementById("count<?php echo $gap['gap_id'] ?>").innerHTML!="0"){
            document.getElementById("TR<?php echo $gap['gap_id'] ?>").classList.add("table-success");
          }
        <?php endforeach; ?>
        </script>

        <hr class="my-3">
        
        <div class="other-option-button text-center">
          <?php if(!$participatedOnPoll){?>
          <a ><?= $this->Html->link(__('Participar'), ['controller'=>'assignations','action' => 'add', $poll->poll_id],["class"=>"btn btn-outline-info"]) ?></a>
          <?php }else{ ?>
            <a ><?= $this->Html->link(__('Modificar participación'), ['controller'=>'assignations','action' => 'edit', $poll->poll_id],["class"=>"btn btn-outline-info"]) ?></a>
          <?php } ?>
          <?php if($this->request->getSession()->read('Auth.User.user_id')==$poll->author){ ?>
            <a ><?= $this->Html->link(__('Editar encuesta'), ['controller'=>'polls','action' => 'edit', $poll->poll_id],["class"=>"btn btn-outline-info"]) ?></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  




<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Poll'), ['action' => 'edit', $poll->poll_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Poll'), ['action' => 'delete', $poll->poll_id], ['confirm' => __('Are you sure you want to delete # {0}?', $poll->poll_id)]) ?> </li>
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
            <th scope="row"><?= __('poll_id') ?></th>
            <td><?= $this->Number->format($poll->poll_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= $this->Number->format($poll->author) ?></td>
        </tr>
    </table>
</div> -->
