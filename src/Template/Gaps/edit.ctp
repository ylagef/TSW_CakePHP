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
                ['action' => 'delete', $gap->gap_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $gap->gap_id)]
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
            echo $this->Form->control('poll_id');
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
