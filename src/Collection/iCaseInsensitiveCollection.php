<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Collection;

use AeonDigital\Interfaces\Collection\iBasicCollection as iBasicCollection;







/**
 * Interface que identifica uma coleção como sendo ``caseInsensitive``.
 *
 * Por padrão, as chaves dos itens da coleção recebem tratamento ``case sensitive``, ou seja,
 * ``Key != key != KEY``.
 *
 * No caso da implementação desta interface as chaves de nomes iguais mas que variam em seu
 * ``case`` devem ser tratados como sendo a mesma chave, ou seja, ``Key == key == KEY``
 *
 * @package     AeonDigital\Interfaces\Collection
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iCaseInsensitiveCollection extends iBasicCollection
{
}
