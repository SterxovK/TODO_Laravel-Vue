<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
{
return Article::all();
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request)
{
// return request::all();
// exit;
$this->validate($request, [
'title' => 'required',
'description' => 'required'
]);
$input =$request->all();
if ($image = $request->file('image')) {
$destinationPath = 'storage/images/';
$profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
$image->move($destinationPath, $profileImage);
$input['image'] = "$profileImage";
}
$success=Article::create($input);
if($success){
return response()->json(["message" => "Data Uploaded Successfully"]);
}else {
return response()->json(["message" => "Data Upload failiur"]);
}}
    public function show($id)
{
return Article::where('id', $id)->get();
}
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
return Article::where('id', $request->id)->update($request->all());
}
   public function destroy($id)
{
return Article::where('id',$id)->forceDelete();
}
}
