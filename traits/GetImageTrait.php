<?php

namespace app\traits;

use app\models\File;

trait GetImageTrait {
    public function getImage() {
        return $this->hasOne(File::class, ['component_id' => 'id'])->andWhere([
            'component' => $this->tableName(),
        ])->andWhere([
            'image_category' => File::IMAGE_CATEGORY_MAIN
        ])->orderBy(['sort' => SORT_ASC]);
    }
}