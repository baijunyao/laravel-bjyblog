<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    protected $query;

    /**
     * 添加数据
     *
     * @param  array $data 需要添加的数据
     * @return bool        是否成功
     */
    public function addData($data)
    {
        //添加数据
        $result=$this
            ->create($data)
            ->id;
        if ($result) {
            session()->flash('alert-message','添加成功');
            session()->flash('alert-class','alert-success');
            return $result;
        }else{
            return false;
        }
    }

    /**
     * 修改数据
     *
     * @param  array $map  where条件
     * @param  array $data 需要修改的数据
     * @return bool        是否成功
     */
    public function editData($map, $data)
    {
        //查找需要修改的数据
        $model = $this->where($map)->first();
        //修改
        foreach ($data as $k => $v) {
            $model->{$k} = $v;
        }
        $result = $model->save();
        if ($result) {
            session()->flash('alert-message','修改成功');
            session()->flash('alert-class','alert-success');
            return $result;
        }else{
            return false;
        }
    }

    /**
     * 删除数据
     *
     * @param  array $map   where 条件数组形式
     * @return bool         是否成功
     */
    public function deleteData($map)
    {
        //软删除
        $result=$this
            ->where($map)
            ->delete();
        if ($result) {
            session()->flash('alert-message','操作成功');
            session()->flash('alert-class','alert-success');
            return $result;
        }else{
            return false;
        }
    }

    /**
     * 排序
     * @param  array $data 需要排序的数据
     * @return bool        是否成功
     */
    public function orderData($data)
    {
        //如果存在_token字段；则删除
        if (isset($data['_token'])) {
            unset($data['_token']);
        }
        //判断是否有需要排序的字段
        if (empty($data)) {
            session()->flash('alert-message','没有需要排序的数据');
            session()->flash('alert-class','alert-success');
            return false;
        }
        //循环修改数据
        foreach ($data as $k => $v){
            $v = empty($v) ? null : $v;
            $edit_data=[
                'order_number'=>$v
            ];
            //修改数据
            $result=$this
                ->where('id',$k)
                ->update($edit_data);
        }
        if ($result) {
            session()->flash('alert-message','修改成功');
            session()->flash('alert-class','alert-success');
            return $result;
        }else{
            return false;
        }
    }

    /**
     * 以方便的形式使用where
     *
     * @param $map 第一个元素为字段名 第二个为值  第三个为where类型  第四个为条件符号
     * @return $this
     */
    public function whereMap($map)
    {
        // 如果是空直接返回
        if (empty($map)) {
            return $this;
        }

        foreach ($map as $k => $v) {
            if (is_array($v)) {
                $sign = strtolower($v[0]);
                switch ($sign) {
                    case 'in':
                        $this->whereIn($k, $v[1]);
                        break;
                    case 'notin':
                        $this->whereNotIn($k, $v[1]);
                        break;
                    case 'between':
                        $this->whereBetween($k, $v[1]);
                        break;
                    case 'notbetween':
                        $this->whereNotBetween($k, $v[1]);
                        break;
                    case 'null':
                        $this->whereNull($k);
                        break;
                    case 'notnull':
                        $this->whereNotNull($k);
                        break;
                    case '=':
                    case '>':
                    case '<':
                    case '<>':
                        $this->where($k, $sign, $v[1]);
                        break;
                }
            } else {
                $this->query = $this->where($k, $v);
            }
            
        }
        return $this->query;
        
        // 判断where的类型
        $where = empty($map[2]) ? where : $map[2];
        if (empty($map[3])) {
            return $this->$where($map[0], $map[1]);
        } else {
            return $this->$where($map[0], $map[3], $map[1]);
        }
    }
}
