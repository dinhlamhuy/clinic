<?php 
namespace App\Http\Controllers;
use App\Models\Blog;
class Homecontroller extends Controller{
    public function index(){

        $data = Blog::getData();
        return view('home',compact('data'));
    }
}
?>