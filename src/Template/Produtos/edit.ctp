<div class="produtos form large-9 medium-8 columns content">
    <?php echo $this->Form->create($produto) ?>
    <fieldset>
        <legend><?php echo __('Editar Produto') ?></legend>
        <?php
            echo $this->Form->control('sku_produto', ['label' => 'SKU']);
            echo $this->Form->control('nome_produto', ['label' => 'Nome']);
            echo $this->Form->control('descricao_produto', ['label' => 'Descrição', 'type' => 'textarea']);
            echo $this->Form->control('preco_produto', ['type' => 'text', 'id' => 'money', 'label' => 'Preço']);
        ?>
    </fieldset>
    <?php echo $this->Form->button(__('Enviar')) ?>
    <?php echo $this->Form->end() ?>
</div>
