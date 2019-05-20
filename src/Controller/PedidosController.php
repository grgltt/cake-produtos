<?php
namespace App\Controller;

use App\Controller\AppController;

class PedidosController extends AppController
{


    public function index()
    {
        $this->paginate = [
            'contain' => ['Produtos']
        ];
        $pedidos = $this->paginate($this->Pedidos);

        $this->set(compact('pedidos'));
    }


    public function add()
    {
        $pedidos = $this->Pedidos->newEntity();
        if ($this->request->is('post')) {
            $pedidos = $this->Pedidos->patchEntity($pedidos, $this->request->getData());
            if ($this->Pedidos->save($pedidos)) {
                $this->Flash->success(__('Pedido cadastrado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Pedido não pode ser cadastrado, tente novamente.'));
        }

        $produtos = $this->Pedidos->Produtos->find('list', ['limit' => 200]);

        $this->set(compact('pedidos', 'produtos'));
    }


    public function delete($id = null)
    {
        try{
            $this->request->allowMethod(['post', 'delete']);
            $pedido = $this->Pedidos->get($id);
            if ($this->Pedidos->delete($pedido)) {
                $this->Flash->success(__('Pedido excluído com sucesso.'));
            } else {
                $this->Flash->error(__('Pedido não pode ser excluído, tente novamente.'));
            }

            return $this->redirect(['action' => 'index']);
        }catch(\Exception $e){
            return $this->redirect(['action' => 'index']);
        }

    }

}
