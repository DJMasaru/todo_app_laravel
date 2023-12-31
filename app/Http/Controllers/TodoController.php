<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Services\TodoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TodoController extends Controller
{
    public function addTodo(Request $request)
    {
        try {
            $instance = new TodoService;
            $instance->post($request);
            return response()->json();
        } catch (\Exception $e) {
            return response()->json([],500);
        }
    }

    public function fetchTodo()
    {
        try {
            $response = Todo::all();
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([],500);
        }
    }

    public function fetchTodoIndividual(Request $request)
    {
        $id = $request['id'];
        try {
            $response = Todo::where('id',$id)->first();
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([],500);
        }
    }

    public function deleteTodo(Request $request)
    {
        try {
            $id = $request->input('id');
            $todo = Todo::find($id);

            if ($todo) {
                $todo->delete();
                return response()->json();
            } else {
                return response()->json([], 500);
            }
        } catch (\Exception $e) {
            return response()->json([], 500);
        }
    }

    public function putTodo(Request $request)
    {
        try {
            $instance = new TodoService;
            $instance->put($request);
            return response()->json();
        } catch (\Exception $e) {
            return response()->json([],500);
        }
    }
}
