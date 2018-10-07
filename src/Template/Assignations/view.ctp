<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignation $assignation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Assignation'), ['action' => 'edit', $assignation->idGap]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Assignation'), ['action' => 'delete', $assignation->idGap], ['confirm' => __('Are you sure you want to delete # {0}?', $assignation->idGap)]) ?> </li>
        <li><?= $this->Html->link(__('List Assignations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assignation'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="assignations view large-9 medium-8 columns content">
    <h3><?= h($assignation->idGap) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdUser') ?></th>
            <td><?= $this->Number->format($assignation->idUser) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdGap') ?></th>
            <td><?= $this->Number->format($assignation->idGap) ?></td>
        </tr>
    </table>
</div>
