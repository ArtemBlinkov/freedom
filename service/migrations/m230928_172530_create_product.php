<?php

use yii\db\Migration;

/**
 * Class m230928_172530_create_product
 */
class m230928_172530_create_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'product_id' => $this->primaryKey(),
            'title'      => $this->string(255)->notNull(),
            'price'      => $this->integer()->notNull()->defaultValue(0),
            'quantity'   => $this->integer()->defaultValue(0),
        ]);

        $this->insert('product', [
            'title' => 'Spring and summershoes',
            'price' => 20,
            'quantity' => 3
        ]);

        $this->insert('product', [
            'title' => 'TC Reusable Silicone Magic Washing Gloves',
            'price' => 29,
            'quantity' => 2
        ]);

        $this->insert('product', [
            'title' => 'Oil Free Moisturizer 100ml',
            'price' => 40,
            'quantity' => 2
        ]);

        $this->insert('product', [
            'title' => 'Wholesale cargo lashing Belt',
            'price' => 930,
            'quantity' => 1
        ]);

        $this->insert('product', [
            'title' => 'Women Sweaters Wool',
            'price' => 600,
            'quantity' => 2
        ]);

        $this->insert('product', [
            'title' => 'lighting ceiling kitchen',
            'price' => 30,
            'quantity' => 2
        ]);

        $this->insert('product', [
            'title' => 'Black Motorbike',
            'price' => 569,
            'quantity' => 3
        ]);

        $this->insert('product', [
            'title' => 'Infinix INBOOK',
            'price' => 1099,
            'quantity' => 1
        ]);

        $this->insert('product', [
            'title' => 'Hyaluronic Acid Serum',
            'price' => 19,
            'quantity' => 1
        ]);

        $this->insert('product', [
            'title' => 'Pubg Printed Graphic T-Shirt',
            'price' => 46,
            'quantity' => 3
        ]);

        $this->insert('product', [
            'title' => 'ank Tops for Womens/Girls',
            'price' => 50,
            'quantity' => 2
        ]);

        $this->insert('product', [
            'title' => 'Chain Pin Tassel Earrings',
            'price' => 45,
            'quantity' => 3
        ]);

        $this->insert('product', [
            'title' => 'Stylish Luxury Digital Watch',
            'price' => 57,
            'quantity' => 3
        ]);

        $this->insert('product', [
            'title' => 'Round Silver Frame Sun Glasses',
            'price' => 19,
            'quantity' => 1
        ]);

        $this->insert('product', [
            'title' => 'Cycle Bike Glow',
            'price' => 35,
            'quantity' => 1
        ]);

        $this->insert('product', [
            'title' => 'Sleeve Shirt Womens',
            'price' => 91,
            'quantity' => 1
        ]);

        $this->insert('product', [
            'title' => 'perfume Oil',
            'price' => 13,
            'quantity' => 3
        ]);

        $this->insert('product', [
            'title' => 'Sneaker shoes',
            'price' => 120,
            'quantity' => 2
        ]);

        $this->insert('product', [
            'title' => 'Leather Strap Skeleton Watch',
            'price' => 46,
            'quantity' => 3
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
