<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingStoreRequest;
use App\Http\Requests\SettingUpdateRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $settings = Setting::all();

        return view('admin.setting.index', compact('settings'));
    }

    public function create(Request $request)
    {
        return view('admin.setting.create');
    }

    public function store(SettingStoreRequest $request)
    {
        $setting = Setting::create($request->validated());

        $request->session()->flash('setting.id', $setting->id);

        return redirect()->route('admin.setting.index');
    }

    public function show(Request $request, Setting $setting)
    {
        return view('admin.setting.show', compact('setting'));
    }

    public function edit(Request $request, Setting $setting)
    {
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(SettingUpdateRequest $request, Setting $setting)
    {
        $setting->update($request->validated());

        $request->session()->flash('setting.id', $setting->id);

        return redirect()->route('admin.setting.index');
    }

    public function destroy(Request $request, Setting $setting)
    {
        $setting->delete();

        return redirect()->route('admin.setting.index');
    }
}
