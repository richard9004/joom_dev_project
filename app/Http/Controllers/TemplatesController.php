<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class TemplatesController extends Controller
{
    //listing of all the templates

    public function index(){
        $templates = Template::latest()->paginate(5);

        return view('template_list', compact('templates'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
       
    }

    public function create_new_template(){
        return view('create_new_template');
    }

    public function save_template(Request $request){
        $request->validate([
            'email_template'=>'required',
            'title'=>'required',
        ]);

        $template= Template::create([
            'title'=>$request->title,
            'email_template' => $request->email_template,
        ]);

        if($template){
            return redirect('templates')->with('success','Template created successfully!');
        }else{
            return redirect('create-new-template')->withError('Something Went Wrong');
        }
        
    }
    
    public function edit($id)
    {
        $template = Template::findOrFail($id);
        return view('edit_template', compact('template'));
    }

    public function update_template(Request $request, $id){
         
        $request->validate([
            'email_template'=>'required',
            'title'=>'required',
        ]);

        $template= array(
            'title'=>$request->title,
            'email_template' => $request->email_template,
        );

        $update_template = Template::where('id',$id)
        ->update($template);

        if($update_template){
            return redirect('templates')->with('success','Template Updated successfully!');
        }else{
            return redirect('create-new-template')->withError('Something Went Wrong');
        }


    }
}
