<?php

namespace Tests\Feature;

use App\Mail\SendEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class FormSubmissionTest extends TestCase
{
    public function test_can_see_form()
    {
        $this->get('/')
            ->assertOk()
            ->assertInertia(fn (AssertableInertia $page) => $page
                ->component('Form/Show')
            );
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_submit_form()
    {
        Mail::fake();

        $data = [
            'subject' => fake()->words(asText: true),
            'body' => fake()->paragraph(),
        ];

        $this->post('/', $data)
            ->assertSessionHas('success')
            ->assertRedirect();

        Mail::assertSent(SendEmail::class, function (SendEmail $mail) use ($data) {
            return $mail->hasSubject($data['subject']);
        });
    }

    public function test_can_catch_missing_subject()
    {
        $data = [
            'subject' => '',
            'body' => fake()->paragraph(),
        ];

        $this->post('/', $data)
            ->assertRedirect()
            ->assertSessionHasErrors('subject');
    }
}
