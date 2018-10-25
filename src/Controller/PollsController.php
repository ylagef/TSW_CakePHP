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
    public function view($url = null)
    {
         $poll = $this->Polls->find()->where(['url' => $url])->first();
        $this->set('poll', $poll);

         $id=$poll->poll_id;

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
        
            $poll->url=hash("md5", ($poll->title."hash difficult text"));
           
            if ($this->Polls->save($poll)) {
                $this->Flash->success(__('Encuesta creada correctamente.'));

                return $this->redirect(['controller'=>'Gaps','action' => 'add', $poll->url]);
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
    public function edit($url = null)
    {
        $poll = $this->Polls->find()->where(['url' => $url])->first();
        $this->set('poll', $poll);

         $id=$poll->poll_id;

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

        if ($this->request->is(['patch', 'post', 'put'])) {
            $error=false;
            $poll = $this->Polls->patchEntity($poll, $this->request->getData());
            
            $formGaps =  $this->request->getData();
            
            if ($this->Polls->save($poll)) {
                $alreadyOnDb=array();
                $newGaps=array();

                foreach ($formGaps as $gap){
                    if(is_array($gap)){
                        if(array_key_exists("gap_id", $gap)){
                            // Already in db then not deleted
                            $dbGap=$this->Gaps->get($gap["gap_id"]);
                            $alreadyOnDb[]=$dbGap;
                        }else{
                            // New gap always put on db
                            $newGap = $this->Gaps->newEntity();
                            $newGap = $this->Gaps->patchEntity($newGap, $gap);
                            $newGaps[]=$newGap;
                        }
                    }
                }

                foreach($gaps as $g){
                    if(!in_array($g, $alreadyOnDb)){
                        // Delete from db
                        if(!$this->Gaps->delete($g)){
                            $error=true;
                        }
                    }
                }

                foreach($newGaps as $g){
                    // Insert all into db
                     if(!$this->Gaps->save($g)){
                            $error=true;
                        }
                }

                if(!$error){
                    $this->Flash->success(__('The poll and gaps has been saved.'));
                    return $this->redirect(['action' => 'view', $url]);
                }
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
