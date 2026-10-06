<?php

namespace App\Controllers;

use App\Models\CustomerAccountModel;

class CustomerAccounts extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerAccountModel();
    }

    private function checkLogin()
    {
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login');
        }

        return null;
    }

    public function index()
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $keyword = $this->request->getGet('search');
        $status = $this->request->getGet('status');
        $type = $this->request->getGet('type');

        $perPage = 10;

        if ($keyword) {
            $accounts = $this->customerModel
                ->searchAccounts($keyword, $perPage);
        } elseif ($status) {
            $accounts = $this->customerModel
                ->getAccountsByStatus($status, $perPage);
        } elseif ($type) {
            $accounts = $this->customerModel
                ->getAccountsByType($type, $perPage);
        } else {
            $accounts = $this->customerModel
                ->getAccountsPaginated($perPage);
        }

        $data = [
            'title' => 'Customer Accounts - Puihaha Electric',
            'page' => 'accounts',
            'accounts' => $accounts,
            'pager' => $this->customerModel->pager,

            'total_accounts' =>
                $this->customerModel->getTotalAccounts(),

            'active_accounts' =>
                $this->customerModel->getCountByStatus('active'),

            'inactive_accounts' =>
                $this->customerModel->getCountByStatus('inactive'),

            'suspended_accounts' =>
                $this->customerModel->getCountByStatus('suspended'),

            'current_page' =>
                (int) ($this->request->getGet('page') ?? 1),

            'search_keyword' => $keyword,
            'filter_status' => $status,
            'filter_type' => $type
        ];

        return view('customer_accounts', $data);
    }

    public function viewAccount($id)
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $account = $this->customerModel->find($id);

        if (!$account) {
            return redirect()
                ->to('/accounts')
                ->with('error', 'Account not found.');
        }

        return view('account_details', [
            'title' => 'Customer Details - Puihaha Electric',
            'page' => 'accounts',
            'account' => $account
        ]);
    }

    public function create()
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        return view('account_form', [
            'title' => 'Add Customer Account - Puihaha Electric',
            'page' => 'accounts',
            'account' => null,
            'mode' => 'create'
        ]);
    }

    public function store()
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $rules = [
            'account_number' => 'required|max_length[50]|is_unique[customer_accounts.account_number]',
            'customer_name' => 'required|max_length[150]',
            'address' => 'required',
            'phone' => 'permit_empty|max_length[20]',
            'email' => 'permit_empty|valid_email|max_length[100]',
            'meter_number' => 'permit_empty|max_length[50]',
            'connection_type' => 'required|in_list[residential,commercial,industrial]',
            'status' => 'required|in_list[active,inactive,suspended]'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->customerModel->insert([
            'account_number' => trim($this->request->getPost('account_number')),
            'customer_name' => trim($this->request->getPost('customer_name')),
            'address' => trim($this->request->getPost('address')),
            'phone' => trim($this->request->getPost('phone')),
            'email' => trim($this->request->getPost('email')),
            'meter_number' => trim($this->request->getPost('meter_number')),
            'connection_type' => $this->request->getPost('connection_type'),
            'status' => $this->request->getPost('status')
        ]);

        return redirect()
            ->to('/accounts')
            ->with('success', 'Customer account added successfully.');
    }

    public function edit($id)
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $account = $this->customerModel->find($id);

        if (!$account) {
            return redirect()
                ->to('/accounts')
                ->with('error', 'Account not found.');
        }

        return view('account_form', [
            'title' => 'Edit Customer Account - Puihaha Electric',
            'page' => 'accounts',
            'account' => $account,
            'mode' => 'edit'
        ]);
    }

    public function update($id)
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $account = $this->customerModel->find($id);

        if (!$account) {
            return redirect()
                ->to('/accounts')
                ->with('error', 'Account not found.');
        }

        $rules = [
            'account_number' =>
                "required|max_length[50]|is_unique[customer_accounts.account_number,id,{$id}]",

            'customer_name' => 'required|max_length[150]',
            'address' => 'required',
            'phone' => 'permit_empty|max_length[20]',
            'email' => 'permit_empty|valid_email|max_length[100]',
            'meter_number' => 'permit_empty|max_length[50]',
            'connection_type' => 'required|in_list[residential,commercial,industrial]',
            'status' => 'required|in_list[active,inactive,suspended]'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->customerModel->update($id, [
            'account_number' => trim($this->request->getPost('account_number')),
            'customer_name' => trim($this->request->getPost('customer_name')),
            'address' => trim($this->request->getPost('address')),
            'phone' => trim($this->request->getPost('phone')),
            'email' => trim($this->request->getPost('email')),
            'meter_number' => trim($this->request->getPost('meter_number')),
            'connection_type' => $this->request->getPost('connection_type'),
            'status' => $this->request->getPost('status')
        ]);

        return redirect()
            ->to('/accounts')
            ->with('success', 'Customer account updated successfully.');
    }

    public function delete($id)
    {
        if ($redirect = $this->checkLogin()) {
            return $redirect;
        }

        $account = $this->customerModel->find($id);

        if (!$account) {
            return redirect()
                ->to('/accounts')
                ->with('error', 'Account not found.');
        }

        $this->customerModel->delete($id);

        return redirect()
            ->to('/accounts')
            ->with('success', 'Customer account deleted successfully.');
    }
}