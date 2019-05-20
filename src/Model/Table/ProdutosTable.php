<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produtos Model
 *
 * @property \App\Model\Table\PedidosTable|\Cake\ORM\Association\BelongsTo $Pedidos
 *
 * @method \App\Model\Entity\Produto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Produto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Produto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Produto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produto|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Produto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Produto findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProdutosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('produtos');
        $this->setDisplayField('nome_produto');
        $this->setPrimaryKey('id_produto');

        $this->addBehavior('Timestamp');

        $this->hasMany('Pedidos', [
            'foreignKey' => 'id_produto'
        ]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id_produto')
            ->allowEmpty('id_produto', 'create');

        $validator
            ->scalar('sku_produto')
            ->maxLength('sku_produto', 100)
            ->requirePresence('sku_produto', 'create')
            ->notEmpty('sku_produto');

        $validator
            ->scalar('nome_produto')
            ->maxLength('nome_produto', 100)
            ->requirePresence('nome_produto', 'create')
            ->notEmpty('nome_produto');

        $validator
            ->scalar('preco_produto')
            ->maxLength('preco_produto', 12)
            ->requirePresence('preco_produto', 'create')
            ->notEmpty('preco_produto');

        return $validator;
    }

}
