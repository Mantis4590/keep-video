<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index() {
        $videos = Video::where('user_id', auth()->id())->get();
        return view('videos.index', compact('videos'));
    }

    public function create() {
        return view('videos.create');
    }

    public function edit($id) {
        $video = Video::findOrFail($id);
        return view('videos.edit', compact('video'));

        // 将来的にDBから$idの映像を取得する想定
        $video = [
            'id' => $id,
            'title' => '映像作品A',
            'description' => '編集用ダミーデータ',
            'file_path' => 'sample1.mp4'
        ];

        return view('videos.edit', compact('video'));
    }

    public function update(Request $request, $id) 
    {
        $video = Video::findOrFail($id);

        $thumbnailPath = $video->thumbnail_path;

        // 新しいサムネがあれば置き換え
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $video->update([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail_path' => $thumbnailPath,
        ]);

        return redirect()->route('home')->with('success', '動画情報を更新しました');
    }

    public function destroy($id)
{
    // 実際はここでDB削除処理を行う想定
    // いまは仮のダミー動作としてリダイレクトのみ
    return redirect()->route('home')->with('success', "ID {$id} の映像を削除しました（仮）");
}

    public function store(Request $request) 
    {
        // 動画ファイル保存
        $videoPath = $request->file('video')->store('videos', 'public');

        // サムネイル保存
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // DB保存
        Video::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $videoPath,
            'thumbnail_path' => $thumbnailPath,
        ]);

        // 仮：DBに保存する代わりにメッセージだけ返す
        return redirect()->route('home')->with('success', '動画をアップロードしました！');
    }

    public function show($id) {
        $video = Video::findOrFail($id);
        return view('videos.show', compact('video'));
    }
}
