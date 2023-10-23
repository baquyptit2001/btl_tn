<?php

use Illuminate\Http\Request;

function storePostImage(Request $request) {
    $path = $request->file('image')->store('public/post');
    return substr($path, strlen('public/'));
}
