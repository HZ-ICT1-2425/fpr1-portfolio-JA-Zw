<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    /**
     * @return HasMany
     */
    public function tests(): HasMany
    {
        return $this->hasMany(Test::class);
    }

    /**
     * @return float
     */
    public function getECsObtained(): float
    {
        $count = 0;
        foreach ($this->tests as $test) {
            if ($test->best_grade >= $test->lowest_passing_grade) {
                $count += $test->weighing_factor;
            }
        }
        return $count * $this->credits;
    }

    /**
     * @return bool
     */
    public function getPassed(): bool
    {
        return $this->getECsObtained() >= $this->credits;
    }
}
