<?php
namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function index($cour_id){

        $videos = Video::where('cour_id', $cour_id)->paginate(10);

        return view('admin.videos.index', compact('videos', 'cour_id'));
    }

    public function create($cour_id){
        return view('admin.videos.create', compact('cour_id'));
    }

    public function store(VideoRequest $request, $cour_id)
    {
        $video = new Video();

        $video->titre = $request->titre;
        
        $video->link = $request->link;

        $video->cour_id = $cour_id;
        
        $video->save();
        

        return redirect('admin/cour/'.$cour_id.'/videos')->with('added', 'La video a été ajouté avec succés');
    }

    public function edit($id)
    {
        $video = Video::find($id);

        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, $id)
    {
        $video =  Video::find($id);


        $video->titre = $request->titre;
        
        $video->link = $request->link;

        
        $video->save();

        return redirect('admin/cour/'.$video->cour_id.'/videos')->with('updated', 'La video a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cour_id = Video::find($id)->cour_id;
        Video::find($id)->delete();

        return redirect('admin/cour/'.$cour_id.'/videos')->with('deleted', 'La video a été supprimé avec succés');

    }
}
