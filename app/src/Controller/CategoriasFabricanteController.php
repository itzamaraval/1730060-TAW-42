<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CategoriasFabricante Controller
 *
 * @property \App\Model\Table\CategoriasFabricanteTable $CategoriasFabricante
 * @method \App\Model\Entity\CategoriasFabricante[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriasFabricanteController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $categoriasFabricante = $this->paginate($this->CategoriasFabricante);

        $this->set(compact('categoriasFabricante'));
    }

    /**
     * View method
     *
     * @param string|null $id Categorias Fabricante id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoriasFabricante = $this->CategoriasFabricante->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('categoriasFabricante'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoriasFabricante = $this->CategoriasFabricante->newEmptyEntity();
        if ($this->request->is('post')) {
            $categoriasFabricante = $this->CategoriasFabricante->patchEntity($categoriasFabricante, $this->request->getData());
            if ($this->CategoriasFabricante->save($categoriasFabricante)) {
                $this->Flash->success(__('The categorias fabricante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categorias fabricante could not be saved. Please, try again.'));
        }
        $this->set(compact('categoriasFabricante'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Categorias Fabricante id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoriasFabricante = $this->CategoriasFabricante->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoriasFabricante = $this->CategoriasFabricante->patchEntity($categoriasFabricante, $this->request->getData());
            if ($this->CategoriasFabricante->save($categoriasFabricante)) {
                $this->Flash->success(__('The categorias fabricante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categorias fabricante could not be saved. Please, try again.'));
        }
        $this->set(compact('categoriasFabricante'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Categorias Fabricante id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoriasFabricante = $this->CategoriasFabricante->get($id);
        if ($this->CategoriasFabricante->delete($categoriasFabricante)) {
            $this->Flash->success(__('The categorias fabricante has been deleted.'));
        } else {
            $this->Flash->error(__('The categorias fabricante could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
