<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Collection;

use AeonDigital\Interfaces\Collection\iBasicCollection as iBasicCollection;








/**
 * Interface que identifica uma coleção como sendo ``immutable``.
 *
 * O objetivo desta interface é **PROTEGER O ESTADO ORIGINALMENTE DEFINIDO** de um dado
 * valor tal qual ele foi inicialmente inserido. A partir deste momento NENHUMA outra
 * alteração daquele objeto poderá ser feita e a collection será como um provedor daqueles
 * objetos com seus respectivos estados.
 *
 * Coleções deste tipo PODEM ganhar ou perder novos valores mas NENHUM item existênte
 * pode ser substituído ou alterado sem ser efetivamente removido usando o método ``remove``.
 *
 * @package     AeonDigital\Collection
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2019, Rianna Cantarelli
 * @license     MIT
 */
interface iImmutableCollection extends iBasicCollection
{




    /**
     * Nesta interface este método irá clonar o objeto indicado para assim mantê-lo seguro
     * de qualquer posterior alteração.
     *
     * Quando houver uma tentativa de alterar um valor já definido uma exception deve ser
     * lançada.
     *
     *
     * @param       string $key
     *              Nome da chave.
     *
     * @param       mixed $value
     *              Valor que será associado.
     *
     * @return      void
     *
     * @throws      \InvalidArgumentException
     *              Caso alguma regra proposta por uma classe concreta impeça o valor indicado
     *              de ser adicionado na coleção.
     *
     * @throws      \RuntimeException
     *              Caso esteja tentando alterar um valor já existente.
     */
    public function set(string $key, $value) : void;



    /**
     * Nesta interface, quando o valor a ser retornado for um array ou uma instância de um
     * objeto, será SEMPRE retornado um clone do valor armazenado mantendo assim o estado
     * original do mesmo.
     *
     *
     * @param       string $key
     *              Nome da chave cujo valor deve ser retornado.
     *
     * @return      mixed|null
     *
     *
     * @throws      \InvalidArgumentException
     *              Caso a regra da classe concreta defina que em caso de ser passado uma
     *              chave inexistente seja lançada uma exception.
     */
    public function get(string $key);



    /**
     * Nesta interface este método deve funcionar normalmente sem qualquer forma de restrição.
     *
     * As regras da interface apenas preveem que a alteração ou substituição de valores
     * PRÉ-EXISTENTES sejam protegidos de alteração portanto uma chave com um dado valor
     * pode ser removida e depois READICIONADA contendo um novo valor.
     *
     *
     * @param       string $key
     *              Nome da chave do valor que será excluído.
     *
     * @return      void
     *
     * @throws      \InvalidArgumentException
     *              Caso a regra da classe concreta defina que em caso de ser passado uma
     *              chave inexistente seja lançada uma exception.
     *
     * @throws      \RuntimeException
     *              Caso alguma regra da classe concreta impeça esta ação de ser executada.
     */
    public function remove(string $key) : void;
}
