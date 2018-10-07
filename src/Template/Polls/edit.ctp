<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Poll $poll
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $poll->idPoll],
                ['confirm' => __('Are you sure you want to delete # {0}?', $poll->idPoll)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Polls'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="polls form large-9 medium-8 columns content">
    <?= $this->Form->create($poll) ?>
    <fieldset>
        <legend><?= __('Edit Poll') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('place');
            echo $this->Form->control('author');
            echo $this->Form->control('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
