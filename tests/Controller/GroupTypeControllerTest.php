<?php

namespace Tests\Controller;

use Mockery\MockInterface;
use Tests\TestCaseWithTransLationsSetUp;
use App\Services\GroupType\GroupTypeService;
use Tests\Traits\TestGroupTypeTrait;

class GroupTypeControllerTest extends TestCaseWithTransLationsSetUp
{
    use TestGroupTypeTrait;


    public function setUp() : void
    {
        parent::setUp();
        $this->refreshApplicationWithLocale('en');
    }


    public function test_index_opens_without_errors()
    {
        $res = $this->call('get', route('admin.group_types.index'));

        $res->assertOk();
    }

    /**
     * @test
     * @dataProvider storeValidationProvider
     */
    public function test_store_validations($data)
    {
        $res = $this->call('POST', route('admin.group_types.store'), $data);

        $res->assertSessionHasErrors();
    }

    public function test_store_pass_with_all_data()
    {
        $this->mock(GroupTypeService::class, function (MockInterface $mock) {
            $mock->shouldReceive('createGroupType')->once();
        });

        $data = $this->generateRandomGroupTypeData();

        $res = $this->call('POST', route('admin.group_types.store'), $data);

        $res->assertSessionHasNoErrors();
    }

    /**
     * @dataProvider storeValidationProvider
     */
    public function test_update_validations($data)
    {
        $groupType = $this->generateRandomGroupType();

        $res = $this->call('PUT', route('admin.group_types.update', $groupType->id), $data);

        $res->assertSessionHasErrors();
    }

    public function test_update_works_with_all_data()
    {
        $groupType = $this->generateRandomGroupType();

        $this->mock(GroupTypeService::class, function (MockInterface $mock) {
            $mock->shouldReceive('updateGroupType')->once();
        });

        $data = $this->generateRandomGroupTypeData(); 

        $res = $this->call('PUT', route('admin.group_types.update', $groupType->id), $data);
        
        $res->assertSessionHasNoErrors();
    }

    public function test_group_type_get_deleted_without_errors()
    {
        $groupType = $this->generateRandomGroupType();

        $this->mock(GroupTypeService::class, function (MockInterface $mock) {
            $mock->shouldReceive('deleteGroupType')->once();
        });

        $res = $this->call('get', route('admin.group_types.delete', $groupType->id));

        $res->assertSessionHasNoErrors();
    }


    public function storeValidationProvider(): array
    {
        $this->refreshApplication();


        return [
            "without data" => [
                [],
            ],
            "without a name" => [
                [
                    'name'     => null,
                    'days_num' => 3,
                    'price'    => 1000,
                ],
            ],
            "without a days_num" => [
                [
                    'name'     => fake()->name,
                    'days_num' => null,
                    'price'    => 1000,
                ],
            ],
            "If (days_num) its type is a string" => [
                [
                    'name'     => fake()->name,
                    'days_num' => 'string',
                    'price'    => 1000,
                ],
            ],
            "without a price" => [
                [
                    'name'     => fake()->name,
                    'days_num' => 3,
                    'price'    => null,
                ],
            ],
            "If (price) its type is a string" => [
                [
                    'name'     => fake()->name,
                    'days_num' => 3,
                    'price'    => 'string',
                ],
            ],

        ];
    }
}
