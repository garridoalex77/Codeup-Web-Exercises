<?php
require_once 'Model.php';


Class User extends Model 
{
    protected static $table = 'users';
}

$model = new Model();
$model->name = 'alex';
$model->group = 'codeup';
$model->age = 99;
echo $model->age.PHP_EOL;
echo Model::getTableName().PHP_EOL;
echo User::getTableName().PHP_EOL;


<?php if (!empty($message)): ?>
        <?php foreach ($message as $error): ?>
            <p><?= $error ?> </p>
        <?php endforeach ?>
    <?php endif ?>
    <p>----------------------</p>