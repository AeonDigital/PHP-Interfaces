<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Collection;

use AeonDigital\Interfaces\Collection\iProtectedCollection as iProtectedCollection;








/**
 * Interface que identifica uma coleção como sendo ``readOnly``.
 *
 * Esta interface deve ser entendida como uma forma ainda mais restritiva da interface
 * ``iProtectedCollection`` pois, além de não permitir que nenhum estado dos objetos armazenados
 * seja alterado, ele também não permite qualquer alteração na coleção em si.
 *
 * Neste caso a coleção DEVE ser definida no construtor da classe e após isto NENHUMA outra
 * alteração pode ser executada nos valores que estão armazenados.
 *
 * @package     AeonDigital\Interfaces\Collection
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iReadOnlyCollection extends iProtectedCollection
{




    /*
     * INSTRUÇÕES DE USO
     *
     * ``set(string $key, $value) : bool``
     *
     * Este método NUNCA deve funcionar quando usado com esta interface.
     * É indicado que, ao ser usado, ele retorne sempre ``false``.
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
     * Este método NUNCA deve funcionar quando usado com esta interface.
     * É indicado que, ao ser usado, ele retorne sempre ``false``.
     */
}
