<?php
/**
 * Created by IntelliJ IDEA.
 * User: jarvis
 * Date: 18.07.19
 * Time: 23:13
 */

namespace Oosor\ClientConstruct;


use Oosor\ClientConstruct\Models\Build;

abstract class BaseBuilder
{
    protected $table;
    protected $newName;
    protected $columns = [];

    /**
     * @param string $tableName
     * @return void
     * */
    public function __construct($tableName)
    {
        $this->table = $tableName;
    }

    /** update name table in query builder
     * @param string $name
     * @return $this
     * */
    public function setTableName($name)
    {
        $this->table = $name;
        return $this;
    }

    /** add new column to query builder
     * @param string $columnName
     * @param \Closure $callback
     * @return $this
     * */
    public function addColumn($columnName, $callback)
    {
        $build = new Build($columnName);
        call_user_func($callback, $build);
        $this->columns[] = $build->getColumn();
        return $this;
    }

    /** get requesting data
     * @return array
     * */
    public function getResult()
    {
        return [
            'table' => $this->table,
            'new_name' => $this->newName ?? null,
            'columns' => $this->columns,
        ];
    }
}