<?=$this->Html->css('gapsAdd')?>

<!-- CENTRAL JUMBOTRON -->
<?=$this->Form->create($gap, array('onsubmit' => "return setArray(" . $poll_id . ");"));?>
<script>var rows=[];</script>
    <div class="jumbotron jumbotron-fluid rounded">
        <div class="container">
            <h1 class="display-4">
                Crea tu encuesta
            </h1>
            <p class="lead">
                Ahora, dinos las fechas posibles
            </p>
            
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
                        <tr>
                            <td>
                                <input class="form-control floating-label text-center date" id="date0" placeholder="Fecha" type="text" >
                            </td>
                            <td>
                                <input class="form-control floating-label text-center startTime" id="startTime0" placeholder="Hora inicio" type="text">
                            </td>
                            <td>
                                <input class="form-control floating-label text-center endTime" id="endTime0" placeholder="Hora fin" type="text">
                            </td>
                            <script> rows.push(0);</script>
                        </tr>
                    </tbody>
                </table>
                <hr class="my-3">
                <div class="other-option-button">
                    <button class="btn btn-outline-success" onClick="addRow()" type="button">
                        Añadir otra opción
                    </button>
                </div>
            </div>

            <div class="col-sm-10 accept-button">
                <?= $this->Form->button(__('Finalizar'), ["class"=>"btn btn-outline-secondary"]) ?>
            </div>
            
        </div>
    </div> 
<div id="inputs"></div>

<?=$this->Form->end()?>

<?=$this->Html->script('gaps');?>

<!-- <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gap $gap
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?=__('Actions')?></li>
        <li><?=$this->Html->link(__('List Gaps'), ['action' => 'index'])?></li>
    </ul>
</nav>
<div class="gaps form large-9 medium-8 columns content">
    <?=$this->Form->create($gap)?>
    <fieldset>
        <legend><?=__('Add Gap')?></legend>
        <?php
echo $this->Form->control('poll_id');
echo $this->Form->control('start_date');
echo $this->Form->control('end_date');
?>
    </fieldset>
    <?=$this->Form->button(__('Submit'))?>
    <?=$this->Form->end()?>
</div>
 -->
