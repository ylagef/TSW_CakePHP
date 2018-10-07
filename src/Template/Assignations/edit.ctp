<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assignation $assignation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $assignation->idGap],
                ['confirm' => __('Are you sure you want to delete # {0}?', $assignation->idGap)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Assignations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="assignations form large-9 medium-8 columns content">
    <?= $this->Form->create($assignation) ?>
    <fieldset>
        <legend><?= __('Edit Assignation') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
