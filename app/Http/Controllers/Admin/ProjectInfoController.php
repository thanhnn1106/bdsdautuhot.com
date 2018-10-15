<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use Illuminate\Validation\Rule;
use \App\Models\Project;
use \App\Models\ProjectInfo;

class ProjectInfoController extends Controller
{
    public function index(Request $request)
    {
        $data = array(
            'projectsFilter' => Project::all(),
            'projectsInfo'   => ProjectInfo::all(),
            'filter_project' => ''
        );

        return view('admin.project_info.list', $data);
    }
    public function add(Request $request)
    {
        $data = array(
            'actionForm'     => route('admin.projects.info.add'),
            'projectsFilter' => Project::all(),
            'project_id'     => '',
            'title'          => 'Thêm mới',
        );

        if ($request->isMethod('POST')) {
            $dataPost = $request->all();
            $rules = $this->_setRules($dataPost);
            // run the validation rules on the inputs from the form
            $validator = Validator::make($dataPost, $rules);

            if ($validator->fails()) {
                return redirect()->route('admin.projects.info.add')
                            ->withErrors($validator)
                            ->withInput();
            }
            $insert = [
                'title'      => $request->get('title'),
                'slug'       => str_slug($request->get('title')),
                'content'    => $request->get('content'),
                'ordering'   => $request->get('ordering'),
                'status'     => $request->get('status'),
                'project_id' => $request->get('project_id'),
            ];

            ProjectInfo::insert($insert);

            $request->session()->flash('success', trans('common.msg_create_success'));
            return redirect()->route('admin.projects.info');
        }

        return view('admin.project_info.form', $data);
    }
    public function edit(Request $request, $projectInfoId)
    {
        $project = ProjectInfo::find($projectInfoId);
        if ($project === NULL) {
            $request->session()->flash('error', trans('common.msg_data_not_found'));
            return redirect(route('admin.projects.info'));
        }

        $data = array(
            'actionForm'     => route('admin.projects.info.edit', ['projectInfoId' => $projectInfoId]),
            'projectInfo'    => $project,
            'project_id'     => $project->project_id,
            'projectsFilter' => Project::all(),
            'title'          => 'Cập nhật',
        );

        if ($request->isMethod('POST')) {

            $rules = $this->_setRules($request);

            // run the validation rules on the inputs from the form
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route('admin.projects.info.edit', ['projectInfoId' => $projectInfoId])
                            ->withErrors($validator)
                            ->withInput();
            }

            $project->title      = $request->get('title');
            $project->slug       = str_slug($request->get('title'));
            $project->content    = $request->get('content');
            $project->ordering   = $request->get('ordering');
            $project->status     = $request->get('status');
            $project->project_id = $request->get('project_id');
            $project->save();

            $request->session()->flash('success', trans('common.msg_update_success'));
            return redirect()->route('admin.projects.info');
        }

        return view('admin.project_info.form', $data);
    }

    public function delete(Request $request, $projectId)
    {
        $project = Project::find($projectId);
        if ($project === NULL) {
            $request->session()->flash('error', trans('common.msg_data_not_found'));
            return redirect(route('admin.projects.info'));
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
            'title'      => 'required',
            'content'    => 'required',
            'ordering'   => 'required|numeric',
            'status'     => 'required|in:0,1',
            'project_id' => 'required|exists:projects,id',
        );

        return $rules;
    }
}
