<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Models\Link;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LinkRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(LinkRequest $request): Application|RedirectResponse|Redirector
    {
        if(str_starts_with($request?->destination_url, config('app.url'))) return redirect(route('links.index'));

        $link = Link::firstOrCreate([
            'destination_url' => $request->destination_url,
        ], $request->validated());
        return redirect(route('links.index'))->with('code', $link->code);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link $link
     * @return Application|RedirectResponse|Redirector
     */
    public function show(Link $link): Application|RedirectResponse|Redirector
    {
        $link->click_count++;
        $link->save();
        return redirect($link->destination_url);
    }
}
