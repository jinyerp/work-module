<?php
namespace Modules\Work\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Jiny\Table\Http\Controllers\ResourceController;
class ProjectController extends ResourceController
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ##
        $this->actions['table'] = "work_project"; // 테이블 정보

        //$this->actions['view_title'] = "jinywork::admin.project.title";
        //$this->actions['view_filter'] = "jinywork::admin.project.filter";
        $this->actions['view_list'] = "work::admin.project.list";
        $this->actions['view_form'] = "work::admin.project.form";

    }


    public function hookStored($wire, $form)
    {
        // project 테이블 생성
        $id = $form['id'];
        $sql = "CREATE TABLE `work_project_".$id."`
        (
            `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY(`Id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        DB::statement($sql);
    }

    public function hookDeleted($row)
    {
        DB::statement("drop table work_project_".$row->id);

    }

}
