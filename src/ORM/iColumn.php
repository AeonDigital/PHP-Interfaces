<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\ORM;

use AeonDigital\Interfaces\DataModel\iField as iField;







/**
 * Expande a interface ``iField`` para dar a ela as características necessárias para que
 * ela represente uma coluna de um banco de dados.
 *
 * @package     AeonDigital\ORM
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iColumn extends iField
{





    /**
     * Indica se o valor para esta coluna pode ser repetido entre os demais registros
     * que compões a coleção da tabela de dados.
     *
     * @return bool
     */
    public function isUnique(): bool;


    /**
     * Indica quando o o valor desta coluna é do tipo *auto-incremento*.
     *
     * @return bool
     */
    public function isAutoIncrement(): bool;


    /**
     * Indica se esta coluna é a chave primária da tabela de dados.
     *
     * @return bool
     */
    public function isPrimaryKey(): bool;


    /**
     * Indica se esta coluna é uma chave extrangeira.
     *
     * @return bool
     */
    public function isForeignKey(): bool;


    /**
     * Indica se esta coluna está ou não indexada.
     * Por padrão, toda ``primaryKey`` e ``foreignKey`` é automaticamente indexada.
     *
     * @return bool
     */
    public function isIndex(): bool;
}
