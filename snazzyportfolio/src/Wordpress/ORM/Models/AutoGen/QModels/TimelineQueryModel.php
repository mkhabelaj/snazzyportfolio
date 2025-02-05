<?php

// This file was autogenerated by the Jcodify, do not edit it directly

namespace Jcodify\Snazzyportfolio\Wordpress\ORM\Models\AutoGen\QModels;

use Nzuridesigns\Worm\AbstractClasses\Query;
use Nzuridesigns\Worm\QueryHander\MetaQueryHandler;
use Nzuridesigns\Worm\QueryHander\TaxQueryHandler;

class TimelineQueryModel extends Query
{
    public string $posttype = 'timeline';
    public MetaQueryHandler $startDate;
    public MetaQueryHandler $endDate;
    public MetaQueryHandler $institution;
    public MetaQueryHandler $description;
    public MetaQueryHandler $currentPlaceOfEmployment;
    public TaxQueryHandler $taxonomyPostTag;

    public function __construct()
    {
        parent::__construct();
        $this->startDate = new MetaQueryHandler('start_date');
        $this->endDate = new MetaQueryHandler('end_date');
        $this->institution = new MetaQueryHandler('institution');
        $this->description = new MetaQueryHandler('description');
        $this->currentPlaceOfEmployment = new MetaQueryHandler('current_place_of_employment');
        $this->taxonomyPostTag = new TaxQueryHandler('post_tag');
    }
}
