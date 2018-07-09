<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comment;
use App\Http\Requests\CommentsRequest;
use App\Services\UploadImageService;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $comments = Comment::orderBy('id', 'desc')->paginate(10);

        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CommentsRequest $request)
    {
        $comment = new Comment();

        $comment->comment = $request->input("comment");
        $comment->photo = UploadImageService::uploadImage($_FILES['photo'], 'uploads/comments');
        $comment->save();

        return redirect()->route('comments.index')->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update(CommentsRequest $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $comment->comment = $request->input("comment");

        $photo = UploadImageService::uploadImage($_FILES['photo'], 'uploads/comments');
        if (isset($photo)) {
            $comment->photo = $photo;
        }

        $comment->save();

        return redirect()->route('comments.index')->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('comments.index')->with('message', 'Item deleted successfully.');
    }

}
