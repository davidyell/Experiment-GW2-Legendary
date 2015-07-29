<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 */
class ItemsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Legendaries', 'Ingredients', 'ParentItems']
        ];
        $this->set('items', $this->paginate($this->Items));
    }

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Legendaries', 'Ingredients', 'ParentItems', 'ChildItems']
        ]);
        $this->set('item', $item);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $item = $this->Items->newEntity();
        if ($this->request->is('post')) {
            $this->Items->behaviors()->Tree->config('scope', ['legendary_id' => $this->request->data['legendary_id']]);

            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
        }
        $legendaries = $this->Items->Legendaries->find('list', ['limit' => 200]);
        $ingredients = $this->Items->Ingredients->find('list', ['limit' => 200]);
        $parentItems = $this->Items->ParentItems->find('treeList', [
                'keyPath' => function ($entity) {
                    return $entity->id;
                },
                'valuePath' => function ($entity) {
                    return $entity->ingredient->name;
                }
            ])
            ->contain(['Ingredients']);
        $this->set(compact('item', 'legendaries', 'ingredients', 'parentItems'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->Items->behaviors()->Tree->config('scope', ['legendary_id' => $this->request->data['legendary_id']]);

            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
        }
        $legendaries = $this->Items->Legendaries->find('list', ['limit' => 200]);
        $ingredients = $this->Items->Ingredients->find('list', ['limit' => 200]);
        $parentItems = $this->Items->ParentItems->find('treeList', [
                'keyPath' => function ($entity) {
                    return $entity->id;
                },
                'valuePath' => function ($entity) {
                    return $entity->ingredient->name;
                }
            ])
            ->contain(['Ingredients']);
        $this->set(compact('item', 'legendaries', 'ingredients', 'parentItems'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
