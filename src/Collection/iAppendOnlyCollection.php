<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Collection;

use AeonDigital\Interfaces\Collection\iBasicCollection as iBasicCollection;








/**
 * Interface que identifica uma coleção como sendo ``appendOnly``.
 *
 * Quando implementada DEVE impedir qualquer forma de remoção de valores previamente definidos.
 * Note que o valor PODE ainda ser alterado, no entanto, uma chave que seja definida uma vez
 * permanecerá na ``collection`` até o final de sua vida.
 *
 * A junção desta interface com ``iProtectedCollection`` formará uma ``collection`` que pode ser
 * incrementada ilimitadamente mas que não poderá ter nenhum de seus valores alterados nem
 * excluídos.
 *
 * @package     AeonDigital\Interfaces\Collection
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iAppendOnlyCollection extends iBasicCollection
{




    /*
     * INSTRUÇÕES DE USO
     *
     * ``remove(string $key) : bool``
     *
     * Este método NUNCA deve funcionar quando usado com esta interface.
     * É indicado que, ao ser usado, ele retorne sempre ``false``.
     */
}
