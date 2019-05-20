<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ProdutosController extends AppController{


    public function index()
    {


        $produtos = $this->paginate($this->Produtos);

        $this->set(compact('produtos'));
    }


    public function add()
    {
        $produto = $this->Produtos->newEntity();
        if ($this->request->is('post')) {

            $precoFinal = str_replace('.', '', $this->request->getData()["preco_produto"]);
            $precoFinal = str_replace(',', '.', $precoFinal);

            $data = $this->request->getData();

            $data['preco_produto'] = $precoFinal;

            $produto = $this->Produtos->patchEntity($produto, $data);
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('Produto cadastrado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Produto não pode ser cadastrado, tente novamente.'));
        }
        $pedidos = $this->Produtos->Pedidos->find('list', ['limit' => 200]);
        $this->set(compact('produto', 'pedidos'));
    }


    public function edit($id = null)
    {

        try{
            $produto = $this->Produtos->get($id, [
                'contain' => []
            ]);

            $produto->preco_produto = number_format($produto->preco_produto, 2, ',', '.');

            if ($this->request->is(['patch', 'post', 'put'])) {

                $precoFinal = str_replace('.', '', $this->request->getData()["preco_produto"]);
                $precoFinal = str_replace(',', '.', $precoFinal);

                $data = $this->request->getData();

                $data['preco_produto'] = $precoFinal;

                $produto = $this->Produtos->patchEntity($produto, $data);
                if ($this->Produtos->save($produto)) {
                    $this->Flash->success(__('Produto atualizado com sucesso.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Produto não pode ser atualizado, tente novamente.'));
            }
            $pedidos = $this->Produtos->Pedidos->find('list', ['limit' => 200]);
            $this->set(compact('produto', 'pedidos'));

        }
        catch(\Exception $e){
            return $this->redirect(['action' => 'index']);
        }

    }


    public function delete($id = null)
    {

        try{
            $this->request->allowMethod(['post', 'delete']);

            $pedidoTable = TableRegistry::get('Pedidos');
            $pedido = $pedidoTable->find('all')->where(['id_produto' => $id])->count();

            if($pedido == 0){

                $produtos = $this->Produtos->get($id);

                if ($this->Produtos->delete($produtos)) {
                    $this->Flash->success(__('Produto excluído com sucesso.'));
                } else {
                    $this->Flash->error(__('Produto não pode ser excluído, tente novamente.'));
                }
            }
            else{
                $this->Flash->error(__('Existem registros associados a esse produto. Produto não pode ser excluído.'));
            }

            return $this->redirect(['action' => 'index']);
        }catch(\Exception $e){
            $this->Flash->error(__('Existem registros associados a esse produto. Produto não pode ser excluído.'));
            return $this->redirect(['action' => 'index']);
        }
    }

}
