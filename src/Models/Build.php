<?php
/**
 * Created by IntelliJ IDEA.
 * User: jarvis
 * Date: 18.07.19
 * Time: 23:30
 */

namespace Oosor\ClientConstruct\Models;

/**
 * // types methods
 * @method $this bigIncrements()
 * @method $this bigInteger()
 * @method $this binary()
 * @method $this boolean()
 * @method $this char(int $size)
 * @method $this date()
 * @method $this dateTime()
 * @method $this dateTimeTz()
 * @method $this decimal(int $precision, int $scale)
 * @method $this double(int $precision, int $scale)
 * @method $this enum(string[] $values)
 * @method $this float(int $precision, int $scale)
 * @method $this geometry()
 * @method $this geometryCollection()
 * @method $this increments()
 * @method $this integer()
 * @method $this ipAddress()
 * @method $this json()
 * @method $this jsonb()
 * @method $this lineString()
 * @method $this longText()
 * @method $this macAddress()
 * @method $this mediumIncrements()
 * @method $this mediumInteger()
 * @method $this mediumText()
 * @method $this morphs()
 * @method $this multiLineString()
 * @method $this multiPoint()
 * @method $this multiPolygon()
 * @method $this nullableMorphs()
 * @method $this nullableTimestamps()
 * @method $this point()
 * @method $this polygon()
 * @method $this rememberToken()
 * @method $this set(string[] $values)
 * @method $this smallIncrements()
 * @method $this smallInteger()
 * @method $this softDeletes()
 * @method $this softDeletesTz()
 * @method $this string(int $size)
 * @method $this text()
 * @method $this time()
 * @method $this timeTz()
 * @method $this timestamp()
 * @method $this timestampTz()
 * @method $this timestamps()
 * @method $this timestampsTz()
 * @method $this tinyIncrements()
 * @method $this tinyInteger()
 * @method $this unsignedBigInteger()
 * @method $this unsignedDecimal(int $precision, int $scale)
 * @method $this unsignedInteger()
 * @method $this unsignedMediumInteger()
 * @method $this unsignedSmallInteger()
 * @method $this unsignedTinyInteger()
 * @method $this uuid()
 * @method $this year()
 *
 * // modifier methods
 * @method $this charset(string $character)
 * @method $this collation(string $collation)
 * @method $this comment(string $comment)
 * @method $this default(mixed $value)
 * @method $this nullable(boolean $isNull = null)
 * @method $this unsigned()
 * */
class Build
{
    private $column = [];

    /**
     * @param string $columnName
     * @return void
     * */
    public function __construct($columnName)
    {
        $this->column['name'] = $columnName;
    }

    /** update name column only for query builder
     * @param string $name
     * @return $this
     * */
    public function name($name)
    {
        $this->column['name'] = $name;
        return $this;
    }

    /** magic method
     * @param string $name
     * @param mixed $arguments
     * @return $this
     * */
    public function __call($name, $arguments)
    {
        switch ($name) {
            case 'bigIncrements':
            case 'bigInteger':
            case 'binary':
            case 'boolean':
            case 'char':
            case 'date':
            case 'dateTime':
            case 'dateTimeTz':
            case 'decimal':
            case 'double':
            case 'enum':
            case 'float':
            case 'geometry':
            case 'geometryCollection':
            case 'increments':
            case 'integer':
            case 'ipAddress':
            case 'json':
            case 'jsonb':
            case 'lineString':
            case 'longText':
            case 'macAddress':
            case 'mediumIncrements':
            case 'mediumInteger':
            case 'mediumText':
            case 'morphs':
            case 'multiLineString':
            case 'multiPoint':
            case 'multiPolygon':
            case 'nullableMorphs':
            case 'nullableTimestamps':
            case 'point':
            case 'polygon':
            case 'rememberToken':
            case 'set':
            case 'smallIncrements':
            case 'smallInteger':
            case 'softDeletes':
            case 'softDeletesTz':
            case 'string':
            case 'text':
            case 'time':
            case 'timeTz':
            case 'timestamp':
            case 'timestampTz':
            case 'timestamps':
            case 'timestampsTz':
            case 'tinyIncrements':
            case 'tinyInteger':
            case 'unsignedBigInteger':
            case 'unsignedDecimal':
            case 'unsignedInteger':
            case 'unsignedMediumInteger':
            case 'unsignedSmallInteger':
            case 'unsignedTinyInteger':
            case 'uuid':
            case 'year':
                $this->setType($name, $arguments);
                break;
            case 'charset':
            case 'collation':
            case 'comment':
            case 'default':
            case 'nullable':
            case 'unsigned':
                $this->setModifier($name, ...$arguments);
        }

        return $this;
    }

    /** update table and add new column
     * @return $this
     * */
    public function pushPatch()
    {
        $this->column['patch'] = ['action' => 'push'];
        return $this;
    }

    /** update table and change column
     * @return $this
     * */
    public function changePatch()
    {
        $this->column['patch'] = ['action' => 'change'];
        return $this;
    }

    /** update table and drop column
     * @return $this
     * */
    public function dropPatch()
    {
        $this->column['patch'] = ['action' => 'drop'];
        return $this;
    }

    /** update name column in database table
     * @param string $newName
     * @return $this
     * */
    public function renamePatch(string $newName)
    {
        $this->column['patch'] = ['action' => 'rename', 'new_name' => $newName];
        return $this;
    }

    /** get column settings
     * @return array
     * */
    public function getColumn()
    {
        return $this->column;
    }

    /** set type column
     * @param string $type
     * @param array $params
     * */
    protected function setType($type, $params)
    {
        $this->column['type'] = $type;
        if (!empty($params)) {
            if ($type == 'char' || $type == 'string' || $type == 'enum' || $type == 'set') {
                [$params] = $params;
            }
            $this->column['options'] = $params;
        }
    }

    /** set modifier column
     * @param string $type
     * @param array mixed
     * */
    protected function setModifier($type, $params = null)
    {
        $this->column['modifier'] = $type;
        if (isset($params)) {
            $this->column['modifier_options'] = $params;
        }
    }
}