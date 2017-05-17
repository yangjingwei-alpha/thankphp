<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 2016/6/9
 * Time: 23:28
 **/
defined('ACC')||exit('ACC Denied');


class OGModel extends Model{
    protected $table = 'ordergoods';
    protected $pk = 'og_id';



    //把订单的商品写入ordergoods表
    public function addOG($data){
        if($this->add($data)){//写入成功则
            $sql = 'update goods set goods_number = goods_number - '. $data['goods_number'].' where goods_id = '.$data['goods_id'];
            return $this->db->query($sql);//减少库存
        }
            return false;
    }


}


?>