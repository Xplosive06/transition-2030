<?php

namespace App\Http\Controllers;

use App\Models\StaticPages;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function update_form ($id)
    {
        $page_to_update = StaticPages::find($id);

        return view('admin.update_page', compact('page_to_update'));
    }

    public function update (Request $request)
    {
        $page_updated = StaticPages::find($request->page_id);

        $page_updated->update([
            'page_content' => $request->page_content,
        ]);

        return redirect()->route('admin');
    }
}
