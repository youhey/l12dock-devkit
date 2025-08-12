<?php

/** @see Rules https://cs.symfony.com/doc/rules/index.html */

$finder = PhpCsFixer\Finder::create()
    ->name('*.php')
    ->name('*.phpt')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
    ->notName('*.blade.php')
    ->notName('_ide_helper.php')
    ->notName('_ide_macros.php')
    ->notName('*.md')
    ->notName('*.xml')
    ->notName('*.yml')
    ->notName('.env*')
    ->notName('.git*')
    ->notName('.php_cs')
    ->notName('.phpstorm.meta.php')
    ->notName('.styleci.yml')
    ->notName('README.md')
    ->notName('composer.*')
    ->notName('phpcs.xml*')
    ->notName('phpmd.xml*')
    ->notName('phpstan.neon*')
    ->notName('phpunit.xml*')
    ->notPath('/^artisan')
    ->notPath('/^server\.php/')
    ->exclude('build')
    ->exclude('node_module')
    ->exclude('bootstrap/cache')
    ->exclude('resources')
    ->exclude('storage')
    ->exclude('vendor')
    ->exclude('node_modules')
    ->exclude('public')
    ->in(__DIR__);

return (new PhpCsFixer\Config())->setRules([
    '@PSR12' => true,
    '@PhpCsFixer' => true,
    '@PHP84Migration' => true,

    'align_multiline_comment' => [
        'comment_type' => 'phpdocs_only'
    ],
    'array_syntax' => ['syntax' => 'short'],
    'binary_operator_spaces' => false,
    'blank_line_after_namespace' => true,
    'blank_line_after_opening_tag' => true,
    'blank_line_before_statement' => [
        'statements' => [
            'break',
            'continue',
            'declare',
            'return',
            'throw',
            'try',
        ]
    ],
    'single_space_around_construct' => [
        'constructs_contain_a_single_space' => ['yield_from'],
        'constructs_followed_by_a_single_space' => [
            'abstract',
            'as',
            'attribute',
            'break',
            'case',
            'catch',
            'class',
            'clone',
            'comment',
            'const',
            'const_import',
            'continue',
            'do',
            'echo',
            'else',
            'elseif',
            'enum',
            'extends',
            'final',
            'finally',
            'for',
            'foreach',
            'function',
            'function_import',
            'global',
            'goto',
            'if',
            'implements',
            'include',
            'include_once',
            'instanceof',
            'insteadof',
            'interface',
            'match',
            'named_argument',
            'namespace',
            'new',
            'open_tag_with_echo',
            'php_doc',
            'php_open',
            'print',
            'private',
            'protected',
            'public',
            'readonly',
            'require',
            'require_once',
            'return',
            'static',
            'switch',
            'throw',
            'trait',
            'try',
            'type_colon',
            'use',
            'use_lambda',
            'use_trait',
            'var',
            'while',
            'yield',
            'yield_from',
        ],
    ],
    'control_structure_braces' => true,
    'control_structure_continuation_position' => true,
    'declare_parentheses' => true,
    'no_multiple_statements_per_line' => true,
    'braces_position' => [
        'allow_single_line_anonymous_functions' => true,
        'allow_single_line_empty_anonymous_classes' => true,
        'anonymous_classes_opening_brace' => 'same_line',
        'anonymous_functions_opening_brace' => 'same_line',
        'control_structures_opening_brace' => 'same_line',
        'functions_opening_brace' => 'next_line_unless_newline_at_signature_end',
    ],
    'statement_indentation' => [
        'stick_comment_to_next_continuous_control_statement' => false,
    ],
    'cast_spaces' => [
        'space' => 'single',
    ],
    'class_definition' => [
        'multi_line_extends_each_single_line' => true,
        'single_item_single_line' => true,
        'single_line' => false,
    ],
    'combine_consecutive_issets' => true,
    'combine_consecutive_unsets' => true,
    'compact_nullable_type_declaration' => true,
    'concat_space' => [
        'spacing' => 'one'
    ],
    'dir_constant' => true,
    'elseif' => true,
    'encoding' => true,
    'ereg_to_preg' => true,
    'full_opening_tag' => true,
    'function_declaration' => [
        'closure_function_spacing' => 'one',
    ],
    'type_declaration_spaces' => ['elements' => ['function', 'property']],
    'general_phpdoc_annotation_remove' => [
        'annotations' => []
    ],
    'header_comment' => [
        'comment_type' => 'PHPDoc',
        'header' => 'Your Project Header',
        'location' => 'after_open',
        'separate' => 'both',
    ],
    'heredoc_to_nowdoc' => true,
    'include' => true,
    'increment_style' => [
        'style' => 'pre'
    ],
    'indentation_type' => true,
    'line_ending' => true,
    'linebreak_after_opening_tag' => true,
    'list_syntax' => [
        'syntax' => 'short'
    ],
    'lowercase_cast' => true,
    'lowercase_keywords' => true,
    'constant_case' => ['case' => 'lower'],
    'method_argument_space' => [
        'on_multiline' => 'ensure_fully_multiline',
        'keep_multiple_spaces_after_comma' => false,
    ],
    'class_attributes_separation' => [
        'elements' => [
            'const' => 'one',
            'method' => 'one',
            'property' => 'one',
            'trait_import' => 'one',
        ],
    ],
    'modernize_types_casting' => true,
    'native_function_invocation' => [
        'exclude' => [],
        'include' => [],
        'scope' => 'all',
        'strict' => false,
    ],
    'new_with_parentheses' => ['anonymous_class' => true, 'named_class' => true],
    'no_alias_functions' => true,
    'no_blank_lines_after_class_opening' => true,
    'no_blank_lines_after_phpdoc' => true,
    'no_break_comment' => true,
    'no_closing_tag' => true,
    'no_empty_comment' => true,
    'no_empty_phpdoc' => true,
    'no_empty_statement' => true,
    'no_leading_import_slash' => true,
    'no_leading_namespace_whitespace' => true,
    'no_mixed_echo_print' => [
        'use' => 'echo'
    ],
    'no_multiline_whitespace_around_double_arrow' => true,
    'no_singleline_whitespace_before_semicolons' => true,
    'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
    'no_php4_constructor' => true,
    'no_short_bool_cast' => true,
    'echo_tag_syntax' => ['format' => 'long', 'long_function' => 'echo'],
    'no_spaces_after_function_name' => true,
    'spaces_inside_parentheses' => true,
    'no_superfluous_elseif' => true,
    'no_useless_else' => true,
    'no_superfluous_phpdoc_tags' => false,
    'no_trailing_comma_in_singleline' => ['elements' => ['arguments', 'array_destructuring', 'array', 'group_import']],
    'no_trailing_whitespace' => true,
    'no_trailing_whitespace_in_comment' => true,
    'no_unneeded_control_parentheses' => [
        'statements' => [
            'break',
            'clone',
            'continue',
            'echo_print',
            'switch_case',
        ]
    ],
    'no_unneeded_braces' => true,
    'no_unneeded_final_method' => true,
    'no_unused_imports' => true,
    'no_useless_return' => true,
    'no_whitespace_before_comma_in_array' => true,
    'not_operator_with_space' => false,
    'not_operator_with_successor_space' => true,
    'no_whitespace_in_blank_line' => true,
    'nullable_type_declaration_for_default_null_value' => true,
    'ordered_class_elements' => [
        'order' => [
            'use_trait',
            'constant_public',
            'constant_protected',
            'constant_private',
            'property_public',
            'property_protected',
            'property_private',
            'construct',
            'destruct',
            'magic',
            'phpunit',
            'method_public',
            'method_protected',
            'method_private',
        ],
        'sort_algorithm' => 'none',
    ],
    'ordered_imports' => [
        'imports_order' => ['class', 'function', 'const'],
        'sort_algorithm' => 'alpha',
    ],
    'phpdoc_align' => [
        'align' => 'left',
        'tags' => ['param', 'return', 'throws', 'type', 'var']
    ],
    'phpdoc_indent' => true,
    'phpdoc_tag_type' => [
        'tags' => [
            'api' => 'annotation',
            'author' => 'annotation',
            'copyright' => 'annotation',
            'deprecated' => 'annotation',
            'example' => 'annotation',
            'global' => 'annotation',
            'inheritDoc' => 'inline',
            'internal' => 'annotation',
            'license' => 'annotation',
            'method' => 'annotation',
            'package' => 'annotation',
            'param' => 'annotation',
            'property' => 'annotation',
            'return' => 'annotation',
            'see' => 'annotation',
            'since' => 'annotation',
            'throws' => 'annotation',
            'todo' => 'annotation',
            'uses' => 'annotation',
            'var' => 'annotation',
            'version' => 'annotation'
        ]
    ],
    'phpdoc_inline_tag_normalizer' => [
        'tags' => ['example', 'id', 'internal', 'inheritdoc', 'inheritdocs', 'link', 'source', 'toc', 'tutorial'],
    ],
    'general_phpdoc_tag_rename' => true,
    'phpdoc_line_span' => [
        'const' => 'single',
        'method' => 'multi',
        'property' => 'single'
    ],
    'phpdoc_no_alias_tag' => [
        'replacements' => [
            'type' => 'var',
            'link' => 'see'
        ],
    ],
    'phpdoc_no_empty_return' => false,
    'phpdoc_return_self_reference' => [
        'replacements' => [
            'this' => '$this',
            '@this' => '$this',
            '$self' => 'self',
            '@self' => 'self',
            '$static' => 'static',
            '@static' => 'static'
        ],
    ],
    'phpdoc_order' => false,
    'phpdoc_scalar' => [
        'types' => ['boolean', 'double', 'integer', 'real', 'str']
    ],
    'phpdoc_separation' => true,
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_summary' => false,
    'phpdoc_to_comment' => true,
    'phpdoc_trim_consecutive_blank_line_separation' => true,
    'phpdoc_trim' => true,
    'phpdoc_types' => [
        'groups' => ['simple', 'alias', 'meta']
    ],
    'phpdoc_types_order' => [
        'null_adjustment' => 'always_last',
        'sort_algorithm' => 'none',
    ],
    'phpdoc_var_annotation_correct_order' => true,
    'phpdoc_var_without_name' => true,
    'return_type_declaration' => [
        'space_before' => 'none'
    ],
    'single_class_element_per_statement' => [
        'elements' => ['property', 'const'],
    ],
    'single_line_comment_style' => [
        'comment_types' => ['hash']
    ],
    'single_quote' => [
        'strings_containing_single_quote_chars' => false,
    ],
    'space_after_semicolon' => true,
    'ternary_operator_spaces' => true,
    'trailing_comma_in_multiline' => [
        'after_heredoc' => false,
        'elements' => ['arrays'],
    ],
    'visibility_required' => [
        'elements' => ['property', 'method', 'const'],
    ],
    'whitespace_after_comma_in_array' => true,
    'yoda_style' => false,
    'psr_autoloading' => ['dir' => null],
    'no_extra_blank_lines' => [
        'tokens' => [
            'break',
            'case',
            'continue',
            'curly_brace_block',
            'default',
            'extra',
            'parenthesis_brace_block',
            'return',
            'square_brace_block',
            'switch',
            'throw',
        ]
    ],
    'global_namespace_import' => [
        'import_classes' => true,
        'import_constants' => true,
        'import_functions' => true,
    ],
    'single_line_empty_body' => false,
    'php_unit_test_class_requires_covers' => false,
])->setUsingCache(false)->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect())->setFinder($finder);
