<?php


use Illuminate\Foundation\Testing\DatabaseMigrations;

class AccessaAbleTest extends TestCase
{
    use DatabaseMigrations;

    // /** @test */
    // function a_register_user_can_only_read_free_articles()
    // {
    //
    // }

    /** @test */
    function a_guest_can_only_read_article_abstracts()
    {
      $author = factory('App\Models\User')->create();

      $topic = factory('App\Models\Topic')->create([
        'user_id' => $author->id,
      ]);

      $this->get("/topics/{$topic->id}")
          ->assertSee($topic->abstract);
    }
}
