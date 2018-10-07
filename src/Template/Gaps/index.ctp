<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gap[]|\Cake\Collection\CollectionInterface $gaps
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Gap'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gaps index large-9 medium-8 columns content">
    <h3><?= __('Gaps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idGap') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idPoll') ?></th>
                <th scope="col"><?= $this->Paginator->sort('startDate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('endDate') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gaps as $gap): ?>
            <tr>
                <td><?= $this->Number->format($gap->idGap) ?></td>
                <td><?= $this->Number->format($gap->idPoll) ?></td>
                <td><?= h($gap->startDate) ?></td>
                <td><?= h($gap->endDate) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gap->idGap]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gap->idGap]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gap->idGap], ['confirm' => __('Are you sure you want to delete # {0}?', $gap->idGap)]) ?>
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
