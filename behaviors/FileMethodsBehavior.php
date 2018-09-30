<?php

namespace app\behaviors;

use yii;
use yii\base\Behavior;
use app\models\File;

class FileMethodsBehavior extends Behavior
{

    public function getFile() {
        return $this->hasOne(File::class, ['component_id' => 'id'])->andWhere([
            'component' => $this->tableName(),
        ])->orderBy(['sort' => SORT_ASC]);
    }

    public function getFiles() {
        return $this->hasMany(File::class, ['component_id' => 'id'])->andWhere([
            'component' => $this->tableName(),
        ])->orderBy(['sort' => SORT_ASC]);
    }
    public function beforeDelete()
    {
        $files = $this->getFiles()->all();
        foreach($files as $file) {

            $file->remove();
        }
        return parent::beforeDelete();
    }
}
