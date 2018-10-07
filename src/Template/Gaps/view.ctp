<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gap $gap
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gap'), ['action' => 'edit', $gap->idGap]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gap'), ['action' => 'delete', $gap->idGap], ['confirm' => __('Are you sure you want to delete # {0}?', $gap->idGap)]) ?> </li>
        <li><?= $this->Html->link(__('List Gaps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gap'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gaps view large-9 medium-8 columns content">
    <h3><?= h($gap->idGap) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdGap') ?></th>
            <td><?= $this->Number->format($gap->idGap) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdPoll') ?></th>
            <td><?= $this->Number->format($gap->idPoll) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StartDate') ?></th>
            <td><?= h($gap->startDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EndDate') ?></th>
            <td><?= h($gap->endDate) ?></td>
        </tr>
    </table>
</div>
