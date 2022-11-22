<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\DataModel;

use AeonDigital\Interfaces\DataModel\iField as iField;
use AeonDigital\Interfaces\DataModel\iModel as iModel;
use AeonDigital\undefined as undefined;





/**
 * Expande a interface ``iField`` dando a ela a capacidade de possuir valores que são
 * instâncias ``iModel``.
 *
 * **Propriedades padrão**
 *
 * As seguintes propriedades básicas terão seus valores predefinidos e não devem poder
 * ser alterados:
 * - type                  = ``string``
 * - inputFormat           = ``null``
 * - length                = ``null``
 * - min                   = ``null``
 * - max                   = ``null``
 * - allowEmpty            = ``false``
 * - convertEmptyToNull    = ``false``
 * - default               = ``undefined``
 * - enumerator            = ``undefined``
 *
 *
 * @package     AeonDigital\Interfaces\DataModel
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iFieldModel extends iField
{





    /**
     * Verifica se algum valor já foi definido para algum campo deste modelo de dados.
     * Internamente executa o método ``iModel->isInitial()``.
     *
     * A partir do acionamento de qualquer método de alteração de campos e obter sucesso
     * ao defini-lo, o resultado deste método será sempre ``false``.
     *
     * @return bool
     */
    public function isInitial(): bool;


    /**
     * Retorna uma instância do modelo de dados usada por este campo.
     *
     * @return iModel
     */
    public function getModel(): iModel;


    /**
     * Retorna o nome do modelo de dados usado.
     *
     * @return string
     */
    public function getModelName(): string;


    /**
     * Retornará a instância do valor que está definida para o campo.
     *
     * Em campos *collection* será retornado o ``array`` contendo as instâncias que
     * compõe a coleção atual.
     *
     * @return string|array|iModel|undefined
     */
    public function getInstanceValue(): string|array|iModel|undefined;
}
