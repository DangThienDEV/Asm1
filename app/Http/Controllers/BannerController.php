<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }
    public function create()
    {
        return view('admin.banner.add');
    }

    public function store(Request $request)
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'link' => 'nullable|string|max:255',
                'status' => 'required|boolean',
            ]);

            // Lưu hình ảnh vào thư mục uploads/images trong public storage
            $imagePath = $request->file('image')->store('uploads/images', 'public');

            // Tạo banner mới với đường dẫn hình ảnh đã lưu
            Banner::create([
                'title' => $request->title,
                'image' => $imagePath,
                'link' => $request->link,
                'status' => $request->status,
            ]);

            return redirect()->route('banners.index')->with('success', 'Banner created successfully.');
        }


    public function show(Banner $banner)
    {
        return view('admin.banner.detail', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Lưu hình ảnh mới
            $imagePath = $request->file('image')->store('uploads/images', 'public');

            // Xóa hình ảnh cũ nếu có
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }

            // Cập nhật đường dẫn hình ảnh mới
            $banner->image = $imagePath;
        }

        // Cập nhật các thông tin khác
        $banner->title = $request->title;
        $banner->link = $request->link;
        $banner->status = $request->status;
        $banner->save();

        return redirect()->route('banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {

        $banner->delete();

        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully.');
    }
}
