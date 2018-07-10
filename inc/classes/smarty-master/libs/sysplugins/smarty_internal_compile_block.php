<?php
/*
 * This file is part of Smarty.
 *
 * (c) 2015 Uwe Tews
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Smarty Internal Plugin Compile Block Class
 *
 * @author Uwe Tews <uwe.tews@googlemail.com>
 */
class Smarty_Internal_Compile_Block extends Smarty_Internal_Compile_Shared_Inheritance
{
    /**
     * Attribute definition: Overwrites base class.
     *
     * @var array
     * @see Smarty_Internal_CompileBase
     */
    public $required_attributes = array('name');

    /**
     * Attribute definition: Overwrites base class.
     *
     * @var array
     * @see Smarty_Internal_CompileBase
     */
    public $shorttag_order = array('name');

    /**
     * Attribute definition: Overwrites base class.
     *
     * @var array
     * @see Smarty_Internal_CompileBase
     */
    public $option_flags = array('hide', 'nocache');

    /**
     * Attribute definition: Overwrites base class.
     *
     * @var array
     * @see Smarty_Internal_CompileBase
     */
    public $optional_attributes = array('assign');

    /**
     * Saved compiler object
     *
     * @var Smarty_Internal_TemplateCompilerBase
     */
    public $compiler = null;

    /**
     * Compiles code for the {block} tag
     *
     * @param  array                                 $args     array with attributes from parser
     * @param  \Smarty_Internal_TemplateCompilerBase $compiler compiler object
     *
     * @return string compiled code
     */
    public function compile($args, Smarty_Internal_TemplateCompilerBase $compiler)
    {
        if (!isset($compiler->_cache['blockNesting'])) {
            $compiler->_cache['blockNesting'] = 0;
        }
        if ($compiler->_cache['blockNesting'] === 0) {
            // make sure that inheritance gets initialized in template code
            $this->registerInit($compiler);
            $this->option_flags = array('hide', 'nocache', 'append', 'prepend');
        } else {
            $this->option_flags = array('hide', 'nocache');
        }
        // check and get attributes
        $_attr = $this->getAttributes($compiler, $args);
        $compiler->_cache['blockNesting']++;
        $_className = 'Block_' . preg_replace('![^\w]+!', '_', uniqid(rand(), true));
        $compiler->_cache['blockName'][ $compiler->_cache['blockNesting'] ] = $_attr['name'];
        $compiler->_cache['blockClass'][ $compiler->_cache['blockNesting'] ] = $_className;
        $compiler->_cache['blockParams'][ $compiler->_cache['blockNesting'] ] = array();
        $compiler->_cache['blockParams'][1]['subBlocks'][ trim($_attr['name'], '"\'') ][] = $_className;
        $this->openTag($compiler,
                       'block',
                       array($_attr, $compiler->nocache, $compiler->parser->current_buffer,
                             $compiler->template->compiled->has_nocache_code,
                             $compiler->template->caching));
        // must whole block be nocache ?
        if ($compiler->tag_nocache) {
            $i = 0;
        }
        $compiler->nocache = $compiler->nocache | $compiler->tag_nocache;
        // $compiler->suppressNocacheProcessing = true;
        if ($_attr['nocache'] === true) {
            //$compiler->trigger_template_error('nocache option not allowed', $compiler->parser->lex->taglineno);
        }
        $compiler->parser->current_buffer = new Smarty_Internal_ParseTree_Template();
        $compiler->template->compiled->has_nocache_code = false;
        $compiler->suppressNocacheProcessing = true;
    }

    /**
     * Compiles code for the {$smarty.block.parent} or {$smarty.block.child}tag
     *
     * @param  array                                $args      array with attributes from parser
     * @param \Smarty_Internal_TemplateCompilerBase $compiler  compiler object
     * @param  array                                $parameter array with compilation parameter
     *
     * @return string compiled code
     * @throws \SmartyCompilerException
     */
    public function compileSpecialVariable($args, Smarty_Internal_TemplateCompilerBase $compiler, $parameter)
    {
        $name = isset($parameter[1]) ? $compiler->getId($parameter[1]) : false;
        if (!$name) {
            $compiler->trigger_template_error("invalid '\$smarty.block' expected '\$smarty.block.child' or '\$smarty.block.parent'",
                                              null,
                                              true);
        }
        if (!isset($compiler->_cache['blockNesting'])) {
            $compiler->trigger_template_error(" '\$smarty.block.{$name}' used outside {block} tags ",
                                              $compiler->parser->lex->taglineno);
        }
        $compiler->has_code = true;
        $compiler->suppressNocacheProcessing = true;
        switch ($name) {
            case 'child':
                $compiler->_cache['blockParams'][ $compiler->_cache['blockNesting'] ]['callsChild'] = 'true';
                return '$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this, true)';
                break;
            case 'parent':
                return '$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, null, true)';
                break;
            default:
                $compiler->trigger_template_error("invalid '\$smarty.block.{$name}' expected '\$smarty.block.child' or '\$smarty.block.parent'",
                                                  null,
                                                  true);
        }
    }
}

/**
 * Smarty Internal Plugin Compile BlockClose Class
 *
 */
class Smarty_Internal_Compile_Blockclose extends Smarty_Internal_Compile_Shared_Inheritance
{
    /**
     * Compiles code for the {/block} tag
     *
     * @param  array                                $args     array with attributes from parser
     * @param \Smarty_Internal_TemplateCompilerBase $compiler compiler object
     *
     * @return string compiled code
     * @internal param array $parameter array with compilation parameter
     */
    public function compile($args, Smarty_Internal_TemplateCompilerBase $compiler)
    {
        list($_attr, $_nocache, $_buffer, $_has_nocache_code, $_caching) = $this->closeTag($compiler, array('block'));
        // init block parameter
        $_block = $compiler->_cache['blockParams'][ $compiler->_cache['blockNesting'] ];
        unset($compiler->_cache['blockParams'][ $compiler->_cache['blockNesting'] ]);
        $_name = $_attr['name'];
        $_assign = isset($_attr['assign']) ? $_attr['assign'] : null;
        unset($_attr['assign'], $_attr['name']);
        foreach ($_attr as $name => $stat) {
            if ((is_bool($stat) && $stat !== false) || (!is_bool($stat) && $stat !== 'false')) {
                $_block[ $name ] = 'true';
            }
        }
        $_className = $compiler->_cache['blockClass'][ $compiler->_cache['blockNesting'] ];
        // get compiled block code
        $_functionCode = $compiler->parser->current_buffer;
        // setup buffer for template function code
        $compiler->parser->current_buffer = new Smarty_Internal_ParseTree_Template();

        $output = "<?php\n";
        $output .= "/* {block {$_name}} */\n";
        $output .= "class {$_className} extends Smarty_Internal_Block\n";
        $output .= "{\n";
        foreach ($_block as $property => $value) {
            $output .= "public \${$property} = " . var_export($value, true) . ";\n";
        }
        $output .= "public function callBlock(Smarty_Internal_Template \$_smarty_tpl) {\n";
        //$output .= "/*/%%SmartyNocache:{$compiler->template->compiled->nocache_hash}%%*/\n";
        if ($compiler->template->compiled->has_nocache_code) {
            $output .= "\$_smarty_tpl->cached->hashes['{$compiler->template->compiled->nocache_hash}'] = true;\n";
        }
        if (isset($_assign)) {
            $output .= "ob_start();\n";
        }
        $output .= "?>\n";
        $compiler->parser->current_buffer->append_subtree($compiler->parser,
                                                          new Smarty_Internal_ParseTree_Tag($compiler->parser,
                                                                                            $output));
        $compiler->parser->current_buffer->append_subtree($compiler->parser, $_functionCode);
        $output = "<?php\n";
        if (isset($_assign)) {
            $output .= "\$_smarty_tpl->assign({$_assign}, ob_get_clean());\n";
        }
        $output .= "}\n";
        $output .= "}\n";
        $output .= "/* {/block {$_name}} */\n\n";
        $output .= "?>\n";
        $compiler->parser->current_buffer->append_subtree($compiler->parser,
                                                          new Smarty_Internal_ParseTree_Tag($compiler->parser,
                                                                                            $output));
        $compiler->blockOrFunctionCode .= $f = $compiler->parser->current_buffer->to_smarty_php($compiler->parser);
        $compiler->parser->current_buffer = new Smarty_Internal_ParseTree_Template();
        // nocache plugins must be copied
        if (!empty($compiler->template->compiled->required_plugins['nocache'])) {
            foreach ($compiler->template->compiled->required_plugins['nocache'] as $plugin => $tmp) {
                foreach ($tmp as $type => $data) {
                    $compiler->parent_compiler->template->compiled->required_plugins['compiled'][ $plugin ][ $type ] =
                        $data;
                }
            }
        }

        // restore old status
        $compiler->template->compiled->has_nocache_code = $_has_nocache_code;
        $compiler->tag_nocache = $compiler->nocache;
        $compiler->nocache = $_nocache;
        $compiler->parser->current_buffer = $_buffer;
        $output = "<?php \n";
        if ($compiler->_cache['blockNesting'] === 1) {
            $output .= "\$_smarty_tpl->inheritance->instanceBlock(\$_smarty_tpl, '$_className', $_name);\n";
        } else {
            $output .= "\$_smarty_tpl->inheritance->instanceBlock(\$_smarty_tpl, '$_className', $_name, \$this->tplIndex);\n";
        }
        $output .= "?>\n";
        $compiler->_cache['blockNesting']--;
        if ($compiler->_cache['blockNesting'] === 0) {
            unset($compiler->_cache['blockNesting']);
        }
        $compiler->has_code = true;
        $compiler->suppressNocacheProcessing = true;
        return $output;
    }
}
