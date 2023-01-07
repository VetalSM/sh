<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index($locale,Comment $comment)
    {
        return view('admin.products.comment.index', [
            'Comment' => $comment
        ]);
    }

    public function destroy($locale,Comment $comment)
    {
        $comment->delete();

        return redirect('/'.app()->getLocale().'/admin/products/comments')->with('success', 'Price Deleted!');
    }

}


