<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste CakePHP - <?php echo $this->fetch('title') ?></title>
    <?php echo $this->Html->meta('icon') ?>

    <?php echo $this->Html->css('base.css') ?>
    <?php echo $this->Html->css('style.css') ?>

    <?php echo $this->fetch('meta') ?>
    <?php echo $this->fetch('css') ?>
    <?php echo $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?php echo $this->fetch('title') ?></a></h1>
            </li>
        </ul>
    </nav>

    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="side-nav">
            <li class="heading"><?php echo __('Ações') ?></li>
            <li><?php echo $this->Html->link(__('Listar Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
            <li><?php echo $this->Html->link(__('Listar Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        </ul>
    </nav>

    <?php echo $this->Flash->render() ?>
    <div class="container clearfix">
        <?php echo $this->fetch('content') ?>
    </div>

    <?php echo $this->Html->script('jquery.min') ?>
    <?php echo $this->Html->script('jquery.maskMoney') ?>

    <script type="text/javascript">
$(function(){
 $("#money").maskMoney({symbol:'R$ ', 
showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
 })
</script>

</body>
</html>
