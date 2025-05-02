<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'product_id' => 'required|exists:products,id',
        ]);

        Comment::create([
            'comment' => $request->input('content'),
            'user_id' => Auth::id(),
            'product_id' => $request->input('product_id'),
            'status' => 0, // Default status
        ]);

        return redirect()->back()->with('success', 'Bình luận đã được thêm.');
    }
}

