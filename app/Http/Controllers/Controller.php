<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function slugify($pageName) {
        // Trim leading and trailing spaces
        $pageName = trim($pageName);
        
        // Split the string into words by spaces (handling multiple spaces)
        $words = preg_split('/\s+/', $pageName);
        
        // Join the words with a hyphen
        $slug = implode('-', $words);
        
        // Convert to lowercase
        return strtolower($slug);
    }
}
