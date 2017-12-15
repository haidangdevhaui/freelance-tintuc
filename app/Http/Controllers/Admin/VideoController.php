<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Requests\VideoRequest;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends AdminController {

	public function __construct(Video $video, Request $request)
    {
        parent::__construct();

        $this->video = $video;

        $this->filter = ['title', 'created_by'];
        $this->search = 'videos.title';
    }

    /**
     * list action
     * @param  Request $req
     * @return view
     */
    public function index(Request $req)
    {
    	$videos = $this->video->getList();
        return view('admin.video.list', compact('videos'));
    }

    /**
     * create action
     * @param  NewsRequest $request
     * @param  integer|NULL      $id
     * @return view|redirect
     */
    public function create(VideoRequest $request, $id = null)
    {
        if ($request->isMethod('GET')) {
            if ($id) {
                $video = $this->video->find($id);
            }
            return view('admin.video.add', compact('video'));
        }

        $data = $request->except(['_token']);
        try {
            $data['created_by'] = $this->admin->id;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = $data['created_at'];

            if ($request->hasFile('image')) {
                $file           = $request->file('image');
                $file_name      = $request->file('image')->getClientOriginalName();
                $file_extension = $file->getClientOriginalExtension();
                $file_photo     = \Carbon\Carbon::now()->timestamp . '.' . $file_extension;
                $path           = "uploads/";
                if ($file->move($path, $file_photo)) {
                    $data['image'] = $path . $file_photo;
                }
            }

            if ($id) {
                $this->video->where(['id' => $id])->update($data);
            } else {
                $this->video->insert($data);
            }

            return redirect()->route('video_index')->with(['message' => 'Thêm video thành công']);
        } catch (Exception $e) {
            if (file_exists($data['image'])) {
                unlink($data['image']);
            }
            throw $e;
            return redirect()->back()->withErrors(['error' => 'Không thể tạo video.']);
        }
    }

    /**
     * delete post
     * @param  integer $id
     * @return redirect
     */
    public function delete($id)
    {
        $post = $this->video->findOrFail($id);
        if (file_exists($post->image)) {
            File::delete($post->image);
        }
        if ($post->forceDelete()) {
            return redirect()->back()->with(['message' => 'Xoá thành công video.']);
        }
    }	
}
