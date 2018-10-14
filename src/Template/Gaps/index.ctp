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
                <th scope="col"><?= $this->Paginator->sort('gap_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('poll_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gaps as $gap): ?>
            <tr>
                <td><?= $this->Number->format($gap->gap_id) ?></td>
                <td><?= $this->Number->format($gap->poll_id) ?></td>
                <td><?= h($gap->start_date) ?></td>
                <td><?= h($gap->end_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gap->gap_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gap->gap_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gap->gap_id], ['confirm' => __('Are you sure you want to delete # {0}?', $gap->gap_id)]) ?>
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
