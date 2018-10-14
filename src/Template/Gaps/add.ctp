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
            <div class="table-responsive">
                <table class="table text-center" id="gapsTable">
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
                                <input class="form-control floating-label text-center" id="date" placeholder="Fecha" type="text">
                            </td>
                            <td>
                                <input class="form-control floating-label text-center" id="startTime" placeholder="Hora inicio" type="text">
                            </td>
                            <td>
                                <input class="form-control floating-label text-center" id="endTime" placeholder="Hora fin" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                2
                            </th>
                            <td>
                                <input class="form-control floating-label text-center" id="date" placeholder="Fecha" type="text">
                            </td>
                            <td>
                                <input class="form-control floating-label text-center" id="startTime" placeholder="Hora inicio" type="text">
                            </td>
                            <td>
                                <input class="form-control floating-label text-center" id="endTime" placeholder="Hora fin" type="text">
                            </td>
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
                <button class="btn btn-outline-secondary" type="submit">
                    Finalizar
                </button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    var rows=[0];

    $(document).ready(
        function() {
            $('#date').bootstrapMaterialDatePicker({
                time: false,
                clearButton: true,
                minDate : new Date()
            });

            $('#startTime').bootstrapMaterialDatePicker({
                date: false,
                shortTime: false,
                format: 'HH:mm'
            });

            $('#endTime').bootstrapMaterialDatePicker({
                date: false,
                shortTime: false,
                format: 'HH:mm'
            });
        }
    );

    function addRow(){
        rows.push(rows.length);
        console.log(rows);

        var x=document.getElementById('gapsTable').insertRow(1);
        var c1=x.insertCell(0);
        var c2=x.insertCell(1);
        var c3=x.insertCell(2);
        var c4=x.insertCell(3);
        c1.innerHTML="1";
        c2.innerHTML="<input class='form-control floating-label text-center' id='date' placeholder='Fecha' type='text'>";
        c3.innerHTML="<input class='form-control floating-label text-center' id='startTime' placeholder='Hora inicio' type='text'>";
        c4.innerHTML="<input class='form-control floating-label text-center' id='endTime' placeholder='Hora fin' type='text'>";
    }

    function deleteRow(id){
        var index = rows.indexOf(id);
        if (index > -1) {
            rows.splice(index, 1);
        }
    }
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
echo $this->Form->control('poll_id');
echo $this->Form->control('start_date');
echo $this->Form->control('end_date');
?>
    </fieldset>
    <?=$this->Form->button(__('Submit'))?>
    <?=$this->Form->end()?>
</div>
 -->
