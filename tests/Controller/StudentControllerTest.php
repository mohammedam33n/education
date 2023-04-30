<?php

namespace Tests\Controller;

use Illuminate\Http\UploadedFile;
use Tests\TestCaseWithTransLationsSetUp;
use Tests\Traits\TestGroupStudentTrait;
use Tests\Traits\TestGroupTrait;
use Tests\Traits\TestGroupTypeTrait;
use Tests\Traits\TestStudentTrait;
use Tests\Traits\TestTeacherTrait;

class StudentControllerTest extends TestCaseWithTransLationsSetUp
{

    use TestStudentTrait;
    use TestGroupStudentTrait;
    use TestGroupTrait;
    use TestTeacherTrait;
    use TestGroupTypeTrait;

    public function setUp() : void
    {
        parent::setUp();
        
        $this->refreshApplicationWithLocale('en');
    }

    public function test_index_opens_successfully()
    {
        $res = $this->call('get', route('admin.student.index'));

        $res->assertOk();
    }

    /**
     * @test
     * @dataProvider storePassesProvider
     */
    public function test_store_passes_with_all_data($data)
    {
        $res = $this->call('POST', route('admin.student.store'), $data);

        $res->assertSessionHasNoErrors();
    }

    public function storePassesProvider(): array
    {
        $this->refreshApplication();

        return [
            "with all data" => [
                [
                    'name' => fake()->name,
                    'birthday' => fake()->date(),
                    'phone' => fake()->phoneNumber,
                    'qualification' => fake()->text(),
                    'avatar' => UploadedFile::fake()->image('avatar.jpg')
                ],
            ],
            "with only name" => [
                [
                    'name' => fake()->name,
                ],
            ],
        ];
    }

     /**
     * @test
     * @dataProvider storeValidationProvider
     */
    public function test_store_validations($data)
    {
        $res = $this->call('POST', route('admin.student.store'), $data);

        $res->assertSessionHasErrors();
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
                    'name' => null,
                    'birthday' => fake()->date,
                    'phone' => fake()->phoneNumber,
                    'qualification' => fake()->text,
                    'avatar' => UploadedFile::fake()->image('avatar.jpg')
                ],
            ],
            "with a wrong date format" => [
                [
                    'name' => fake()->name,
                    'birthday' => fake()->name,
                    'phone' => fake()->phoneNumber,
                    'qualification' => fake()->text,
                    'avatar' => UploadedFile::fake()->image('avatar.jpg')
                ],
            ],
            "with a date that is greater than today" => [
                [
                    'name' => fake()->name,
                    'birthday' => now()->addDay()->toDateString(),
                    'phone' => fake()->phoneNumber,
                    'qualification' => fake()->text,
                    'avatar' => UploadedFile::fake()->image('avatar.jpg')
                ],
            ],
            "with a wrong phone format" => [
                [
                    'name' => fake()->name,
                    'birthday' => fake()->date,
                    'phone' => fake()->name,
                    'qualification' => fake()->text,
                    'avatar' => UploadedFile::fake()->image('avatar.jpg')
                ],
            ],
        ];
    }


    public function test_show_opens_successfully()
    {
        $student = $this->generateRandomStudent();

        $res = $this->call('get', route('admin.student.show', $student));

        $res->assertOk();
    }


    /**
     * @test
     * @dataProvider storePassesProvider
     */
    public function test_update_passes_with_all_data($data)
    {
        $student = $this->generateRandomStudent();

        $res = $this->call('PUT', route('admin.student.update', $student), $data);

        $res->assertSessionHasNoErrors();
    }


    /**
     * @test
     * @dataProvider storeValidationProvider
     */
    public function test_update_validations($data)
    {
        $student = $this->generateRandomStudent();

        $res = $this->call('PUT', route('admin.student.update', $student), $data);

        $res->assertSessionHasErrors();
    }


    public function test_deletes_works()
    {
        $student = $this->generateRandomStudent();

        $res = $this->call('get', route('admin.student.delete', $student));

        $res->assertSessionHasNoErrors();
    }

    public function test_getGroupStudents_returns_data_successfully()
    {
        $student = $this->generateRandomStudent();

        $this->generateRandomGroupStudent(1, [
            'student_id' => $student->id
        ]);

        $res = $this->call('get', route('admin.student.getGroupStudents', $student));

        $res->assertJson([
            'groupStudents' => $student->groupStudents->load(['group.groupDays'])->toArray(),
        ]);
    }
}