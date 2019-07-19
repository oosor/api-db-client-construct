<?php
/**
 * Created by IntelliJ IDEA.
 * User: jarvis
 * Date: 18.07.19
 * Time: 23:31
 */

require __DIR__.'/../vendor/autoload.php';

$insert = new \Oosor\ClientConstruct\InsertBuilder('table_insert');
$update = new \Oosor\ClientConstruct\UpdateBuilder('table_update');
$updateTableName = new \Oosor\ClientConstruct\UpdateBuilder('table_update_name');

$insert->addColumn('col_name_1', function (\Oosor\ClientConstruct\Models\Build $build) {
    $build->bigIncrements();
});
$insert->addColumn('col_name_2', function (\Oosor\ClientConstruct\Models\Build $build) {
    $build->string(255)->default('default value');
});
$insert->addColumn('col_name_3', function (\Oosor\ClientConstruct\Models\Build $build) {
    $build->date()->nullable();
});

$update->addColumn('col_name_4', function (\Oosor\ClientConstruct\Models\Build $build) {
    $build->json()->pushPatch();
});
$update->addColumn('col_name_5', function (\Oosor\ClientConstruct\Models\Build $build) {
    $build->date()->default('2019-07-12')->changePatch();
});
$update->addColumn('col_name_2', function (\Oosor\ClientConstruct\Models\Build $build) {
    $build->string(255)->dropPatch();
});
$update->addColumn('col_name_3', function (\Oosor\ClientConstruct\Models\Build $build) {
    $build->date(255)->renamePatch('col_new_name_3');
});

$updateTableName->setTableNewName('table_update_new_name');


print 'Result for $insert -> \Oosor\ClientConstruct\InsertBuilder: ';
print_r($insert->getResult());
print '<br><br>';

print 'Result for $update -> \Oosor\ClientConstruct\UpdateBuilder: ';
print_r($update->getResult());
print '<br><br>';

print 'Result for $updateTableName -> \Oosor\ClientConstruct\UpdateBuilder: ';
print_r($updateTableName->getResult());
