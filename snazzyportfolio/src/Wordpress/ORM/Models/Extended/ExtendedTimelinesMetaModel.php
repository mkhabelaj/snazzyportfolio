<?php

namespace Jcodify\Snazzyportfolio\Wordpress\ORM\Models\Extended;

use Jcodify\Snazzyportfolio\Wordpress\ORM\Models\AutoGen\Models\TimelineMetaModel;
use DateTime;

class ExtendedTimelinesMetaModel extends TimelineMetaModel
{
    public function isCurrentPlaceOfEmployment(): bool
    {
        return $this->currentPlaceOfEmployment->getValue() == "1";
    }

    public function getTrimmedDescription(int $length = 100): string
    {
        $description = $this->description->getValue();

        return wp_trim_words($description, $length);
    }

    public function getYearlyDurationContent(): array
    {

        $start_date = $this->startDate->getValue();
        $end_date = $this->endDate->getValue();

        if (!isset($start_date)) {
            throw new \Exception("Start date is required");
        }

        $is_present = $this->isCurrentPlaceOfEmployment();
        $startDate = new DateTime($start_date);


        if ($is_present) {
            return [$startDate->format('Y'), "Present"];
        }

        if (!isset($end_date)) {
            throw new \Exception("End date is required");
        }

        $endDate = new DateTime($end_date);

        if ($startDate->format('Y') == $endDate->format('Y')) {
            return [$startDate->format('Y')];
        }

        return [$startDate->format('Y'), $endDate->format('Y')];
    }

    public function getTimeDuration(): string
    {

        $start_date = $this->startDate->getValue();
        $end_date = $this->endDate->getValue();

        if (!isset($start_date) || !$start_date) {
            return "N/A";
        }

        if (!isset($end_date)) {
            return "N/A";
        }

        $startDate = new DateTime($start_date);
        $endDate = new DateTime($end_date);

        if (!isset($startDate) || !isset($endDate)) :
            return "N/A";
        endif;

        $duration = $startDate->diff($endDate);

        if ($duration->format('%y') > 0) {
            return $duration->format('%y years');
        }
        if ($duration->format('%m') > 0) {
            return $duration->format('%m months');
        }
        if ($duration->format('%d') > 0) {
            return $duration->format('%d days');
        }
    }

    public function getFormattedEndDate(string $format = "M Y"): string
    {
        if ($this->isCurrentPlaceOfEmployment()) {
            return "Present";
        }

        if ($this->endDate->getValue() == null || $this->endDate->getValue() == "") {
            return "N/A";
        }

        return $this->endDate->getDateFormattedVal($format);
    }

    public static function getAllTimelines(): array
    {

        $all_timelines = ExtendedTimelinesMetaModel::getQueries()->getAll();
        $all_timelines = array_map(fn ($timeline) => new ExtendedTimelinesMetaModel($timeline->ID), $all_timelines);

        usort($all_timelines, function ($a, $b) {
            $a = ExtendedTimelinesMetaModel::instance($a);
            $b = ExtendedTimelinesMetaModel::instance($b);
            return strtotime($b->startDate->getValue()) <=> strtotime($a->startDate->getValue());
        });
        $all_timelines = array_values($all_timelines);
        return $all_timelines;
    }
}
