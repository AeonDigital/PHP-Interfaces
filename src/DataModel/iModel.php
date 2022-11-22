<?php

declare(strict_types=1);

namespace AeonDigital\Interfaces\DataModel;

use AeonDigital\Interfaces\DataModel\iField as iField;







/**
 * Interface que define as características que um modelo de dados deve ter.
 *
 * @package     AeonDigital\Interfaces\DataModel
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iModel extends \IteratorAggregate
{





    /**
     * Retorna o nome do modelo de dados.
     *
     * @return string
     */
    public function getName(): string;
    /**
     * SET
     * Define o nome do modelo de dados.
     * O nome de um modelo de dados apenas pode aceitar caracteres ``a-zA-Z0-9_``.
     */



    /**
     * Retorna a descrição de uso/funcionalidade do modelo de dados.
     *
     * @return string
     */
    public function getDescription(): string;





    /**
     * Identifica se o campo com o nome indicado existe neste modelo de dados.
     *
     * @param string $f
     * Nome do campo que será verificado.
     *
     * @return bool
     */
    public function hasField(string $f): bool;


    /**
     * Retorna a contagem total dos campos existentes para este modelo de dados.
     *
     * @return int
     */
    public function countFields(): int;


    /**
     * Retorna um ``array`` contendo o nome de cada um dos campos existentes neste
     * modelo de dados.
     *
     * @param bool $getReferences
     * Quando ``true`` retornará todos os campos existentes.
     * Quando ``false`` não trará os campos que são do tipo ``reference``.
     *
     * @return array
     */
    public function getFieldNames(bool $getReferences = true): array;





    /**
     * Retorna um ``array`` associativo contendo todos os campos definidos para o
     * modelo atual e seus respectivos valores iniciais.
     *
     * @return array
     */
    public function getInitialDataModel(): array;










    /**
     * Verifica se algum valor já foi definido para algum campo deste modelo de dados.
     *
     * A partir do acionamento de qualquer método de alteração de campos e obter sucesso
     * ao defini-lo, o resultado deste método será sempre ``false``.
     *
     * @return bool
     */
    public function isInitial(): bool;



    /**
     * Informa se o modelo de dados tem no momento valores que satisfazem os critérios de
     * validação para todos os seus campos.
     *
     * @return bool
     */
    public function isValid(): bool;


    /**
     * Retorna o código do estado atual deste modelo de dados.
     * Se todos seus campos estão com valores válidos será retornado ``valid``.
     *
     * Caso contrário, será retornado um ``array`` associativo com o estado de cada um dos
     * campos.
     *
     * Campos *collection* trarão um ``array`` associativo conforme o modelo:
     *
     * ```php
     *      $arr = [
     *          // string   Estado geral da coleção como um todo.
     *          "collection" => "",
     *
     *          // string[] Estado individual de cada um dos itens.
     *          "itens" => []
     *      ];
     * ```
     *
     * @return string|array
     */
    public function getState(): string|array;


    /**
     * Referente a última validação executada:
     * Se todos seus campos estão com valores válidos será retornado ``valid``.
     *
     * Caso contrário, será retornado um ``array`` associativo com o estado de cada um dos campos.
     *
     * Quando executado após o uso de ``setFieldValue()`` o resultado será equivalente ao uso de
     * ``iField->getLastValidateState()``.
     *
     * Campos *collection* trarão um ``array`` associativo conforme o modelo:
     *
     * ```php
     *      $arr = [
     *          // string   Estado geral da coleção como um todo.
     *          "collection" => "",
     *
     *          // string[] Estado individual de cada um dos itens.
     *          "itens" => []
     *      ];
     * ```
     *
     * @return null|string|array
     */
    public function getLastValidateState(): null|string|array;


    /**
     * Retornará ``true`` caso a última validação realizada permitir que o valor testado seja
     * definido para o modelo de dados usado.
     *
     * @return bool
     */
    public function getLastValidateCanSet(): bool;


    /**
     * Verifica se o valor indicado satisfaz os critérios que de validação dos campos em comum
     * que ele tenha com o presente modelo de dados.
     *
     * A validação é feita seguindo os seguintes passos:
     * 1. Verifica se o valor passado é ``iterable``.
     * 2. Verifica se o valor passado possui alguma propriedade/campo que seja inexistênte
     *    para o modelo de dados desta instância.
     * 3. Verifica se nenhuma propriedade foi encontrada no objeto passado.
     * 4. Se ``checkAll`` for definido como ``true`` então irá verificar se restou ser
     *    apresentado algum campo obrigatorio. Campos que tenham configuração de valor default
     *    não invalidarão este tipo de teste.
     *
     *
     * **Método "getLastValidateState()"**
     *
     * Após uma validação é possível usar este método para averiguar com precisão qual foi o
     * motivo da falha.
     * Para os passos **1** e **3** será retornado uma ``string`` única com o código do erro.
     * Para os passos **2** e **4** será retornado um ``array`` associativo contendo uma chave
     * para cada campo testado e seu respectivo código de validação.
     *
     *
     * **Método "getLastValidateCanSet()"**
     *
     * Após uma validação é possível usar este método para averiguar se o valor passado,
     * passando ou não, pode ser efetivamente definido para o modelo de dados.
     *
     *
     * @param mixed $objValues
     * Objeto que traz os valores a serem testados.
     *
     * @param bool $checkAll
     * Quando ``true`` apenas confirmará a validade da coleção de valores se com os
     * mesmos for possível preencher todos os campos obrigatórios deste modelo de
     * dados. Campos não declarados mas que possuem um valor padrão definido **SEMPRE**
     * passarão neste tipo de validação
     *
     * @return bool
     *
     * @throws \InvalidArgumentException
     * Caso o objeto passado possua propriedades não correspondentes aos campos
     * definidos.
     */
    public function validateValues(mixed $objValues, bool $checkAll = false): bool;










    /**
     * Define o valor do campo de nome indicado.
     * Internamente executa o método ``iField->setValue()``.
     *
     * @param string $f
     * Nome do campo cujo valor será definido.
     *
     * @param mixed $v
     * Valor a ser definido para o campo.
     *
     * @return bool
     * Retornará ``true`` se o valor tornou o campo válido ou ``false`` caso
     * agora ele esteja inválido.
     * Também retornará ``false`` caso o valor seja totalmente incompatível
     * com o campo.
     *
     * @throws \InvalidArgumentException
     * Caso o nome do campo não seja válido.
     */
    public function setFieldValue(string $f, mixed $v): bool;


    /**
     * Retorna o valor atual do campo de nome indicado.
     * Internamente executa o método ``iField->getValue()``.
     *
     * @param string $f
     * Nome do campo alvo.
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     * Caso o nome do campo não seja válido.
     */
    public function getFieldValue(string $f): mixed;


    /**
     * Retorna o valor atual do campo de nome indicado.
     * Internamente executa o método ``iField->getStorageValue()``.
     *
     * @param string $f
     * Nome do campo alvo.
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     * Caso o nome do campo não seja válido.
     */
    public function getFieldStorageValue(string $f): mixed;


    /**
     * Retorna o valor atual do campo de nome indicado.
     * Internamente executa o método ``iField->getRawValue()``.
     *
     * @param string $f
     * Nome do campo alvo.
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException
     * Caso o nome do campo não seja válido.
     */
    public function getFieldRawValue(string $f): mixed;










    /**
     * Permite definir o valor de inúmeros campos do modelo de dados a partir de um objeto
     * compatível.
     *
     * Se todos os valores passados forem possíveis de serem definidos para seus respectivos
     * campos de dados então isto será feito mesmo que isto  torne o modelo como um todo
     * inválido.
     *
     * @param mixed $objValues
     * Objeto que traz os valores a serem redefinidos para o atual modelo de
     * dados.
     *
     * @param bool $checkAll
     * Quando ``true`` apenas irá definir os dados caso seja possível definir
     * todos os campos do modelo de dados com os valores explicitados.
     * Os campos não definidos devem poder serem definidos com seus valores
     * padrão, caso contrário o *set* não será feito.
     *
     * @return bool
     * Retornará ``true`` caso os valores passados tornem o modelo válido.
     *
     * @throws \InvalidArgumentException
     * Caso o objeto passado possua propriedades não correspondentes aos campos
     * definidos.
     */
    public function setValues(mixed $objValues, bool $checkAll = false): bool;


    /**
     * Retorna um ``array`` associativo contendo todos os campos do modelo de dados e seus
     * respectivos valores atualmente definidos.
     *
     * Internamente executa o método ``iField->getValue()`` para cada um dos campos de dados
     * existente.
     *
     * @return array
     */
    public function getValues(): array;


    /**
     * Retorna um ``array`` associativo contendo todos os campos do modelo de dados e seus
     * respectivos valores atualmente definidos.
     *
     * Internamente executa o método ``iField->getStorageValue()`` para cada um dos campos
     * de dados existente.
     *
     * @return array
     */
    public function getStorageValues(): array;


    /**
     * Retorna um ``array`` associativo contendo todos os campos do modelo de dados e seus
     * respectivos valores atualmente definidos.
     *
     * Internamente executa o método ``iField->getRawValue()`` para cada um dos campos de
     * dados existente.
     *
     * @return array
     */
    public function getRawValues(): array;
}
