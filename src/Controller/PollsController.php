<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Polls Controller
 *
 * @property \App\Model\Table\PollsTable $Polls
 *
 * @method \App\Model\Entity\Poll[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PollsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $polls = $this->paginate($this->Polls);

        $this->set(compact('polls'));
    }

    /**
     * View method
     *
     * @param string|null $id Poll id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $poll = $this->Polls->get($id, [
            'contain' => []
        ]);
        $this->set('poll', $poll);

        $this->loadModel('Gaps');
            $gaps = $this->Gaps->find()->where(['idPoll' => $id]); // Gaps of poll
        $this->set('gaps', $gaps);

        $this->loadModel('Users');
        $this->loadModel('Assignations');

        $pollGaps1 = $this->Gaps->find()->where(['idPoll' => $id]); //Gaps id of poll
        $assignations1 = $this->Assignations->find()->where(['idGap in' => $pollGaps1->select('idGap')]); // Assignated gaps of poll
        // debug($assignations1->select('idUser')->toArray());
        $users = $this->Users->find()->where(['idUser in'=>$assignations1->select('idUser')]); // All users (change to just participators)
        // debug($users->toArray());
        $this->set('users', $users->toArray());
    
        $pollGaps = $this->Gaps->find()->where(['idPoll' => $id])->select('idGap'); //Gaps id of poll
        $assignations = $this->Assignations->find()->where(['idGap in' => $pollGaps]); // Assignated gaps of poll
        $this->set('assignations', $assignations->toArray());
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $poll = $this->Polls->newEntity();
        if ($this->request->is('post')) {
            $poll = $this->Polls->patchEntity($poll, $this->request->getData());
            if ($this->Polls->save($poll)) {
                $this->Flash->success(__('Encuesta creada correctamente.'));

                return $this->redirect(['controller'=>'Gaps','action' => 'add', $poll->id]);
            }
            $this->Flash->error(__('No se pudo crear la encuesta. Inténtalo otra vez.'));
        }
        $this->set(compact('poll'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Poll id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $poll = $this->Polls->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $poll = $this->Polls->patchEntity($poll, $this->request->getData());
            if ($this->Polls->save($poll)) {
                $this->Flash->success(__('The poll has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The poll could not be saved. Please, try again.'));
        }
        $this->set(compact('poll'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Poll id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $poll = $this->Polls->get($id);
        if ($this->Polls->delete($poll)) {
            $this->Flash->success(__('The poll has been deleted.'));
        } else {
            $this->Flash->error(__('The poll could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
