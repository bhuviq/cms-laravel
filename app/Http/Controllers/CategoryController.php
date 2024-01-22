<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    /**
     * Display the Categories.
     */
    public function index(): Response
    {
        return Inertia::render('Dashboard', [
            'categories' => Category::all(),
            'status' => session('status'),
        ]);
    }
}
