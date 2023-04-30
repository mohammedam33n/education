<?php

namespace Tests\Traits;

use App\Models\GroupDay;

trait GroupDayTrait
{
    private function generateRandomGroupDay(int $count = 1)
    {
        if ($count == 1) {
            return GroupDay::factory()->create();
        }

        $data = $this->generateRandomGroupDayData();
        return GroupDay::factory($count)->create();
    }

    public function generateRandomGroupDayData(): array
    {
        return [
            'group_id' => $this->generateRandomGroup()->id,
            'day' => $this->faker()->dayOfWeek()
        ];
    }
}
