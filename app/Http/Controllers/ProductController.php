<?php
/**
 * Created by PhpStorm.
 * User: vidhi_BSP
 * Date: 2/11/2019
 * Time: 11:30 AM
 */

namespace App\Http\Controllers;


class ProductController {

    public function product_list(){
        $current_data = file_get_contents('data.json');
        $product_data = json_decode($current_data, true);

        return view('product.product-list',['product_data'=>$product_data]);
    }
    public function add_product(){
        return view('product.add-product');
    }
    public function edit_product($id){
        $current_data = file_get_contents('data.json');
        $product_datas = json_decode($current_data, true);
        $product_data = $product_datas[$id-1];
        return view('product.edit-product',['product_data'=>$product_data]);
    }

    public function api_product_edit(){

        if(file_exists('data.json')) //Check json file exist or not
        {
            $current_data = file_get_contents('data.json');//get data.json file data

            $array_data = json_decode($current_data, true);


            foreach ($array_data as $key => $entry) {
                $product_id = $entry['id'];
                if ($product_id == $_POST['p_id']) {
                    $array_data[$key]['product_name'] = $_POST['name'];
                    $array_data[$key]['price'] = $_POST['price'];
                    $array_data[$key]['quantity'] = $_POST['quantity'];
                    $array_data[$key]['total'] = $_POST["price"] * $_POST["quantity"];
                    $array_data[$key]['time'] =  date('Y-m-d H:i:s');
                }
            }

            $final_data = json_encode($array_data);
            file_put_contents('data.json', $final_data); //Put (add) data in json file
            $response =['STATUS_CODE' => 200,
                'MESSAGE' => 'Product Updated successfully',
                'DATA' => ''
            ];
            $response_json=json_encode($response,true);
            echo $response_json;
        }
        else
        {
            $response =['STATUS_CODE' => 200,
                'MESSAGE' => 'JSON File not exits',
                'DATA' => ''
            ];
            $response_json=json_encode($response,true);
            echo $response_json;
        }
    }
    public function api_product_add(){

        if(file_exists('data.json')) //Check json file exist or not
        {
            $current_data = file_get_contents('data.json');//get data.json file data

            $id = 1;

            if(isset($current_data) && !empty($current_data)){

                $array_data = json_decode($current_data, true);

                $last_array= end($array_data);         // move the internal pointer to the end of the array
                $id = $last_array['id'] + 1;
            }

            $extra = array(
                'id'  => $id,
                'product_name' => $_POST['name'],
                'price' => $_POST["price"],
                'quantity'  =>  $_POST["quantity"],
                'total'  =>  $_POST["price"] * $_POST["quantity"],
                'time'  =>  date('Y-m-d H:i:s'),
            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            file_put_contents('data.json', $final_data); //Put (add) data in json file
            $response =['STATUS_CODE' => 200,
                'MESSAGE' => 'Product Updated successfully',
                'DATA' => ''
            ];
            $response_json=json_encode($response,true);
            echo $response_json;
        }
        else
        {
            $response =['STATUS_CODE' => 200,
                'MESSAGE' => 'JSON File not exits',
                'DATA' => ''
            ];
            $response_json=json_encode($response,true);
            echo $response_json;
        }
    }
}