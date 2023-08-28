<?php

namespace App\Observers;

use App\Models\Menutab;

class MenutabObserver
{
    public function creating(Menutab $menutab)
    {
        if (is_null($menutab->position)) {
            $menutab->position = Menutab::max('position') + 1;
            return;
        }

        $lowerPriorityMenutabs = Menutab::where('position', '>=', $menutab->position)->get();

        foreach ($lowerPriorityMenutabs as $lowerPriorityMenutab) {
            $lowerPriorityMenutab->position++;
            $lowerPriorityMenutab->saveQuietly();
        }
    }

    public function updating(Menutab $menutab)
    {
        if ($menutab->isClean('position')) {
            return;
        }

        $menutab->position = max(1, $menutab->position);

        if (is_null($menutab->position)) {
            $menutab->position = Menutab::max('position');
        }

        $maxPosition = Menutab::where('id', '!=', $menutab->id)->max('position');
        if($menutab->position > ($maxPosition + 1)) {
            $menutab->position = $maxPosition + 1;
        }

        if ($menutab->getOriginal('position') > $menutab->position) {
            $positionRange = [
                $menutab->position, $menutab->getOriginal('position')
            ];
        } else {
            $positionRange = [
                $menutab->getOriginal('position'), $menutab->position
            ];
        }

        $lowerPriorityMenutabs = Menutab::whereBetween('position', $positionRange)
            ->where('id', '!=', $menutab->id)
            ->get();

        foreach ($lowerPriorityMenutabs as $lowerPriorityMenutab) {
            if ($menutab->getOriginal('position') < $menutab->position) {
                $lowerPriorityMenutab->position--;
            } else {
                $lowerPriorityMenutab->position++;
            }
            $lowerPriorityMenutab->saveQuietly();
        }
    }

    
    public function deleted(Menutab $menutab)
    {
        $lowerPriorityMenutabs = Menutab::where('position', '>', $menutab->position)->get();

        foreach ($lowerPriorityMenutabs as $lowerPriorityMenutab) {
            $lowerPriorityMenutab->position--;
            $lowerPriorityMenutab->saveQuietly();
        }
    }
}
