<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

use App\Entities\Tag;
use Validate;

class TagController extends AdminController
{

    public $admin;
    public $role;

    public function __construct(){
        parent::__construct();
        
    }

    public function getIndex(){
        if($this->role != 1){
            return redirect()->to('/admin')->send();
        }
    	$tags = Tag::paginate(15);
    	return view('admin.tag.index', compact('tags'));
    }

    public function getCreate(){
        if($this->role != 1){
            return redirect()->to('/admin')->send();
        }
    	return view('admin.tag.create');
    }

    public function postCreate(Request $req){
    	$tag = Tag::where('name', trim($req->name))->first();
    	if($tag) return redirect()->back()->withErrors('error', 'Tag đã tồn tại');
    	Tag::insert([
    		'name' => trim($req->name),
    		'slug' => str_slug(trim($req->name))
    	]);
    	return redirect(url('admin/tag/create'))->with([
    		'flash_message' => 'Thêm tag thành công',
    		'flash_level' => 'success'
    	]);
    }

    public function getEdit($tagId){
        if($this->role != 1){
            return redirect()->to('/admin')->send();
        }
    	$tag = Tag::find($tagId);
    	return view('admin.tag.edit', compact('tag'));
    }

    public function postEdit(Request $req, $tagId){
    	Tag::where('id', $tagId)->update([
    		'name' => trim($req->name),
    		'slug' => str_slug(trim($req->name))
    	]);
    	return redirect(url('admin/tag'));
    }

    public function getDelete($tagId){
        if($this->role != 1){
            return redirect()->to('/admin')->send();
        }
    	Tag::where('id', $tagId)->delete();
    	return redirect(url('admin/tag'));	
    }

    public function getSearch(Request $req){
        $tags = Tag::select('id', 'name')
            ->where('status', 1)
            ->where('name', 'LIKE', '%'.trim($req->term).'%')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();
        $result = [];
        foreach ($tags as $key) {
            array_push($result, [
                'label' => $key->name,
                'value' => $key->id
            ]);
        }
        return $result;
    }
}
