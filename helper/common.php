<?php

use Illuminate\Http\Request;

function storePostImage(Request $request) {
    $path = $request->file('image')->store('public/post');
    return substr($path, strlen('public/'));
}

function getAvatarName($name) {
    $name = explode(' ', $name);
    if (count($name) == 1) {
        return strtoupper(substr($name[0], 0, 1));
    }
    return strtoupper(substr($name[0], 0, 1) . substr($name[1], 0, 1));
}
