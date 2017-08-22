<?php

namespace App\Http\Controllers\Admin;

use Artisan;
use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin/config/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $configModel)
    {
        $data = $request->except('_token');
        foreach ($data as $k => $v) {
            $editMap = [
                'name' => $k
            ];
            $editData = [
                'value' => $v
            ];
            $configModel->editData($editMap, $editData);
        }
        return redirect('admin/config/edit');
    }
}
