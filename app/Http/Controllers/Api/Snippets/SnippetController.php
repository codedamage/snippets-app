<?php

namespace App\Http\Controllers\Api\Snippets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Snippets\SnippetRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Resources\SnippetResource;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Snippet;

class SnippetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return SnippetResource::collection(Snippet::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return SnippetResource
     */
    public function store(SnippetRequest $request)
    {
        try {
            $snippet = new Snippet;
            $snippet->fill($request->validated())->save();

            return new SnippetResource($snippet);

        } catch(\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage}");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return SnippetResource
     */
    public function show($id)
    {
        $snippet = Snippet::findOrfail($id);

        return new SnippetResource($snippet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return SnippetResource
     */
    public function update(SnippetRequest $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        try {
            $snippet = Snippet::find($id);
            $snippet->fill($request->validated())->save();

            return new SnippetResource($snippet);

        } catch(\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage}");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $snippet = Snippet::findOrfail($id);
        $snippet->delete();

        return response()->json(null, 204);
    }
}
