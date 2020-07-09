<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\ORM;

use AeonDigital\Interfaces\ORM\iColumn as iColumn;








/**
 * Expande a interface ``iColumn`` para permitir representar colunas de dados que são
 * chaves extrangeiras (FK).
 *
 * @package     AeonDigital\ORM
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iColumnFK extends iColumn
{





    /**
     * Retorna a descrição para ser usada na documentação SQL de uma chave extrangeira.
     *
     * @return      ?string
     */
    function getFKDescription() : ?string;


    /**
     * Indica se os objetos filhos (que recebem a FK) aceita serem orfãos, ou seja, se
     * podem existir sem vínculo com com o objeto pai.
     *
     * @return      bool
     */
    function isFKAllowNull() : bool;


    /**
     * Indica se os objetos filhos (que recebem a FK) exigem exclusividade na relação com
     * seus respectivos objetos pai, ou seja, nenhum objeto filho pode ter o mesmo objeto pai.
     *
     * @return      bool
     */
    function isFKUnique() : bool;


    /**
     * Indica se o vínculo entre as 2 tabelas de dados se dá por meio de uma ``linkTable``.
     * Quando ``true``, designa que a relação é do tipo ``N-N``.
     *
     * @return      bool
     */
    function isFKLinkTable() : bool;


    /**
     * Retorna a regra definida para o uso da definição ``ON UPDATE``.
     *
     * @return      ?string
     */
    function getFKOnUpdate() : ?string;
    /**
     * Define uma regra de integridade referencial a ser executada no registro que contêm
     * a chave extrangeira sempre que o registro pai for atualizado.
     *
     * As opções válidas são:
     * - ``RESTRICT`` | ``NO ACTION``
     *   Impede a atualização/alteração da coluna que faz o vínculo com a tabela pai
     *   enquanto esta estiver sendo usada por algum registro filho.
     *
     * - ``CASCADE``
     *   No registro que contêm a chave extrangeira, atualiza a coluna que faz o vínculo
     *   com a tabela pai quando esta for alterada.
     *
     * - ``SET NULL``
     *   No registro que contêm a chave extrangeira, define como ``NULL`` a coluna que faz
     *   o vínculo com a tabela pai quando o registro pai for alterado.
     *
     * - ``SET DEFAULT``
     *   No registro que contêm a chave extrangeira, define o valor da coluna que faz o
     *   vínculo com a tabela pai para aquele indicado na regra ``default``.
     */


    /**
     * Retorna a regra definida para o uso da definição ``ON DELETE``.
     *
     * @return      ?string
     */
    function getFKOnDelete() : ?string;
    /**
     * Define uma regra de integridade referencial a ser executada no registro que contêm
     * a chave extrangeira sempre que o registro pai for excluído.
     *
     * As opções válidas são:
     * - ``RESTRICT`` | ``NO ACTION``
     *   Não permitirá que o registro pai seja excluído se há vínculo entre ele e
     *   qualquer outro registro filho.
     *
     * - ``CASCADE``
     *   Se o registro pai for excluído, todos os registros filhos também serão.
     *
     * - ``SET NULL``
     *   No registro que contêm a chave extrangeira, define como ``null`` a coluna que
     *   faz o vínculo com a tabela pai quando o registro pai for excluído.
     *
     * - ``SET DEFAULT``
     *   No registro que contêm a chave extrangeira, define o valor da coluna que faz o
     *   vínculo com a tabela pai para aquele indicado na regra ``default``.
     */
}
