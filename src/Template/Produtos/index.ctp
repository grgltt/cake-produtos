<div class="produtos index large-9 medium-8 columns content">
    <h3><?php echo __('Produtos') ?></h3>

    <?php echo $this->Html->link(__('Cadastrar Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?php echo $produto->id_produto ?></td>
                <td><?php echo $produto->nome_produto ?></td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Editar'), ['action' => 'edit', $produto->id_produto]) ?>
                    <?php echo $this->Form->postLink(__('Excluir'), ['action' => 'delete', $produto->id_produto], ['confirm' => __('Tem certeza que deseja excluir o registro?', $produto->id_produto)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
