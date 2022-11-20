<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\Http\Data;

use AeonDigital\Interfaces\Collection\iCollection as iCollection;







/**
 * Interface ``iFileCollection``.
 *
 * Extende a interface ``iCollection`` para que ela se especialize em arquivos enviados
 * via ``Http``.
 *
 * @package     AeonDigital\Interfaces\Http
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iFileCollection extends iCollection
{


    /**
     * Libera todos os ``streams`` da coleção para que eles possam ser utilizados por outra
     * tarefa.
     *
     * Após esta ação os métodos das instâncias que dependem diretamente do recurso que foi
     * liberado não irão funcionar.
     *
     * @return void
     */
    function dropStreams(): void;
}
