<?= $this->Html->css('pollEdit') ?>
<?= $participatedOnPoll=false;?>

<?= $this->Form->create($poll, array('onsubmit' => "return setArray(" . $poll->poll_id . ");"));?>
<!-- CENTRAL JUMBOTRON -->
<script>var rows=[];</script>
<div class="jumbotron jumbotron-fluid rounded">
  <div class="container">
    <h1 class="display-4"><?=__("Edit poll")?></h1>
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
      <input type="text" class="form-control poll-link" value="<?=$_SERVER["HTTP_HOST"]?>/polls/view/<?= h($poll->url) ?>" disabled id="copyValue">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary " type="button" onclick="copy()" id="copyButton"><?=__("COPY")?></button>
      </div>
    </div>

    <div class="table-responsive">

      <table class="table text-center" id="gapsTable">
        <thead>
          <tr>
            <th scope="col">
              <?=__("Day")?>
            </th>
            <th scope="col">
              <?=__("Start Hour")?>
            </th>
            <th scope="col">
              <?=__("End Hour")?>
            </th>
            <th scope="col">
            </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($gaps as $gap){?>
            <script> rows.push(<?=$gap->gap_id?>);</script>

            <input id="<?=$gap->gap_id?>" hidden>

            <tr>
              <td>
                <input class="form-control floating-label text-center date edit-disabled" id="date<?=$gap->gap_id?>" placeholder="<?=__("Date")?>" type="text"
                  value="<?php 
                  if($this->request->getCookie("lang")=="es_ES"){
                    $date=explode(' ', $gap->start_date)[0];
                    $month=explode('/', $date)[1];
                    $day=explode('/', $date)[0];
                    $year=explode('/', $date)[2];
                    echo "20".$year."-".$month."-".$day;
                  }else{
                    $date=explode(', ', $gap->start_date)[0];
                    $month=explode('/', $date)[1];
                    $day=explode('/', $date)[0];
                    $year=explode('/', $date)[2];
                    echo $year."-".$month."-".$day;
                  }
                  ?>" disabled>
              </td>
              <td>
                <input class="form-control floating-label text-center startTime edit-disabled" id="startTime<?=$gap->gap_id?>" placeholder="<?=__("Start Hour")?>"
                  type="text"  value="<?php
                  if($this->request->getCookie("lang")=="es_ES"){
                    $time=explode(' ', $gap->start_date)[1];
                  }else{
                   $time=explode(', ', $gap->start_date)[1];
                  }

                   $aux=explode(' ',$time)[0];
                   $hour=explode(":",$aux)[0];
                   if(strpos($time,"PM")){
                     $hour=$hour+12;
                   }
                   $minute=explode(":",$aux)[1];
                   echo $hour.":".$minute;
                   ?>" disabled>
              </td>
              <td>
                <input class="form-control floating-label text-center endTime edit-disabled" id="endTime<?=$gap->gap_id?>" placeholder="<?=__("End Hour")?>" type="text"
                  value="<?php
                  if($this->request->getCookie("lang")=="es_ES"){
                    $time=explode(' ', $gap->end_date)[1];
                  }else{
                   $time=explode(', ', $gap->end_date)[1];
                  }

                   $aux=explode(' ',$time)[0];
                   $hour=explode(":",$aux)[0];
                   if(strpos($time,"PM")){
                     $hour=$hour+12;
                   }
                   $minute=explode(":",$aux)[1];
                   echo $hour.":".$minute;
                   ?>" disabled>
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
          <?=__("Add other option")?>
        </button>
      </div>
      <hr class="my-3">
      <div class="other-option-button text-center">
        <?= $this->Form->button(__('Edit'), ["class"=>"btn btn-outline-info"]) ?>
      </div>
    </div>
  </div>
</div>
<div id="inputs"></div>
<?= $this->Form->end() ?>

<?=$this->Html->script('gaps');?>
