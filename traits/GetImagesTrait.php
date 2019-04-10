<?php

namespace app\traits;

use app\models\File;

trait GetImagesTrait {
    public function getImages() {
        return $this->hasMany(File::class, ['component_id' => 'id'])->andWhere([
            'component' => $this->tableName(),
        ])->andWhere([
            'image_category' => File::IMAGE_CATEGORY_MAIN
        ])->orderBy(['sort' => SORT_ASC]);
    }
}