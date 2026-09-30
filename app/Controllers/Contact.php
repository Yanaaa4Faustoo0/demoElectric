<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Contact Us - PowerFlow Electric',
            'page' => 'contact',
            'success' => session()->getFlashdata('success'),
            'error' => session()->getFlashdata('error'),
            'validation' => session()->getFlashdata('validation')
        ];

        // Handle form submission
        if ($this->request->getMethod() === 'POST') {
            return $this->submitForm();
        }

        return view('contact', $data);
    }

    private function submitForm()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email',
            'phone' => 'required|min_length[10]|max_length[20]',
            'service_type' => 'required',
            'message' => 'required|min_length[10]|max_length[1000]'
        ]);

        // Check validation
        if (!$validation->withRequest($this->request)->run()) {

            session()->setFlashdata(
                'validation',
                $validation->getErrors()
            );

            return redirect()
                ->to('/contact')
                ->withInput();
        }

        // Get submitted form data
        $contactData = [
            'name' => trim($this->request->getPost('name')),
            'email' => trim($this->request->getPost('email')),
            'phone' => trim($this->request->getPost('phone')),
            'service_type' => trim($this->request->getPost('service_type')),
            'message' => trim($this->request->getPost('message')),
            'created_at' => date('Y-m-d H:i:s')
        ];

        /*
         * For now this is a demo.
         * The submitted information is collected in $contactData.
         *
         * Later, you can:
         * 1. Save it to a database
         * 2. Send it by email
         * 3. Send an automatic reply
         */

        session()->setFlashdata(
            'success',
            'Thank you for your message! We will contact you within 24 hours.'
        );

        // Redirect back to Contact page using GET
        return redirect()->to('/contact');
    }
}

