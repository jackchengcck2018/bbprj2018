<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;


class BlogController extends Controller {



    public function login() {




    }


    public function showBlogManagement() {





    }

    public function getBlogTitleList() {
        $blogTitleList = DB::select("SELECT title FROM Blogs");


        return $blogTitleList;
    }

    public function getBlog($blogId) {
        $blog = DB::select("SELECT * FROM Blogs WHERE blog_id = ".$blogId.";");

        return $blog;
    }

    public function postBlog(Request $request) {
        DB::beginTransaction();

        DB::insert("INSERT INTO Blogs (blog_title, blog_body, last_modified) VALUES ('".$request->title."', '".$request->body."', NOW())");

        DB::commit();
    }


    public function modifyBlog() {



    }

    public function deleteBlog($blogId) {
        DB::beginTransaction();

        DB::delete("DELETE FROM Blogs WHERE blog_id = ".$blogId.";");

        DB::commit();
    }

}
