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
        $poll = $this->Polls->find()->where(['poll_id' => $id])->first(); // Gaps of poll
        $this->set('poll', $poll);


        $this->loadModel('Gaps');
            $gaps = $this->Gaps->find()->where(['poll_id' => $id]); // Gaps of poll
        $this->set('gaps', $gaps);

        
        $this->loadModel('Users');
        $this->loadModel('Assignations');

        $pollGaps1 = $this->Gaps->find()->where(['poll_id' => $id]); //Gaps id of poll
        $assignations1 = $this->Assignations->find()->where(['gap_id in' => $pollGaps1->select('gap_id')]); // Assignated gaps of poll
        $users = $this->Users->find()->where(['user_id in'=>$assignations1->select('user_id')]); // All users (change to just participators)
        $this->set('users', $users->toArray());
    
        $pollGaps = $this->Gaps->find()->where(['poll_id' => $id])->select('gap_id'); //Gaps id of poll
        $assignations = $this->Assignations->find()->where(['gap_id in' => $pollGaps]); // Assignated gaps of poll
        $this->set('assignations', $assignations->toArray());

        $assignation = $this->Assignations->newEntity();
        
        if ($this->request->is('post')) {
            debug($this->request->getData());
            $assignations = $this->Assignations->newEntities($this->request->getData());
        
            foreach ($assignations as $assignation){
                if(!$this->Assignations->save($assignation)){
                    $this->Flash->error(__('La asignación no se pudo crear. Inténtalo otra vez.'));
                }
            }

            return $this->redirect(['controller'=>'Polls', 'action' => 'view', $id]);
            
            // if ($this->Assignations->save($assignation)) {
            //     $this->Flash->success(__('Asignación creada correctamente.'));

            //     return $this->redirect(['action' => 'index']);
            // }
            // $this->Flash->error(__('La asignación no se pudo crear. Inténtalo otra vez.'));
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
        $this->loadModel('Polls');
        $poll = $this->Polls->find()->where(['poll_id' => $id])->first(); // Gaps of poll
        $this->set('poll', $poll);


        $this->loadModel('Gaps');
        $gaps = $this->Gaps->find()->where(['poll_id' => $id]); // Gaps of poll
        $this->set('gaps', $gaps);

        
        $this->loadModel('Users');
        $this->loadModel('Assignations');

        $pollGaps1 = $this->Gaps->find()->where(['poll_id' => $id]); //Gaps id of poll
        $assignations1 = $this->Assignations->find()->where(['gap_id in' => $pollGaps1->select('gap_id')]); // Assignated gaps of poll
        $users = $this->Users->find()->where(['user_id in'=>$assignations1->select('user_id'),'user_id !='=>$this->Auth->user('user_id')]); // All users (change to just participators)
        $this->set('users', $users->toArray());
    
        $pollGaps = $this->Gaps->find()->where(['poll_id' => $id])->select('gap_id'); //Gaps id of poll
        $assignations = $this->Assignations->find()->where(['gap_id in' => $pollGaps]); // Assignated gaps of poll
        $this->set('assignations', $assignations->toArray());

        $assignation = $this->Assignations->newEntity();
        
        $deletePollGaps = $this->Gaps->find()->select('gap_id')->where(['poll_id' => $id]); //Gaps id of poll
        $deleteAssignations = $this->Assignations->find()->where(['gap_id in' => $deletePollGaps]); // Assignated gaps of poll

        if ($this->request->is('post')) {
            $assignations = $this->Assignations->newEntities($this->request->getData());
        
            foreach($deleteAssignations as $delete){
                if($delete["user_id"]==$this->Auth->user('user_id')){
                    $assignationToDelete = $this->Assignations->get($delete["assignation_id"]);
                    $this->Assignations->delete($assignationToDelete);
                }
            }

            foreach ($assignations as $assignation){
                if(!$this->Assignations->save($assignation)){
                    $this->Flash->error(__('La asignación no se pudo crear. Inténtalo otra vez.'));
                }
            }

            return $this->redirect(['controller'=>'Polls', 'action' => 'view', $id]);
            
            // if ($this->Assignations->save($assignation)) {
            //     $this->Flash->success(__('Asignación creada correctamente.'));

            //     return $this->redirect(['action' => 'index']);
            // }
            // $this->Flash->error(__('La asignación no se pudo crear. Inténtalo otra vez.'));
        }

        $this->set(compact('assignation'));
    

        // $assignation = $this->Assignations->get($id, [
        //     'contain' => []
        // ]);
        // if ($this->request->is(['patch', 'post', 'put'])) {
        //     $assignation = $this->Assignations->patchEntity($assignation, $this->request->getData());
        //     if ($this->Assignations->save($assignation)) {
        //         $this->Flash->success(__('Asignación editada correctamente.'));

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('La asignación no se pudo editar. Inténtalo otra vez.'));
        // }
        // $this->set(compact('assignation'));
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
            $this->Flash->success(__('Asignación eliminada correctamente.'));
        } else {
            $this->Flash->error(__('La asignación no se pudo eliminar. Inténtalo otra vez.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
