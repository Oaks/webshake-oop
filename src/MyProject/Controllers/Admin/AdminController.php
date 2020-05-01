<?php

namespace MyProject\Controllers\Admin;

use MyProject\Controllers\AbstractController;
use MyProject\View\adminView;

class AdminController extends AbstractController
{
    public function __construct() {
        $this->view = new adminView('admin/layouts/admin.html');
        $this->view->setTemplate('style', '');
        $this->view->setTemplate('script', '');
    }

    public function index()
    {
        /* $this->log($this->templates); */
        return $this->dataTable();
    }

    public function dataTable()
    {
        /* $this->log($this->templates); */
        $this->view->setTemplate('style', '
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
            ');
        $this->view->setTemplate('script', '
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  $(function () {
    $("#example").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
            ');
        return $this->view->renderHtml('admin/data-table.html', []);
    }
}
