<?php

namespace app\traits;

use app\models\File;

trait GetFileTrait {
    public function getMainFile() {
        return $this->hasOne(File::class, ['component_id' => 'id'])->andWhere([
            'component' => $this->tableName(),
        ])->andWhere([
            'image_category' => File::IMAGE_CATEGORY_MAIN
        ])->orderBy(['sort' => SORT_ASC]);
    }
    public function getFile() {
        return $this->hasOne(File::class, ['component_id' => 'id'])->andWhere([
            'component' => $this->tableName(),
        ])->orderBy(['sort' => SORT_ASC]);
    }
}