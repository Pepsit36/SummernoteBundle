<?php

namespace Pepsit36\SummernoteBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('pepsit36_summernote');

        $defaultToolbar = array(
            array('name' => 'style', 'buttons' => array('style')),
            array('name' => 'fontsize', 'buttons' => array('fontsize')),
            array('name' => 'font', 'buttons' => array('bold', 'italic', 'underline', 'clear')),
            array('name' => 'fontname', 'buttons' => array('fontname')),
            array('name' => 'color', 'buttons' => array('color')),
            array('name' => 'para', 'buttons' => array('ul', 'ol', 'paragraph')),
            array('name' => 'height', 'buttons' => array('height')),
            array('name' => 'table', 'buttons' => array('table')),
            array('name' => 'insert', 'buttons' => array('link', 'picture', 'hr')),
            array('name' => 'view', 'buttons' => array('fullscreen', 'codeview')),
            array('name' => 'help', 'buttons' => array('help')),
        );

        $defaultStyleTags = array(
            'p',
            'blockquote',
            'pre',
            'h1',
            'h2',
            'h3',
            'h4',
            'h5',
            'h6',
        );

        $defaultFontNames = array(
            'Arial',
            'Arial Black',
            'Comic Sans MS',
            'Courier New',
            'Helvetica Neue',
            'Helvetica',
            'Impact',
            'Lucida Grande',
            'Tahoma',
            'Times New Roman',
            'Verdana',
        );

        $defaultFontSizes = array(
            '8',
            '9',
            '10',
            '11',
            '12',
            '14',
            '18',
            '24',
            '36',
        );

        $defaultColors = array(
            array('#000000', '#424242', '#636363', '#9C9C94', '#CEC6CE', '#EFEFEF', '#F7F7F7', '#FFFFFF'),
            array('#FF0000', '#FF9C00', '#FFFF00', '#00FF00', '#00FFFF', '#0000FF', '#9C00FF', '#FF00FF'),
            array('#F7C6CE', '#FFE7CE', '#FFEFC6', '#D6EFD6', '#CEDEE7', '#CEE7F7', '#D6D6E7', '#E7D6DE'),
            array('#E79C9C', '#FFC69C', '#FFE79C', '#B5D6A5', '#A5C6CE', '#9CC6EF', '#B5A5D6', '#D6A5BD'),
            array('#E76363', '#F7AD6B', '#FFD663', '#94BD7B', '#73A5AD', '#6BADDE', '#8C7BC6', '#C67BA5'),
            array('#CE0000', '#E79439', '#EFC631', '#6BA54A', '#4A7B8C', '#3984C6', '#634AA5', '#A54A7B'),
            array('#9C0000', '#B56308', '#BD9400', '#397B21', '#104A5A', '#085294', '#311873', '#731842'),
            array('#630000', '#7B3900', '#846300', '#295218', '#083139', '#003163', '#21104A', '#4A1031'),
        );

        $rootNode
            ->children()
            //width
            ->integerNode('width')
            ->defaultValue(0)
            ->end()
            //Height
            ->integerNode('height')
            ->defaultValue(0)
            ->end()
            //Focus
            ->booleanNode('focus')
            ->defaultFalse()
            ->end()
            //Toolbar
            ->arrayNode('toolbar')
            ->prototype('array')
            ->children()
            ->scalarNode('name')
            ->end()
            ->arrayNode('buttons')
            ->prototype('scalar')
            ->end()
            ->end()
            ->end()
            ->end()
            ->defaultValue($defaultToolbar)
            ->end()
            //StyleTags
            ->arrayNode('styleTags')
            ->prototype('scalar')
            ->end()
            ->defaultValue($defaultStyleTags)
            ->end()
            //FontNames
            ->arrayNode('fontNames')
            ->prototype('scalar')
            ->end()
            ->defaultValue($defaultFontNames)
            ->end()
            //FontSizes
            ->arrayNode('fontSizes')
            ->prototype('scalar')
            ->end()
            ->defaultValue($defaultFontSizes)
            ->end()
            //Colors
            ->arrayNode('colors')
            ->prototype('array')
            ->prototype('scalar')
            ->end()
            ->end()
            ->defaultValue($defaultColors)
            ->end()
            //End RootNote
            ->end();

        return $treeBuilder;
    }
}
