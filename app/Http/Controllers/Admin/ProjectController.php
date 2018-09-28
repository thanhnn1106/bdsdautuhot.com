<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use Illuminate\Validation\Rule;
use \App\Models\Project;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $data = array(
            'projects' => Project::all()
        );

        return view('admin.projects.list', $data);
    }
    public function add(Request $request)
    {
        $data = array(
            'actionForm' => route('admin.projects.add'),
            'title'      => 'Thêm mới',
        );

        if ($request->isMethod('POST')) {
            $dataPost = $request->all();

            $rules = $this->_setRules($dataPost);
            // run the validation rules on the inputs from the form
            $validator = Validator::make($dataPost, $rules);

            if ($validator->fails()) {
                return redirect()->route('admin.projects.add')
                            ->withErrors($validator)
                            ->withInput();
            }
            $insert = [
                'name'             => $request->get('name'),
                'slug'             => str_slug($request->get('name')),
                'short_name'       => $request->get('short_name'),
                'short_des'        => $request->get('short_des'),
                'cover_photo'      => $request->get('cover_photo'),
                'logo'             => $request->get('logo'),
                'investor'         => $request->get('investor'),
                'instagram'        => $request->get('instagram'),
                'status'           => $request->get('status'),
                'is_menu'          => $request->get('is_menu'),
                'is_show_homepage' => $request->get('is_show_homepage'),
            ];

            Project::insert($insert);

            $request->session()->flash('success', trans('common.msg_create_success'));
            return redirect()->route('admin.projects');
        }

        return view('admin.projects.form', $data);
    }
    public function edit(Request $request, $projectId)
    {
        $project = Project::find($projectId);
        if ($project === NULL) {
            $request->session()->flash('error', trans('common.msg_data_not_found'));
            return redirect(route('admin.projects'));
        }

        $data = array(
            'actionForm' => route('admin.projects.edit', ['projectId' => $projectId]),
            'project'   => $project,
            'title'      => 'Cập nhật',
        );

        if ($request->isMethod('POST')) {

            $rules = $this->_setRules($request, $projectId);

            // run the validation rules on the inputs from the form
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route('admin.projects.edit', ['projectId' => $projectId])
                            ->withErrors($validator)
                            ->withInput();
            }

            $project->name             = $request->get('name');
            $project->short_name       = $request->get('short_name');
            $project->short_des        = $request->get('short_des');
            $project->slug             = str_slug($request->get('slug'));
            $project->is_menu          = $request->get('is_menu');
            $project->cover_photo      = $request->get('cover_photo');
            $project->logo             = $request->get('logo');
            $project->investor         = $request->get('investor');
            $project->investor         = $request->get('investor');
            $project->instagram        = $request->get('instagram');
            $project->status           = $request->get('status');
            $project->is_show_homepage = $request->get('is_show_homepage');
            $project->save();

            $request->session()->flash('success', trans('common.msg_update_success'));
            return redirect()->route('admin.projects');
        }

        return view('admin.projects.form', $data);
    }
    public function delete(Request $request, $projectId)
    {
        $project = Project::find($projectId);
        if ($project === NULL) {
            $request->session()->flash('error', trans('common.msg_data_not_found'));
            return redirect(route('admin.projects'));
        }

        $hasDelete = $project->delete();

        if ($hasDelete) {
            $request->session()->flash('success', trans('common.msg_delete_success'));
        } else {
            $request->session()->flash('error', trans('common.msg_delete_fail'));
        }

        return redirect()->route('admin.projects');
    }
    private function _setRules($request, $id = null)
    {
        $rules =  array(
            'name'        => 'required',
            'short_name'  => 'required',
            'short_des'   => 'required',
        );

        return $rules;
    }
}
