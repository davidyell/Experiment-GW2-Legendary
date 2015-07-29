<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Legendaries Controller
 *
 * @property \App\Model\Table\LegendariesTable $Legendaries
 */
class LegendariesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('legendaries', $this->paginate($this->Legendaries));
        $this->set('_serialize', ['legendaries']);
    }

    /**
     * View method
     *
     * @param string|null $id Legendary id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $legendary = $this->Legendaries->get($id, [
            'contain' => ['Items']
        ]);
        $this->set('legendary', $legendary);
        $this->set('_serialize', ['legendary']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $legendary = $this->Legendaries->newEntity();
        if ($this->request->is('post')) {
            $legendary = $this->Legendaries->patchEntity($legendary, $this->request->data);
            if ($this->Legendaries->save($legendary)) {
                $this->Flash->success(__('The legendary has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The legendary could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('legendary'));
        $this->set('_serialize', ['legendary']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Legendary id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $legendary = $this->Legendaries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $legendary = $this->Legendaries->patchEntity($legendary, $this->request->data);
            if ($this->Legendaries->save($legendary)) {
                $this->Flash->success(__('The legendary has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The legendary could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('legendary'));
        $this->set('_serialize', ['legendary']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Legendary id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $legendary = $this->Legendaries->get($id);
        if ($this->Legendaries->delete($legendary)) {
            $this->Flash->success(__('The legendary has been deleted.'));
        } else {
            $this->Flash->error(__('The legendary could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
