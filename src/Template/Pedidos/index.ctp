<div class="pedidos index large-9 medium-8 columns content">
    <h3><?php echo __('Pedidos') ?></h3>

    <?php echo $this->Html->link(__('Cadastrar Pedido'), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th width="50">ID</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Data/Hora</th>
                <th>Ação</th>
              
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido): ?>
            <tr>
                <td><?php echo $pedido->id_pedido ?></td>
                <td><?php echo $pedido->produto->nome_produto ?></td>
                <td><?php echo $pedido->quantidade_pedido ?></td>
                <td><?php echo $pedido->data_pedido->i18nFormat('dd/MM/yyyy HH:mm:ss') ?></td>
                <td class="actions">
                    <?php echo $this->Form->postLink(__('Excluir'), ['action' => 'delete', $pedido->id_pedido], ['confirm' => __('Tem certeza que deseja excluir o registro?', $pedido->id_pedido)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
