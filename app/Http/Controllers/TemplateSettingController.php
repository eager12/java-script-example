<?php

namespace App\Http\Controllers;

use App\Models\TemplateSetting;
use Illuminate\Http\Request;

class TemplateSettingController extends Controller
{
    public function index()
    {
        $templates = TemplateSetting::all();
        return view('admin.templateSetting.index',compact('templates'));

    }

    public function edit($id)
    {
        $templates=TemplateSetting::all();
        $selectedTemplate=TemplateSetting::find($id);
        return view('admin.templateSetting.edit',compact('templates','selectedTemplate'));


    }


    public function update(Request $request, $id)
    {
        $template=TemplateSetting::find($id);
        if ($template->type=='image'){
            $template->value=$request->mainImage;
        }
//        if ($template->type=='text'){
//            $template->text=$request->ckeditor;
//        }
        $template->save();
        $templates=TemplateSetting::all();
        $selectedTemplate=TemplateSetting::find($id);
        $pm='ویرایش با موفقیت انجام شد';
        return view('admin.templateSetting.edit',compact('templates','selectedTemplate','pm'));

    }
}
