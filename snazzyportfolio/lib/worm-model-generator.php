<?php

// use Nzdesigns\Tantrum\Wordpress\ORM\Models\Extended\ExtendedProfilesMetaModel;
use Nzuridesigns\Worm\ModelGenerators\ClassTemplates\MetaModelClassTemplate;
use Nzuridesigns\Worm\ModelGenerators\ClassTemplates\QueryClassTemplate;
use Nzuridesigns\Worm\ModelGenerators\Generators\ImportGenerator;
use Nzuridesigns\Worm\ModelGenerators\Generators\MetaModelClassGenerator;
use Nzuridesigns\Worm\ModelGenerators\Generators\MetaQueryClassGenerator;
use Nzuridesigns\Worm\ModelGenerators\Generators\NonHierarchicalQueryTaxonomyClassGenerator;
use Nzuridesigns\Worm\ModelGenerators\Generators\NonHierarchicalTaxonomyClassGenerator;

if (defined('WP_CLI') && WP_CLI) {

    // WP_CLI::add_command('test-models', function () {
    //     $profileMetaModel = ExtendedProfilesMetaModel::instance(
    //         new ExtendedProfilesMetaModel(9)
    //     );
    //     echo $profileMetaModel->name->getValue();
    //     print_r($profileMetaModel->profiles->getValue());
    // });


    WP_CLI::add_command('gen-models', function () {

        $postTypes = ['project', 'timeline'];

        $importGen = new ImportGenerator();
        $importGen->overrideImportMap([
            'Extended' => 'Jcodify\Snazzyportfolio\Wordpress\ORM\Models\Extended\\',
        ]);



        $outputDir = get_template_directory() . '/src/Wordpress/ORM/Models/AutoGen/Models/';
        $namespace = 'Jcodify\Snazzyportfolio\Wordpress\ORM\Models\AutoGen\Models';
        $exlusion =  [ 'exclusion' => [
          'timeline' => ['post_tag']
        ]];

        $generateMetaModels = new MetaModelClassTemplate(
            $postTypes,
            $outputDir,
            'MetaModel',
            [new MetaModelClassGenerator(
                $exlusion
            ), new NonHierarchicalTaxonomyClassGenerator()],
            $importGen,
            $namespace
        );

        $generateMetaModels->generateClasses();

        $outputDirQ = get_template_directory() . '/src/Wordpress/ORM/Models/AutoGen/QModels/';
        $namespaceQ = 'Jcodify\Snazzyportfolio\Wordpress\ORM\Models\AutoGen\QModels';

        $generateQueryModels = new QueryClassTemplate(
            $postTypes,
            $outputDirQ,
            'QueryModel',
            [new MetaQueryClassGenerator(
                $exlusion
            ), new NonHierarchicalQueryTaxonomyClassGenerator()],
            $importGen,
            $namespaceQ,
        );

        $generateQueryModels->generateClasses();
    });
}
