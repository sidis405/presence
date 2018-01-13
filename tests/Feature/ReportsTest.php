<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReportsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_get_to_the_login_display()
    {
        //just messing around getting the tests set up
            $response = $this->get('/admin/login');
            $response->assertSee("E-Mail Address");
    }
    /** @test */
    public function admin_user_can_get_the_number_of_people_present()
    {
        
    }
    /** @test */
    public function admin_user_can_get_the_number_of_people_not_present()
    {
        
    }

}
