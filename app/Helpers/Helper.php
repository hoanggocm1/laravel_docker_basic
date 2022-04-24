<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use PDO;

class Helper
{


    public static function menu($list, $parent_id = 0, $char = '')
    {

        $html = '';
        foreach ($list as $key => $value) {

            if ($value->parent_id == $parent_id) {
                $html .= '
                <tr>
                <td>' . $char . $value->name  . '</td>
                <td>' . $value->description   . '</td>
                <td>' . $value->content   . '</td>
                <td>' . $value->active   . ' </td>
                </tr>
                ';

                unset($list[$key]);

                $html .= self::menu($list, $value->id, $char . '|--');
            }
        }

        return $html;
    }

    public static function listhocsinh($listhocsinh)
    {
        $html = '';
        $htmlactive = '';
        foreach ($listhocsinh as $value) {
            if ($value->active == 1) {
                $htmlactive = '<lable style="Color:green">On</lable>';
            } else {
                $htmlactive = '<lable style="Color:red">Off</lable>';
            }
            $html .= ' <tr>
       <td>' . $value->name  . '</td> 
       <td>' . $value->lop  . '</td> 
       <td>' . $value->dtb    . '</td>
       <td>'  . $value->phone . '</td>
       <td >'    . $htmlactive . ' 
       <a href="/admin/menus/updateactivehs/' . $value->id . '">  
       <i class="fas fa-retweet" ></i>
   
       </a>
       </td>
       <td> <a href="/admin/menus/ediths/' . $value->id . '">
       <i class="fas fa-edit" ></i>
   
       </a>
       <a href="#" onclick="removeHS(' . $value->id . ',\'/admin/menus/delete\')">  <i class="fas fa-trash"></i>
       </a>
       
       </tr>';
        }
        return $html;
    }



    public static function menu1($list, $parent_id1 = 0, $char = '')
    {
        $htmla = '';
        $htmlc = '';
        foreach ($list as $key => $value) {
            if ($value->active == 1) {
                $htmlc = '<label style="color: green;">On </label>';
            } else {
                $htmlc = '<label style="color: red;">Off </label>';
            }

            if ($value->parent_id == $parent_id1) {
                $htmla .= '<tr>
                <td>' . $value->name . '</td>
                <td>' . $char . $value->description . '</td>
                <td>' . $value->content . '</td>
                <td>' . $htmlc . '
                <a href="/admin/menus/editactive/' . $value->id . '">  
                <i class="fas fa-retweet" ></i>
            
                </a></td>
                <td> 
                        <a class"btn btn-primary btn-sm" href="/admin/menus/edit/' . $value->id . '">
                        <i class="fas fa-edit"></i>
                        </a>
                        <a class"btn btn-danger btn-sm" href="" onclick="removeRow(' . $value->id . ',\'/admin/menus/destroy\' ) ">
                        
                        <i class="fas fa-trash"></i>
                        </a>
                </td>
                </tr>';



                unset($list[$key]);

                $htmla .= self::menu1($list, $value->id, $char . 'con ne  ||');
            }
        }
        return $htmla;
    }

    public static function listproduct($products, $menu)
    {

        $html0 = '';

        // $a='';

        foreach ($products as $value) {
            // foreach($menu as $value1){
            //     if($value1->id == $value->menu_id){
            //         $a=$value1->name;
            //     }
            //  }
            if ($value->active == 1) {
                $htmlc = '<label id="' . $value->id . '"   src="' . $value->active . '"  style="color: green;">On </label>';
            } else {
                $htmlc = '<label id="' . $value->id . '"   src="' . $value->active . '"  style="color: red;">Off </label>';
            }
            $duongdan = '';
            $duongdan .= '/public/uploads/products/' . $value->image . '';
            $html0 .= '<tr >
                    <td>' . $value->name . '</td>
                <td>' . $value->menu->name . '</td>
                
                <td>' . $value->description . '</td>
                <td>' . $value->content . '</td>
                <td>' . $value->price . '</td>
                <td>' . $value->price_sale . '</td>
                <td><a href="' . $value->image . '" target="_blank">
                <img src="' . $value->image . '" alt="' . $value->image . '" height="100" width="100">
                </a>
                <a href="/admin/products/editproductimage/' . $value->id . '"">Sửa hình ảnh</a>
                </td>
                
                <td>' . $htmlc . '
               
                <a onclick="updateActive(' . $value->id . ',' . $value->active . ');">  
                <i class="fas fa-retweet" style="color:blue; cursor: pointer;  align-items: center;" alt="' . $value->id . '" ></i>
            
                </a></td>
                <td> 
                        <a class="btn btn-primary btn-sm" href="/admin/products/editproduct/' . $value->id . '">
                        <i class="fas fa-edit"></i>
                        </a>


                        <a  class="btn btn-danger btn-sm" style="color:blue; cursor: pointer;" onclick="deleteProduct(' . $value->id . ')" ' . $value->id . '" ">
                        
                        <i id="hoverdi" class="fas fa-trash"></i>
                        </a>
                </td>
    </tr>';
        }
        // 
        return $html0;
    }

    public static function getMenu($menus, $parent_id = 0)
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                <li  >
                    <a  href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">
                    ' . $menu->name . '
                    </a>';

                if (self::isChild($menus, $menu->id)) {
                    $html .= '<ul class="sub-menu">';
                    $html .= self::getMenu($menus, $menu->id);
                    $html .= '</ul>';
                }
                $html .= '</li>
                ';
            }
        }
        return $html;
    }

    public static function isChild($menus, $id)
    {
        foreach ($menus as $menu) {
            if ($menu->parent_id == $id) {
                return true;
            }
        }
        return false;
    }
}

// lưu lại đổi trạng thái sản phẩm listproduct
// <td>' . $htmlc . '
               
// <a href="/admin/products/productactive/' . $value->id . '">  
// <i class="fas fa-retweet" ></i>

// </a></td>