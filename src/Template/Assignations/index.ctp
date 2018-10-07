<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignation[]|\Cake\Collection\CollectionInterface $assignations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Assignation'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="assignations index large-9 medium-8 columns content">
    <h3><?= __('Assignations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idUser') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idGap') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assignations as $assignation): ?>
            <tr>
                <td><?= $this->Number->format($assignation->idUser) ?></td>
                <td><?= $this->Number->format($assignation->idGap) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $assignation->idGap]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $assignation->idGap]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $assignation->idGap], ['confirm' => __('Are you sure you want to delete # {0}?', $assignation->idGap)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
