<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use \App\Models\Contacts;

class ContactsController extends Controller
{
    public function index(Request $request)
    {
        $data = array(
            'news' => Contacts::getList()
        );

        return view('admin.news.list', $data);
    }
    public function add(Request $request)
    {
        $data = array(
            'actionForm' => route('admin.contacts.add'),
            'title'      => 'Thêm mới',
        );

        if ($request->isMethod('POST')) {
            $dataPost = $request->all();

            $rules = $this->_setRules($dataPost);
            // run the validation rules on the inputs from the form
            $validator = Validator::make($dataPost, $rules);

            if ($validator->fails()) {
                return redirect()->route('admin.news.add')
                            ->withErrors($validator)
                            ->withInput();
            }
            $insert = [
                'project_id' => $request->get('project_id'),
                'title'      => $request->get('title'),
                'slug'       => str_slug($request->get('title')),
                'content'    => $request->get('content'),
                'thumbnail'  => $request->get('thumbnail'),
                'status'     => $request->get('status'),
            ];

            Contacts::insert($insert);

            $request->session()->flash('success', trans('common.msg_create_success'));
            return redirect()->route('admin.news');
        }

        return view('admin.contacts.form', $data);
    }
    public function edit(Request $request, $newId)
    {
        $news = Contacts::find($newId);
        if ($news === NULL) {
            $request->session()->flash('error', trans('common.msg_data_not_found'));
            return redirect(route('admin.contacts'));
        }

        $data = array(
            'actionForm' => route('admin.contacts.edit', ['newId' => $newId]),
            'new'        => $news,
            'title'      => 'Cập nhật',
        );

        if ($request->isMethod('POST')) {

            $rules = $this->_setRules($request, $newId);

            // run the validation rules on the inputs from the form
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route('admin.news.edit', ['newId' => $newId])
                            ->withErrors($validator)
                            ->withInput();
            }

            $news->project_id = $request->get('project_id');
            $news->title      = $request->get('title');
            $news->slug       = str_slug($request->get('title'));
            $news->content    = $request->get('content');
            $news->thumbnail  = $request->get('thumbnail');
            $news->status     = $request->get('status');
            $news->updated_at = date('Y-m-d H:i:s');
            $news->save();

            $request->session()->flash('success', trans('common.msg_update_success'));
            return redirect()->route('admin.contacts');
        }

        return view('admin.contacts.form', $data);
    }

    public function delete(Request $request, $newId)
    {
        $new = Contacts::find($newId);
        if ($new === NULL) {
            $request->session()->flash('error', trans('common.msg_data_not_found'));
            return redirect(route('admin.contacts'));
        }

        $hasDelete = $new->delete();

        if ($hasDelete) {
            $request->session()->flash('success', trans('common.msg_delete_success'));
        } else {
            $request->session()->flash('error', trans('common.msg_delete_fail'));
        }

        return redirect()->route('admin.contacts');
    }

    private function _setRules($request, $id = null)
    {
        $rules =  array(
            'project_id' => 'required',
            'title'      => 'required',
            'content'    => 'required',
            'thumbnail'  => 'required',
            'status'     => 'required',
        );

        return $rules;
    }
}
