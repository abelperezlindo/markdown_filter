<?php
namespace Drupal\markdown_filter\Plugin\Filter;

use Drupal\filter\Plugin\FilterBase;
use Drupal\filter\FilterProcessResult;
use Michelf\Markdown;


/**
 * @Filter(
 *   id = "FilterMarkdown",
 *   title = @Translation("Markdown Filter"),
 *   description = @Translation("Convierte el texto con formato md a su correspondiente en html."),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_REVERSIBLE,
 *   settings = {}
 * )
 */
class FilterMarkdown extends FilterBase {
    /** {@inheritDoc} */
    public function process($text, $langcode){
        
        $my_html = Markdown::defaultTransform($text);
        return new FilterProcessResult($my_html);
    }
    /** {@inheritDoc} */
    public function tips($long = FALSE) {
         
        $tip_text = 
        'Dos o más espacios al final de una línea equivale a un salto de línea.
        <li>Una línea en blanco entre parrafos equivale a un nuevo parrafo.</li>
        <li><b>*</b>Una palabra o frase entre UN asterisco<b>*</b> o <b>_</b>Una palabra o frase entre UN guión bajo<b>_</b> equivale a la palabra o frase en <i>Itálica</i></li>
        <li><b>**</b>Una palabra o frase entre DOS asteriscos<b>**</b> o <b>__</b>Una palabra o frase entre DOS guiones bajos<b>__</b> equivale a la palabra o frase en <b>Negrita</b></li>
        <li>Esto es [un enlace](http://www.google.com "Título opcional")</li>
        <p>Para más detalles sobre la sintaxis de Markdown, ver <a href="http://daringfireball.net/projects/markdown/syntax">Markdown documentation</a> y <a href="https://michelf.ca/projects/php-markdown/extra/">Markdown Extra documentation</a> para tablas, notas al pie y más (en íngles).</p>';
        
        if ($long) {
            // Podemos definir un texto distinto para mostrar en "filter/tips"
            return $this->t($tip_text);
        }
        else {
            // Se ve en el widget 
            return $this->t($tip_text);
        }
    }

}