<?php

namespace MyProject\Controllers\Admin;

use MyProject\Controllers\AbstractController;

class AdminController extends AbstractController
{
    public function index()
    {
        /* $this->log($this->templates); */
        /* echo file_get_contents($this->templates . '/admin/layouts/starter.html'); */
        echo $this->get_content($this->templates . '/admin/layouts/starter.html', [ 
            'content' => file_get_contents($this->templates . '/admin/starter-content.html')
        ]);
    }

    protected function get_content($file, $data)
    {
        $template = file_get_contents($file);

        foreach($data as $key => $value)
        {
            $template = str_replace('{{'.$key.'}}', $value, $template);
        }

        return $template;
    }
}
