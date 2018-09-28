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
        $paramSearch['filter_status']   = $request->get('filter_status');
        $data = array(
            'contacts'      => Contacts::getList($paramSearch),
            'filter_status' => $paramSearch['filter_status']
        );

        return view('admin.contacts.list', $data);
    }

    public function edit(Request $request, $contactId)
    {
        $contact = Contacts::find($contactId);
        if ($contact === NULL) {
            $request->session()->flash('error', trans('common.msg_data_not_found'));
            return redirect(route('admin.contacts'));
        }

        $data = array(
            'actionForm' => route('admin.contacts.edit', ['contactId' => $contactId]),
            'contact'    => $contact,
            'title'      => 'Cập nhật',
        );

        if ($request->isMethod('POST')) {

            $rules = $this->_setRules($request, $contactId);

            // run the validation rules on the inputs from the form
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route('admin.contacts.edit', ['contactId' => $contactId])
                            ->withErrors($validator)
                            ->withInput();
            }

            $contact->note       = $request->get('note');
            $contact->status     = $request->get('status');
            $contact->updated_at = date('Y-m-d H:i:s');
            $contact->save();

            $request->session()->flash('success', trans('common.msg_update_success'));
            return redirect()->route('admin.contacts');
        }

        return view('admin.contacts.form', $data);
    }

    public function delete(Request $request, $contactId)
    {
        $contact = Contacts::find($contactId);
        if ($contact === NULL) {
            $request->session()->flash('error', trans('common.msg_data_not_found'));
            return redirect(route('admin.contacts'));
        }

        $hasDelete = $contact->delete();

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
            'status' => 'required|in:0,1,2',
        );

        return $rules;
    }
}
