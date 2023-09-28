<?php

namespace app\controllers;

use app\models\ProductRecord;
use yii\data\Pagination;
use yii\rest\Controller;

class ApiController extends Controller
{
    /** @var int */
    const DEFAULT_LIMIT = 10;

    /**
     * @param int $page
     * @param int $size
     * @return array
     */
    public function actionGetProducts(int $page = 1, int $size = 10): array
    {
        $query = ProductRecord::find();

        if ($size > 50 || $size < 1) {
            $size = self::DEFAULT_LIMIT;
        }

        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => $size,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);

        $pageCount = $pages->getPageCount();

        return [
            'products' => $query->offset($pages->offset)->limit($pages->limit)->all(),
            'nextPage' => $page >= $pageCount ? '' : $pages->createUrl($page, $size, true),
            'prevPage' => $pages->createUrl($page - 1, $size, true),
            'countPages' => $pageCount
        ];
    }
}