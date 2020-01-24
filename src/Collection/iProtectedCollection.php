<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Collection;

use AeonDigital\Interfaces\Collection\iBasicCollection as iBasicCollection;








/**
 * Interface que identifica uma coleção como sendo ``protected``.
 *
 * O objetivo desta interface é **PROTEGER O ESTADO ORIGINALMENTE DEFINIDO** de um dado valor tal
 * qual ele foi inicialmente inserido. A partir deste momento NENHUMA outra alteração daquele
 * objeto poderá ser feita e a ``collection`` será como um provedor daqueles objetos com seus
 * respectivos estados.
 *
 * Coleções deste tipo PODEM GANHAR ou PERDER valores mas NENHUM item atualmente existênte pode
 * ser alterado.
 *
 * Note que um item qualquer pode ser totalmente removido e depois um novo pode ser adicionado
 * usando a mesma chave do anterior.
 *
 * @package     AeonDigital\Interfaces\Collection
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2019, Rianna Cantarelli
 * @license     MIT
 */
interface iProtectedCollection extends iBasicCollection
{




    /*
     * INSTRUÇÕES DE USO
     *
     * ``set(string $key, $value) : bool``
     *
     * Este método deverá clonar o objeto passado para assim mantê-lo seguro de qualquer
     * posterior alteração.
     *
     * Quando houver uma tentativa de alterar um valor já definido uma exception deve ser
     * lançada.
     *
     *
     *
     * ``get(string $key)``
     *
     * Quando o valor a ser retornado for um ``array`` ou uma instância de um objeto, estes
     * serão SEMPRE clonados e seus clones é que serão retornados.
     * Tal comportamento é necessário para garantir manter o estado original do mesmo.
     *
     *
     *
     * ``remove(string $key) : bool``
     *
     * Nesta interface este método deve funcionar normalmente sem qualquer forma de restrição.
     *
     * As regras da interface apenas preveem que a ALTERAÇÃO/SUBSTITUIÇÃO de valores EXISTENTES
     * sejam protegidos mas não a sua remoção e nem a futura adição de um outro valor usando
     * uma chave que já não faz mais parte da coleção.
     */
}
