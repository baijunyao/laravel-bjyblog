<?php

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@PHP71Migration' => true,
        '@PHP71Migration:risky' => true,
        'align_multiline_comment' => true,
        'array_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'binary_operator_spaces'=> ['operators' => ['=' => 'align_single_space', '=>' => 'align_single_space']],
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'combine_nested_dirname' => true,
        'concat_space' => ['spacing' => 'one'],
        'ereg_to_preg' => true,
        'escape_implicit_backslashes' => true,
        'fopen_flags' => false,
        'fopen_flag_order' => true,
        'function_to_constant' => ['functions' => ['get_class', 'get_called_class', 'php_sapi_name', 'phpversion', 'pi']],
        'heredoc_to_nowdoc' => true,
        'increment_style' => false,
        'is_null' => ['use_yoda_style' => false],
        'linebreak_after_opening_tag' => true,
        'list_syntax' => ['syntax' => 'short'],
        'logical_operators' => true,
        'magic_method_casing' => true,
        'method_chaining_indentation' => true,
        'modernize_types_casting' => false,
        'multiline_comment_opening_closing' => true,
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
        'native_constant_invocation' => false,
        'native_function_invocation' => false,
        'no_alternative_syntax' => true,
        'no_homoglyph_names' => true,
        'no_null_property_initialization' => true,
        'no_php4_constructor' => true,
        'no_short_echo_tag' => true,
        'no_unneeded_curly_braces' => true,
        'no_unneeded_final_method' => true,
        'no_unreachable_default_argument_value' => true,
        'no_useless_return' => true,
        'no_whitespace_in_blank_line' => true,
        'not_operator_with_space' => false,
        'ordered_class_elements' => true,
        'ordered_imports' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_annotation_without_dot' => false,
        'phpdoc_no_alias_tag' => false,
        'phpdoc_no_empty_return' => false,
        'phpdoc_order' => true,
        'phpdoc_trim_consecutive_blank_line_separation' => true,
        'phpdoc_summary' => false, // no need to add dot at the end of short description
        'phpdoc_to_comment' => false, // allow use of docblock comment in function body
        'phpdoc_var_annotation_correct_order' => true,
        'php_unit_construct' => true,
        'php_unit_method_casing' => ['case' => 'camel_case'],
        'php_unit_set_up_tear_down_visibility' => true,
        'php_unit_test_case_static_method_calls' => true,
        'pow_to_exponentiation' => false,
        'pre_increment' => false,
        'return_assignment' => true,
        'simplified_null_return' => false,
        'short_scalar_cast' => true,
        'string_line_ending' => true,
        'yoda_style' => false,
        'declare_strict_types' => false,
        'void_return' => false,
        'single_trait_insert_per_statement' => false
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->notPath('app/Console/Kernel.php')
            ->notPath('app/Http/Kernel.php')
            ->exclude('bootstrap')
            ->exclude('config')
            ->exclude('database/factories')
            ->exclude('public')
            ->exclude('resources')
            ->exclude('storage')
            ->notPath('_ide_helper.php')
            ->notPath('server.php')
            ->in(__DIR__)
    )
;
