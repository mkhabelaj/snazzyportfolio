<?php

namespace Jcodify\Snazzyportfolio\Wordpress\ORM\Models\Extended;

use Jcodify\Snazzyportfolio\Wordpress\ORM\Models\AutoGen\Models\ProjectMetaModel;

class ExtendedProjectMetaModel extends ProjectMetaModel
{
    public function getRelatedPosts(): array
    {

        $related_projects = $this->relatedPosts->getValue();
        if (!is_array($related_projects)) {
            return [];
        }
        return  array_map(fn ($project) => get_post($project), $related_projects);
    }

    public function getProjectName(): string
    {
        if ($this->name->getValue()) {
            return $this->name->getValue();
        }
        return $this->getPostTitle();
    }
}
