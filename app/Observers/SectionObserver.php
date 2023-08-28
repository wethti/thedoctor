<?php

namespace App\Observers;

use App\Models\Section;

class SectionObserver
{
    public function creating(Section $section)
    {
        if (is_null($section->position)) {
            $section->position = Section::where('menutab_id', $section->menutab_id)->max('position') + 1;
            return;
        }

        $lowerPrioritySections = Section::where('menutab_id', $section->menutab_id)->where('position', '>=', $section->position)->get();

        foreach ($lowerPrioritySections as $lowerPrioritySection) {
            $lowerPrioritySection->position++;
            $lowerPrioritySection->saveQuietly();
        }
    }

    public function updating(Section $section)
    {
        if ($section->isClean('position')) {
            return;
        }

        $section->position = max(1, $section->position);
        
        
        if (is_null($section->position)) {
            $section->position = Section::where('menutab_id', $section->menutab_id)->max('position');
        }
        
        $maxPosition = Section::where('menutab_id', $section->menutab_id)->where('id', '!=', $section->id)->max('position');
        if($section->position > ($maxPosition + 1)) {
            $section->position = $maxPosition + 1;
        }


        if ($section->getOriginal('position') > $section->position) {
            $positionRange = [
                $section->position, $section->getOriginal('position')
            ];
        } else {
            $positionRange = [
                $section->getOriginal('position'), $section->position
            ];
        }

        $lowerPrioritySections = Section::
            where('menutab_id', $section->menutab_id)
            ->whereBetween('position', $positionRange)
            ->where('id', '!=', $section->id)
            ->get();

        foreach ($lowerPrioritySections as $lowerPrioritySection) {
            if ($section->getOriginal('position') < $section->position) {
                $lowerPrioritySection->position--;
            } else {
                $lowerPrioritySection->position++;
            }
            $lowerPrioritySection->saveQuietly();
        }
    }

    
    public function deleted(Section $section)
    {
        $lowerPrioritySections = Section::where('menutab_id', $section->menutab_id)->where('position', '>', $section->position)->get();

        foreach ($lowerPrioritySections as $lowerPrioritySection) {
            $lowerPrioritySection->position--;
            $lowerPrioritySection->saveQuietly();
        }
    }
}
