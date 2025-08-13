<?php

namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertBatchData(string $table, array $data){
        $builder = $this->db->table($table);
        return $builder->insertBatch($data);
    }
    public function insertData(string $table, array $data): bool|int
    {
        $builder = $this->db->table($table);
        $builder->insert($data);

        if ($this->db->affectedRows() > 0) {
            return $this->db->insertID();
        }

        return false;
    }


    public function updateData(string $table, array $data, array $where): bool
    {
        return $this->db->table($table)->update($data, $where);
    }
    public function deleteData(string $table, array $where): bool
    {
        return $this->db->table($table)->delete($where);
    }

    public function getAll(string $table, array $where = [], array $whereNot = [])
    {
        $builder = $this->db->table($table);
        if (!empty($where)) {
            $builder->where($where);
        }
        if (!empty($whereNot)) {
            foreach ($whereNot as $key => $value) {
                $builder->where($key . ' !=', $value);
            }
        }
        return $builder->get();
    }
    public function getRow(string $table, array $where = [])
    {
        $builder = $this->db->table($table)->where($where);
        $result = $builder->get();
        return $result ?: null;
    }


    public function getAnalyticsData($table, $metrics = null, $where = [])
    {
        $builder = $this->db->table($table);
        if (!empty($where)) {
            $builder->where($where);
        }
        $query = $builder->get();
        return [
            'title'  => $metrics['title'],
            'icon'  => $metrics['icon'],
            'values' => $query->getNumRows(), // CI4 method for number of rows
            'link' => $metrics['link'] ?? '#'
        ];
    }

    /**
     * @param string $table name of table
     * @param array $optional array of optional params like 
     * select ='', 
     * where [column=>condition] || 'conditions...', 
     * whereIn [column=>data], 
     * orderBy [column=> order], 
     * join ['table', 'condition','left|right|inner|null'], 
     * like [columns=>condition]
     * groupBy [columnName1,columnName2,...],
     * offset number,
     * limit number
     * @return \CodeIgniter\Database\ResultInterface
     */
    public function fetchData($table, $optional = array('select' => '', 'where' => NULL, 'orderBy' => [], 'whereIn' => [], 'join' => [],  'like' => NULL, 'groupBy' => '', 'offset' => null, 'limit' => null))
    {
        $this->builder = $this->db->table($table);

        if (!empty($optional['select'])) {
            $this->builder->select($optional['select']);
        }

        if (!empty($optional['where'])) {
            $this->builder->where($optional['where']);
        }

        if (!empty($optional['whereIn'])) {
            foreach ($optional['whereIn'] as $column => $data) {
                if (is_array($data)) {
                    $this->builder->whereIn($column, $data);
                } else {
                    $this->builder->whereIn($column, explode(',', $data));
                }
            }
        }

        if (!empty($optional['join'])) {
            foreach ($optional['join'] as $tableConditionType) {
                $this->builder->join($tableConditionType[0], $tableConditionType[1], $tableConditionType[2] ?? 'left');
            }
        }

        if (!empty($optional['orderBy'])) {
            foreach ($optional['orderBy'] as $column => $order) {
                $this->builder->orderBy($column, $order);
            }
        }

        if (!empty($optional['like'])) {
            if (is_array($optional['like'])) {
                foreach ($optional['like'] as $column => $condition) {
                    $this->builder->like($column, $condition);
                }
            } else {
                $this->builder->like($optional['like']);
            }
        }

        if (!empty($optional['groupBy'])) {
            $this->builder->groupBy($optional['groupBy']);
        }

        if (isset($optional['offset'])) {
            $this->builder->offset($optional['offset']);
        }

        if (isset($optional['limit'])) {
            $this->builder->limit($optional['limit']);
        }

        return $this->builder->get();
    }
    public function deleteCheckedIds($table, $columnId, $columnName)
    {
        $this->builder = $this->db->table($table);
        $this->builder->whereIn($columnName, $columnId);
        $isDeleted = $this->builder->delete();
        if ($isDeleted) {
            return $isDeleted;
        } else {
            return $isDeleted;
        }
    }

    public function updateMultipleDeviceAccess($user_id, $session_id)
    {
        $data = [
            'approved' => 1,
            'is_active' => 1
        ];
        return $this->db->table('user_sessions')
            ->where('user_id', $user_id)
            ->where('ci_session_id', $session_id)
            ->update($data);
    }
}
