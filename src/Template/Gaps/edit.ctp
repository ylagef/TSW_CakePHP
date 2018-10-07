<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gap $gap
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $gap->idGap],
                ['confirm' => __('Are you sure you want to delete # {0}?', $gap->idGap)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Gaps'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="gaps form large-9 medium-8 columns content">
    <?= $this->Form->create($gap) ?>
    <fieldset>
        <legend><?= __('Edit Gap') ?></legend>
        <?php
            echo $this->Form->control('idPoll');
            echo $this->Form->control('startDate');
            echo $this->Form->control('endDate');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
