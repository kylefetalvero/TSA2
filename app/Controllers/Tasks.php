<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $tasks = $taskModel
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    public function new()
    {
        return view('task_form');
    }

    public function create()
    {
        $taskModel = new TaskModel();

        $rules = [
            'title'     => 'required',
            'task_date' => 'required|valid_date[Y-m-d]'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->listErrors());
        }

        $taskModel->insert([
            'title'       => $this->request->getPost('title'),
            'status'      => 'pending',
            'task_date'   => $this->request->getPost('task_date'),
            'created_at'  => date('Y-m-d H:i:s'),
            'is_archived' => 0
        ]);

        return redirect()->to('/tasks');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException(
                'Task not found'
            );
        }

        return view('task_edit', [
            'task' => $task
        ]);
    }

    public function update($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException(
                'Task not found'
            );
        }

        $rules = [
            'title'     => 'required',
            'task_date' => 'required|valid_date[Y-m-d]'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->listErrors());
        }

        $taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()->to('/tasks');
    }

    public function delete($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException(
                'Task not found'
            );
        }

        $taskModel->update($id, [
            'is_archived' => 1
        ]);

        return redirect()->to('/tasks');
    }
}