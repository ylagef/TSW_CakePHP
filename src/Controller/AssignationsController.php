<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Assignations Controller
 *
 * @property \App\Model\Table\AssignationsTable $Assignations
 *
 * @method \App\Model\Entity\Assignation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssignationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $assignations = $this->paginate($this->Assignations);

        $this->set(compact('assignations'));
    }

    /**
     * View method
     *
     * @param string|null $id Assignation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assignation = $this->Assignations->get($id, [
            'contain' => []
        ]);

        $this->set('assignation', $assignation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $this->loadModel('Polls');
        $poll = $this->Polls->find()->where(['idPoll' => $id])->first(); // Gaps of poll
        $this->set('poll', $poll);


        $this->loadModel('Gaps');
            $gaps = $this->Gaps->find()->where(['idPoll' => $id]); // Gaps of poll
        $this->set('gaps', $gaps);

        $this->loadModel('Users');
            $users = $this->Users->find(); // All users (change to just participators)
        $this->set('users', $users);

        $this->loadModel('Assignations');
            $pollGaps = $this->Gaps->find()->where(['idPoll' => $id])->select('idGap'); //Gaps id of poll
            $assignations = $this->Assignations->find()->where(['idGap in' => $pollGaps]); // Assignated gaps of poll
        $this->set('assignations', $assignations->toArray());

        $assignation = $this->Assignations->newEntity();
        if ($this->request->is('post')) {
            $assignation = $this->Assignations->patchEntity($assignation, $this->request->getData());
            if ($this->Assignations->save($assignation)) {
                $this->Flash->success(__('The assignation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assignation could not be saved. Please, try again.'));
        }
        $this->set(compact('assignation'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Assignation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assignation = $this->Assignations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assignation = $this->Assignations->patchEntity($assignation, $this->request->getData());
            if ($this->Assignations->save($assignation)) {
                $this->Flash->success(__('The assignation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assignation could not be saved. Please, try again.'));
        }
        $this->set(compact('assignation'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Assignation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assignation = $this->Assignations->get($id);
        if ($this->Assignations->delete($assignation)) {
            $this->Flash->success(__('The assignation has been deleted.'));
        } else {
            $this->Flash->error(__('The assignation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
