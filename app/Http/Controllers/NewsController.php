<?php

namespace App\Http\Controllers;
use App\Models\news;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $news = news::all();

        if ($news->isEmpty()) {
            $data = [
                "message" => "Data is empty",
            ];
        } else {
            $data = [
                "message" => "Get All News",
                "data" => $news
            ];
        }

        $data = [
            'message' => 'Get all news', 
            'data' => $news
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request) {
        $input = [
            'title' => $required->title,
            'author' => $required->author,
            'description' => $required->description,
            'content' => $required->content,
            'url' => $required->url,
            'url_image' => $required->url_image,
            'published_at' => $nullable->published_at,
            'category' => $required->category,
        ];

        $news = news::create($input);

        $data = [
            'message' => 'news is created succesfully',
            'data' =>$news,
        ];

        return response()->json($data, 201);
    }

    public function show($id)
	{
		$news = news::find($id);

		if ($news) {
			$response = [
				'message' => 'Get detail news',
				'data' => $news
			];
	
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];
			
			return response()->json($response, 404);
		}
	}

    public function update(Request $request, $id)
	{
		$news = news::find($id);

		if ($news) {
			$response = [
				'message' => 'news is updated',
				'data' => $news->update($request->all())
			];
	
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data not found'
			];

			return response()->json($response, 404);
		}
	}

    public function destroy($id)
    {
        $news = news::find($id);

        if ($news) {
            $response = [
                'message' => 'news is delete', 
                'data' => $news->delete()
            ];

        return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Data not found'
            ];

            return response()->json($response,404);
        }
    }
}
