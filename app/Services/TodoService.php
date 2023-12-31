<?php

namespace App\Services;

use App\Models\Todo;
use Exception;
use Illuminate\Support\Facades\Log;

class TodoService
{
    /**
     * @throws Exception
     */
    public function post($request)
    {
        try {
            Log::debug('おっす');
            Log::debug($request);
            $title = $request['title'];
            $body = $request['body'];
            Todo::create([
                'title' => $title,
                'body' => $body
            ]);
        } catch (Exception $e) {
            Log::error("登録中にエラーが発生しました:".$e->getMessage());
            throw new Exception();
        }
    }

    /**
     * @throws Exception
     */
    public function put($request)
    {
        $id = $request['id'];
        $title = $request['title'];
        $body = $request['body'];
        $record = Todo::where('id', $id)->first();

        try {
            $record->title = $title;
            $record->body = $body;
            $record->save();
        } catch (Exception $e) {
            Log::error("更新中にエラーが発生しました:" . $e->getMessage());
            throw new Exception();
        }
    }
}
