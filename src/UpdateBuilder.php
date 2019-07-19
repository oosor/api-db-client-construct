<?php
/**
 * Created by IntelliJ IDEA.
 * User: jarvis
 * Date: 19.07.19
 * Time: 10:59
 */

namespace Oosor\ClientConstruct;


class UpdateBuilder extends BaseBuilder
{

    /** update name table in database
     * @param string $name
     * @return $this
     * */
    public function setTableNewName($name)
    {
        $this->newName = $name;
        return $this;
    }
}