<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pedidos Model
 *
 * @property \App\Model\Table\ProdutosTable|\Cake\ORM\Association\HasMany $Produtos
 *
 * @method \App\Model\Entity\Pedidos get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pedidos newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pedidos[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pedidos|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pedidos|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pedidos patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pedidos[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pedidos findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PedidosTable extends Table
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

        $this->setTable('pedidos');
        $this->setDisplayField('id_pedido');
        $this->setPrimaryKey('id_pedido');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Produtos', [
            'foreignKey' => 'id_produto',
            'joinType' => 'INNER'
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
            ->integer('id_pedido')
            ->allowEmpty('id_pedido', 'create');

        $validator
            ->integer('id_produto')
            ->requirePresence('id_produto', 'create')
            ->notEmpty('id_produto');

        $validator
            ->scalar('quantidade_pedido')
            //->maxLength('quantidade_pedido', 10)
            ->requirePresence('quantidade_pedido', 'create')
            ->notEmpty('quantidade_pedido');

        return $validator;
    }


    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['id_produto'], 'Produtos'));

        return $rules;
    }

}
