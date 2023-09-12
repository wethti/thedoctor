<?php

namespace App\Observers;

use App\Models\Subsection;

class SubsectionObserver
{
    public function creating(Subsection $subsection)
    {
        if (is_null($subsection->position)) {
            $subsection->position = Subsection::where('section_id', $subsection->section_id)->max('position') + 1;
            return;
        }

        $lowerPrioritySubsections = Subsection::where('section_id', $subsection->section_id)->where('position', '>=', $subsection->position)->get();

        foreach ($lowerPrioritySubsections as $lowerPrioritySubsection) {
            $lowerPrioritySubsection->position++;
            $lowerPrioritySubsection->saveQuietly();
        }
    }

    public function updating(Subsection $subsection)
    {
        if ($subsection->isClean('position')) {
            return;
        }

        $subsection->position = max(1, $subsection->position);

        if (is_null($subsection->position)) {
            $subsection->position = Subsection::where('section_id', $subsection->section_id)->max('position');
        }

        $maxPosition = Subsection::where('section_id', $subsection->section_id)->where('id', '!=', $subsection->id)->max('position');
        if($subsection->position > ($maxPosition + 1)) {
            $subsection->position = $maxPosition + 1;
        }

        if ($subsection->getOriginal('position') > $subsection->position) {
            $positionRange = [
                $subsection->position, $subsection->getOriginal('position')
            ];
        } else {
            $positionRange = [
                $subsection->getOriginal('position'), $subsection->position
            ];
        }

        $lowerPrioritySubsections = Subsection::
            where('section_id', $subsection->section_id)
            ->whereBetween('position', $positionRange)
            ->where('id', '!=', $subsection->id)
            ->get();

        foreach ($lowerPrioritySubsections as $lowerPrioritySubsection) {
            if ($subsection->getOriginal('position') < $subsection->position) {
                $lowerPrioritySubsection->position--;
            } else {
                $lowerPrioritySubsection->position++;
            }
            $lowerPrioritySubsection->saveQuietly();
        }
    }

    
    public function deleted(Subsection $subsection)
    {
        $lowerPrioritySubsections = Subsection::where('section_id', $subsection->section_id)->where('position', '>', $subsection->position)->get();

        foreach ($lowerPrioritySubsections as $lowerPrioritySubsection) {
            $lowerPrioritySubsection->position--;
            $lowerPrioritySubsection->saveQuietly();
        }
    }
}
