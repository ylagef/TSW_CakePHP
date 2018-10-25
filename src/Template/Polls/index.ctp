<?= $this->Html->css('pollIndex') ?>

<!-- CENTRAL JUMBOTRON -->
<div class="jumbotron jumbotron-fluid rounded">
    <div class="container">
      <h1 class="display-4">Mis encuestas</h1>

      <div class="row">

        <div class="col-lg-6">
          <div class="table-responsive">
            <table class="table text-center">
              <thead>
                <tr>
                  <th scope="col">Encuestas creadas por mí</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($polls as $poll): ?>
              <?php  if( $this->request->getSession()->read('Auth.User.user_id')==$poll->author){ ?>
                <tr>
                <th scope="row" class="font-weight-normal"><p><?= h($poll->title) ?></p><p class="font-weight-light"><?= h($poll->place) ?></p></th>
                  <td>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $poll->url],['class'=>'btn btn-outline-info  btn-sm text-uppercase']) ?>
                  </td>
                </tr>
                <?php } ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="table-responsive">
            <table class="table text-center">
              <thead>
                <tr>
                  <th scope="col">Encuestas en las que participo (NO!)</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($polls as $poll): ?>
                <tr>
                  <th scope="row" class="font-weight-normal"><p><?= h($poll->title) ?></p><p class="font-weight-light"><?= h($poll->place) ?></p></th>
                  <td>
                  <?= $this->Html->link(__('View'), ['action' => 'view', $poll->url],['class'=>'btn btn-outline-info  btn-sm text-uppercase']) ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>



<!-- <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Poll[]|\Cake\Collection\CollectionInterface $polls
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Poll'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="polls index large-9 medium-8 columns content">
    <h3><?= __('Polls') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('poll_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('place') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($polls as $poll): ?>
            <tr>
                <td><?= $this->Number->format($poll->poll_id) ?></td>
                <td><?= h($poll->title) ?></td>
                <td><?= h($poll->place) ?></td>
                <td><?= $this->Number->format($poll->author) ?></td>
                <td><?= h($poll->url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $poll->poll_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $poll->poll_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $poll->poll_id], ['confirm' => __('Are you sure you want to delete # {0}?', $poll->poll_id)]) ?>
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
</div> -->
