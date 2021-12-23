<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Http\Uri;










/**
 * Descreve o mínimo que uma classe que representa um ``URI`` deve possuir.
 *
 * Existem varias especificações que definem possibilidades de formatos que um ``URI`` pode ter.
 * Cada um destes formatos é chamado de ``scheme`` e é definido no ``rfc1738``. Alguns
 * ``schemes`` mais conhecidos são: ``http``, ``ftp``, ``mailto``.
 *
 * As classes que implementam esta interface devem estar de acordo com as especificações de
 * seus respectivos ``schemes``.
 *
 * Instâncias desta interface são consideradas imutáveis; todos os métodos que podem vir a
 * alterar seu estado ``DEVEM`` ser implementados de forma a manter seu estado e retornar uma
 * nova instância com a alteração necessária para o novo estado.
 *
 *
 * @see         https://tools.ietf.org/html/rfc2234
 *              Augmented BNF for Syntax Specifications: ABNF
 *
 * @see         https://tools.ietf.org/html/rfc1630
 *              Universal Resource Identifiers in WWW
 *
 * @see         https://tools.ietf.org/html/rfc3986
 *              Uniform Resource Identifier (URI): Generic Syntax
 *
 * @see         https://tools.ietf.org/html/rfc1738
 *              Uniform Resource Locators (URL)
 *
 * @package     AeonDigital\Interfaces\Http
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iBasicUri
{





    /**
     * Definição de conjuntos básicos para a gramática de URIs.
     * [ O trecho abaixo foi copiado para o facilitar o entendimento das
     *   especificações aqui citadas que em vários momentos usam tais
     *   convenções ]
     *
     * ABNF for Syntax Specifications
     * Origem : https://tools.ietf.org/html/rfc2234
     * Data: 2017-10-23
     *
     *  ALPHA          =  %x41-5A / %x61-7A
     *                                  ; A-Z / a-z
     *  BIT            =  "0" / "1"
     *  CHAR           =  %x01-7F
     *                                  ; any 7-bit US-ASCII character,
     *                                    excluding NUL
     *  CR             =  %x0D
     *                                  ; carriage return
     *  CRLF           =  CR LF
     *                                  ; Internet standard newline
     *  CTL            =  %x00-1F / %x7F
     *                                  ; controls
     *  DIGIT          =  %x30-39
     *                                  ; 0-9
     *  DQUOTE         =  %x22
     *                                  ; " (Double Quote)
     *  HEXDIG         =  DIGIT / "A" / "B" / "C" / "D" / "E" / "F"
     *  HTAB           =  %x09
     *                                  ; horizontal tab
     *  LF             =  %x0A
     *                                  ; linefeed
     *  LWSP           =  *(WSP / CRLF WSP)
     *                                  ; linear white space (past newline)
     *  OCTET          =  %x00-FF
     *                                  ; 8 bits of data
     *  SP             =  %x20
     *                                  ; space
     *  VCHAR          =  %x21-7E
     *                                  ; visible (printing) characters
     *  WSP            =  SP / HTAB
     *                                  ; white space
     *
     */





    /**
     * Segue uma coleção de trechos retirados diretamente das especificações
     * considerados importantes para a compreenção em linhas gerais sobre
     * a formatação e tratamento das URIs em suas regras mais básicas.
     *
     *
     * Origem : https://tools.ietf.org/html/rfc1630
     * Data: 2017-10-23
     *
     *
     * THE PERCENT SIGN (O sinal de percentual)
     *
     * O sinal percentual ("%", ASCII 2F hex) é usado como caracter de
     * escape para o encoding dos "schemes" e nunca pode ser usado para
     * outra finalidade.
     *
     *
     * -----
     *
     * HASH FOR FRAGMENT IDENTIFIERS (Hash como identificador de fragmento)
     *
     * O sinal hash ("#", ACII 23 hex) é reservado como delimitador que
     * separa a URI e o identificador de fragmento.
     *
     *
     * -----
     *
     * QUERY STRINGS
     *
     * O sinal de interrogação ("?", ASCII 3F hex) é usado como limite entre
     * a URI e o objeto "query". Em uma query string o sinal de mais ("+") pode
     * ser usado como uma notação curta para um espaço " ". Sendo assim, o sinal
     * de mais para ser usado de fato é necessário que ele seja encodado.
     *
     *
     * -----
     *
     * Unsafe characters (Caracteres inseguros)
     *
     * Caracteres além do caracter DEL (7F hex) pertencentes ao conjunto
     * ISO Latin-1 não devem ser encodados.
     *
     */





    /**
     * Origem : https://tools.ietf.org/html/rfc1630
     *          https://tools.ietf.org/html/rfc3986#section-2
     * Data: 2017-10-23
     *
     *
     * Encoding reserved characters (Codificando caracteres reservados)
     *    CONVENTIONAL URI ENCODING SCHEME
     *       Quando usar caracteres ASCII que não são permitidos na URI, estes
     *       devem ser representados usando o sinal de percentual "%" seguido
     *       imediatamente por 2 dígitos hexadecimais (0-9, A-F) passando o
     *       código do caracter para o ISO Latin 1
     *
     *       Outros caracteres devem ser usados tal qual eles são e não devem
     *       ser codificados.
     *
     *    Por definição, o uso do caracter "%" em uma URI sempre indica a
     *    presença de um caracter codificado, portanto uma URI que apresente
     *    este caracter seguido de outros inválidos para designar um caracter
     *    codificado será considerada uma URI inválida.
     *
     *
     *    Caracteres reservados (reserved)
     *    Coleção de caracteres que DEVEM ser codificados pois eles também são
     *    usados para definir a sintaxe da própria URI:
     *
     *       reserved    = gen-delims / sub-delims
     *       gen-delims  = ":" / "/" / "?" / "#" / "[" / "]" / "@"
     *       sub-delims  = "!" / "$" / "&" / "'" / "(" / ")"
     *                   / "*" / "+" / "," / ";" / "="
     *
     *
     *    Caracteres não reservados (unreserved)
     *    Caracteres que podem ser usados livremente em uma URI:
     *
     *       unreserved  = ALPHA / DIGIT / "-" / "." / "_" / "~"
     *
     *
     *
     * BNF of Generic URI Syntax
     *    Uma linha vertical "|" separa alternativas e [colchetes] indicam
     *    partes opcionais. Espaços são representados pela palavra "word" e
     *    a linha vertical por "vline". Letras únicas representam a si mesmas
     *    e palavras ou conjunto de letras representam entidades descritas em
     *    algum lugar da especificação.
     *
     *       fragmentaddress        uri [ # fragmentid ]
     *
     *       uri                    scheme :  path [ ? search ]
     *
     *       scheme                 ialpha
     *
     *       path                   void |  xpalphas  [  / path ]
     *
     *       search                 xalphas [ + search ]
     *
     *       fragmentid             xalphas
     *
     *       xalpha                 alpha | digit | safe | extra | escape
     *
     *       xalphas                xalpha [ xalphas ]
     *
     *       xpalpha                xalpha | +
     *
     *       xpalphas               xpalpha [ xpalpha ]
     *
     *       ialpha                 alpha [ xalphas ]
     *
     *       alpha                  a | b | c | d | e | f | g | h | i | j | k |
     *                              l | m | n | o  | p | q | r | s | t | u | v |
     *                              w | x | y | z | A | B | C  | D | E | F | G |
     *                              H | I | J | K | L | M | N | O | P |  Q | R |
     *                              S | T | U | V | W | X | Y | Z
     *
     *       digit                  0 |1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9
     *
     *       safe                   $ | - | _ | @ | . | &
     *
     *       extra                  ! | * | " |  ' | ( | ) | ,
     *
     *       reserved               = | ; | / | # | ? | : | space
     *
     *       escape                 % hex hex
     *
     *       hex                    digit | a | b | c | d | e | f | A | B | C |
     *                              D | E | F
     *
     *       national               { | } | vline | [ | ] | \ | ^ | ~
     *
     *       punctuation            < | >
     *
     *       void
     */










    /**
     * Retorna o nome do ``scheme`` que o ``URI`` da classe está usando.
     * Implementações devem fazer a conversão do valor para ``lowercase`` e além disso,
     * comparações como ``Http`` e ``http`` devem ser equivalentes.
     *
     * Nomes válidos devem seguir o formato:
     *
     * ```
     *  scheme = ALPHA * ( ALPHA / DIGIT / "+" / "-" / "." )
     * ```
     *
     * @see         https://tools.ietf.org/html/rfc3986#section-3.1
     *
     * @return      string
     */
    function getScheme() : string;



    /**
     * Este método ``DEVE`` manter o estado da instância atual e retornar uma nova instância
     * contendo o ``scheme`` especificado.
     *
     * @param       string $scheme
     *              O novo valor para ``scheme`` para a nova instância.
     *
     * @return      static
     *
     * @throws      \InvalidArgumentException
     *              Caso seja definido um valor inválido para ``scheme``.
     */
    function withScheme($scheme);



    /**
     * Retorna uma nova instância definida a partir do valor indicado na string ``$uri``.
     *
     * @param       string $uri
     *              ``URI`` que será usada de base para a nova instância.
     *
     * @return      static
     *
     * @throws      \InvalidArgumentException
     *              Exception lançada caso a ``URI`` indicada seja inválida.
     */
    static function fromString(string $uri);



    /**
     * Converte os atributos que formam a ``URI`` em uma string válida para seu respectivo ``scheme``.
     *
     * @return      string
     */
    function __toString();
}
