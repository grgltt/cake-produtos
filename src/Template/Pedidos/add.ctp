<div class="pedidos form large-9 medium-8 columns content">
    <?php echo $this->Form->create($pedidos) ?>
    <fieldset>
        <legend><?php echo __('Cadastrar Pedido') ?></legend>
        <?php
            echo $this->Form->control('id_produto', ['options' => $produtos, 'label' => 'Produto']);
            echo $this->Form->control('quantidade_pedido', ['label' => 'Quantidade']);
        ?>
    </fieldset>
    <?php echo $this->Form->button(__('Enviar')) ?>
    <?php echo $this->Form->end() ?>
</div>
