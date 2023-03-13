<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Admin\SettingController
 */
class SettingControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $settings = Setting::factory()->count(3)->create();

        $response = $this->get(route('setting.index'));

        $response->assertOk();
        $response->assertViewIs('setting.index');
        $response->assertViewHas('settings');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('setting.create'));

        $response->assertOk();
        $response->assertViewIs('setting.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\SettingController::class,
            'store',
            \App\Http\Requests\SettingStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $group_name = $this->faker->word;
        $key = $this->faker->word;
        $type = $this->faker->word;
        $value = $this->faker->text;

        $response = $this->post(route('setting.store'), [
            'group_name' => $group_name,
            'key' => $key,
            'type' => $type,
            'value' => $value,
        ]);

        $settings = Setting::query()
            ->where('group_name', $group_name)
            ->where('key', $key)
            ->where('type', $type)
            ->where('value', $value)
            ->get();
        $this->assertCount(1, $settings);
        $setting = $settings->first();

        $response->assertRedirect(route('setting.index'));
        $response->assertSessionHas('setting.id', $setting->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $setting = Setting::factory()->create();

        $response = $this->get(route('setting.show', $setting));

        $response->assertOk();
        $response->assertViewIs('setting.show');
        $response->assertViewHas('setting');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $setting = Setting::factory()->create();

        $response = $this->get(route('setting.edit', $setting));

        $response->assertOk();
        $response->assertViewIs('setting.edit');
        $response->assertViewHas('setting');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Admin\SettingController::class,
            'update',
            \App\Http\Requests\SettingUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $setting = Setting::factory()->create();
        $group_name = $this->faker->word;
        $key = $this->faker->word;
        $type = $this->faker->word;
        $value = $this->faker->text;

        $response = $this->put(route('setting.update', $setting), [
            'group_name' => $group_name,
            'key' => $key,
            'type' => $type,
            'value' => $value,
        ]);

        $setting->refresh();

        $response->assertRedirect(route('setting.index'));
        $response->assertSessionHas('setting.id', $setting->id);

        $this->assertEquals($group_name, $setting->group_name);
        $this->assertEquals($key, $setting->key);
        $this->assertEquals($type, $setting->type);
        $this->assertEquals($value, $setting->value);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $setting = Setting::factory()->create();

        $response = $this->delete(route('setting.destroy', $setting));

        $response->assertRedirect(route('setting.index'));

        $this->assertModelMissing($setting);
    }
}
