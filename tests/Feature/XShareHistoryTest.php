<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\SharedPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class XShareHistoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_and_clear_twitter_share_history(): void
    {
        $admin = Admin::create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
        ]);

        $post = SharedPost::create([
            'image' => 'shared_images/test.jpg',
            'writeup' => 'Test X share',
            'token' => 'abc123xyz',
            'phone_share' => false,
            'platform' => 'twitter',
        ]);

        $response = $this->actingAs($admin, 'admin')->get('/admin/share/twitter');

        $response->assertOk();
        $response->assertSee('Share History');
        $response->assertSee('Copy link');
        $response->assertSee('Clear all');

        $this->actingAs($admin, 'admin')
            ->delete('/admin/share/twitter/history')
            ->assertRedirect();

        $this->assertDatabaseMissing('shared_posts', ['id' => $post->id]);
    }
}
