<?=$this->
Html->css('pollView')?>
<?=$this->
Html->script('scripts')?>
<!-- CENTRAL JUMBOTRON -->
<?=$this->Form->create()?>
<div class="jumbotron jumbotron-fluid rounded">
    <div class="container">
        <h1 class="display-4">
            Participar en la encuesta
        </h1>
        <p class="lead">
            <i class="material-icons lead-icon">
                keyboard_arrow_right
            </i>
            <?=h($poll->
            title)?>
        </p>
        <p class="lead">
            <i class="material-icons lead-icon">
                place
            </i>
            <?=h($poll->
            place)?>
        </p>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text link-icon">
                    <i class="material-icons ">
                        link
                    </i>
                </span>
            </div>
            <input aria-describedby="basic-addon1" aria-label="Username" class="form-control poll-link" disabled="" placeholder="<?=h($poll->url)?>" type="text">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary " type="button">
                        COPIAR
                    </button>
                </div>
            </input>
        </div>
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">
                        </th>
                        <?php foreach ($users as $user): ?>
                            <th scope="col">
                                <?=h($user->
                                name)?>
                            </th>
                        <?php endforeach;?>
                        <th scope="col">
                            <?=$this->
                            request->getSession()->read('Auth.User.name')?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($gaps as $gap): ?>
                        <tr>
                            <th scope="row">
                                <?=h($gap->
                                startDate)?>
                                <br>
                                    <a>
                                        <?=h($gap->
                                        endDate)?>
                                    </a>
                                </br>
                            </th>
                            <?php foreach ($users as $user):
                                $isAssigned = false;
                                ?>
                                <td>
                                    <?php foreach ($assignations as $assign):
                                        if ($assign['idUser'] == $user->
                                                            idUser && $assign['idGap'] == $gap->idGap) {
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
                                <button class="btn btn-outline-success btn-sm" onclick="toggle.call(this, <?=$this->request->getSession()->read('Auth.User.idUser')?>, <?=h($gap->idGap)?>)" type="button">
                                    <i class="material-icons">
                                        done
                                    </i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            
            <hr class="my-3">

            <?php 
            $input=0;
            foreach ($gaps as $gap): ?>
                <input type="checkbox" id="G<?=h($gap->idGap)?>.<?=$this->request->getSession()->read('Auth.User.idUser')?>" name="<?=$input?>[idGap]" value="<?=h($gap->idGap)?>" hidden>
                <input type="checkbox" id="U<?=h($gap->idGap)?>.<?=$this->request->getSession()->read('Auth.User.idUser')?>"name="<?=$input?>[idUser]" value="<?=$this->request->getSession()->read('Auth.User.idUser')?>" hidden>
            <?php $input++; endforeach;?>

            <div class="col-sm-10 accept-button">
                <?=$this->
                Form->button(__('Enviar'), ["class" => "btn btn-outline-secondary"]);?>
            </div>
            
        </div>
    </div>
</div>
<?=$this->Form->end()?>

<script>
function toggle(idUser, idGap) {
    if ($(this)[0].classList.contains('btn-outline-success')) {
        $(this).removeClass("btn-outline-success");
        $(this).addClass("btn-success");
        document.getElementById("G"+idGap+"."+idUser).checked = true;
        document.getElementById("U"+idGap+"."+idUser).checked = true;
        // console.log("Selected user: "+ idUser + " Gap: " + idGap);
    } else {
        $(this).addClass("btn-outline-success");
        $(this).removeClass("btn-success");
        document.getElementById("G"+idGap+"."+idUser).checked = false;
        document.getElementById("U"+idGap+"."+idUser).checked = false;
        // console.log("Unselected user: "+ idUser + " Gap: " + idGap);
    }
}
</script>

<!-- <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignation $assignation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?=__('Actions')?></li>
        <li><?=$this->Html->link(__('List Assignations'), ['action' => 'index'])?></li>
    </ul>
</nav>
<div class="assignations form large-9 medium-8 columns content">
    <?=$this->Form->create($assignation)?>
    <fieldset>
        <legend><?=__('Add Assignation')?></legend>
        <?php
?>
    </fieldset>
    <?=$this->Form->button(__('Submit'))?>
    <?=$this->Form->end()?>
</div> -->
