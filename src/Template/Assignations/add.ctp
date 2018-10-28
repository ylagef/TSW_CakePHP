<?=$this->
Html->css('pollView')?>
<?=$this->
Html->script('scripts')?>
<!-- CENTRAL JUMBOTRON -->
<?=$this->Form->create()?>
<div class="jumbotron jumbotron-fluid rounded">
    <div class="container">
        <h1 class="display-4">
            <?=__("Participate on poll")?>
        </h1>
        <p class="lead">
            <i class="material-icons lead-icon">
                keyboard_arrow_right
            </i>
            <?=h($poll->
            title)?>
        </p>
        <p class="lead"><?php
          if($poll->place!=null){
            echo "<i class='material-icons lead-icon'>place</i> ";
            echo h($poll->place);
          } else {
            echo "- Ubicación no especificada -";
          } 
        ?>
      </p>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text link-icon">
                    <i class="material-icons ">
                        link
                    </i>
                </span>
            </div>
            <input type="text" class="form-control poll-link" value="<?=$_SERVER["HTTP_HOST"]?>/polls/view/<?= h($poll->url) ?>" disabled id="copyValue">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" onclick="copy()"><?=__("COPY")?></button>
                </div>
            </input>
        </div>
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">
                        </th>
                        <?php if($gaps->count()!=0){foreach ($users as $user): ?>
                            <th scope="col">
                                <?=h($user->
                                name)?>
                            </th>
                        <?php endforeach;}?>
                        <th scope="col">
                            <?php if($gaps->count()!=0){echo $this->
                            request->getSession()->read('Auth.User.name');}?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if($gaps->count()!=0){
                    foreach ($gaps as $gap): ?>
                        <tr>
                            <th scope="row">
                                <p>
                                <?=h($gap->
                                start_date)?>
                                </p>
                                <p>
                                    <?=h($gap->
                                    end_date)?>
                                </p>
                            </th>
                            <?php foreach ($users as $user):
                                $isAssigned = false;
                                ?>
                                <td>
                                    <?php foreach ($assignations as $assign):
                                        if ($assign['user_id'] == $user->
                                                            user_id && $assign['gap_id'] == $gap->gap_id) {
                                            $isAssigned = true;
                                        }
                                    endforeach;

                                    if ($isAssigned) {
                                        ?>

                                    <button class="btn btn-success btn-sm" disabled="" type="button">
                                    <?php
                                    } else {
                                    ?>
                                        <button class="btn btn-outline-success btn-sm" disabled="" type="button">
                                    <?php
                                    }
                                    ?>
                                            <i class="material-icons">
                                                done
                                            </i>
                                        </button>
                                    </button>
                                </td>
                            <?php endforeach;?>
                            <td>
                                <button class="btn btn-outline-success btn-sm" onclick="toggle.call(this, <?=$this->request->getSession()->read('Auth.User.user_id')?>, <?=h($gap->gap_id)?>)" type="button">
                                    <i class="material-icons">
                                        done
                                    </i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach;
                    } else {
                    ?>
                        <td><a class="lead"><?= __("There are not gaps yet.")?></a></td>
                    <?php } ?>
                </tbody>
            </table>
            
            <hr class="my-3">

            <?php 
            $input=0;
            foreach ($gaps as $gap): ?>
                <input type="checkbox" id="G<?=h($gap->gap_id)?>.<?=$this->request->getSession()->read('Auth.User.user_id')?>" name="<?=$input?>[gap_id]" value="<?=h($gap->gap_id)?>" hidden>
                <input type="checkbox" id="U<?=h($gap->gap_id)?>.<?=$this->request->getSession()->read('Auth.User.user_id')?>"name="<?=$input?>[user_id]" value="<?=$this->request->getSession()->read('Auth.User.user_id')?>" hidden>
            <?php $input++; endforeach;?>

            <div class="col-sm-10 accept-button">
            <?php if($gaps->count()!=0){
                echo $this->Form->button(__('Send'), ["class" => "btn btn-outline-secondary"]);
            } else {
                echo $this->Form->button(__('Back'), ["controller"=>"poll","action"=>"view",$poll->url,"class" => "btn btn-outline-secondary"]);
            }
                ?>
            </div>
            
        </div>
    </div>
</div>
<?=$this->Form->end()?>

<script>
function toggle(user_id, gap_id) {

     // TODO change remove-add to toggle!
    if ($(this)[0].classList.contains('btn-outline-success')) {
        $(this).removeClass("btn-outline-success");
        $(this).addClass("btn-success");
        document.getElementById("G"+gap_id+"."+user_id).checked = true;
        document.getElementById("U"+gap_id+"."+user_id).checked = true;
    } else {
        $(this).addClass("btn-outline-success");
        $(this).removeClass("btn-success");
        document.getElementById("G"+gap_id+"."+user_id).checked = false;
        document.getElementById("U"+gap_id+"."+user_id).checked = false;
    }
}
</script>
