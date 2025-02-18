<?php

use Jcodify\Snazzyportfolio\Wordpress\ORM\Models\Extended\ExtendedProjectMetaModel;
use Jcodify\Snazzyportfolio\Wordpress\ORM\Models\Extended\ExtendedTimelinesMetaModel;
use Nzuridesigns\Worm\ModelGenerators\ClassTemplates\MetaModelClassTemplate;
use Nzuridesigns\Worm\ModelGenerators\ClassTemplates\QueryClassTemplate;
use Nzuridesigns\Worm\ModelGenerators\Generators\ImportGenerator;
use Nzuridesigns\Worm\ModelGenerators\Generators\MetaModelClassGenerator;
use Nzuridesigns\Worm\ModelGenerators\Generators\MetaQueryClassGenerator;
use Nzuridesigns\Worm\ModelGenerators\Generators\NonHierarchicalQueryTaxonomyClassGenerator;
use Nzuridesigns\Worm\ModelGenerators\Generators\NonHierarchicalTaxonomyClassGenerator;

if (defined('WP_CLI') && WP_CLI) {

    WP_CLI::add_command('gen-data', function () {
        if (!WP_DEBUG) {
            return;
        }

        // create terms if they don't exist included desciption
        $terms = [
          'CSS' => 'CSS is style sheet language that defines the presentation of documents written in HTML',
          'HTML' => 'HTML is the standard markup language for documents designed to be displayed in a web browser',
          'Javascript' => 'Javascript is a programming language that allows you to implement complex features on web pages',
          'Java' => 'Java is a programming language that allows you to implement complex features on web pages',
          'GO' => 'GO is a programming language that allows you to implement complex features on web pages',
          'TypeScript' => 'TypeScript is a programming language that allows you to implement complex features on web pages',
          'Tailwind' => 'Tailwind is a programming language that allows you to implement complex features on web pages',
          'Linux' => 'Linux is a programming language that allows you to implement complex features on web pages'
        ];

        foreach ($terms as $key => $value) {
            $term = term_exists($key, 'technology');
            if (!$term) {
                $term = wp_insert_term($key, 'technology', ['description' => $value]);
            }
        }

        $projects = [
            [
              'title' => 'Project 1',
              'tags' => ['CSS', 'HTML', 'Javascript'],
              'timeline' => [
                  'start' => '2020-01-01',
                  'end' => '2021-01-31',
                  'institution' => 'Institution 1',
                  'description' => 'Lorem ipsum adipisicing elit . Quisquam, quae. Quisquam consectetur adipisicing elit. Quisquam, quae.'
               ]
            ],
            [
                'title' => 'Project 2',
                'tags' => ['CSS', 'HTML', 'Java'],
                'timeline' => [
                    'start' => '2021-02-01',
                    'end' => '2022-01-31',
                    'institution' => 'Institution 2',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Quisquam consectetur adipisicing elit. Quisquam, quae.'
                ]
            ],
            [
                'title' => 'Project 3',
                'tags' => ['GO', 'HTML', 'CSS'],
                'timeline' => [
                    'start' => '2022-02-01',
                    'end' => '2023-01-31',
                    'institution' => 'Institution 3',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.'
                ]
            ],
            [
                'title' => 'Project 4',
                'tags' => ["TypeScript", "HTML", "Tailwind", "Linux"],
                'timeline' => [
                    'start' => '2023-02-01',
                    'end' => '2023-04-28',
                    'institution' => 'Institution 4',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.'
                ]
            ],
            [
              'title' => 'Project 5',
              'tags' => ["TypeScript", "HTML", "Tailwind", "Linux"],
              'timeline' => [
                  'start' => '2023-05-01',
                  'end' => '2023-06-28',
                  'institution' => 'Institution 5',
                  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.'
              ]
            ],
            [
              'title' => 'Project 6',
              'tags' => ["TypeScript", "HTML", "Tailwind", "Linux"],
              'timeline' => [
                  'start' => '2023-07-01',
                  'end' => '',
                  'institution' => 'Institution 6',
                  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.'
              ]
            ]
        ];

        foreach ($projects as $project) {
            $timeline = null;
            $projectModel = null;
            try {
                $tl = $project['timeline'];
                $timeline = ExtendedTimelinesMetaModel::create($tl['institution']);
                if (isset($tl['end']) && $tl['end']) {
                    $timeline->endDate->setValue($tl['end']);
                }
                $timeline->startDate->setValue($tl['start']);
                $timeline->description->setValue($tl['description']);
                $timeline->institution->setValue($tl['institution']);
                $timeline->save();
                $projectModel = ExtendedProjectMetaModel::create($project['title']);
                $projectModel->timelines->addValue($timeline);
                foreach ($project['tags'] as $tag) {
                    $projectModel->taxonomyTechnology->setValue($tag);
                }
                $projectModel->save();
            } catch (Exception $e) {
                if ($timeline instanceof ExtendedTimelinesMetaModel) {
                    $timeline->delete();
                }
                if ($projectModel instanceof ExtendedProjectMetaModel) {
                    $projectModel->delete();
                }
                throw $e;
            }
        }
    });


    WP_CLI::add_command('gen-models', function () {

        $postTypes = ['project', 'timeline', 'post'];

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
