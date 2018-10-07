
    <?=$this->
    Html->css('gapsAdd');
?>
    <!-- CENTRAL JUMBOTRON -->
    <div class="jumbotron jumbotron-fluid rounded">
        <div class="container">
            <h1 class="display-4">
                Crea tu encuesta
            </h1>
            <p class="lead">
                Ahora, dinos las fechas posibles
            </p>
            <form action="fill-poll.html">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text link-icon">
                            <i class="material-icons">
                                link
                            </i>
                        </span>
                    </div>
                    <input aria-describedby="basic-addon1" aria-label="Username" class="form-control poll-link" disabled="" placeholder="www.nuestrodominio.com/18265728r36281r193t67" type="text">
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
                                <th scope="row">
                                    1
                                </th>
                                <td>
                                    <input class="form-control" data-zdp_readonly_element="false" id="datepicker" type="text">
                                    </input>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr class="my-3">
                        <div class="other-option-button">
                            <button class="btn btn-outline-success">
                                Añadir otra opción
                            </button>
                        </div>
                    </hr>
                </div>
                <div class="col-sm-10 accept-button">
                    <button class="btn btn-outline-secondary" type="submit">
                        Finalizar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

    // assuming the controls you want to attach the plugin to
    // have the "datepicker" class set
$('#datepicker').Zebra_DatePicker();
});
    </script>
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
echo $this->Form->control('idPoll');
echo $this->Form->control('startDate');
echo $this->Form->control('endDate');
?>
    </fieldset>
    <?=$this->Form->button(__('Submit'))?>
    <?=$this->Form->end()?>
</div>
 -->
</link>