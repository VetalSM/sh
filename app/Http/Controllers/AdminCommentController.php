<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index(Comment $comment)
    {
        return view('admin.products.comment.index', [
            'Comment' => $comment
        ]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect('/admin/products/comments')->with('success', 'Price Deleted!');
    }

    protected function validatePrice(?Price $price = null): array
    {
        $price ??= new Price();

        return request()->validate([
            'name' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'unit' => 'required',
            'currency' => 'required'
        ]);
    }

}


