<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * 一覧表示
     *
     * @param Request $request
     * @return void
     */
    public function list(Request $request)
    {
        $tasks = Task::all();
        return view("task.list", compact("tasks"));
    }

    /**
     * 新規作成用フォーム
     *
     * @param Request $request
     * @return void
     */
    public function add(Request $request)
    {
        $task = new Task();
        return view("task.edit", compact("task"));
    }

    /**
     * 更新用フォーム
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function edit(Request $request, $id)
    {
        $id = decrypt($id);
        $task = Task::find($id);
        return view("task.edit", compact("task"));
    }

    /**
     * 追加処理・更新処理
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|min:3|max:100",
        ], [
            "name.required" => "タスク名を入力してください。",
            "name.min" => "タスク名には3文字以上を入力してください。",
            "name.max" => "タスク名は100文字以内で入力してください。"
        ]);

        $id = $request->input("id");
        $id = decrypt($id);
        $task = empty($id) ? new Task() : Task::find($id);
        $task->name = $validatedData["name"];
        $task->save();

        return redirect(route("task_list"));
    }

    /**
     * 削除確認画面
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function confirm(Request $request, $id)
    {
        $id = decrypt($id);
        $task = Task::find($id);
        return view("task.confirm", compact("task"));
    }

    /**
     * 削除処理
     *
     * @param Request $request
     * @return void
     */
    public function delete(Request $request)
    {
        $id = $request->input("id");
        $id = decrypt($id);
        $task = Task::find($id);
        $task->delete();
        return redirect(route("task_list"));
    }
}
