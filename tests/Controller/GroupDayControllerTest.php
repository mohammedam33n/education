<?php

namespace Tests\Controller;

use App\Models\GroupDay;
use App\Services\GroupDay\GroupDayService;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery\MockInterface;
use Tests\TestCaseWithTransLationsSetUp;
use Tests\Traits\GroupDayTrait;
use Tests\Traits\TestGroupTrait;
use Tests\Traits\TestGroupTypeTrait;
use Tests\Traits\TestTeacherTrait;

class GroupDayControllerTest extends TestCaseWithTransLationsSetUp
{
    use WithFaker, GroupDayTrait;
    use TestGroupTrait;
    use TestTeacherTrait;
    use TestGroupTypeTrait;

    public function setUp(): void
    {
        parent::setUp();
        $this->refreshApplicationWithLocale('en');
    }

    public function test_index_page_Has_No_Errors()
    {
        $this->get(route('admin.group_day.index'))
            ->assertOk();
    }


    /**
     * @dataProvider validationData
     */
    public function test_store_validations($validationData)
    {
        $response = $this->post(route('admin.group_day.store'), $validationData);
        $response->assertSessionHasErrors();
    }

    public function validationData(): array
    {
        $this->refreshApplication();

        return [
            "with Null Day" => [
                [
                    'day' => null,
                    'group_id' => 1
                ]
            ],
            "with No Data" => [
                []
            ],

        ];
    }

    public function test_can_store_GroupDay_data()
    {
        $data = $this->generateRandomGroupDayData();

        $this->mock(GroupDayService::class, function (MockInterface $mock) {
            $mock->shouldReceive('createGroupDay')->once();
        });

        $res = $this->post(route('admin.group_day.store'), $data);

        $res->assertSessionHasNoErrors();
    }

    public function test_can_update_GroupDay_data()
    {
        $groupDay = $this->generateRandomGroupDay();

        $data = $this->generateRandomGroupDayData();

        $this->mock(GroupDayService::class, function (MockInterface $mock) {
            $mock->shouldReceive('updateGroupDay')->once();
        });

        $res = $this->put(route('admin.group_day.update', $groupDay), $data);

        $res->assertSessionHasNoErrors();
    }

    public function test_can_delete_GroupDay()
    {
        $groupDay = $this->generateRandomGroupDay();

        $this->mock(GroupDayService::class, function (MockInterface $mock) {
            $mock->shouldReceive('deleteGroupDay')->once();
        });

        $res = $this->get(route('admin.group_day.delete', $groupDay));

        $res->assertSessionHasNoErrors();
    }


    public function test_get_groupDays_of_Group_Has_No_Errors()
    {
        $group = $this->generateRandomGroup();

        $response = $this->get(route('admin.group_day.getGroupDaysOfGroup'),[
            'group_id' => $group->id
        ]);

        $response->assertJson([
            "groupDays" => GroupDay::where('group_id', $group->id)->select(['group_id', 'day'])->get()->toArray()
        ]);
    }
}
