<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;


class IMSController extends Controller {

    public function login() {





    }

    public function openIMS() {
        require_once (public_path()."/phpGrid_Lite/conf.php");

        $dg = new \C_DataGrid("SELECT * FROM Orders", "OrderID", "Orders");
        $dg->enable_edit("FORM", "CRUD");
        $dg->enable_autowidth(true)->enable_autoheight(true);
        $dg->set_theme('start');
        $dg->set_grid_property(array('cmTemplate'=>array('title'=>false)));
        $dg->display(false);

        $grid = $dg -> get_display(true);

        return view('dashboard', ['grid' => $grid]);


    }

    public function switchIMSPanel($table, $pk) {
        require_once (public_path()."/phpGrid_Lite/conf.php");


        $dg = new \C_DataGrid("SELECT * FROM ".$table , $pk, $table);
        $dg->enable_edit("FORM", "CRUD");
        $dg->enable_autowidth(true)->enable_autoheight(true);
        $dg->set_theme('start');
        $dg->set_grid_property(array('cmTemplate'=>array('title'=>false)));
        $dg->display(false);

        $grid = $dg -> get_display(true);

        return view('dashboard', ['grid' => $grid]);
    }

}