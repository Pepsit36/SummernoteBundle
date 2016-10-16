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
            ->defaultValue(array())
            ->end()
            //StyleTags
            ->arrayNode('styleTags')
            ->prototype('scalar')
            ->end()
            ->defaultValue(array())
            ->end()
            //FontNames
            ->arrayNode('fontNames')
            ->prototype('scalar')
            ->end()
            ->defaultValue(array())
            ->end()
            //FontSizes
            ->arrayNode('fontSizes')
            ->prototype('scalar')
            ->end()
            ->defaultValue(array())
            ->end()
            //Colors
            ->arrayNode('colors')
            ->prototype('array')
            ->prototype('scalar')
            ->end()
            ->end()
            ->defaultValue(array())
            ->end()
            //Summernote Path
            ->scalarNode('summernote_path')
            ->defaultValue('resources/summernote')
            ->end()
            //Images Path
            ->scalarNode('images_path')
            ->defaultValue('uploads/images/summernote')
            ->end()
            //End RootNote
            ->end();

        return $treeBuilder;
    }
}
